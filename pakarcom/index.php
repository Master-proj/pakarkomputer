<?php
// Kita bisa sertakan koneksi di sini untuk membersihkan session lama,
// agar jika user kembali ke 'index', diagnosa sebelumnya direset.
include 'koneksi.php';
session_destroy(); // Hancurkan sesi lama, mulai baru
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Komputer - Diagnosa Kerusakan PC</title>
    
    <link rel="stylesheet" href="css/style-index.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon-wrapper">
                <svg viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-5 14H4v-4h11v4zm0-5H4V9h11v4zm5 5h-4V9h4v9z"/>
                </svg>
            </div>
            <h1>Sistem Pakar Komputer</h1>
            <p class="subtitle">Solusi Cerdas untuk Diagnosa Kerusakan Komputer Anda</p>
        </div>

        <div class="description">
            <p>
                Selamat datang di Sistem Pakar Komputer! Aplikasi ini dirancang untuk membantu Anda 
                mengidentifikasi dan mendiagnosa masalah pada komputer dengan cepat dan akurat. 
                Dengan menggunakan metode <strong>Backward Chaining</strong>, sistem kami akan menganalisis 
                gejala-gejala yang Anda alami dan memberikan diagnosa serta solusi yang tepat.
            </p>
        </div>
        <div>
            <h2 style="text-align: center; margin-bottom: 30px; color: #2d3748;">Alur Kerja Sistem Pakar Komputer</h2>
        </div>
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">📃</div>
                <div class="feature-title">Masalah Umum</div>
                <div class="feature-text">
                    Pengguna diminta untuk memilih kategori permasalahan yang umumnya terjadi pada komputer, seperti kerusakan pada keyboard, layar, touchpad, dan komponen lainnya. 
                </div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <div class="feature-title">Masalah Khusus</div>
                <div class="feature-text">
                    Pengguna diarahkan untuk menjawab pertanyaan yang lebih spesifik sesuai dengan gejala atau kerusakan yang dialami.
                </div>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <div class="feature-title">Hasil & Solusi</div>
                <div class="feature-text">
                    Sistem akan menghasilkan analisis berupa kemungkinan penyebab kerusakan beserta rekomendasi solusi atau langkah perbaikan.
                </div>
            </div>
        </div>

        <div class="cta-section">
            <a href="diagnosa.php" class="btn-start">Mulai Diagnosa Sekarang</a>
        </div>

        <div class="footer">
            <p>&copy; 2025 Sistem Pakar Komputer. Dikembangkan dengan ❤️ untuk membantu troubleshooting komputer Anda.</p>
        </div>
    </div>
</body>
</html>