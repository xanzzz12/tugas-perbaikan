# Tugas Perbaikan API Sertifikasi Dosen - UMB 2026

Repositori ini berisi implementasi Web API dengan autentikasi **JWT (HMAC-SHA256)** dan pengambilan data menggunakan **PHP CURL**.

## Struktur Folder
Sesuai instruksi, sistem dibagi menjadi dua bagian:
- `api_umb/`: Core API System (Client/Proxy).
- `sikawan.umb.ac.id/`: Resource Server (Server Simulasi Sumber Data).

## Cara Penggunaan
1. Letakkan kedua folder tersebut di dalam direktori `htdocs` XAMPP Anda.
2. Akses `http://localhost/api_umb/generate_token.php` untuk mendapatkan token.
3. Gunakan token tersebut untuk mengakses `http://localhost/api_umb/api_dosen.php?token=[TOKEN_ANDA]`.

## Teknologi
- PHP Murni (Tanpa Framework)
- HMAC-SHA256 (Cryptography)
- PHP cURL
