<?php
define('SECRET_KEY', 'RAHASIA_S_KOM_UMB_2026');

// Ubah ke URL simulasi sesuai perintah dosen
define('SOURCE_URL', 'http://localhost/sikawan.umb.ac.id/public/datapegawai/');

function sendResponse($status, $message, $data = null) {
    header("Content-Type: application/json");
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}
