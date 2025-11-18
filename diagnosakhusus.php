<?php
// diagnosakhusus.php (fixed & robust)
// Backward-chaining -> ask-all-gejala-before-evaluate variant
// Includes:
//  - safe dynamic parameter binding helper
//  - query fixes for DISTINCT/ORDER BY issues
//  - safety checks to avoid immediate evaluation when daftar_gejala kosong

include 'koneksi.php'; // koneksi.php sudah memanggil session_start()

// Ambang minimal score agar hipotesis dianggap match (boleh disesuaikan)
define('MATCH_THRESHOLD', 0.65); // 65%

/**
 * Helper: safe dynamic bind_param using call_user_func_array
 * $stmt : mysqli_stmt
 * $types : string like 'ssi'
 * $params: array of values (not references)
 */
function safe_bind_and_execute(mysqli $conn, string $sql, string $types = '', array $params = []) {
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        throw new Exception("Prepare failed: " . mysqli_error($conn));
    }

    if ($types !== '' && count($params) > 0) {
        // build param refs
        $bind_names = [];
        $bind_names[] = $types;
        for ($i = 0; $i < count($params); $i++) {
            // need reference
            $bind_names[] = &$params[$i];
        }
        // call bind_param with refs
        if (!call_user_func_array([$stmt, 'bind_param'], $bind_names)) {
            throw new Exception("bind_param failed: " . $stmt->error);
        }
    }

    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Execute failed: " . mysqli_stmt_error($stmt));
    }

    $result = mysqli_stmt_get_result($stmt);
    // Note: for INSERT/UPDATE that don't return result, mysqli_stmt_get_result returns false.
    return ['stmt' => $stmt, 'result' => $result];
}

/**
 * STEP A: handle initial POST of selected categories (from diagnosa.php)
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['masalah_dipilih'])) {

    $kategori_dipilih = $_POST['masalah_dipilih']; // array of id_kategori
    if (!is_array($kategori_dipilih) || count($kategori_dipilih) === 0) {
        header('Location: diagnosa.php');
        exit;
    }

    // Build placeholders and types
    $placeholders = implode(',', array_fill(0, count($kategori_dipilih), '?'));
    $types = str_repeat('i', count($kategori_dipilih));

    // Ambil hipotesis (kode_konklusi) + priority (ambil MIN priority untuk urutan)
    // gunakan GROUP BY supaya ORDER BY menggunakan agregat yang konsisten
    $sql = "SELECT kode_konklusi, MIN(priority) AS pr
            FROM tbl_konklusi
            WHERE id_kategori IN ($placeholders)
            GROUP BY kode_konklusi
            ORDER BY pr ASC, kode_konklusi ASC";

    try {
        $res = safe_bind_and_execute($conn, $sql, $types, $kategori_dipilih)['result'];
    } catch (Exception $e) {
        // fallback: redirect dengan pesan error (bisa diganti log)
        die("Query Error (hipotesis): " . $e->getMessage());
    }

    $hipotesis = [];
    if ($res) {
        while ($r = mysqli_fetch_assoc($res)) {
            $hipotesis[] = $r['kode_konklusi'];
        }
    }

    if (empty($hipotesis)) {
        // No hypotheses found for selected categories
        $_SESSION['hasil_konklusi'] = 'TIDAK_DIKETAHUI';
        header('Location: hasildiagnosa.php');
        exit;
    }

    /**
     * Ambil semua gejala yang berkaitan dengan hipotesis tersebut (unique),
     * tapi kita butuh juga bobot agar bisa urut. Karena kita ingin DISTINCT
     * namun juga ORDER BY bobot, gunakan agregasi: MAX(a.bobot) per gejala.
     */
    $place = implode(',', array_fill(0, count($hipotesis), '?'));
    $types2 = str_repeat('s', count($hipotesis));

    $sql2 = "SELECT a.kode_gejala,
                    g.pertanyaan,
                    g.deskripsi,
                    g.level_gejala,
                    MAX(a.bobot) AS max_bobot
             FROM tbl_aturan a
             JOIN tbl_gejala g ON a.kode_gejala = g.kode_gejala
             WHERE a.kode_konklusi IN ($place)
             GROUP BY a.kode_gejala, g.pertanyaan, g.deskripsi, g.level_gejala
             ORDER BY g.level_gejala ASC, max_bobot DESC, a.kode_gejala ASC";

    try {
        $res2 = safe_bind_and_execute($conn, $sql2, $types2, $hipotesis)['result'];
    } catch (Exception $e) {
        die("Query Error (daftar gejala): " . $e->getMessage());
    }

    $daftar_gejala = [];
    if ($res2) {
        while ($r2 = mysqli_fetch_assoc($res2)) {
            $daftar_gejala[$r2['kode_gejala']] = [
                'kode' => $r2['kode_gejala'],
                'pertanyaan' => $r2['pertanyaan'],
                'deskripsi' => $r2['deskripsi'],
                'level' => $r2['level_gejala'],
                'max_bobot' => floatval($r2['max_bobot'])
            ];
        }
    }

    if (empty($daftar_gejala)) {
        // Weird: hipotesis tapi tanpa aturan -> fallback
        $_SESSION['hasil_konklusi'] = 'TIDAK_DIKETAHUI';
        header('Location: hasildiagnosa.php');
        exit;
    }

    // Simpan ke SESSION
    $_SESSION['daftar_hipotesis'] = $hipotesis;               // untuk evaluasi nanti
    $_SESSION['daftar_gejala'] = array_values($daftar_gejala); // indexed list (preserve order)
    $_SESSION['jawaban_user'] = [];                           // reset jawaban
    $_SESSION['gejala_sekarang'] = 0;                         // pointer ke daftar_gejala

    // redirect ke halaman ini (GET) supaya user lihat pertanyaan pertama tanpa re-posting form
    header('Location: diagnosakhusus.php');
    exit;
}

