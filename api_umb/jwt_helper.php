<?php
/**
 * CP 1 & 2: JWT Helper URL Safe
 * Mengatasi masalah karakter + dan / yang sering rusak di browser
 */
class JWTHelper {
    public static function create($payload) {
        $header = base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
        $payload = base64_encode(json_encode($payload));
        
        // Proses HMAC-SHA256
        $signature = hash_hmac('sha256', "$header.$payload", SECRET_KEY, true);
        $signature = base64_encode($signature);
        
        return "$header.$payload.$signature";
    }

    public static function verify($token) {
        // TRIK MAUT: Kembalikan spasi jadi tanda + agar signature cocok
        $token = str_replace(' ', '+', $token);

        $parts = explode('.', $token);
        if (count($parts) !== 3) return false;

        list($header, $payload, $signature) = $parts;
        
        // Hitung ulang signature untuk divalidasi
        $check = base64_encode(hash_hmac('sha256', "$header.$payload", SECRET_KEY, true));

        return hash_equals($check, $signature);
    }
}