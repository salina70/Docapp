<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Client;
use Google\Service\Calendar;

session_start();

function getClient() {
    $client = new Client();
    $client->setApplicationName('DocApp Calendar Integration');
    $client->setScopes(Calendar::CALENDAR);
    $client->setAuthConfig(__DIR__ . '/client_secret.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously saved token
    if (isset($_SESSION['access_token'])) {
        $client->setAccessToken($_SESSION['access_token']);
    }

    // Refresh token if expired
    if ($client->isAccessTokenExpired()) {
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Redirect to Google auth if no refresh token
            $authUrl = $client->createAuthUrl();
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
            exit();
        }
        $_SESSION['access_token'] = $client->getAccessToken();
    }

    return $client;
}

function addEvent($summary, $description, $startDateTime, $endDateTime) {
    $client = getClient();
    $service = new Calendar($client);

    $event = new Calendar\Event([
        'summary' => $summary,
        'description' => $description,
        'start' => ['dateTime' => $startDateTime],
        'end' => ['dateTime' => $endDateTime],
    ]);

    $calendarId = 'primary';
    $service->events->insert($calendarId, $event);
}
?>