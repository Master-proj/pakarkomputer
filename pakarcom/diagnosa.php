<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Masalah Umum - Sistem Pakar Komputer</title>
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
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
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
            color: white;
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1em;
        }

        .problem-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .problem-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.8s ease-out backwards;
            user-select: none;
        }

        .problem-card:nth-child(1) { animation-delay: 0.1s; }
        .problem-card:nth-child(2) { animation-delay: 0.2s; }
        .problem-card:nth-child(3) { animation-delay: 0.3s; }
        .problem-card:nth-child(4) { animation-delay: 0.4s; }
        .problem-card:nth-child(5) { animation-delay: 0.5s; }
        .problem-card:nth-child(6) { animation-delay: 0.6s; }
        .problem-card:nth-child(7) { animation-delay: 0.7s; }

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

        .problem-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .problem-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }

        .problem-card.selected {
            border-color: #667eea;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .problem-card.selected::before {
            opacity: 0.05;
        }

        .checkbox-wrapper {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2;
            pointer-events: none;
        }

        .checkbox-custom {
            width: 28px;
            height: 28px;
            border: 3px solid #cbd5e0;
            border-radius: 8px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .problem-card.selected .checkbox-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
        }

        .checkbox-custom::after {
            content: '✓';
            color: white;
            font-size: 18px;
            font-weight: bold;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s ease;
        }

        .problem-card.selected .checkbox-custom::after {
            opacity: 1;
            transform: scale(1);
        }

        .problem-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
            pointer-events: none;
        }

        .problem-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .problem-title {
            font-size: 1.4em;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            text-align: center;
            position: relative;
            z-index: 1;
            pointer-events: none;
        }

        .problem-description {
            color: #4a5568;
            line-height: 1.6;
            text-align: center;
            font-size: 0.95em;
            position: relative;
            z-index: 1;
            pointer-events: none;
        }

        .action-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .selected-count {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 0.95em;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.05em;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        }

        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .problem-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .button-group {
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
            <h1>Pilih Masalah Umum</h1>
            <p>Pilih satu atau lebih masalah yang sedang Anda alami pada komputer</p>
        </div>

        <div class="problem-grid">
            <div class="problem-card" data-problem="baterai" onclick="toggleProblem(this, 'baterai')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Battery illustration -->
                        <rect x="140" y="100" width="80" height="120" rx="8" fill="#4FD1C5" stroke="#2C7A7B" stroke-width="3"/>
                        <rect x="170" y="85" width="20" height="15" rx="3" fill="#4FD1C5" stroke="#2C7A7B" stroke-width="2"/>
                        <path d="M160 130 L200 130 M160 150 L200 150" stroke="#2C7A7B" stroke-width="4" stroke-linecap="round"/>
                        <circle cx="180" cy="175" r="18" fill="#F6AD55" opacity="0.3"/>
                        <path d="M180 160 L180 190 M165 175 L195 175" stroke="#E53E3E" stroke-width="4" stroke-linecap="round"/>
                        <!-- Laptop -->
                        <rect x="60" y="120" width="90" height="60" rx="5" fill="#667eea" stroke="#2C3E50" stroke-width="3"/>
                        <rect x="65" y="125" width="80" height="45" fill="#A0AEC0"/>
                        <path d="M100 145 Q105 155 100 165" stroke="#48BB78" stroke-width="3" fill="none"/>
                        <!-- Decorative circles -->
                        <circle cx="250" cy="80" r="15" fill="#D6BCFA" opacity="0.6"/>
                        <circle cx="280" cy="120" r="20" fill="#F687B3" opacity="0.5"/>
                        <circle cx="90" cy="80" r="12" fill="#9DECF9" opacity="0.6"/>
                    </svg>
                </div>
                <div class="problem-title">Baterai dan Daya</div>
                <div class="problem-description">
                    Masalah ini berkaitan dengan laptop yang tidak bisa diisi dayanya, cepat habis, atau tiba-tiba mati saat digunakan.
                </div>
            </div>

            <div class="problem-card" data-problem="layar" onclick="toggleProblem(this, 'layar')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Monitor/Screen -->
                        <rect x="80" y="60" width="240" height="160" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="90" y="70" width="220" height="130" fill="#4FD1C5"/>
                        <!-- Magnifying glass -->
                        <circle cx="200" cy="130" r="40" fill="none" stroke="#2C3E50" stroke-width="4"/>
                        <line x1="230" y1="160" x2="260" y2="190" stroke="#2C3E50" stroke-width="4" stroke-linecap="round"/>
                        <!-- Glitch effects -->
                        <rect x="110" y="90" width="60" height="8" fill="#F56565" opacity="0.7"/>
                        <rect x="180" y="110" width="80" height="8" fill="#48BB78" opacity="0.7"/>
                        <rect x="130" y="140" width="50" height="8" fill="#ED64A6" opacity="0.7"/>
                        <!-- Decorative elements -->
                        <circle cx="300" cy="100" r="18" fill="#9DECF9" opacity="0.5"/>
                        <circle cx="270" cy="60" r="12" fill="#F687B3" opacity="0.6"/>
                        <circle cx="120" cy="50" r="15" fill="#D6BCFA" opacity="0.5"/>
                    </svg>
                </div>
                <div class="problem-title">Layar/LCD</div>
                <div class="problem-description">
                    Berhubungan dengan tampilan layar seperti tidak muncul gambar, layar hitam, bergaris, glitch, atau bluescreen.
                </div>
            </div>

            <div class="problem-card" data-problem="keyboard" onclick="toggleProblem(this, 'keyboard')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Laptop with keyboard -->
                        <rect x="70" y="80" width="260" height="140" rx="12" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="80" y="90" width="240" height="100" fill="#4FD1C5"/>
                        <!-- Keyboard keys -->
                        <rect x="100" y="110" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="125" y="110" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="150" y="110" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="175" y="110" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="100" y="135" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="125" y="135" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="150" y="135" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <rect x="175" y="135" width="18" height="18" rx="3" fill="#2C3E50"/>
                        <!-- Hand pointer -->
                        <ellipse cx="280" cy="150" rx="25" ry="30" fill="#FBBF24" opacity="0.8"/>
                        <path d="M280 140 L280 165" stroke="#F59E0B" stroke-width="3" stroke-linecap="round"/>
                        <!-- Decorative circles -->
                        <circle cx="320" cy="100" r="15" fill="#F687B3" opacity="0.5"/>
                        <circle cx="290" cy="60" r="18" fill="#9DECF9" opacity="0.6"/>
                        <circle cx="90" cy="60" r="12" fill="#D6BCFA" opacity="0.5"/>
                    </svg>
                </div>
                <div class="problem-title">Keyboard & Touchpad</div>
                <div class="problem-description">
                    Masalah pada tombol yang tidak berfungsi, mengetik sendiri, atau touchpad tidak bisa digerakkan atau tidak responsif.
                </div>
            </div>

            <div class="problem-card" data-problem="panas" onclick="toggleProblem(this, 'panas')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Hot laptop -->
                        <rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/>
                        <!-- Heat waves -->
                        <path d="M120 80 Q125 65 130 80 T140 80" stroke="#F56565" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <path d="M160 70 Q165 55 170 70 T180 70" stroke="#FC8181" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <path d="M200 75 Q205 60 210 75 T220 75" stroke="#F56565" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <path d="M240 80 Q245 65 250 80 T260 80" stroke="#FC8181" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <!-- Thermometer -->
                        <rect x="300" y="100" width="20" height="80" rx="10" fill="#FEB2B2" stroke="#C53030" stroke-width="3"/>
                        <circle cx="310" cy="190" r="15" fill="#F56565" stroke="#C53030" stroke-width="3"/>
                        <rect x="305" y="120" width="10" height="60" fill="#E53E3E"/>
                        <!-- Fan icon -->
                        <circle cx="190" cy="165" r="30" fill="none" stroke="#2C3E50" stroke-width="3"/>
                        <path d="M190 145 L190 185 M170 165 L210 165" stroke="#2C3E50" stroke-width="3"/>
                        <!-- Decorative -->
                        <circle cx="330" cy="80" r="12" fill="#FED7D7" opacity="0.6"/>
                        <circle cx="70" cy="100" r="15" fill="#F687B3" opacity="0.5"/>
                    </svg>
                </div>
                <div class="problem-title">Panas dan Kipas</div>
                <div class="problem-description">
                    Masalah ini muncul ketika laptop cepat panas, kipas berbunyi keras, atau suhu meningkat meski baru digunakan sebentar.
                </div>
            </div>

            <div class="problem-card" data-problem="jaringan" onclick="toggleProblem(this, 'jaringan')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Laptop -->
                        <rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/>
                        <!-- WiFi signal waves -->
                        <path d="M200 90 Q180 70 160 90" stroke="#48BB78" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <path d="M200 90 Q215 75 230 90" stroke="#48BB78" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <path d="M200 100 Q185 85 170 100" stroke="#68D391" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <path d="M200 100 Q210 90 220 100" stroke="#68D391" stroke-width="5" fill="none" stroke-linecap="round"/>
                        <!-- X mark over signal -->
                        <line x1="175" y1="65" x2="215" y2="105" stroke="#F56565" stroke-width="6" stroke-linecap="round"/>
                        <line x1="215" y1="65" x2="175" y2="105" stroke="#F56565" stroke-width="6" stroke-linecap="round"/>
                        <!-- Bluetooth icon -->
                        <path d="M280 150 L280 180 L300 165 L280 150 L280 180 L300 195 L280 180" stroke="#4299E1" stroke-width="4" fill="none" stroke-linejoin="round"/>
                        <!-- Decorative -->
                        <circle cx="320" cy="100" r="15" fill="#9DECF9" opacity="0.6"/>
                        <circle cx="60" cy="140" r="12" fill="#D6BCFA" opacity="0.5"/>
                    </svg>
                </div>
                <div class="problem-title">Jaringan (Wi-Fi/Bluetooth)</div>
                <div class="problem-description">
                    Terkait koneksi internet yang hilang, Wi-Fi tidak bisa tersambung, atau Bluetooth tidak berfungsi.
                </div>
            </div>

            <div class="problem-card" data-problem="kinerja" onclick="toggleProblem(this, 'kinerja')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Laptop -->
                        <rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/>
                        <!-- Performance chart -->
                        <polyline points="110,180 130,170 150,160 170,155 190,150" stroke="#48BB78" stroke-width="4" fill="none" stroke-linecap="round"/>
                        <!-- Arrow up -->
                        <path d="M250 90 L280 60 L310 90" stroke="#38B2AC" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="280" y1="60" x2="280" y2="130" stroke="#38B2AC" stroke-width="6" stroke-linecap="round"/>
                        <!-- Loading/processing circles -->
                        <circle cx="200" cy="165" r="8" fill="#805AD5" opacity="0.6"/>
                        <circle cx="220" cy="165" r="8" fill="#805AD5" opacity="0.4"/>
                        <circle cx="240" cy="165" r="8" fill="#805AD5" opacity="0.2"/>
                        <!-- Decorative -->
                        <circle cx="320" cy="110" r="12" fill="#F687B3" opacity="0.5"/>
                        <circle cx="70" cy="100" r="15" fill="#9DECF9" opacity="0.6"/>
                        <circle cx="300" cy="180" r="10" fill="#D6BCFA" opacity="0.5"/>
                    </svg>
                </div>
                <div class="problem-title">Kinerja Laptop</div>
                <div class="problem-description">
                    Terjadi saat laptop terasa sangat lambat, sering macet, atau program membutuhkan waktu lama untuk terbuka.
                </div>
            </div>

            <div class="problem-card" data-problem="virus" onclick="toggleProblem(this, 'virus')">
                <div class="checkbox-wrapper">
                    <div class="checkbox-custom"></div>
                </div>
                <div class="problem-icon">
                    <svg viewBox="0 0 400 300" style="width: 100%; height: 100%;">
                        <!-- Laptop -->
                        <rect x="80" y="120" width="240" height="100" rx="8" fill="#667eea" stroke="#2C3E50" stroke-width="4"/>
                        <rect x="90" y="130" width="220" height="70" fill="#4FD1C5"/>
                        <!-- Virus/Bug icon -->
                        <ellipse cx="200" cy="165" rx="35" ry="30" fill="#F56565" opacity="0.3"/>
                        <circle cx="200" cy="165" r="25" fill="#E53E3E"/>
                        <circle cx="193" cy="160" r="5" fill="#2D3748"/>
                        <circle cx="207" cy="160" r="5" fill="#2D3748"/>
                        <path d="M195 172 Q200 177 205 172" stroke="#2D3748" stroke-width="2" fill="none"/>
                        <!-- Bug legs -->
                        <line x1="175" y1="155" x2="160" y2="145" stroke="#C53030" stroke-width="3"/>
                        <line x1="175" y1="165" x2="160" y2="165" stroke="#C53030" stroke-width="3"/>
                        <line x1="175" y1="175" x2="160" y2="185" stroke="#C53030" stroke-width="3"/>
                        <line x1="225" y1="155" x2="240" y2="145" stroke="#C53030" stroke-width="3"/>
                        <line x1="225" y1="165" x2="240" y2="165" stroke="#C53030" stroke-width="3"/>
                        <line x1="225" y1="175" x2="240" y2="185" stroke="#C53030" stroke-width="3"/>
                        <!-- Shield with X -->
                        <path d="M280 80 L280 110 Q280 120 270 125 L260 130 L270 125 Q280 120 280 110 Z" fill="#48BB78" opacity="0.3"/>
                        <path d="M280 80 L290 85 L300 80 L300 105 Q300 115 290 120 L280 125 L280 80" fill="#48BB78" stroke="#2F855A" stroke-width="2"/>
                        <line x1="285" y1="95" x2="295" y2="110" stroke="#E53E3E" stroke-width="3" stroke-linecap="round"/>
                        <line x1="295" y1="95" x2="285" y2="110" stroke="#E53E3E" stroke-width="3" stroke-linecap="round"/>
                        <!-- Decorative -->
                        <circle cx="320" cy="140" r="12" fill="#FED7D7" opacity="0.6"/>
                        <circle cx="70" cy="100" r="15" fill="#F687B3" opacity="0.5"/>
                    </svg>
                </div>
                <div class="problem-title">Virus dan Keamanan</div>
                <div class="problem-description">
                    Masalah terkait dengan laptop yang terinfeksi virus, malware, atau mengalami perilaku aneh yang mencurigakan.
                </div>
            </div>
        </div>

        <div class="action-section">
            <div class="selected-count" id="selectedCount">0 Masalah Dipilih</div>
            <div class="button-group">
                <button class="btn btn-secondary" onclick="resetSelection()">Reset Pilihan</button>
                <button class="btn btn-primary" id="btnNext" onclick="submitProblems()" disabled>Lanjutkan Diagnosa</button>
            </div>
        </div>
    </div>

    <script>
        let selectedProblems = [];

        function toggleProblem(card, problemId) {
            card.classList.toggle('selected');
            
            const index = selectedProblems.indexOf(problemId);
            if (index > -1) {
                selectedProblems.splice(index, 1);
            } else {
                selectedProblems.push(problemId);
            }
            
            updateSelectedCount();
        }

        function updateSelectedCount() {
            const count = selectedProblems.length;
            document.getElementById('selectedCount').textContent = `${count} Masalah Dipilih`;
            document.getElementById('btnNext').disabled = count === 0;
        }

        function resetSelection() {
            selectedProblems = [];
            document.querySelectorAll('.problem-card').forEach(card => {
                card.classList.remove('selected');
            });
            updateSelectedCount();
        }

        function submitProblems() {
            if (selectedProblems.length === 0) {
                alert('Silakan pilih minimal satu masalah!');
                return;
            }
            
            // Simpan data ke localStorage
            localStorage.setItem('selectedProblems', JSON.stringify(selectedProblems));
            
            // Redirect ke halaman diagnosa khusus
            window.location.href = 'diagnosakhusus.php';
        }
    </script>
</body>
</html>