<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$userMessage = $data['message'] ?? '';

$apiKey = $_ENV['OPEN_AI_KEY']; // 🔴 KEEP SECRET

$payload = [
    "model" => "gpt-4.1-mini",
    "messages" => [
        ["role" => "system", "content" => "You are a helpful assistant."],
        ["role" => "user", "content" => $userMessage]
    ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

$reply = $result['choices'][0]['message']['content'] ?? "No response";

echo json_encode(["reply" => $reply]);
?>