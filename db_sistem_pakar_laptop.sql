-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Nov 2025 pada 06.09
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
-- Database: `db_sistem_pakar_laptop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `id_aturan` int NOT NULL,
  `kode_konklusi` varchar(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`id_aturan`, `kode_konklusi`, `kode_gejala`) VALUES
(1, 'K01', 'G01'),
(2, 'K01', 'G03'),
(3, 'K02', 'G01'),
(4, 'K02', 'G02'),
(5, 'K02', 'G03'),
(6, 'K03', 'G01'),
(7, 'K03', 'G04'),
(8, 'K03', 'G05'),
(9, 'K04', 'G06'),
(10, 'K04', 'G07'),
(11, 'K05', 'G06'),
(12, 'K05', 'G07'),
(13, 'K06', 'G08'),
(14, 'K07', 'G09'),
(15, 'K08', 'G10'),
(16, 'K09', 'G11'),
(17, 'K09', 'G13'),
(18, 'K10', 'G11'),
(19, 'K10', 'G13'),
(20, 'K11', 'G12'),
(21, 'K12', 'G11'),
(22, 'K12', 'G12'),
(23, 'K12', 'G14'),
(24, 'K13', 'G15'),
(25, 'K13', 'G17'),
(26, 'K14', 'G16'),
(27, 'K15', 'G15'),
(28, 'K16', 'G22'),
(29, 'K17', 'G21'),
(30, 'K18', 'G22'),
(31, 'K18', 'G23'),
(32, 'K19', 'G20'),
(33, 'K20', 'G18'),
(34, 'K21', 'G19'),
(35, 'K22', 'G18'),
(36, 'K22', 'G24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `pertanyaan`, `deskripsi`) VALUES
('G01', 'Apakah laptop Anda cepat panas?', 'Fokus pada suhu laptop saat digunakan.'),
('G02', 'Apakah kipas laptop berbunyi sangat keras (berisik)?', 'Fokus pada suara kipas yang tidak wajar.'),
('G03', 'Apakah Anda sedang menjalankan aplikasi berat (game, editing video)?', 'Membantu membedakan overheat wajar dan tidak wajar.'),
('G04', 'Apakah kipas laptop tidak berbunyi sama sekali (hening total)?', 'Ini bisa menandakan kipas mati atau tidak berputar.'),
('G05', 'Apakah laptop tiba-tiba mati sendiri saat digunakan?', 'Gejala mati mendadak (bukan shutdown normal).'),
('G06', 'Apakah layar laptop menampilkan Bluescreen (BSOD) dengan kode error?', 'Layar biru dengan teks putih yang muncul saat sistem crash.'),
('G07', 'Apakah terdengar suara \'beep\' berulang kali saat laptop dinyalakan?', 'Suara \'beep\' dari motherboard saat startup.'),
('G08', 'Apakah laptop \'stuck\' atau berhenti di logo Windows saat startup?', 'Laptop menyala tapi tidak bisa masuk ke tampilan login/desktop.'),
('G09', 'Apakah layar menjadi hitam (blackscreen) namun mesin terdengar menyala?', 'Lampu indikator power menyala, kipas berputar, tapi layar gelap total.'),
('G10', 'Apakah layar tampak bergaris, berkedip, atau warnanya aneh (glitch)?', 'Kerusakan visual pada tampilan layar.'),
('G11', 'Apakah laptop terasa lambat *sejak awal* dinyalakan (saat startup)?', 'Performa lambat terasa bahkan sebelum membuka banyak aplikasi.'),
('G12', 'Apakah laptop *awalnya* cepat, namun menjadi lambat setelah dipakai beberapa saat?', 'Penurunan performa yang terjadi seiring waktu penggunaan.'),
('G13', 'Apakah lampu indikator HDD/SSD menyala terus-menerus (solid, tidak berkedip)?', 'Lampu kecil (biasanya dekat tombol power) yang terus menyala tanpa berkedip.'),
('G14', 'Apakah Anda melihat iklan pop-up aneh, file ter-encrypt, atau program yang tidak Anda instal?', 'Perilaku aneh pada software yang mengindikasikan virus.'),
('G15', 'Apakah ikon Wi-Fi atau Bluetooth hilang dari taskbar/control panel?', 'Ikon untuk menyalakan Wi-Fi/Bluetooth tidak ada sama sekali.'),
('G16', 'Apakah Anda bisa melihat ikon Wi-Fi, namun tidak bisa terhubung ke jaringan manapun?', 'Bisa melihat daftar sinyal Wi-Fi, tapi selalu gagal konek.'),
('G17', 'Apakah di \'Device Manager\', ada tanda seru (!) kuning pada \'Network adapters\'?', 'Menunjukkan adanya masalah driver pada sistem Windows.'),
('G18', 'Apakah laptop tidak mau mengisi daya (persentase tidak naik) saat charger dicolok?', 'Status baterai \'plugged in, not charging\' atau persentase tidak bertambah.'),
('G19', 'Apakah laptop mati total dan tidak ada lampu indikator menyala saat charger dicolok?', 'Tidak ada respon sama sekali dari laptop.'),
('G20', 'Apakah baterai terisi penuh, namun cepat sekali habis (drop)?', 'Kesehatan baterai yang menurun drastis.'),
('G21', 'Apakah ada *beberapa* tombol keyboard yang tidak berfungsi?', 'Hanya sebagian tombol (misal \'A\', \'S\', \'D\') yang mati.'),
('G22', 'Apakah *semua* tombol keyboard (atau touchpad) tidak berfungsi?', 'Seluruh keyboard atau touchpad tidak merespon.'),
('G23', 'Apakah hanya Touchpad saja yang tidak berfungsi (keyboard normal)?', 'Memisahkan masalah touchpad dari keyboard.'),
('G24', 'Apakah ada ikon tanda silang (X) merah pada ikon baterai di taskbar?', 'Indikator Windows bahwa baterai bermasalah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int NOT NULL,
  `id_string` varchar(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `id_string`, `nama_kategori`, `deskripsi`) VALUES
(1, 'baterai', 'Baterai dan Daya', 'Masalah ini berkaitan dengan laptop yang tidak bisa diisi dayanya, cepat habis, atau tiba-tiba mati saat digunakan.'),
(2, 'layar', 'Layar/LCD', 'Berhubungan dengan tampilan layar seperti tidak muncul gambar, layar hitam, bergaris, glitch, atau bluescreen.'),
(3, 'keyboard', 'Keyboard & Touchpad', 'Masalah pada tombol yang tidak berfungsi, mengetik sendiri, atau touchpad tidak bisa digerakkan atau tidak responsif.'),
(4, 'panas', 'Panas dan Kipas', 'Masalah ini muncul ketika laptop cepat panas, kipas berbunyi keras, atau suhu meningkat meski baru digunakan sebentar.'),
(5, 'jaringan', 'Jaringan (Wi-Fi/Bluetooth)', 'Terkait koneksi internet yang hilang, Wi-Fi tidak bisa tersambung, atau Bluetooth tidak berfungsi.'),
(6, 'kinerja', 'Kinerja Laptop', 'Terjadi saat laptop terasa sangat lambat, sering macet, atau program membutuhkan waktu lama untuk terbuka.'),
(7, 'virus', 'Virus dan Keamanan', 'Masalah terkait dengan laptop yang terinfeksi virus, malware, atau mengalami perilaku aneh yang mencurigakan.');

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
  `catatan_teknisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_konklusi`
--

INSERT INTO `tbl_konklusi` (`kode_konklusi`, `id_kategori`, `nama_kerusakan`, `analisis`, `solusi_aman_diy`, `catatan_teknisi`) VALUES
('K01', 4, 'Overheat Wajar (Beban Tinggi)', 'Gejala panas dan kipas berisik saat menjalankan beban berat adalah normal. Sistem pendingin bekerja maksimal untuk mendinginkan CPU/GPU.', '<strong>Opsi 1:</strong> Tutup aplikasi berat yang tidak esensial (game, render, banyak tab browser). \r\n<strong>Opsi 2:</strong> Pastikan laptop berada di permukaan keras dan rata (jangan di kasur) agar sirkulasi udara lancar. \r\n<strong>Opsi 3:</strong> Gunakan *cooling pad* eksternal untuk membantu aliran udara.', '(Biasanya tidak perlu ke teknisi jika ini masalahnya. Namun jika suhu terlalu ekstrem, pertimbangkan pembersihan internal).'),
('K02', 4, 'Sirkulasi Udara Buruk (Debu)', 'Gejala panas dan kipas berisik meski dipakai ringan menandakan sistem pendingin tersumbat. Debu menghalangi aliran udara, dan pasta termal mungkin sudah kering.', '<strong>Opsi 1:</strong> Gunakan *cooling pad* eksternal sebagai bantuan sementara.\r\n<strong>Opsi 2:</strong> Matikan laptop, bersihkan debu dari **lubang ventilasi luar** dengan kuas kering atau penyedot debu mini. **(Jangan ditiup!)**', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya *overheat* meski dipakai ringan. Kipasnya berisik. Saya curiga debu menumpuk di *heatsink* atau pasta prosesor kering. Minta tolong dibersihkan internal dan ganti pasta termal.\''),
('K03', 4, 'Kipas (Fan) Rusak/Mati', 'Gejala laptop panas, mati mendadak, tapi kipas hening total adalah tanda bahaya. Ini berarti kipas gagal berputar, menyebabkan panas tidak terbuang.', '<strong>Opsi 1:</strong> **SEGERA MATIKAN LAPTOP** untuk mencegah kerusakan komponen lebih lanjut akibat panas berlebih. \r\n<strong>Opsi 2:</strong> Jangan gunakan laptop sampai masalah ini diperbaiki.', '**URGENT:** Laptop saya *overheat* parah dan *mati mendadak*. Kipasnya *mati total* (tidak berputar/bersuara). Tolong segera diperiksa dan ganti unit kipasnya.'),
('K04', 2, 'RAM Kotor / Longgar', 'Gejala Bluescreen (BSOD) yang disertai suara \'beep\' saat startup adalah kode error dari motherboard (POST) yang hampir selalu menunjuk pada masalah Memori (RAM).', '<strong>Opsi 1 (Static Discharge):</strong> Matikan laptop, cabut charger & baterai (jika bisa). Tekan & tahan tombol Power selama 20 detik. Pasang kembali dan nyalakan. \r\n<strong>Opsi 2:</strong> Coba hubungkan laptop ke monitor eksternal. Jika di monitor eksternal tampil normal, masalahnya bukan RAM.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya gagal *booting* (Bluescreen) dan ada *suara \'beep\'*. Saya curiga RAM-nya kotor atau longgar. Tolong dibongkar, dibersihkan pin RAM-nya, dan dipasang ulang.\''),
('K05', 2, 'OS Corrupt (Bluescreen)', 'Gejala Bluescreen (BSOD) tanpa suara \'beep\' biasanya mengindikasikan masalah pada level software, yaitu file sistem operasi (Windows) yang rusak.', '<strong>Opsi 1:** Coba masuk \'Safe Mode\' (Mode Aman). Jika bisa, lakukan \'System Restore\' ke tanggal sebelum masalah muncul. \r\n<strong>Opsi 2:** Jika tidak bisa masuk Safe Mode, siapkan data untuk kemungkinan instal ulang OS.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya sering *bluescreen* (BSOD) dan tidak ada suara *beep*. Sudah coba *System Restore* tapi gagal. Kemungkinan sistem operasi saya rusak dan perlu di-instal ulang.\''),
('K06', 2, 'OS Corrupt (Stuck Logo)', 'Laptop yang berhenti di logo Windows (tidak \'loading\' atau \'spinning\') menandakan file boot sistem operasi tidak dapat dimuat dengan benar.', '<strong>Opsi 1:</strong> Paksa matikan (tahan tombol Power), lalu nyalakan lagi. Kadang Windows akan otomatis masuk ke mode \'Startup Repair\'. \r\n<strong>Opsi 2:</strong> Ikuti instruksi di layar jika \'Startup Repair\' muncul.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya *stuck* di logo Windows dan tidak bisa masuk. Fitur *Startup Repair* juga gagal. Tolong periksa, kemungkinan perlu instal ulang OS. (Tolong data di drive D: diselamatkan jika bisa).\''),
('K07', 2, 'Storage (HDD/SSD) Gagal Deteksi', 'Layar hitam (blackscreen) setelah logo BIOS, seringkali disertai pesan \'No Bootable Device\', berarti laptop tidak dapat menemukan sistem operasi karena tidak bisa membaca Hard Disk / SSD.', '<strong>Opsi 1:</strong> Masuk ke BIOS/UEFI (tekan F2, F10, atau Del saat startup). Cek di menu \'Boot\' atau \'Storage\', apakah nama HDD/SSD Anda muncul? \r\n<strong>Opsi 2:</strong> Jika tidak muncul, jangan ubah setting apapun. Keluar dari BIOS.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya tidak bisa *boot* (blackscreen) dan menampilkan pesan *\'No Bootable Device\'*. Di BIOS, HDD/SSD saya tidak terdeteksi. Tolong cek konektor atau kesehatan *storage*-nya.\''),
('K08', 2, 'Hardware LCD / Kabel Fleksibel Rusak', 'Masalah tampilan bergaris atau \'glitch\' yang hanya terjadi di layar laptop (tapi normal di monitor eksternal) jelas mengindikasikan kerusakan fisik pada panel LCD atau kabelnya.', '<strong>Opsi 1 (Tes):</strong> Hubungkan laptop ke TV atau monitor eksternal pakai kabel HDMI/VGA. \r\n<strong>Opsi 2:</strong> Jika di monitor eksternal gambarnya *normal*, berarti 100% masalah ada di layar laptop. Jika *sama-sama* *glitch*, masalah ada di Kartu Grafis (VGA).', 'Tolong sampaikan ke teknisi: \r\n\'Layar laptop saya *glitch*/bergaris. Saat saya sambungkan ke TV, gambarnya *normal*. Saya curiga ini masalah di kabel fleksibel (LVDS) atau panel LCD-nya. Tolong dicek.\''),
('K09', 6, 'Startup Aplikasi Terlalu Banyak', 'Laptop lambat saat startup adalah gejala umum dari terlalu banyak program yang berjalan otomatis saat Windows dimulai. Ini menghabiskan sumber daya RAM dan CPU.', '<strong>Opsi 1:** Buka Task Manager (Ctrl+Shift+Esc), pindah ke tab \'Startup\'. \r\n<strong>Opsi 2:** Klik kanan dan \'Disable\' aplikasi yang tidak penting (contoh: Spotify, Steam, Adobe Updater) agar tidak otomatis menyala. \r\n<strong>Opsi 3:** Restart laptop Anda.', '(Ini murni masalah software. Jika setelah ini masih lambat, lakukan diagnosa lagi dan pilih \'Kinerja Laptop\' dan jawab pertanyaan lainnya dengan jujur).'),
('K10', 6, 'Storage (HDD) Penuh / Lemah', 'Jika lampu indikator HDD menyala terus-menerus, itu tandanya HDD bekerja 100% (disebut \'100% disk usage\'). Ini sering terjadi pada HDD yang sudah tua, penuh, atau mulai rusak (bad sector).', '<strong>Opsi 1 (Bersihkan Cache):</strong> Buka \'Start\', ketik **\'Disk Cleanup\'**. Pilih drive C: dan centang semua \'Temporary files\', \'Recycle Bin\', dll, lalu \'OK\'. \r\n<strong>Opsi 2 (Hapus Program):</strong> Buka \'Add or Remove Programs\' dari Start Menu. Hapus (Uninstall) program atau game yang sudah tidak Anda mainkan.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya lambat sekali (100% disk usage) dan lampu HDD nyala terus. Sudah *Disk Cleanup* tapi masih lambat. Saya curiga Hard Disk (HDD) saya sudah tua/lemah. Tolong cek kesehatannya dan beri rekomendasi *upgrade* ke SSD.\''),
('K11', 6, 'Overheat (Thermal Throttling)', 'Laptop yang lambat *setelah* dipakai beberapa saat adalah gejala \'Thermal Throttling\'. CPU/GPU sengaja menurunkan kinerjanya agar tidak terlalu panas. Ini adalah gejala dari masalah pendingin.', '<strong>Opsi 1:</strong> Cek Task Manager (Ctrl+Shift+Esc) untuk melihat aplikasi apa yang memakan CPU/GPU. \r\n<strong>Opsi 2:</strong> Lakukan diagnosa lagi, tapi kali ini pilih kategori **\'Panas dan Kipas\'** untuk menemukan akar masalahnya.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya awalnya cepat, tapi jadi sangat lambat setelah dipakai 15-20 menit. Saya curiga ini *thermal throttling* karena *overheat*. Tolong cek sistem pendinginnya.\''),
('K12', 7, 'Infeksi Virus / Malware', 'Perilaku aneh seperti pop-up, file ter-encrypt (Ransomware), atau program asing yang berjalan sendiri adalah tanda jelas infeksi malware. Malware ini juga sering membuat laptop lambat karena menggunakan sumber daya secara diam-diam.', '<strong>Opsi 1:</strong> Jalankan \'Full Scan\' di \'Windows Security\' (Windows Defender). \r\n<strong>Opsi 2:</strong> Jika masih curiga, instal antivirus pihak ketiga (Avast, Kaspersky, Malwarebytes versi Free) dan jalankan \'Full Scan\' lagi. \r\n<strong>Opsi 3:</strong> Hapus aplikasi aneh yang tidak Anda kenal melalui \'Add or Remove Programs\'.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya aneh. Sering muncul *pop-up* dan lambat. Saya curiga kena virus. Saya sudah *scan* pakai antivirus tapi masalahnya tetap muncul. Tolong bantu *deep cleaning* virus/malware.\''),
('K13', 5, 'Driver Jaringan Rusak', 'Ikon Wi-Fi hilang atau ada tanda seru kuning di Device Manager adalah masalah driver. Perangkat kerasnya (WLAN Card) ada, tapi Windows tidak tahu cara \'berbicara\' dengannya.', '<strong>Opsi 1 (Paling mudah):</strong> Restart laptop Anda. \r\n<strong>Opsi 2:</strong> Buka \'Device Manager\'. Cari \'Network adapters\'. \r\n<strong>Opsi 3:</strong> Klik kanan pada driver Wi-Fi Anda (nama biasanya ada \'Wireless\' atau \'WLAN\'), pilih \'Uninstall device\' **(JANGAN centang \'Delete driver software\')**. \r\n<strong>Opsi 4:</strong> Restart laptop. Windows akan otomatis menginstal ulang drivernya.', 'Tolong sampaikan ke teknisi: \r\n\'Wi-Fi saya hilang. Sudah coba *uninstall driver* dari *Device Manager* dan *restart* tapi tidak berhasil. Tolong bantu instal ulang driver secara manual.\''),
('K14', 5, 'Masalah Jaringan (Router/Sinyal)', 'Jika ikon Wi-Fi ada, bisa melihat daftar jaringan, tapi tidak bisa terhubung, kemungkinan besar masalahnya bukan di laptop Anda, tapi di router atau sinyal Wi-Fi itu sendiri.', '<strong>Opsi 1:</strong> Coba \'Forget\' jaringan Wi-Fi tersebut dan sambungkan ulang (masukkan password lagi). \r\n<strong>Opsi 2:</strong> Restart modem/router Anda (cabut colokan, tunggu 10 detik, colok lagi). \r\n<strong>Opsi 3:</strong> Coba sambungkan HP Anda ke Wi-Fi yang sama. Jika HP juga tidak bisa, 100% masalah ada di router.', '(Tidak perlu ke teknisi laptop. Hubungi penyedia layanan internet Anda jika Opsi 2 dan 3 gagal).'),
('K15', 5, 'Hardware Jaringan (WLAN Card) Rusak', 'Jika ikon Wi-Fi hilang dan instalasi ulang driver (solusi K13) gagal, ada kemungkinan kartu Wi-Fi (WLAN Card) di dalam laptop Anda rusak secara fisik.', '<strong>Opsi 1 (Solusi Sementara):</strong> Beli *USB Wi-Fi Adapter* eksternal. Ini adalah dongle kecil seharga 50-100 ribu yang berfungsi sebagai pengganti Wi-Fi internal. \r\n<strong>Opsi 2:</strong> Gunakan kabel LAN untuk koneksi internet yang lebih stabil.', 'Tolong sampaikan ke teknisi: \r\n\'Driver Wi-Fi saya tidak terdeteksi sama sekali di *Device Manager*. Sudah di-instal ulang tapi tetap gagal. Saya curiga kartu Wi-Fi internalnya rusak dan perlu diganti.\''),
('K16', 3, 'Driver Keyboard/Touchpad Error', 'Jika *semua* keyboard atau touchpad mati mendadak, terutama setelah update Windows, ini seringkali masalah driver. Hardware jarang rusak serentak.', '<strong>Opsi 1:</strong> Colokkan mouse USB eksternal. \r\n<strong>Opsi 2:</strong> Buka \'Device Manager\' (ketik di Start Menu). Cari \'Keyboards\' atau \'Mice and other pointing devices\'. \r\n<strong>Opsi 3:</strong> Klik kanan > \'Uninstall device\' pada driver keyboard/touchpad Anda, lalu *restart* laptop.', 'Tolong sampaikan ke teknisi: \r\n\'Seluruh keyboard (atau touchpad) saya tiba-tiba tidak berfungsi. Saya curiga ini masalah *driver*. Saya sudah coba *restart* tapi tetap tidak bisa.\''),
('K17', 3, 'Hardware Keyboard Rusak (Sebagian)', 'Jika hanya beberapa tombol yang mati (misal kesiram air atau kotor), ini adalah kerusakan fisik. Driver tidak bisa memperbaiki ini.', '<strong>Opsi 1 (Solusi Sementara):</strong> Gunakan *On-Screen Keyboard* (ketik di Start Menu) untuk mengetik tombol yang rusak. \r\n<strong>Opsi 2:</strong> Gunakan *keyboard USB* eksternal.', 'Tolong sampaikan ke teknisi: \r\n\'Beberapa tombol keyboard saya (sebutkan: misal Q, W, E) tidak berfungsi. Saya sudah coba bersihkan tapi tetap tidak bisa. Tolong diganti 1 set keyboard-nya.\''),
('K18', 3, 'Touchpad Ter-disable (Hotkey)', 'Banyak laptop memiliki tombol \'hotkey\' (misal Fn + F7) untuk mematikan touchpad. Kadang ini tertekan tanpa sengaja.', '<strong>Opsi 1:</strong> Cari tombol di keyboard Anda yang memiliki ikon touchpad (seringkali di F1-F12). \r\n<strong>Opsi 2:</strong> Coba tekan tombol itu. Lalu coba tekan **Fn + tombol itu**. \r\n<strong>Opsi 3:</strong> Cek di \'Settings\' > \'Devices\' > \'Touchpad\' dan pastikan statusnya \'On\'.', '(Tidak perlu ke teknisi. Ini adalah setting yang tersembunyi).'),
('K19', 1, 'Baterai \'Drop\' (Health Menurun)', 'Baterai yang cepat habis adalah tanda penuaan (wear and tear). Setiap baterai memiliki siklus pengisian (charge cycle) terbatas. Ini adalah hal yang wajar terjadi.', '<strong>Opsi 1 (Cek Kesehatan):</strong> Buka \'cmd\' (Command Prompt), ketik `powercfg /batteryreport` lalu Enter. \r\n<strong>Opsi 2:</strong> Buka file \'battery-report.html\' (lokasinya akan diberitahu di cmd). Cek bagian \'Design Capacity\' vs \'Full Charge Capacity\'. Jika jauh berbeda, kesehatan baterai sudah menurun.', 'Tolong sampaikan ke teknisi: \r\n\'Baterai saya cepat sekali habis (drop). Hasil *battery report* menunjukkan *Full Charge Capacity*-nya tinggal [sebutkan %] dari *Design Capacity*. Tolong dicarikan baterai pengganti yang original/kompatibel.\''),
('K20', 1, 'Adapter/Charger Rusak', 'Laptop tidak mengisi daya bisa jadi bukan karena baterainya, tapi karena charger (adapter) yang rusak atau kabelnya putus.', '<strong>Opsi 1:</strong> Cek fisik kabel charger, apakah ada yang terkelupas atau putus? \r\n<strong>Opsi 2:</strong> Pastikan colokan ke stopkontak kencang. Coba stopkontak lain. \r\n<strong>Opsi 3 (Penting):</strong> Jika memungkinkan, coba pinjam charger teman yang voltase dan lubangnya sama persis. Jika laptop mengisi, berarti charger Anda yang rusak.', 'Tolong sampaikan ke teknisi: \r\n\'Laptop saya tidak mau *charge*. Saya sudah coba pinjam *charger* teman dan ternyata *bisa*, berarti *charger* saya yang rusak. Tolong dicarikan *charger* pengganti yang original.\''),
('K21', 1, 'Sirkuit Power Mainboard Rusak', 'Ini skenario terburuk. Jika laptop mati total, tidak ada lampu indikator, dan sudah dites dengan charger lain yang pasti berfungsi, kemungkinan ada komponen power di motherboard yang rusak.', '(Tidak ada solusi DIY yang aman untuk masalah ini).', '**URGENT:** Laptop saya *mati total*, tidak ada lampu indikator sama sekali. Saya *sudah coba charger lain* yang pasti berfungsi, tapi laptop tetap mati. Saya curiga ada masalah di sirkuit *power* *mainboard* atau *port charging*-nya.\''),
('K22', 1, 'Baterai Rusak (Tidak Terdeteksi)', 'Tanda silang (X) merah pada ikon baterai berarti Windows tidak dapat berkomunikasi dengan baterai. Ini bisa jadi driver, tapi lebih sering baterainya yang sudah rusak total.', '<strong>Opsi 1:</strong> Buka \'Device Manager\'. Cari \'Batteries\'. \r\n<strong>Opsi 2:</strong> Klik kanan pada \'Microsoft ACPI-Compliant Control Method Battery\' dan pilih \'Uninstall device\'. \r\n<strong>Opsi 3:</strong> Restart laptop (tanpa cabut charger).', 'Tolong sampaikan ke teknisi: \r\n\'Ada tanda silang (X) merah di ikon baterai saya. Saya sudah coba *uninstall driver* baterai di *Device Manager* dan *restart*, tapi tidak berhasil. Tolong cek baterainya, kemungkinan perlu diganti.\'');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `fk_aturan_konklusi` (`kode_konklusi`),
  ADD KEY `fk_aturan_gejala` (`kode_gejala`);

--
-- Indeks untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

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
  ADD KEY `fk_konklusi_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `id_aturan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD CONSTRAINT `fk_aturan_gejala` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aturan_konklusi` FOREIGN KEY (`kode_konklusi`) REFERENCES `tbl_konklusi` (`kode_konklusi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_konklusi`
--
ALTER TABLE `tbl_konklusi`
  ADD CONSTRAINT `fk_konklusi_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
