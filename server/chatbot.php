<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$userMessage = $data['message'] ?? '';

$apiKey = "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"; // 🔴 KEEP SECRET

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