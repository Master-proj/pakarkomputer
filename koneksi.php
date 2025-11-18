<?php
// Selalu mulai session di awal
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- PENGATURAN KONEKSI DATABASE ---

$db_host = 'localhost';     // Biasanya 'localhost'
$db_user = 'root';          // User default XAMPP
$db_pass = '';              // Password default XAMPP (kosong)
$db_name = 'db_pakar'; // Nama database yang Anda buat tadi

// --- AKHIR PENGATURAN ---

// Buat koneksi
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Cek koneksi
if (!$conn) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan script
    die("KONEKSI GAGAL: " . mysqli_connect_error());
}

// Set charset ke utf8mb4 (untuk mendukung emoji dan karakter spesial)
mysqli_set_charset($conn, "utf8mb4");

?>