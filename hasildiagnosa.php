<?php
// TAHAP 1: Inisialisasi
include 'koneksi.php'; // Otomatis session_start() dan $conn

// TAHAP 2: Ambil Hasil Konklusi dari Sesi
$kode_hasil = $_SESSION['hasil_konklusi'] ?? 'TIDAK_DIKETAHUI';

// Siapkan array untuk menampung data yang akan ditampilkan
$data_hasil = [];
$gejala_positif_list = [];

if ($kode_hasil == 'TIDAK_DIKETAHUI') {
    // TAHAP 3A: Siapkan data jika TIDAK DITEMUKAN
    $data_hasil = [
        'nama_kerusakan' => 'Diagnosis Tidak Dapat Ditemukan',
        'kategori_nama' => 'Tidak Diketahui',
        'analisis' => 'Maaf, berdasarkan kombinasi jawaban yang Anda berikan, sistem tidak dapat menemukan diagnosis yang pasti.',
        'solusi_aman_diy' => '<strong>Opsi 1:</strong> Silakan coba ulangi diagnosa dari awal.<br><strong>Opsi 2:</strong> Pastikan Anda menjawab pertanyaan sesuai dengan gejala yang paling Anda rasakan.',
        'catatan_teknisi' => 'Tidak ada rekomendasi servis spesifik karena diagnosis gagal. Disarankan untuk membawa laptop ke teknisi untuk pemeriksaan manual.'
    ];
} else {
    // TAHAP 3B: Ambil data LENGKAP dari Database
    // Kita JOIN tbl_konklusi dengan tbl_kategori untuk dapat nama kategorinya
    $sql = "SELECT K.*, T.nama_kategori 
            FROM tbl_konklusi K
            JOIN tbl_kategori T ON K.id_kategori = T.id_kategori
            WHERE K.kode_konklusi = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $kode_hasil);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data_hasil = [
            'nama_kerusakan' => $row['nama_kerusakan'],
            'kategori_nama' => $row['nama_kategori'],
            'analisis' => $row['analisis'],
            'solusi_aman_diy' => $row['solusi_aman_diy'],
            'catatan_teknisi' => $row['catatan_teknisi']
        ];
    }
    
    // Ambil juga daftar gejala yang dijawab 'ya' untuk ditampilkan
    if (isset($_SESSION['jawaban_user'])) {
        foreach ($_SESSION['jawaban_user'] as $kode_gejala => $jawaban) {
            if ($jawaban == 'ya') {
                $gejala_positif_list[] = $kode_gejala;
            }
        }
    }
}

// TAHAP 4: Hancurkan Sesi
// Penting! Ini akan me-reset diagnosa
// sehingga jika user kembali ke Beranda, mereka bisa mulai dari awal.
session_destroy();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis - Sistem Pakar Komputer</title>
    
    <link rel="stylesheet" href="css/style-hasildiagnosa.css">
    
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hasil Analisis Kerusakan Komputer</h1>
        </div>

        <div class="result-card">
            <h2 class="card-title">Permasalahan yang Dialami</h2>
            <div class="problem-badge">
                <?php echo htmlspecialchars($data_hasil['nama_kerusakan']); ?>
            </div>
            <div class="card-content">
                <p>
                    Berdasarkan gejala yang Anda laporkan (terutama gejala: 
                    <strong><?php echo implode(', ', $gejala_positif_list); ?></strong>), 
                    sistem mendeteksi adanya masalah: <strong><?php echo htmlspecialchars($data_hasil['nama_kerusakan']); ?></strong>.
                </p>
            </div>
        </div>

        <div class="result-card">
            <h2 class="card-title">Analisis Kerusakan</h2>
            <div class="card-content">
                <p><?php echo htmlspecialchars($data_hasil['analisis']); ?></p>
                
                <div class="divider"></div>
                
                <div class="info-box">
                    <div class="info-box-title">💡 Penyebab Umum (Kategori Masalah):</div>
                    <div class="info-box-content">
                        • <?php echo htmlspecialchars($data_hasil['kategori_nama']); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="result-card">
            <h2 class="card-title">Saran Perbaikan</h2>
            <div class="card-content">
                
                <div class="info-box">  
                    <div class="info-box-title">🔧 Solusi DIY (Do It Yourself):</div>
                    <div class="info-box-content">
                        <?php 
                            // nl2br() akan mengubah line break (\n) menjadi tag <br>
                            echo nl2br($data_hasil['solusi_aman_diy']); 
                        ?>
                    </div>
                </div>

                <div class="warning-box">
                    <div class="warning-box-title">⚠️ Peringatan:</div>
                    <div class="warning-box-content">
                        Jika Anda tidak berpengalaman membongkar laptop, disarankan untuk membawa ke teknisi profesional. Pembongkaran yang salah dapat merusak komponen internal laptop.
                    </div>
                </div>

                <div class="divider"></div>

                <div class="info-box">
                    <div class="info-box-title">🏪 Rekomendasi Servis (Catatan untuk Teknisi):</div>
                    <div class="info-box-content">
                        <?php 
                            echo nl2br($data_hasil['catatan_teknisi']); 
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="index.php" class="btn btn-secondary">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali ke Beranda
            </a>
            <button onclick="window.print()" class="btn btn-primary">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>
                    <path d="M6 14h12v8H6z"/>
                </svg>
                Print Hasil Analisis
            </button>
        </div>
    </div>

    </body>
</html>