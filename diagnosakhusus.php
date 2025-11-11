<?php
// TAHAP 1: Inisialisasi
// Selalu sertakan koneksi.php di paling atas
// Ini otomatis memulai session (session_start()) dan $conn
include 'koneksi.php';

// =================================================================
// TAHAP 2: MESIN INFERENSI (INFERENCE ENGINE) BACKWARD CHAINING
// =================================================================
// Ini adalah "otak" dari sistem.
// Kita buatkan fungsi agar rapi.

function cariPertanyaanBerikutnya($conn) {
    // Jika tidak ada hipotesis, berarti sesi belum dimulai
    if (!isset($_SESSION['daftar_hipotesis']) || empty($_SESSION['daftar_hipotesis'])) {
        return ['status' => 'gagal', 'log' => 'Sesi tidak punya hipotesis.'];
    }

    // Ambil hipotesis (konklusi) yang sedang diuji
    // Cek apakah hipotesis saat ini masih ada di dalam daftar
    if (!isset($_SESSION['daftar_hipotesis'][$_SESSION['hipotesis_sekarang']])) {
        // Jika tidak ada lagi hipotesis untuk diuji, berarti GAGAL
        return ['status' => 'gagal', 'log' => 'Semua hipotesis telah diuji dan gagal.'];
    }
    
    $kode_hipotesis = $_SESSION['daftar_hipotesis'][$_SESSION['hipotesis_sekarang']];

    // Ambil SEMUA aturan (gejala) yang dibutuhkan untuk membuktikan hipotesis ini
    $sql = "SELECT kode_gejala FROM tbl_aturan WHERE kode_konklusi = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $kode_hipotesis);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $gejala_dibutuhkan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $gejala_dibutuhkan[] = $row['kode_gejala'];
    }

    if (empty($gejala_dibutuhkan)) {
        // Hipotesis ini tidak punya aturan? Aneh. Lompati.
        $_SESSION['hipotesis_sekarang']++;
        return cariPertanyaanBerikutnya($conn); // Rekursif
    }

    // Loop semua gejala yang dibutuhkan
    foreach ($gejala_dibutuhkan as $kode_gejala) {
        
        // 1. Cek apakah gejala ini SUDAH DITANYAKAN?
        if (!isset($_SESSION['jawaban_user'][$kode_gejala])) {
            // 1a. BELUM DITANYAKAN!
            // Inilah pertanyaan yang harus kita ajukan ke user.
            
            // Ambil detail pertanyaan dari tbl_gejala
            $sql_gejala = "SELECT pertanyaan, deskripsi FROM tbl_gejala WHERE kode_gejala = ?";
            $stmt_gejala = mysqli_prepare($conn, $sql_gejala);
            mysqli_stmt_bind_param($stmt_gejala, "s", $kode_gejala);
            mysqli_stmt_execute($stmt_gejala);
            $data_gejala = mysqli_stmt_get_result($stmt_gejala)->fetch_assoc();

            return [
                'status' => 'bertanya',
                'kode_gejala' => $kode_gejala,
                'pertanyaan' => $data_gejala['pertanyaan'],
                'deskripsi' => $data_gejala['deskripsi']
            ];
        }

        // 2. SUDAH DITANYAKAN. Cek jawabannya.
        // Aturan 'BUKAN' (negatif) kita tangani di sini.
        // Ini adalah "hack" karena database kita tidak menyimpan 'nilai_diharapkan'.
        $jawaban_diharapkan = 'ya'; // Default-nya, kita cari jawaban 'ya'
        
        if ($kode_hipotesis == 'K02' && $kode_gejala == 'G03') $jawaban_diharapkan = 'tidak';
        if ($kode_hipotesis == 'K05' && $kode_gejala == 'G07') $jawaban_diharapkan = 'tidak';
        if ($kode_hipotesis == 'K09' && $kode_gejala == 'G13') $jawaban_diharapkan = 'tidak';
        
        // 3. Cek apakah jawaban user TIDAK SESUAI dengan yang diharapkan?
        if ($_SESSION['jawaban_user'][$kode_gejala] != $jawaban_diharapkan) {
            // 3a. Jawaban user salah.
            // Hipotesis ini GAGAL (disproven).
            // Hentikan pengecekan hipotesis ini, lanjut ke hipotesis berikutnya.
            $_SESSION['hipotesis_sekarang']++;
            return cariPertanyaanBerikutnya($conn); // Rekursif
        }
        
        // 3b. Jawaban user sesuai. Lanjut cek gejala berikutnya di loop.
    }

    // 4. Jika kita sampai di sini (keluar dari loop foreach)...
    // ...itu berarti SEMUA gejala yang dibutuhkan telah TERPENUHI!
    // Hipotesis ini TERBUKTI!
    return ['status' => 'berhasil', 'kode_konklusi' => $kode_hipotesis];
}


