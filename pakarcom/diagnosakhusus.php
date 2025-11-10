<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa Masalah Khusus - Sistem Pakar Komputer</title>
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
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .progress-bar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            padding: 8px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .progress-fill {
            height: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50px;
            transition: width 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 10px;
        }

        .progress-text {
            color: white;
            font-size: 0.75em;
            font-weight: 600;
            white-space: nowrap;
        }

        .question-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.6s ease-out;
            margin-bottom: 30px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .question-header {
            display: flex;
            align-items: flex-start;
            gap: 30px;
            margin-bottom: 40px;
        }

        .question-illustration {
            flex-shrink: 0;
            width: 300px;
            height: 250px;
        }

        .question-illustration img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .question-content {
            flex: 1;
        }

        .question-number {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9em;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .question-text {
            font-size: 1.8em;
            font-weight: 700;
            color: #2d3748;
            line-height: 1.4;
            margin-bottom: 15px;
        }

        .question-description {
            color: #718096;
            font-size: 1em;
            line-height: 1.6;
        }

        .answer-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-answer {
            flex: 1;
            min-width: 200px;
            padding: 20px 40px;
            border: none;
            border-radius: 16px;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-answer::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-answer:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-yes {
            background: linear-gradient(135deg, #48BB78 0%, #38A169 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(72, 187, 120, 0.4);
        }

        .btn-yes:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(72, 187, 120, 0.5);
        }

        .btn-no {
            background: linear-gradient(135deg, #F56565 0%, #E53E3E 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(245, 101, 101, 0.4);
        }

        .btn-no:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(245, 101, 101, 0.5);
        }

        .navigation-buttons {
            display: flex;
            gap: 15px;
            justify-content: space-between;
        }

        .btn-nav {
            padding: 15px 35px;
            border: none;
            border-radius: 50px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
            color: #667eea;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-nav:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }

        .btn-nav:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        @media (max-width: 768px) {
            .question-card {
                padding: 30px 20px;
            }

            .question-header {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .question-illustration {
                width: 100%;
                max-width: 250px;
                height: 200px;
            }

            .question-text {
                font-size: 1.4em;
            }

            .answer-buttons {
                flex-direction: column;
            }

            .btn-answer {
                width: 100%;
            }

            .navigation-buttons {
                flex-direction: column;
            }

            .btn-nav {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="progress-bar">
            <div class="progress-fill" id="progressFill" style="width: 6.67%;">
                <span class="progress-text" id="progressText">1/15</span>
            </div>
        </div>

        <div class="question-card" id="questionCard">
            <div class="question-header">
                <div class="question-illustration">
                    <svg viewBox="0 0 400 300" id="illustrationSvg">
                        <!-- Illustration akan berubah sesuai pertanyaan -->
                        <rect x="50" y="80" width="300" height="180" rx="15" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="65" y="95" width="270" height="135" fill="#4FD1C5"/>
                        <!-- Heat waves -->
                        <path d="M120 40 Q125 25 130 40 T140 40" stroke="#F56565" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <path d="M160 35 Q165 20 170 35 T180 35" stroke="#FC8181" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <path d="M200 40 Q205 25 210 40 T220 40" stroke="#F56565" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <path d="M240 35 Q245 20 250 35 T260 35" stroke="#FC8181" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <!-- Shield/Security -->
                        <path d="M200 130 L180 145 L180 180 Q180 195 200 205 Q220 195 220 180 L220 145 Z" fill="#48BB78" stroke="#2F855A" stroke-width="3"/>
                        <circle cx="200" cy="170" r="15" fill="#E53E3E"/>
                        <path d="M195 170 L198 175 L207 163" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Decorative circles -->
                        <circle cx="320" cy="100" r="20" fill="#F687B3" opacity="0.5"/>
                        <circle cx="80" cy="120" r="15" fill="#9DECF9" opacity="0.6"/>
                        <circle cx="340" cy="200" r="18" fill="#D6BCFA" opacity="0.5"/>
                    </svg>
                </div>
                <div class="question-content">
                    <div class="question-number" id="questionNumber">Pertanyaan 1 dari 15</div>
                    <h2 class="question-text" id="questionText">Apakah laptop Anda cepat panas dan kipas bersuara keras?</h2>
                    <p class="question-description" id="questionDesc">Pertanyaan ini membantu mengidentifikasi masalah pada sistem pendinginan laptop Anda.</p>
                </div>
            </div>

            <div class="answer-buttons">
                <button class="btn-answer btn-yes" onclick="answerQuestion('ya')">
                    <span style="position: relative; z-index: 1;">Ya</span>
                </button>
                <button class="btn-answer btn-no" onclick="answerQuestion('tidak')">
                    <span style="position: relative; z-index: 1;">Tidak</span>
                </button>
            </div>
        </div>

        <div class="navigation-buttons">
            <button class="btn-nav" id="btnPrev" onclick="prevQuestion()" disabled>
                ← Pertanyaan Sebelumnya
            </button>
            <button class="btn-nav" id="btnSkip" onclick="skipQuestion()">
                Lewati Pertanyaan →
            </button>
        </div>
    </div>

    <script>
        let currentQuestion = 0;
        let answers = [];

        const questions = [
            {
                text: "Apakah laptop Anda cepat panas dan kipas bersuara keras?",
                desc: "Pertanyaan ini membantu mengidentifikasi masalah pada sistem pendinginan laptop Anda.",
                category: "panas"
            },
            {
                text: "Apakah layar laptop Anda tiba-tiba mati atau blank?",
                desc: "Ini untuk mendiagnosa masalah pada display atau koneksi layar laptop.",
                category: "layar"
            },
            {
                text: "Apakah baterai laptop cepat habis meskipun baru dicharge?",
                desc: "Membantu mendeteksi masalah pada kesehatan baterai laptop Anda.",
                category: "baterai"
            },
            {
                text: "Apakah beberapa tombol keyboard tidak berfungsi dengan baik?",
                desc: "Mengidentifikasi masalah hardware atau software pada keyboard.",
                category: "keyboard"
            },
            {
                text: "Apakah laptop terasa sangat lambat saat membuka aplikasi?",
                desc: "Mendiagnosa performa sistem dan kemungkinan bottleneck.",
                category: "kinerja"
            },
            {
                text: "Apakah Wi-Fi laptop sering disconnect sendiri?",
                desc: "Mengecek stabilitas koneksi jaringan wireless laptop.",
                category: "jaringan"
            },
            {
                text: "Apakah muncul blue screen of death (BSOD) secara random?",
                desc: "Mendeteksi masalah kritis pada sistem operasi atau hardware.",
                category: "sistem"
            },
            {
                text: "Apakah touchpad tidak responsif atau bergerak sendiri?",
                desc: "Mengidentifikasi masalah pada touchpad laptop.",
                category: "keyboard"
            },
            {
                text: "Apakah laptop sering restart atau shutdown mendadak?",
                desc: "Mendiagnosa masalah power supply atau overheating.",
                category: "daya"
            },
            {
                text: "Apakah ada program yang terbuka sendiri tanpa Anda jalankan?",
                desc: "Mengidentifikasi kemungkinan adanya malware atau virus.",
                category: "virus"
            },
            {
                text: "Apakah suara speaker laptop pecah atau tidak keluar?",
                desc: "Mendiagnosa masalah pada audio driver atau hardware speaker.",
                category: "audio"
            },
            {
                text: "Apakah laptop tidak mau menyala sama sekali?",
                desc: "Mengecek masalah pada power supply atau motherboard.",
                category: "daya"
            },
            {
                text: "Apakah ada garis-garis atau dead pixel pada layar?",
                desc: "Mendeteksi kerusakan fisik pada panel LCD laptop.",
                category: "layar"
            },
            {
                text: "Apakah charging indicator menyala tapi baterai tidak terisi?",
                desc: "Mengidentifikasi masalah pada port charging atau baterai.",
                category: "baterai"
            },
            {
                text: "Apakah laptop mengeluarkan bunyi beep saat dinyalakan?",
                desc: "Mendiagnosa error hardware melalui POST beep codes.",
                category: "hardware"
            }
        ];

        function updateQuestion() {
            const q = questions[currentQuestion];
            document.getElementById('questionNumber').textContent = `Pertanyaan ${currentQuestion + 1} dari 15`;
            document.getElementById('questionText').textContent = q.text;
            document.getElementById('questionDesc').textContent = q.desc;
            
            // Update progress bar
            const progress = ((currentQuestion + 1) / 15) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
            document.getElementById('progressText').textContent = `${currentQuestion + 1}/15`;
            
            // Update navigation buttons
            document.getElementById('btnPrev').disabled = currentQuestion === 0;
            
            // Update button text on last question
            if (currentQuestion === 14) {
                document.getElementById('btnSkip').textContent = 'Lihat Hasil Diagnosa →';
            } else {
                document.getElementById('btnSkip').textContent = 'Lewati Pertanyaan →';
            }
            
            // Animate card
            const card = document.getElementById('questionCard');
            card.style.animation = 'none';
            setTimeout(() => {
                card.style.animation = 'slideIn 0.6s ease-out';
            }, 10);
        }

        function answerQuestion(answer) {
            answers[currentQuestion] = answer;
            
            if (currentQuestion < 14) {
                currentQuestion++;
                updateQuestion();
            } else {
                showResults();
            }
        }

        function skipQuestion() {
            if (currentQuestion < 14) {
                answers[currentQuestion] = 'skip';
                currentQuestion++;
                updateQuestion();
            } else {
                showResults();
            }
        }

        function prevQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                updateQuestion();
            }
        }

        function showResults() {
            // Simpan jawaban ke localStorage
            localStorage.setItem('diagnosticAnswers', JSON.stringify(answers));
            
            // Hitung statistik
            const yesCount = answers.filter(a => a === 'ya').length;
            const noCount = answers.filter(a => a === 'tidak').length;
            const skipCount = answers.filter(a => a === 'skip').length;
            
            // Simpan statistik
            localStorage.setItem('diagnosticStats', JSON.stringify({
                yes: yesCount,
                no: noCount,
                skip: skipCount
            }));
            
            // Redirect ke halaman hasil diagnosa
            window.location.href = 'hasildiagnosa.php';
        }

        // Initialize
        updateQuestion();
    </script>
</body>
</html>