/**
 * Handle jawaban user (POST ketika user menjawab satu pertanyaan)
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jawaban']) && isset($_POST['kode_gejala'])) {
    $kode = $_POST['kode_gejala'];
    $jawab = $_POST['jawaban']; // 'ya' atau 'tidak'
    // Simpan jawaban
    if (!isset($_SESSION['jawaban_user'])) $_SESSION['jawaban_user'] = [];
    $_SESSION['jawaban_user'][$kode] = $jawab;
    // Naikkan pointer
    if (!isset($_SESSION['gejala_sekarang'])) $_SESSION['gejala_sekarang'] = 0;
    $_SESSION['gejala_sekarang']++;
    // Redirect GET untuk mencegah resubmit
    header('Location: diagnosakhusus.php');
    exit;
}

/**
 * Jika user nyasar ke halaman ini tanpa inisialisasi -> redirect
 */
if (!isset($_SESSION['daftar_gejala']) || !isset($_SESSION['daftar_hipotesis'])) {
    header('Location: diagnosa.php');
    exit;
}

/**
 * Evaluasi ketika semua gejala sudah dijawab
 */
$total_gejala = count($_SESSION['daftar_gejala']);
$pointer = intval($_SESSION['gejala_sekarang'] ?? 0);

// Safety: jika total_gejala == 0 (shouldn't happen), jangan evaluasi -> kembali ke diagnosa
if ($total_gejala === 0) {
    // Reset dan kembalikan ke diagnosa
    unset($_SESSION['daftar_gejala'], $_SESSION['daftar_hipotesis'], $_SESSION['jawaban_user']);
    header('Location: diagnosa.php');
    exit;
}

if ($pointer >= $total_gejala) {
    // Semua jawaban terkumpul, lakukan evaluasi
    $jawaban_user = $_SESSION['jawaban_user'] ?? []; // format: ['G01'=>'ya', ...]

    // Ambil aturan lengkap untuk semua hipotesis yang kita miliki (nilai_diharapkan, bobot)
    $hipotesis_list = $_SESSION['daftar_hipotesis'];
    $placeH = implode(',', array_fill(0, count($hipotesis_list), '?'));
    $typesH = str_repeat('s', count($hipotesis_list));
    $sqlRules = "SELECT kode_konklusi, kode_gejala, nilai_diharapkan, bobot FROM tbl_aturan WHERE kode_konklusi IN ($placeH)";

    try {
        $resRules = safe_bind_and_execute($conn, $sqlRules, $typesH, $hipotesis_list)['result'];
    } catch (Exception $e) {
        die("Query Error (rules): " . $e->getMessage());
    }

    $rules_by_konklusi = [];
    if ($resRules) {
        while ($r = mysqli_fetch_assoc($resRules)) {
            $rules_by_konklusi[$r['kode_konklusi']][] = [
                'kode_gejala' => $r['kode_gejala'],
                'nilai_diharapkan' => $r['nilai_diharapkan'],
                'bobot' => floatval($r['bobot'])
            ];
        }
    }

    // Hitung score tiap konklusi
    $results = []; // kode_konklusi => ['score'=>..., 'matched'=>..., 'total_weight'=>...]
    foreach ($rules_by_konklusi as $k => $rules) {
        $total_weight = 0.0;
        $matched_weight = 0.0;
        foreach ($rules as $rule) {
            $total_weight += $rule['bobot'];
            $user_answer = $jawaban_user[$rule['kode_gejala']] ?? null; // better to allow null
            if ($user_answer !== null && $user_answer === $rule['nilai_diharapkan']) {
                $matched_weight += $rule['bobot'];
            }
            // if user didn't answer a gejala, we neither penalize nor match it (neutral)
        }
        $score = ($total_weight > 0) ? ($matched_weight / $total_weight) : 0.0;
        $results[$k] = [
            'score' => $score,
            'matched_weight' => $matched_weight,
            'total_weight' => $total_weight
        ];
    }

    // Pilih hipotesis terbaik di atas threshold
    uasort($results, function($a, $b){
        if ($a['score'] == $b['score']) return 0;
        return ($a['score'] > $b['score']) ? -1 : 1;
    });

    $best = null;
    foreach ($results as $kode_konklusi => $info) {
        if ($info['score'] >= MATCH_THRESHOLD) {
            $best = $kode_konklusi;
            break;
        }
    }

    if ($best === null) {
        $_SESSION['hasil_konklusi'] = 'TIDAK_DIKETAHUI';
    } else {
        $_SESSION['hasil_konklusi'] = $best;
    }

    // Simpan ringkasan hasil (opsional) untuk debug / tampilan
    $_SESSION['diagnosa_summary'] = $results;

    // Redirect ke halaman hasil
    header('Location: hasildiagnosa.php');
    exit;
}

