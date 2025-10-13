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
    <link rel="stylesheet" href="custom.css" />
    <title>Document</title>
</head>
<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <h2>Pakar COM</h2>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item align-self-center active">
              <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item align-self-center active">
              <a class="nav-link"  href="index.php#alur">Alur Kerja <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<body>
    <!-- Content2 -->
<div class="container mt-5">
<h2 style="font-weight: bold;text-align: center;">Masalah Umum</h2>
  <div class="row justify-content-center g-3">

    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold ">Baterai dan Daya</h5>
          <img src="gambar/baterai.png" class="card-img-top" alt="Card 1">
          <p class="card-text px-3 pb-3">Masalah ini berkaitan dengan laptop yang tidak bisa diisi dayanya, cepat habis, atau tiba-tiba mati saat digunakan.</p>
        </div>
      </div>
    </div>

    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold">Layar/LCD</h5>
          <img src="gambar/lcd.png" class="card-img-top" alt="Card 2">
          <p class="card-text px-3 pb-3">Berhubungan dengan tampilan layar seperti tidak muncul gambar, layar hitam, bergaris, glitch, atau bluescreen.</p>
        </div>
      </div>
    </div>

    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold ">Keyboard & Touchpad</h5>
          <img src="gambar/keyboard.png" class="card-img-top" alt="Card 3">
          <p class="card-text px-3 pb-3">Masalah pada tombol yang tidak berfungsi, mengetik sendiri, atau touchpad tidak bisa digerakkan atau tidak responsif.</p>
        </div>
      </div>
    </div>

    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold ">Panas dan Kipas</h5>
          <img src="gambar/kipas.png" class="card-img-top" alt="Card 4">
          <p class="card-text px-3 pb-3">"Masalah ini muncul ketika laptop cepat panas, kipas berbunyi keras, atau suhu meningkat meski baru digunakan sebentar.</p>
</p>
        </div>
      </div>
    </div>

    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold ">jaringan (Wi-Fi/Bluetooth)</h5>
          <img src="gambar/jaringan.png" class="card-img-top" alt="Card 6">
          <p class="card-text px-3 pb-3">Terkait koneksi internet yang hilang, Wi-Fi tidak bisa tersambung, atau Bluetooth tidak berfungsi.</p>
        </div>
      </div>
    </div>

    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold ">kinerja Laptop</h5>
          <img src="gambar/kinerja.png" class="card-img-top" alt="Card 6">
          <p class="card-text px-3 pb-3">Terjadi saat laptop terasa sangat lambat, sering macet, atau program membutuhkan waktu lama untuk terbuka.</p>
        </div>
      </div>
    </div>
    <div class="col-auto">
      <div class="card custom-card shadow-sm text-center">
        <div class="card-body p-0">
          <h5 class="card-title fw-bold ">Virus dan Keamanan</h5>
          <img src="gambar/virus.png" class="card-img-top" alt="Card 6">
          <p class="card-text px-3 pb-3">Terjadi saat laptop terkena virus, muncul iklan aneh, file hilang, atau sistem bekerja tidak normal.</p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- CSS -->
<style>
  .container {
    max-width: 1500px;
  }

  .custom-card {
    width: 270px;
    height: 330px;
    border-radius: 18px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    margin: 5px;
  }

  .custom-card:hover {
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





</body>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
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
</html>