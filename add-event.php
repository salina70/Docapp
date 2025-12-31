<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Client;
use Google\Service\Calendar;

session_start();

if (!isset($_SESSION['access_token'])) {
    die("You must <a href='google-auth.php'>login with Google</a> first.");
}

$client = new Client();
$client->setApplicationName('DocApp Calendar Integration');
$client->setScopes(Google\Service\Calendar::CALENDAR);
$client->setAuthConfig(__DIR__ . '/client_secret.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

// Set previously saved access token
$client->setAccessToken($_SESSION['access_token']);

// Refresh token if expired
if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    $_SESSION['access_token'] = $client->getAccessToken();
}

// Initialize Calendar service
$service = new Calendar($client);

// Create an event
$event = new Calendar\Event([
    'summary' => 'Doctor Appointment',
    'description' => 'Booked via DocApp',
    'start' => ['dateTime' => '2025-12-20T10:00:00+05:45'],
    'end' => ['dateTime' => '2025-12-20T11:00:00+05:45'],
]);

$calendarId = 'primary';
$service->events->insert($calendarId, $event);

echo "Event added to Google Calendar!";
?>