/**
 * Jika belum selesai: tampilkan pertanyaan saat ini
 */
$daftar_gejala = $_SESSION['daftar_gejala'];
$pointer = intval($_SESSION['gejala_sekarang'] ?? 0);

// Safety: pastikan pointer valid
if (!isset($daftar_gejala[$pointer])) {
    // pointer out-of-range, reset ke 0
    $_SESSION['gejala_sekarang'] = 0;
    $pointer = 0;
}

$current = $daftar_gejala[$pointer];
$kode_gejala_tampil = $current['kode'] ?? '';
$pertanyaan_tampil = $current['pertanyaan'] ?? 'Pertanyaan tidak tersedia';
$deskripsi_tampil = $current['deskripsi'] ?? 'Jawab ya atau tidak untuk membantu kami menganalisis masalah.';

// Progress bar
$progress_percent = ($total_gejala > 0) ? ( ($pointer / $total_gejala) * 100 ) : 0;
$progress_text = $pointer . ' / ' . $total_gejala . ' Pertanyaan Dijawab';

// (SVG ilustrasi same as before)
$ilustrasi_svg = '<svg viewBox="0 0 400 300" id="illustrationSvg"><rect x="50" y="80" width="300" height="180" rx="15" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="65" y="95" width="270" height="135" fill="#4FD1C5"/><path d="M120 40 Q125 25 130 40 T140 40" stroke="#F56565" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M160 35 Q165 20 170 35 T180 35" stroke="#FC8181" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 40 Q205 25 210 40 T220 40" stroke="#F56565" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M240 35 Q245 20 250 35 T260 35" stroke="#FC8181" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 130 L180 145 L180 180 Q180 195 200 205 Q220 195 220 180 L220 145 Z" fill="#48BB78" stroke="#2F855A" stroke-width="3"/><circle cx="200" cy="170" r="15" fill="#E53E3E"/><path d="M195 170 L198 175 L207 163" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/><circle cx="320" cy="100" r="20" fill="#F687B3" opacity="0.5"/><circle cx="80" cy="120" r="15" fill="#9DECF9" opacity="0.6"/><circle cx="340" cy="200" r="18" fill="#D6BCFA" opacity="0.5"/></svg>';

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Diagnosa Masalah Khusus - Sistem Pakar</title>
<link rel="stylesheet" href="css/style-diagnosakhusus.css">
</head>
<body>
<div class="container">
    <div class="progress-bar">
        <div class="progress-fill" style="width: <?php echo round($progress_percent,2); ?>%;">
            <span class="progress-text"><?php echo htmlspecialchars($progress_text); ?></span>
        </div>
    </div>

    <form action="diagnosakhusus.php" method="POST">
        <div class="question-card">
            <div class="question-header">
                <div class="question-illustration"><?php echo $ilustrasi_svg; ?></div>
                <div class="question-content">
                    <input type="hidden" name="kode_gejala" value="<?php echo htmlspecialchars($kode_gejala_tampil); ?>">
                    <h2><?php echo htmlspecialchars($pertanyaan_tampil); ?></h2>
                    <p><?php echo htmlspecialchars($deskripsi_tampil); ?></p>
                </div>
            </div>

            <div class="answer-buttons">
                <button type="submit" name="jawaban" value="ya" class="btn-answer btn-yes">Ya</button>
                <button type="submit" name="jawaban" value="tidak" class="btn-answer btn-no">Tidak</button>
            </div>
                
            <div class="navigation-buttons" style="margin-top: 20px;">
            <button type="submit" name="jawaban" value="skip" class="btn-nav">Lewati Pertanyaan →</button>
            
            </div>
        </div>
    </form>

    <div class="navigation-buttons">
        <a href="diagnosa.php" class="btn-nav">← Batalkan & Ulangi dari Awal</a>
    </div>


</div>
</body>
</html>