// =================================================================
// TAHAP 3: PENGELOLA STATUS (STATE MANAGER)
// =================================================================

// Cek apakah ini sesi diagnosa BARU (kiriman dari diagnosa.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['masalah_dipilih'])) {
    
    // Ini adalah diagnosa baru.
    // 1. Ambil kategori yang dipilih
    $kategori_dipilih = $_POST['masalah_dipilih']; // Ini adalah array [1, 4, 5]
    
    // 2. Ubah array PHP menjadi string '1,4,5' untuk query SQL
    $placeholders = implode(',', array_fill(0, count($kategori_dipilih), '?'));
    $types = str_repeat('i', count($kategori_dipilih));
    
    // 3. Ambil semua hipotesis (konklusi) yang relevan
    $sql = "SELECT DISTINCT kode_konklusi FROM tbl_konklusi WHERE id_kategori IN ($placeholders)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$kategori_dipilih);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $hipotesis = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $hipotesis[] = $row['kode_konklusi'];
    }

    // 4. Simpan progres ke SESSION
    $_SESSION['daftar_hipotesis'] = $hipotesis; // Daftar Kxx yang akan diuji
    $_SESSION['jawaban_user'] = []; // Reset daftar fakta (jawaban)
    $_SESSION['hipotesis_sekarang'] = 0; // Mulai dari hipotesis pertama

} 
// Cek apakah ini jawaban dari pertanyaan (kiriman dari halaman ini sendiri)
else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jawaban'])) {
    
    // User baru saja menjawab pertanyaan.
    // 1. Simpan jawaban (fakta baru) ke SESSION
    $kode_gejala_dijawab = $_POST['kode_gejala'];
    $jawaban_user = $_POST['jawaban']; // 'ya' atau 'tidak'
    $_SESSION['jawaban_user'][$kode_gejala_dijawab] = $jawaban_user;

}
// Cek apakah user 'nyasar' ke halaman ini
else if (!isset($_SESSION['daftar_hipotesis'])) {
    
    // User belum memilih kategori tapi langsung ke halaman ini.
    // Tendang balik ke halaman diagnosa.
    header('Location: diagnosa.php');
    exit;
}

// =================================================================
// TAHAP 4: TENTUKAN TINDAKAN
// =================================================================

// Panggil "otak"nya untuk menentukan apa yang harus dilakukan
$tindakan = cariPertanyaanBerikutnya($conn);

