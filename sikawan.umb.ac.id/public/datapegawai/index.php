<?php
// index.php (Server Bayangan SIKAWAN)
header("Content-Type: application/json");

$dataDosen = [
    "nidn" => "0123456789",
    "np" => "1987654321",
    "nama" => "Dr. Ahmad Fauzi, M.Kom",
    "no_sertifikat" => "SER-2020-UMB-001",
    "jabatan_fungsional" => "Lektor",
    "tmt_jabatan" => "2020-01-01",
    "pangkat_golongan" => "III/c",
    "tmt_pangkat" => "2019-10-01",
    "pts" => "Universitas Muhammadiyah Bengkulu",
    "alamat" => "Bengkulu",
    "no_hp" => "08123456789"
];

echo json_encode($dataDosen);
