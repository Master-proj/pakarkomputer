<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Komputer - Diagnosa Kerusakan PC</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
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
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            width: 100%;
            padding: 60px 50px;
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .icon-wrapper {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .icon-wrapper svg {
            width: 60px;
            height: 60px;
            fill: white;
        }

        h1 {
            font-size: 2.5em;
            color: #2d3748;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 1.1em;
            color: #718096;
            margin-bottom: 30px;
        }

        .description {
            background: #f7fafc;
            padding: 25px;
            border-radius: 16px;
            border-left: 4px solid #667eea;
            margin-bottom: 40px;
            line-height: 1.7;
            color: #4a5568;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .feature-card {
            background: linear-gradient(135deg, #f6f8fb 0%, #ffffff 100%);
            padding: 25px;
            border-radius: 16px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            cursor: default;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
            border-color: #667eea;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: white;
            font-size: 20px;
        }

        .feature-title {
            font-size: 1.1em;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .feature-text {
            font-size: 0.95em;
            color: #718096;
            line-height: 1.6;
        }

        .cta-section {
            text-align: center;
            margin-top: 40px;
        }

        .btn-start {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-start:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        .btn-start:active {
            transform: translateY(-1px);
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e2e8f0;
            color: #718096;
            font-size: 0.9em;
        }

        @media (max-width: 768px) {
            .container {
                padding: 40px 30px;
            }

            h1 {
                font-size: 2em;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
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
                    Pengguna diarahkan untuk memilih permasalahan yang lebih spesifik sesuai dengan gejala atau kerusakan yang dialami.
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