// Periksa hasilnya:
if ($tindakan['status'] == 'berhasil') {
    // SUKSES! Kita menemukan konklusi.
    // 1. Simpan hasilnya di session
    $_SESSION['hasil_konklusi'] = $tindakan['kode_konklusi'];
    
    // 2. Arahkan ke halaman hasil
    header('Location: hasildiagnosa.php');
    exit; // Pastikan script berhenti setelah redirect

} else if ($tindakan['status'] == 'gagal') {
    // GAGAL! Semua hipotesis diuji, tidak ada yang cocok.
    // 1. Set hasil sebagai 'TIDAK_DIKETAHUI'
    $_SESSION['hasil_konklusi'] = 'TIDAK_DIKETAHUI';
    
    // 2. Arahkan ke halaman hasil
    header('Location: hasildiagnosa.php');
    exit; // Pastikan script berhenti setelah redirect

} else {
    // STATUS = 'bertanya'
    // Kita perlu menampilkan pertanyaan ke user.
    // Variabel $tindakan berisi semua yang kita butuhkan
    $kode_gejala_tampil = $tindakan['kode_gejala'];
    $pertanyaan_tampil = $tindakan['pertanyaan'];
    $deskripsi_tampil = $tindakan['deskripsi'] ?? 'Jawab ya atau tidak untuk membantu kami menganalisis masalah.';
    
    // Hitung progres bar
    $total_hipotesis = count($_SESSION['daftar_hipotesis']);
    $hipotesis_selesai = $_SESSION['hipotesis_sekarang'];
    $progress_percent = ($total_hipotesis > 0) ? (($hipotesis_selesai / $total_hipotesis) * 100) : 0;
    $progress_text = ($total_hipotesis > 0) ? ($hipotesis_selesai . ' / ' . $total_hipotesis . ' Hipotesis Teruji') : 'Mencari pertanyaan...';
}

// Data SVG untuk ilustrasi (bisa Anda pindah ke DB nanti)
$ilustrasi_svg = '<svg viewBox="0 0 400 300" id="illustrationSvg"><rect x="50" y="80" width="300" height="180" rx="15" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="65" y="95" width="270" height="135" fill="#4FD1C5"/><path d="M120 40 Q125 25 130 40 T140 40" stroke="#F56565" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M160 35 Q165 20 170 35 T180 35" stroke="#FC8181" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 40 Q205 25 210 40 T220 40" stroke="#F56565" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M240 35 Q245 20 250 35 T260 35" stroke="#FC8181" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 130 L180 145 L180 180 Q180 195 200 205 Q220 195 220 180 L220 145 Z" fill="#48BB78" stroke="#2F855A" stroke-width="3"/><circle cx="200" cy="170" r="15" fill="#E53E3E"/><path d="M195 170 L198 175 L207 163" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/><circle cx="320" cy="100" r="20" fill="#F687B3" opacity="0.5"/><circle cx="80" cy="120" r="15" fill="#9DECF9" opacity="0.6"/><circle cx="340" cy="200" r="18" fill="#D6BCFA" opacity="0.5"/></svg>';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa Masalah Khusus - Sistem Pakar Komputer</title>
    
    <link rel="stylesheet" href="css/style-diagnosakhusus.css">
    
</head>
<body>
    <div class="container">
        
        <div class="progress-bar">
            <div class="progress-fill" id="progressFill" style="width: <?php echo $progress_percent; ?>%;">
                <span class="progress-text" id="progressText"><?php echo $progress_text; ?></span>
            </div>
        </div>

        <form action="diagnosakhusus.php" method="POST">
            <div class="question-card" id="questionCard">
                <div class="question-header">
                    <div class="question-illustration">
                        <?php echo $ilustrasi_svg; // Tampilkan SVG (Anda bisa buat ini dinamis) ?>
                    </div>
                    <div class="question-content">
                        <input type="hidden" name="kode_gejala" value="<?php echo htmlspecialchars($kode_gejala_tampil); ?>">
                        
                        <div class="question-number" id="questionNumber">Pertanyaan Gejala</div>
                        <h2 class="question-text" id="questionText">
                            <?php echo htmlspecialchars($pertanyaan_tampil); ?>
                        </h2>
                        <p class="question-description" id="questionDesc">
                            <?php echo htmlspecialchars($deskripsi_tampil); ?>
                        </p>
                    </div>
                </div>

                <div class="answer-buttons">
                    <button type="submit" name="jawaban" value="ya" class="btn-answer btn-yes">
                        <span style="position: relative; z-index: 1;">Ya</span>
                    </button>
                    <button type="submit" name="jawaban" value="tidak" class="btn-answer btn-no">
                        <span style="position: relative; z-index: 1;">Tidak</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="navigation-buttons">
            <a href="diagnosa.php" class="btn-nav">
                ← Batalkan & Ulangi dari Awal
            </a>
        </div>
    </div>

    </body>
</html>