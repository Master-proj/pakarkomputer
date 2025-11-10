<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis - Sistem Pakar Komputer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -250px;
            animation: float 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            color: #2d3748;
            font-size: 2em;
            margin-bottom: 5px;
            border-bottom: 4px solid #667eea;
            display: inline-block;
            padding-bottom: 5px;
        }

        .result-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-out backwards;
            transition: all 0.3s ease;
        }

        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .result-card:nth-child(2) { animation-delay: 0.2s; }
        .result-card:nth-child(3) { animation-delay: 0.4s; }
        .result-card:nth-child(4) { animation-delay: 0.6s; }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-title {
            color: #667eea;
            font-size: 1.4em;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title::before {
            content: '';
            width: 8px;
            height: 35px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
        }

        .card-content {
            color: #4a5568;
            line-height: 1.8;
            font-size: 1.05em;
        }

        .problem-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 1em;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            min-width: 200px;
            padding: 18px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 3px solid #667eea;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
        }

        .icon {
            width: 24px;
            height: 24px;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 25px 0;
        }

        .info-box {
            background: #f7fafc;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .info-box-title {
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .info-box-content {
            color: #4a5568;
            line-height: 1.7;
        }

        .warning-box {
            background: #fff5f5;
            border-left: 4px solid #F56565;
            padding: 20px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .warning-box-title {
            font-weight: 700;
            color: #C53030;
            margin-bottom: 10px;
            font-size: 1.05em;
        }

        .warning-box-content {
            color: #742a2a;
            line-height: 1.7;
        }

        @media print {
            body {
                background: white;
                padding: 20px;
            }

            body::before,
            body::after {
                display: none;
            }

            .action-buttons {
                display: none;
            }

            .result-card {
                box-shadow: none;
                border: 1px solid #e2e8f0;
                page-break-inside: avoid;
            }

            .header {
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }

            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 1.5em;
            }

            .result-card {
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hasil Analisis Kerusakan Komputer</h1>
        </div>

        <!-- Permasalahan yang Dialami -->
        <div class="result-card">
            <h2 class="card-title">Permasalahan yang Dialami</h2>
            <div class="problem-badge" id="problemType">Laptop cepat panas dan kipas bersuara keras</div>
            <div class="card-content" id="problemDescription">
                <p>Berdasarkan gejala yang Anda laporkan, sistem mendeteksi adanya masalah pada sistem pendinginan laptop Anda. Masalah ini umumnya disebabkan oleh penumpukan debu yang menghalangi sirkulasi udara atau pasta thermal yang sudah mengering.</p>
            </div>
        </div>

        <!-- Analisis Kerusakan -->
        <div class="result-card">
            <h2 class="card-title">Analisis Kerusakan</h2>
            <div class="card-content" id="damageAnalysis">
                <p>Berdasarkan gejala tersebut, sistem mendeteksi kemungkinan adanya penumpukan debu pada sistem pendingin, pasta termal yang sudah kering, atau beban kerja CPU/GPU yang terlalu tinggi. Kipas yang bersuara keras menandakan kipas bekerja ekstra untuk menurunkan suhu.</p>
                
                <div class="divider"></div>
                
                <div class="info-box">
                    <div class="info-box-title">💡 Penyebab Umum:</div>
                    <div class="info-box-content">
                        • Debu yang menumpuk pada heatsink dan kipas<br>
                        • Pasta thermal sudah kering dan tidak efektif<br>
                        • Ventilasi udara yang terhalang<br>
                        • Beban kerja processor yang tinggi<br>
                        • Komponen hardware yang mulai rusak
                    </div>
                </div>
            </div>
        </div>

        <!-- Saran Perbaikan -->
        <div class="result-card">
            <h2 class="card-title">Saran Perbaikan</h2>
            <div class="card-content" id="repairSuggestion">
                <p><strong>Langkah-langkah yang dapat dilakukan:</strong></p>
                
                <div class="info-box">
                    <div class="info-box-title">🔧 Solusi DIY (Do It Yourself):</div>
                    <div class="info-box-content">
                        1. <strong>Bersihkan ventilasi dan kipas</strong> dari debu menggunakan kompresor udara atau jasa servis profesional<br>
                        2. <strong>Ganti pasta termal</strong> pada processor jika sudah lama tidak dilakukan<br>
                        3. <strong>Hindari menutup ventilasi</strong> udara saat laptop digunakan<br>
                        4. <strong>Gunakan cooling pad</strong> untuk membantu menjaga suhu tetap stabil<br>
                        5. <strong>Monitor penggunaan CPU/GPU</strong> untuk mendeteksi aplikasi yang membebani sistem
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
                    <div class="info-box-title">🏪 Rekomendasi Servis:</div>
                    <div class="info-box-content">
                        Jika masalah berlanjut setelah pembersihan, segera bawa ke service center resmi atau teknisi terpercaya untuk pemeriksaan lebih lanjut. Overheating yang dibiarkan dapat merusak komponen lain seperti motherboard atau processor.
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="index.html" class="btn btn-secondary">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Kembali ke Beranda
            </a>
            <button onclick="window.print()" class="btn btn-primary">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>
                    <path d="M6 14h12v8H6z"/>
                </svg>
                Print Hasil Analisis
            </button>
        </div>
    </div>

    <script>
        // Load data from localStorage
        window.addEventListener('DOMContentLoaded', function() {
            // Ambil data masalah yang dipilih
            const selectedProblems = JSON.parse(localStorage.getItem('selectedProblems') || '[]');
            const diagnosticAnswers = JSON.parse(localStorage.getItem('diagnosticAnswers') || '[]');
            
            // Simulasi hasil analisis berdasarkan data
            if (selectedProblems.length > 0) {
                console.log('Masalah yang dipilih:', selectedProblems);
                console.log('Jawaban diagnosa:', diagnosticAnswers);
                
                // Di sini bisa ditambahkan logika untuk menampilkan hasil yang berbeda
                // berdasarkan masalah yang dipilih dan jawaban diagnosa
            }
            
            // Tambahkan animasi smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        // Fungsi untuk print dengan konfirmasi
        function printResult() {
            if (confirm('Apakah Anda yakin ingin mencetak hasil analisis ini?')) {
                window.print();
            }
        }

        // Tambahkan efek hover pada cards
        document.querySelectorAll('.result-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>