<?php
require 'config.php';
require 'jwt_helper.php';

// 1. Validasi Token (Header atau URL)
$token = "";
$headers = apache_request_headers();
if (isset($headers['Authorization']) && preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
    $token = $matches[1];
} elseif (isset($_GET['token'])) {
    $token = $_GET['token'];
}

if (empty($token) || !JWTHelper::verify($token)) {
    http_response_code(401);
    sendResponse("error", "Unauthorized: Akses ditolak.");
}

// 2. Tarik Data via CURL dari Server Bayangan
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SOURCE_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$result = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 3. Response
if ($http_code == 200) {
    header("Content-Type: application/json");
    // Langsung print hasil dari server bayangan
    echo $result;
} else {
    sendResponse("error", "Gagal mengambil data dari server simulasi. Code: $http_code");
}