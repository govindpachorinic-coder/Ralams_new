<?php
include 'config.php';
$token = trim(file_get_contents('token.txt'));

$url = SSO_BASE_URL . '/SSORESTNEW/IncreaseSessionTime';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "SSO-TOKEN: $token",
    "Authorization: Basic " . base64_encode(WS_USERNAME . ':' . WS_PASSWORD)
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

header('Content-Type: application/json');
http_response_code($httpCode);
echo json_encode(["response" => $response]);
?>