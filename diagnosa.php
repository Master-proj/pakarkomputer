<?php
// Tahap 1: Sertakan file koneksi.php
// Ini akan otomatis memulai session dan terhubung ke database
include 'koneksi.php';

// Tahap 2: Ambil semua data kategori dari database
// Kita urutkan berdasarkan nama_kategori
$query = "SELECT id_kategori, id_string, nama_kategori, deskripsi FROM tbl_kategori ORDER BY nama_kategori ASC";
$result = mysqli_query($conn, $query);

// Tahap 3: Siapkan data Ikon (SVG)
// Karena SVG adalah bagian dari UI, kita simpan di sini
// Kita gunakan 'id_string' dari DB untuk mencocokkan
$kategori_icons = [
    'baterai' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="140" y="100" width="80" height="120" rx="8" fill="#4FD1C5" stroke="#2C7A7B" stroke-width="3"/><rect x="170" y="85" width="20" height="15" rx="3" fill="#4FD1C5" stroke="#2C7A7B" stroke-width="2"/><path d="M160 130 L200 130 M160 150 L200 150" stroke="#2C7A7B" stroke-width="4" stroke-linecap="round"/><circle cx="180" cy="175" r="18" fill="#F6AD55" opacity="0.3"/><path d="M180 160 L180 190 M165 175 L195 175" stroke="#E53E3E" stroke-width="4" stroke-linecap="round"/><rect x="60" y="120" width="90" height="60" rx="5" fill="#667eea" stroke="#2C3E50" stroke-width="3"/><rect x="65" y="125" width="80" height="45" fill="#A0AEC0"/><path d="M100 145 Q105 155 100 165" stroke="#48BB78" stroke-width="3" fill="none"/><circle cx="250" cy="80" r="15" fill="#D6BCFA" opacity="0.6"/><circle cx="280" cy="120" r="20" fill="#F687B3" opacity="0.5"/><circle cx="90" cy="80" r="12" fill="#9DECF9" opacity="0.6"/></svg>',
    'layar' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="80" y="60" width="240" height="160" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="90" y="70" width="220" height="130" fill="#4FD1C5"/><circle cx="200" cy="130" r="40" fill="none" stroke="#2C3E50" stroke-width="4"/><line x1="230" y1="160" x2="260" y2="190" stroke="#2C3E50" stroke-width="4" stroke-linecap="round"/><rect x="110" y="90" width="60" height="8" fill="#F56565" opacity="0.7"/><rect x="180" y="110" width="80" height="8" fill="#48BB78" opacity="0.7"/><rect x="130" y="140" width="50" height="8" fill="#ED64A6" opacity="0.7"/><circle cx="300" cy="100" r="18" fill="#9DECF9" opacity="0.5"/><circle cx="270" cy="60" r="12" fill="#F687B3" opacity="0.6"/><circle cx="120" cy="50" r="15" fill="#D6BCFA" opacity="0.5"/></svg>',
    'keyboard' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="70" y="80" width="260" height="140" rx="12" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="80" y="90" width="240" height="100" fill="#4FD1C5"/><rect x="100" y="110" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="125" y="110" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="150" y="110" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="175" y="110" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="100" y="135" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="125" y="135" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="150" y="135" width="18" height="18" rx="3" fill="#2C3E50"/><rect x="175" y="135" width="18" height="18" rx="3" fill="#2C3E50"/><ellipse cx="280" cy="150" rx="25" ry="30" fill="#FBBF24" opacity="0.8"/><path d="M280 140 L280 165" stroke="#F59E0B" stroke-width="3" stroke-linecap="round"/><circle cx="320" cy="100" r="15" fill="#F687B3" opacity="0.5"/><circle cx="290" cy="60" r="18" fill="#9DECF9" opacity="0.6"/><circle cx="90" cy="60" r="12" fill="#D6BCFA" opacity="0.5"/></svg>',
    'panas' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/><path d="M120 80 Q125 65 130 80 T140 80" stroke="#F56565" stroke-width="4" fill="none" stroke-linecap="round"/><path d="M160 70 Q165 55 170 70 T180 70" stroke="#FC8181" stroke-width="4" fill="none" stroke-linecap="round"/><path d="M200 75 Q205 60 210 75 T220 75" stroke="#F56565" stroke-width="4" fill="none" stroke-linecap="round"/><path d="M240 80 Q245 65 250 80 T260 80" stroke="#FC8181" stroke-width="4" fill="none" stroke-linecap="round"/><rect x="300" y="100" width="20" height="80" rx="10" fill="#FEB2B2" stroke="#C53030" stroke-width="3"/><circle cx="310" cy="190" r="15" fill="#F56565" stroke="#C53030" stroke-width="3"/><rect x="305" y="120" width="10" height="60" fill="#E53E3E"/><circle cx="190" cy="165" r="30" fill="none" stroke="#2C3E50" stroke-width="3"/><path d="M190 145 L190 185 M170 165 L210 165" stroke="#2C3E50" stroke-width="3"/><circle cx="330" cy="80" r="12" fill="#FED7D7" opacity="0.6"/><circle cx="70" cy="100" r="15" fill="#F687B3" opacity="0.5"/></svg>',
    'jaringan' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/><path d="M200 90 Q180 70 160 90" stroke="#48BB78" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 90 Q215 75 230 90" stroke="#48BB78" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 100 Q185 85 170 100" stroke="#68D391" stroke-width="5" fill="none" stroke-linecap="round"/><path d="M200 100 Q210 90 220 100" stroke="#68D391" stroke-width="5" fill="none" stroke-linecap="round"/><line x1="175" y1="65" x2="215" y2="105" stroke="#F56565" stroke-width="6" stroke-linecap="round"/><line x1="215" y1="65" x2="175" y2="105" stroke="#F56565" stroke-width="6" stroke-linecap="round"/><path d="M280 150 L280 180 L300 165 L280 150 L280 180 L300 195 L280 180" stroke="#4299E1" stroke-width="4" fill="none" stroke-linejoin="round"/><circle cx="320" cy="100" r="15" fill="#9DECF9" opacity="0.6"/><circle cx="60" cy="140" r="12" fill="#D6BCFA" opacity="0.5"/></svg>',
    'kinerja' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/><polyline points="110,180 130,170 150,160 170,155 190,150" stroke="#48BB78" stroke-width="4" fill="none" stroke-linecap="round"/><path d="M250 90 L280 60 L310 90" stroke="#38B2AC" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round"/><line x1="280" y1="60" x2="280" y2="130" stroke="#38B2AC" stroke-width="6" stroke-linecap="round"/><circle cx="200" cy="165" r="8" fill="#805AD5" opacity="0.6"/><circle cx="220" cy="165" r="8" fill="#805AD5" opacity="0.4"/><circle cx="240" cy="165" r="8" fill="#805AD5" opacity="0.2"/><circle cx="320" cy="110" r="12" fill="#F687B3" opacity="0.5"/><circle cx="70" cy="100" r="15" fill="#9DECF9" opacity="0.6"/><circle cx="300" cy="180" r="10" fill="#D6BCFA" opacity="0.5"/></svg>',
    'virus' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/><rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/><ellipse cx="200" cy="165" rx="35" ry="30" fill="#F56565" opacity="0.3"/><circle cx="200" cy="165" r="25" fill="#E53E3E"/><circle cx="193" cy="160" r="5" fill="#2D3748"/><circle cx="207" cy="160" r="5" fill="#2D3748"/><path d="M195 172 Q200 177 205 172" stroke="#2D3748" stroke-width="2" fill="none"/><line x1="175" y1="155" x2="160" y2="145" stroke="#C53030" stroke-width="3"/><line x1="175" y1="165" x2="160" y2="165" stroke="#C53030" stroke-width="3"/><line x1="175" y1="175" x2="160" y2="185" stroke="#C53030" stroke-width="3"/><line x1="225" y1="155" x2="240" y2="145" stroke="#C53030" stroke-width="3"/><line x1="225" y1="165" x2="240" y2="165" stroke="#C53030" stroke-width="3"/><line x1="225" y1="175" x2="240" y2="185" stroke="#C53030" stroke-width="3"/><path d="M280 80 L280 110 Q280 120 270 125 L260 130 L270 125 Q280 120 280 110 Z" fill="#48BB78" opacity="0.3"/><path d="M280 80 L290 85 L300 80 L300 105 Q300 115 290 120 L280 125 L280 80" fill="#48BB78" stroke="#2F855A" stroke-width="2"/><line x1="285" y1="95" x2="295" y2="110" stroke="#E53E3E" stroke-width="3" stroke-linecap="round"/><line x1="295" y1="95" x2="285" y2="110" stroke="#E53E3E" stroke-width="3" stroke-linecap="round"/><circle cx="320" cy="140" r="12" fill="#FED7D7" opacity="0.6"/><circle cx="70" cy="100" r="15" fill="#F687B3" opacity="0.5"/></svg>',
    'default' => '<svg viewBox="0 0 400 300" style="width: 100%; height: 100%;"><rect x="80" y="60" width="240" height="160" rx="8" fill="#A0AEC0" stroke="#2D3748" stroke-width="4"/><circle cx="200" cy="130" r="40" fill="none" stroke="#2D3748" stroke-width="4"/><path d="M190 110 L190 135 M210 110 L210 135 M190 150 L210 150" stroke="#2D3748" stroke-width="4" stroke-linecap="round"/></svg>' // Ikon default jika 'id_string' tidak cocok
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Masalah Umum - Sistem Pakar Komputer</title>
    
    <link rel="stylesheet" href="css/style-diagnosa.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pilih Masalah Umum</h1>
            <p>Pilih satu atau lebih masalah yang sedang Anda alami pada komputer</p>
        </div>

        <form id="problemForm" action="diagnosakhusus.php" method="POST">
            <div class="problem-grid">
                
                <?php
                // Tahap 5: Loop data dari database untuk membuat kartu
                if (mysqli_num_rows($result) > 0) {
                    // $i untuk animation-delay
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Ambil data dari baris database
                        $id_kategori = $row['id_kategori'];
                        $id_string = $row['id_string'];
                        $nama_kategori = $row['nama_kategori'];
                        $deskripsi = $row['deskripsi'];
                        
                        // Ambil ikon SVG, jika tidak ada pakai 'default'
                        $ikon = $kategori_icons[$id_string] ?? $kategori_icons['default'];
                        
                        // Cetak HTML untuk setiap kartu
                        // Kita gunakan <label> yang terhubung ke <input>
                ?>
                        
                        <label class="problem-card" for="check_<?php echo $id_kategori; ?>" style="animation-delay: <?php echo $i * 0.1; ?>s;">
                            <input 
                                type="checkbox" 
                                name="masalah_dipilih[]" 
                                id="check_<?php echo $id_kategori; ?>" 
                                value="<?php echo $id_kategori; ?>"
                                onclick="toggleCheckbox(this)"
                            >
                            
                            <div class="checkbox-wrapper">
                                <div class="checkbox-custom"></div>
                            </div>
                            <div class="problem-icon">
                                <?php echo $ikon; // Cetak SVG di sini ?>
                            </div>
                            <div class="problem-title">
                                <?php echo htmlspecialchars($nama_kategori); ?>
                            </div>
                            <div class="problem-description">
                                <?php echo htmlspecialchars($deskripsi); ?>
                            </div>
                        </label>
                
                <?php
                        $i++;
                    } // Akhir while loop
                } else {
                    echo "<p style='color: white; text-align: center;'>Gagal memuat kategori dari database.</p>";
                }
                ?>
                
            </div> <div class="action-section">
                <div class="selected-count" id="selectedCount">0 Masalah Dipilih</div>
                <div class="button-group">
                    <button type="button" class="btn btn-secondary" onclick="resetSelection()">Reset Pilihan</button>
                    <button type="submit" class="btn btn-primary" id="btnNext" disabled>Lanjutkan Diagnosa</button>
                </div>
            </div>
        </form> </div>

    <script>
        // Fungsi ini dipanggil oleh checkbox
        function toggleCheckbox(checkbox) {
            const card = checkbox.closest('.problem-card');
            card.classList.toggle('selected', checkbox.checked);
            updateSelectedCount();
        }

        function updateSelectedCount() {
            const count = document.querySelectorAll('input[type="checkbox"]:checked').length;
            document.getElementById('selectedCount').textContent = `${count} Masalah Dipilih`;
            document.getElementById('btnNext').disabled = count === 0;
        }

        function resetSelection() {
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
                checkbox.closest('.problem-card').classList.remove('selected');
            });
            updateSelectedCount();
        }
        
        // Panggil saat halaman dimuat, untuk set tombol 'disabled'
        document.addEventListener('DOMContentLoaded', updateSelectedCount);
    </script>
</body>
</html>