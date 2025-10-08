
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"/>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap"
      rel="stylesheet"/>
    <link rel="stylesheet" href="custom.css" />
    <title>Fix.CO</title>
    <style>
    </style>
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
              <a class="nav-link"  href="#alur">Alur Kerja <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="heroBWA mt-5">
      <div class="container">
        <div class="row">
          <div class="col align-self-center">
            <h1 class="mb-4">Cek Komputer Yuk!</h1>
            <p class="mb-4">
              Cek Komputer Yuk! merupakan sistem informasi berbasis Web Based yang memanfaatkan teknologi Sistem Pakar di dalamnya. Dengan menggunakan sistem pakar ini, pengguna dapat mengenali atau memeriksakan keluhan terhadap komputernya hanya dengan menjawab pertanyaan yang diberikan oleh sistem. Setelah itu, pengguna dapat melihat hasil diagnosa dengan representasi persentase kemungkinan kerusakan serta rekomendasi solusi yang dapat dilakukan.
            </p>
            <a class="btn btn-primary" href="register.php" role="button">Ayo Mulai!</a>
          </div>
          <div class="col d-none d-sm-block">
            <img width="500" src="gambar\msl_khusus.png" alt="hero" />
          </div>
        </div>
      </div>
    </section>

    <section id="alur">
      <!--Content2-->
      <div id="konten2" class="container konten">
        <h2 style="font-weight: bold;text-align: center;">Alur Kerja Sistem Pakar Servis Komputer!</h2>
        <div class="card-deck">
          <div class="card">
            <h5 class="card-title">Memilih Masalah Umum</h5>
            <img src="gambar\msl_umum.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                Pada tahap ini, pengguna diminta untuk memilih kategori permasalahan yang umumnya terjadi pada komputer, seperti kerusakan pada keyboard, layar, touchpad, dan komponen lainnya. Tahapan ini berfungsi untuk mengidentifikasi area permasalahan yang akan dianalisis oleh sistem.
              </p>
            </div>
          </div>
          <div class="card">
            <h5 class="card-title">Memilih masalah khusus</h5>
            <img src="gambar\msl_khusus.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                Setelah menentukan masalah umum, pengguna akan diarahkan untuk memilih permasalahan yang lebih spesifik sesuai dengan gejala atau kerusakan yang dialami. Proses ini bertujuan untuk mempersempit cakupan analisis sehingga sistem dapat memberikan hasil yang lebih akurat dan relevan.
              </p>
            </div>
          </div>
          <div class="card">
            <h5 class="card-title">Hasil dan Solusi</h5>
            <img src="gambar\solusi.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                Berdasarkan data pilihan pengguna pada tahap sebelumnya, sistem akan menghasilkan analisis berupa kemungkinan penyebab kerusakan beserta rekomendasi solusi atau langkah perbaikan yang dapat dilakukan untuk mengatasi permasalahan tersebut.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
<footer class="text-center text-lg-start text-dark" style="background-color: #f2f2f2; font-family: 'Poppins', sans-serif;">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div class="me-5 d-none d-lg-block">
      <span>Terhubung dengan kami di media sosial:</span>
    </div>

    <div>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="#" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
    </div>
  </section>

  <section>
    <div class="container text-center text-md-start mt-4">
      <div class="row mt-3">
        <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-3">Sistem Pakar Servis Komputer</h6>
          <p>
            Aplikasi berbasis web yang membantu pengguna menganalisis permasalahan komputer secara cepat dan akurat melalui sistem pakar.
          </p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-3">Navigasi</h6>
          <p><a href="index.php" class="text-reset">Home</a></p>
          <p><a href="#alur" class="text-reset">Alur Kerja</a></p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-3">Kontak</h6>
          <p><i class="fas fa-home me-3"></i> Jakarta, Indonesia</p>
          <p><i class="fas fa-envelope me-3"></i> info@serviskomputer.com</p>
          <p><i class="fas fa-phone me-3"></i> +62 812 3456 7890</p>
        </div>
      </div>
    </div>
  </section>

  <div class="text-center p-3" style="background-color: #e0e0e0;">
    © 2025 Sistem Pakar Servis Komputer. All rights reserved.
  </div>
</footer>

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
