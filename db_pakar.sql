-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Nov 2025 pada 06.07
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `id_aturan` int NOT NULL,
  `kode_konklusi` varchar(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `nilai_diharapkan` enum('ya','tidak') NOT NULL DEFAULT 'ya',
  `bobot` decimal(4,2) NOT NULL DEFAULT '1.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`id_aturan`, `kode_konklusi`, `kode_gejala`, `nilai_diharapkan`, `bobot`) VALUES
(1, 'K01', 'G01', 'ya', 1.00),
(2, 'K01', 'G03', 'ya', 0.80),
(3, 'K02', 'G01', 'ya', 1.00),
(4, 'K02', 'G02', 'ya', 0.90),
(5, 'K02', 'G03', 'tidak', 0.60),
(6, 'K03', 'G04', 'ya', 1.00),
(7, 'K03', 'G02', 'ya', 0.70),
(8, 'K04', 'G06', 'ya', 1.00),
(9, 'K04', 'G07', 'ya', 1.00),
(10, 'K05', 'G06', 'ya', 1.00),
(11, 'K05', 'G07', 'tidak', 0.70),
(12, 'K06', 'G08', 'ya', 1.00),
(13, 'K06', 'G14', 'tidak', 0.60),
(14, 'K07', 'G13', 'ya', 1.00),
(15, 'K07', 'G08', 'ya', 0.80),
(16, 'K10', 'G13', 'ya', 1.00),
(17, 'K10', 'G11', 'ya', 0.70),
(18, 'K11', 'G12', 'ya', 1.00),
(19, 'K11', 'G01', 'ya', 0.70),
(20, 'K08', 'G09', 'ya', 1.00),
(21, 'K08', 'G10', 'ya', 0.90),
(22, 'K08', 'G04', 'tidak', 0.50),
(23, 'K13', 'G15', 'ya', 1.00),
(24, 'K13', 'G17', 'ya', 0.90),
(25, 'K14', 'G16', 'ya', 1.00),
(26, 'K14', 'G15', 'tidak', 0.70),
(27, 'K15', 'G15', 'tidak', 0.70),
(28, 'K15', 'G17', 'ya', 0.80),
(29, 'K16', 'G22', 'ya', 1.00),
(30, 'K17', 'G21', 'ya', 1.00),
(31, 'K16', 'G23', 'tidak', 0.60),
(32, 'K18', 'G20', 'ya', 1.00),
(33, 'K19', 'G25', 'ya', 1.00),
(34, 'K19', 'G26', 'tidak', 0.95),
(35, 'K20', 'G19', 'ya', 1.00),
(36, 'K20', 'G26', 'ya', 0.90),
(37, 'K12', 'G14', 'ya', 1.00),
(38, 'K12', 'G11', 'tidak', 0.50),
(39, 'K21', 'G13', 'ya', 0.90),
(40, 'K21', 'G11', 'ya', 0.70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `deskripsi` text,
  `level_gejala` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `pertanyaan`, `deskripsi`, `level_gejala`) VALUES
('G01', 'Apakah laptop Anda cepat panas?', 'Fokus pada suhu laptop saat digunakan.', 2),
('G02', 'Apakah kipas laptop berbunyi sangat keras (berisik)?', 'Perhatikan suara kipas yang tidak wajar.', 2),
('G03', 'Apakah Anda sedang menjalankan aplikasi berat (game/editing)?', 'Membedakan overheat karena beban vs masalah hardware.', 1),
('G04', 'Apakah kipas laptop tidak berbunyi sama sekali saat menyala?', 'Bisa menandakan kipas mati atau tidak teraliri daya.', 3),
('G05', 'Apakah laptop tiba-tiba mati sendiri saat digunakan?', 'Gejala mati mendadak (bukan shutdown normal).', 2),
('G06', 'Apakah muncul Bluescreen (BSOD)?', 'Layar biru menunjukkan crash OS/driver/hardware.', 2),
('G07', 'Apakah terdengar bunyi beep berulang saat dinyalakan?', 'Beep code dari motherboard saat POST.', 2),
('G08', 'Apakah laptop stuck/terhenti di logo Windows saat boot?', 'Tidak sampai ke desktop atau login.', 2),
('G09', 'Apakah layar menjadi hitam (blackscreen) namun mesin terdengar menyala?', 'Power on tapi layar gelap.', 2),
('G10', 'Apakah layar tampak bergaris, berkedip, atau warnanya aneh (glitch)?', 'Kerusakan visual pada tampilan.', 2),
('G11', 'Apakah laptop terasa lambat sejak awal dinyalakan (startup)?', 'Performa buruk sejak boot.', 1),
('G12', 'Apakah laptop awalnya cepat, namun melambat setelah beberapa menit?', 'Penurunan performa yang berkaitan dengan suhu.', 2),
('G13', 'Apakah lampu HDD/SSD menyala terus (solid)?', 'Tanda disk activity berlebih atau stuck I/O.', 2),
('G14', 'Apakah muncul iklan pop-up aneh atau file terenkripsi?', 'Indikasi adware/malware/ransomware.', 2),
('G15', 'Apakah ikon Wi-Fi atau Bluetooth hilang dari taskbar?', 'Perangkat jaringan tidak terdeteksi oleh OS.', 1),
('G16', 'Apakah Anda melihat jaringan Wi-Fi tetapi tidak bisa konek?', 'Terlihat SSID tapi gagal autentikasi/terputus.', 1),
('G17', 'Apakah ada tanda seru (!) di Device Manager pada Network adapters?', 'Driver corrupt atau perangkat bermasalah.', 2),
('G18', 'Apakah laptop tidak mau mengisi daya (plugged in, not charging)?', 'Charger terpasang tapi persen baterai tidak naik.', 2),
('G19', 'Apakah laptop mati total dan tidak ada lampu indikator saat charger terpasang?', 'Tidak ada respon sama sekali.', 3),
('G20', 'Apakah baterai terisi penuh tapi cepat habis (drop)?', 'Kapasitas baterai menurun.', 2),
('G21', 'Apakah beberapa tombol keyboard tidak berfungsi?', 'Hanya beberapa tombol bermasalah.', 1),
('G22', 'Apakah semua tombol keyboard atau touchpad tidak berfungsi?', 'Input sama sekali tidak merespon.', 2),
('G23', 'Apakah touchpad tidak berfungsi namun keyboard normal?', 'Isolasi masalah touchpad.', 1),
('G24', 'Apakah ada tanda silang (X) merah pada ikon baterai di taskbar?', 'Windows menunjukkan error komunikasi baterai.', 2),
('G25', 'Apakah adaptor/charger terasa panas berlebih atau konektornya longgar?', 'Kerusakan fisik adaptor atau port.', 1),
('G26', 'Apakah setelah mencoba charger lain masalah hilang?', 'Menguji adapter vs laptop.', 1),
('G27', 'Apakah pernah menumpahkan cairan ke keyboard atau laptop?', 'Riwayat liquid spill sangat relevan.', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala_pertanyaan`
--

CREATE TABLE `tbl_gejala_pertanyaan` (
  `id` int NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `urutan` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_gejala_pertanyaan`
--

INSERT INTO `tbl_gejala_pertanyaan` (`id`, `kode_gejala`, `id_pertanyaan`, `urutan`) VALUES
(1, 'G01', 1, 1),
(2, 'G01', 6, 2),
(3, 'G01', 7, 3),
(4, 'G02', 7, 1),
(5, 'G02', 1, 2),
(6, 'G03', 8, 1),
(7, 'G03', 4, 2),
(8, 'G04', 7, 1),
(9, 'G04', 2, 2),
(10, 'G05', 1, 1),
(11, 'G05', 6, 2),
(12, 'G05', 2, 3),
(13, 'G09', 4, 1),
(14, 'G09', 3, 2),
(15, 'G10', 3, 1),
(16, 'G10', 9, 2),
(17, 'G10', 4, 3),
(18, 'G11', 8, 1),
(19, 'G12', 8, 1),
(20, 'G13', 6, 1),
(21, 'G13', 5, 2),
(22, 'G14', 5, 1),
(23, 'G14', 8, 2),
(24, 'G15', 10, 1),
(25, 'G16', 10, 1),
(26, 'G17', 10, 1),
(27, 'G18', 2, 1),
(28, 'G24', 2, 1),
(29, 'G25', 10, 1),
(30, 'G26', 2, 1),
(31, 'G19', 2, 1),
(32, 'G21', 8, 1),
(33, 'G22', 8, 1),
(34, 'G23', 8, 1),
(35, 'G27', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int NOT NULL,
  `id_string` varchar(50) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `id_string`, `nama_kategori`, `deskripsi`) VALUES
(1, 'baterai', 'Baterai dan Daya', 'Masalah terkait charging, baterai cepat drop, atau mati total.'),
(2, 'layar', 'Layar / LCD', 'Masalah tampilan: hitam, bergaris, glitch, atau bluescreen.'),
(3, 'keyboard', 'Keyboard & Touchpad', 'Tombol tidak merespon atau touchpad bermasalah.'),
(4, 'panas', 'Panas & Kipas', 'Overheat, kipas berisik atau mati.'),
(5, 'jaringan', 'Jaringan (Wi-Fi/Bluetooth)', 'Wi-Fi/Bluetooth hilang atau tidak bisa konek.'),
(6, 'kinerja', 'Kinerja Laptop', 'Laptop lambat, disk usage tinggi, atau thermal throttling.'),
(7, 'virus', 'Virus & Keamanan', 'Pop-up aneh, file terenkripsi, program asing.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konklusi`
--

CREATE TABLE `tbl_konklusi` (
  `kode_konklusi` varchar(5) NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_kerusakan` varchar(255) NOT NULL,
  `analisis` text NOT NULL,
  `solusi_aman_diy` text NOT NULL,
  `catatan_teknisi` text NOT NULL,
  `priority` tinyint NOT NULL DEFAULT '5',
  `confidence` decimal(4,2) DEFAULT '0.80'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_konklusi`
--

INSERT INTO `tbl_konklusi` (`kode_konklusi`, `id_kategori`, `nama_kerusakan`, `analisis`, `solusi_aman_diy`, `catatan_teknisi`, `priority`, `confidence`) VALUES
('K01', 4, 'Overheat Wajar (Beban Tinggi)', 'Laptop terasa panas saat menjalankan aplikasi berat; normal bila temperatur masih dalam batas.', '1) Tutup aplikasi berat yang tidak dibutuhkan. 2) Letakkan laptop di permukaan keras. 3) Gunakan cooling pad saat beban berat.', 'Jika suhu > 95°C terus-menerus, teknisi disarankan cek heatsink & ganti thermal paste.', 5, 0.70),
('K02', 4, 'Sirkulasi Udara Tersumbat (Debu / Pasta Termal Kering)', 'Kipas bekerja keras meski beban ringan; menandakan penumpukan debu atau thermal paste menurun efektivitasnya.', '1) Matikan dan cabut charger. 2) Bersihkan ventilasi luar dengan kuas lembut atau compressed air pada jarak aman. 3) Gunakan cooling pad sementara.', 'Perlu buka casing untuk pembersihan mendalam dan penggantian thermal paste; minta teknisi jika tidak yakin.', 3, 0.88),
('K03', 4, 'Kipas Rusak / Bearing Aus', 'Kipas tidak berputar atau bergetar/berisik menandakan kerusakan mekanikal pada kipas.', '1) Matikan laptop dan hentikan penggunaan sampai diperiksa. 2) Jika yakin, bersihkan debu; jika tidak, bawa ke teknisi.', 'Kipas biasanya perlu diganti; teknisi akan cek fan controller dan jalur power fan.', 2, 0.92),
('K04', 2, 'RAM Longgar / Faulty (POST Beep)', 'Beep codes + BSOD biasanya menandakan masalah memori: RAM longgar, pin korosi, atau modul faulty.', '1) Matikan laptop, cabut charger & baterai (jika bisa). 2) Tekan tombol power 10 detik. 3) Jika mudah diakses, lepas dan pasang kembali modul RAM dengan grounding.', 'Teknisi akan membersihkan slot RAM, jalankan memtest, atau ganti modul bila perlu.', 2, 0.90),
('K05', 2, 'OS Corrupt / Driver Crash (BSOD tanpa beep)', 'BSOD tanpa beep cenderung masalah software: driver corrupt, update gagal, atau file sistem korup.', '1) Coba boot ke Safe Mode dan lakukan System Restore. 2) Jalankan sfc /scannow dan chkdsk. 3) Backup data jika perlu instal ulang OS.', 'Teknisi dapat recovery data, perbaiki partisi/bootloader, atau install ulang OS; backup penting.', 3, 0.85),
('K06', 2, 'Boot Failure / Stuck di Logo', 'Laptop berhenti di logo Windows menandakan masalah bootloader, file sistem corrupt, atau storage tidak responsif.', '1) Force restart, coba Startup Repair. 2) Jika bisa, backup data lalu reinstall OS jika perlu.', 'Teknisi akan cek kondisi storage dan konektor, serta lakukan recovery data jika perlu.', 3, 0.86),
('K07', 2, 'Storage (HDD/SSD) Tidak Terdeteksi', 'No Bootable Device atau drive tidak muncul di BIOS menandakan masalah konektor, controller, atau kerusakan drive.', '1) Masuk ke BIOS/UEFI dan cek apakah drive terdeteksi. 2) Jika tidak muncul, hentikan perubahan dan bawa teknisi.', 'Teknisi akan cek konektor, jalankan SMART test, dan rekomendasikan clone/replace jika drive bermasalah.', 1, 0.93),
('K08', 2, 'Panel LCD atau Kabel Fleksibel Bermasalah', 'Jika monitor eksternal normal tapi layar internal glitch/garis, kemungkinan kabel fleksibel (LVDS/eDP) atau panel LCD bermasalah.', '1) Sambungkan ke monitor eksternal untuk isolasi. 2) Jika eksternal normal, jangan langsung ganti panel—cek kabel fleksibel dulu. 3) Bawa teknisi jika tidak nyaman membuka bezel.', 'Teknisi akan cek konektor LVDS/eDP, reseat konektor, dan bila perlu ganti kabel fleksibel atau panel LCD.', 2, 0.92),
('K09', 6, 'Terlalu Banyak Aplikasi Startup', 'Banyak aplikasi autorun menguras resource saat startup sehingga membuat boot lambat.', '1) Buka Task Manager > Startup. 2) Disable aplikasi non-esensial. 3) Restart.', 'Jika masih lambat, teknisi dapat cek malware atau rekomendasikan upgrade RAM/SSD.', 5, 0.75),
('K10', 6, 'HDD 100% Usage / Disk Bottleneck', 'Disk usage tinggi terus-menerus menurunkan performa (HDD tua atau proses I/O berat).', '1) Jalankan Disk Cleanup, hapus temporary files. 2) Uninstall program yang tidak perlu. 3) Pertimbangkan upgrade ke SSD.', 'Jika SMART menunjukkan bad sector teknisi akan clone dan bantu recovery data.', 2, 0.88),
('K11', 6, 'Thermal Throttling (Performa Turun Karena Panas)', 'CPU/GPU menurunkan frekuensi saat suhu tinggi sehingga performa menurun setelah beberapa menit.', '1) Cek Task Manager untuk proses berat. 2) Gunakan cooling pad dan pastikan ventilasi tidak terhalang. 3) Bersihkan heatsink/kipas jika perlu.', 'Perlu pembersihan internal dan penggantian thermal paste; teknisi bisa lakukan repaste.', 3, 0.89),
('K12', 7, 'Infeksi Malware / Adware', 'Pop-up, redirect, atau program asing menunjukkan infeksi malware/adware yang berjalan di background.', '1) Putuskan koneksi internet. 2) Jalankan full scan Windows Defender. 3) Jalankan Malwarebytes dan hapus program asing. 4) Backup data jika perlu reinstall.', 'Jika infeksi berat (ransomware/rootkit) teknisi perlu recovery dan reinstall OS; amankan backup.', 1, 0.92),
('K13', 5, 'Driver Network Hilang / Corrupt', 'Ikon Wi-Fi hilang atau tanda seru di Device Manager biasanya disebabkan driver corrupt atau disabled.', '1) Restart laptop. 2) Device Manager > uninstall device (jangan centang delete driver) lalu restart. 3) Jika perlu, reinstall driver OEM.', 'Jika tetap tidak muncul, teknisi cek modul WLAN atau konektor.', 4, 0.82),
('K14', 5, 'Router / Provider Issue (Bukan Laptop)', 'Perangkat lain juga tidak bisa konek ke jaringan yang sama → masalah pada router/provider.', '1) Restart router/modem. 2) Cek perangkat lain apakah bisa konek. 3) Hubungi provider jika semua perangkat gagal.', 'Biasanya bukan pekerjaan teknisi laptop; hubungi ISP atau admin jaringan.', 6, 0.65),
('K15', 5, 'WLAN Card Internal Rusak', 'Jika reinstall driver tidak mengembalikan fungsi, kemungkinan modul WLAN internal bermasalah.', '1) Solusi sementara: gunakan USB Wi-Fi adapter. 2) Gunakan kabel LAN bila perlu.', 'Teknisi akan mengganti modul atau perbaiki konektor bila soldered-on.', 2, 0.90),
('K16', 3, 'Driver Keyboard / Touchpad Error', 'Input non-responsive setelah update biasanya disebabkan driver bermasalah.', '1) Colokkan keyboard/mouse USB eksternal. 2) Device Manager > uninstall driver keyboard/touchpad lalu restart.', 'Teknisi bisa update driver manual atau flash firmware jika tersedia.', 4, 0.80),
('K17', 3, 'Keyboard Fisik Rusak (Cairan / Tombol Mati)', 'Beberapa tombol yang mati biasanya kerusakan hardware akibat cairan atau kotoran.', '1) Gunakan On-Screen Keyboard sementara. 2) Gunakan keyboard USB eksternal.', 'Teknisi biasanya mengganti modul keyboard atau unit keyboard penuh.', 2, 0.94),
('K18', 1, 'Baterai Menurun / Kapasitas Drop', 'Full Charge Capacity jauh di bawah Design Capacity → baterai menurun karena siklus charge.', '1) Generate battery report (powercfg /batteryreport) dan cek kapasitas. 2) Siapkan penggantian baterai jika drop signifikan.', 'Teknisi akan rekomendasikan baterai pengganti original/kompatibel.', 2, 0.90),
('K19', 1, 'Adapter / Charger Rusak atau Kabel Putus', 'Jika charger lain bekerja pada laptop tapi charger sendiri tidak, menunjukkan adaptor/kabel rusak.', '1) Cek fisik adaptor/kabel. 2) Coba stopkontak lain. 3) Pinjam charger kompatibel untuk tes.', 'Teknisi dapat rekomendasikan adaptor compatible original; hindari adaptor murahan.', 1, 0.95),
('K20', 1, 'Sirkuit Power Mainboard Rusak (Mati Total)', 'Laptop mati total meski charger berfungsi → kemungkinan komponen power pada motherboard rusak.', '1) Tidak ada solusi DIY aman. Matikan penggunaan dan bawa ke teknisi segera.', 'Perlu pengukuran voltase rail power di mainboard; teknisi profesional harus menangani.', 1, 0.98),
('K21', 6, 'Background Process / Malware yang Memakan Resource', 'Disk/CPU usage tinggi sejak boot dan disk cleanup tidak memperbaiki → proses background atau malware.', '1) Task Manager identifikasi proses heavy. 2) Scan Windows Defender + Malwarebytes. 3) Gunakan bootable rescue antivirus bila perlu.', 'Jika malware persistent teknisi akan lakukan pembersihan mendalam atau reinstall OS.', 2, 0.90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` int NOT NULL,
  `teks_pertanyaan` text NOT NULL,
  `tipe` enum('yesno','choice','text') NOT NULL DEFAULT 'yesno',
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `teks_pertanyaan`, `tipe`, `catatan`) VALUES
(1, 'Apakah permukaan ventilasi/palmrest terasa sangat panas sebelum laptop mati?', 'yesno', 'Sentuh dengan hati-hati.'),
(2, 'Apakah Anda sudah coba jalankan laptop pakai charger tanpa baterai (jika baterai removable)?', 'yesno', 'Untuk model dengan baterai removable.'),
(3, 'Apakah garis/glitch berubah saat memiringkan atau menekuk layar?', 'yesno', 'Coba miringkan layar perlahan (hati-hati).'),
(4, 'Apakah masalah juga muncul saat tersambung ke monitor eksternal (HDMI/VGA)?', 'yesno', 'Jika eksternal normal, layar internal bermasalah.'),
(5, 'Apakah Anda sudah mencoba boot ke Safe Mode dan masalah tetap ada?', 'yesno', 'Safe Mode memuat driver minimal.'),
(6, 'Apakah lampu HDD/SSD tetap menyala meski tidak menjalankan aplikasi berat?', 'yesno', 'Perhatikan indikator kecil dekat tombol power.'),
(7, 'Apakah kipas mulai berputar lalu berhenti tiba-tiba?', 'yesno', 'Dengarkan pola kipas pada boot dan idle.'),
(8, 'Apakah performa membaik setelah menghapus temporary files atau menjalankan Disk Cleanup?', 'yesno', 'Coba hapus isi %temp% lalu restart.'),
(9, 'Apakah ada retakan atau bekas benturan di layar sebelum garis muncul?', 'yesno', 'Retakan halus dapat menyebabkan garis.'),
(10, 'Apakah kepala adaptor memiliki lampu indikator yang menyala/berkedip saat dicolok?', 'yesno', 'Perhatikan lampu pada charger.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `kode_konklusi` (`kode_konklusi`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indeks untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indeks untuk tabel `tbl_gejala_pertanyaan`
--
ALTER TABLE `tbl_gejala_pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gejala` (`kode_gejala`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `id_string` (`id_string`);

--
-- Indeks untuk tabel `tbl_konklusi`
--
ALTER TABLE `tbl_konklusi`
  ADD PRIMARY KEY (`kode_konklusi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `id_aturan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_gejala_pertanyaan`
--
ALTER TABLE `tbl_gejala_pertanyaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `id_pertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD CONSTRAINT `tbl_aturan_ibfk_1` FOREIGN KEY (`kode_konklusi`) REFERENCES `tbl_konklusi` (`kode_konklusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_aturan_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_gejala_pertanyaan`
--
ALTER TABLE `tbl_gejala_pertanyaan`
  ADD CONSTRAINT `tbl_gejala_pertanyaan_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_gejala_pertanyaan_ibfk_2` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_konklusi`
--
ALTER TABLE `tbl_konklusi`
  ADD CONSTRAINT `tbl_konklusi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
