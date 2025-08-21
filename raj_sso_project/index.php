<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userdetails'])) {
    $token = $_POST['userdetails'];
    file_put_contents('token.txt', $token); 
    echo json_encode([
        "message" => "Token received successfully.",
        "token" => $token
    ]);
} else {
    echo json_encode([
        "error" => true,
        "message" => "No token received. POST 'userdetails' to this endpoint."
    ]);
}
?>