<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"/>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link rel="stylesheet" href="custom.css" />
    <title>Pilih Masalah Umum</title>
</head>
<body>

  <section id="alur" style="margin-bottom: 80px;">
    <div class="container mt-5">
      <h2 style="font-weight: bold; text-align: center;">Pilih Masalah Umum</h2>
      <div class="row justify-content-center g-3">

        <!-- Card 1 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Baterai dan Daya</h5>
                <img src="gambar/baterai.png" class="card-img-top" alt="Card 1">
                <p class="card-text px-3 pb-3">
                  Masalah ini berkaitan dengan laptop yang tidak bisa diisi dayanya, cepat habis, atau tiba-tiba mati saat digunakan.
                </p>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 2 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Layar/LCD</h5>
                <img src="gambar/lcd.png" class="card-img-top" alt="Card 2">
                <p class="card-text px-3 pb-3">
                  Berhubungan dengan tampilan layar seperti tidak muncul gambar, layar hitam, bergaris, glitch, atau bluescreen.
                </p>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 3 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Keyboard & Touchpad</h5>
                <img src="gambar/keyboard.png" class="card-img-top" alt="Card 3">
                <p class="card-text px-3 pb-3">
                  Masalah pada tombol yang tidak berfungsi, mengetik sendiri, atau touchpad tidak bisa digerakkan atau tidak responsif.
                </p>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 4 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Panas dan Kipas</h5>
                <img src="gambar/kipas.png" class="card-img-top" alt="Card 4">
                <p class="card-text px-3 pb-3">
                  Masalah ini muncul ketika laptop cepat panas, kipas berbunyi keras, atau suhu meningkat meski baru digunakan sebentar.
                </p>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 5 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Jaringan (Wi-Fi/Bluetooth)</h5>
                <img src="gambar/jaringan.png" class="card-img-top" alt="Card 5">
                <p class="card-text px-3 pb-3">
                  Terkait koneksi internet yang hilang, Wi-Fi tidak bisa tersambung, atau Bluetooth tidak berfungsi.
                </p>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 6 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Kinerja Laptop</h5>
                <img src="gambar/kinerja.png" class="card-img-top" alt="Card 6">
                <p class="card-text px-3 pb-3">
                  Terjadi saat laptop terasa sangat lambat, sering macet, atau program membutuhkan waktu lama untuk terbuka.
                </p>
              </div>
            </div>
          </a>
        </div>

        <!-- Card 7 -->
        <div class="col-auto">
          <a href="masalahkhusus.php" class="text-decoration-none text-dark">
            <div class="card custom-card shadow-sm text-center">
              <div class="card-body p-0">
                <h5 class="card-title fw-bold">Virus dan Keamanan</h5>
                <img src="gambar/virus.png" class="card-img-top" alt="Card 7">
                <p class="card-text px-3 pb-3">
                  Terjadi saat laptop terkena virus, muncul iklan aneh, file hilang, atau sistem bekerja tidak normal.
                </p>
              </div>
            </div>
          </a>
        </div>

      </div>
    </div>

    <!-- CSS -->
    <style>
      .container {
        max-width: 1100px;
      }

      .custom-card {
        width: 270px;
        height: 330px;
        border-radius: 20px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        margin: 5px;
      }

      a .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      }

      .card-title {
        margin-bottom: 10px;
        color: #000;
      }

      .custom-card img {
        object-fit: cover;
        height: 150px;
        width: 100%;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
      }

      .card-text {
        font-size: 0.95rem;
      }

      .row {
        justify-content: center;
        gap: 15px;
      }

      @media (max-width: 992px) {
        .custom-card {
          width: 230px;
          height: 280px;
        }
      }

      @media (max-width: 768px) {
        .custom-card {
          width: 100%;
          max-width: 300px;
        }
      }
    </style>
  </section>

  <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
  ></script>
</body>
</html>
