<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Client;

// Create Google Client
$client = new Client();
$client->setApplicationName('DocApp Calendar Integration');
$client->setScopes(Google\Service\Calendar::CALENDAR);
$client->setAuthConfig(__DIR__ . '/client_secret.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');  // Force refresh token prompt

session_start();

// Redirect to Google Auth if code not present
if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit();
} else {
    // Exchange authorization code for access token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    echo "Authentication successful! You can now <a href='add-event.php'>add events</a>.";
}
