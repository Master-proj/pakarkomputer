
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
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <title>Fix.CO</title>
    <style>
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="container">
        <a href="" class="logo">PACCOM</a>
        <ul class="menu">
          <li><a href="#home">Home</a></li>
          <li><a href="#alurkerja">Alur Kerja</a></li>
        </ul>
        <div class="tombol">
          &#9776;
        </div> 
      </div>
    </nav>
    <!-- Hero Section -->
    <section id="home" class="heroBWA mt-5">
      <div class="container">
        <div class="row">
          <div class="col align-self-center">
            <h1 class="mb-5">Cek Komputer Yuk!</h1>
            <p class="mb-4">
              Merupakan sistem informasi berbasis Web Based yang memanfaatkan teknologi Sistem Pakar di dalamnya. Dengan menggunakan sistem pakar ini, pengguna dapat mengenali atau memeriksakan keluhan terhadap komputernya hanya dengan menjawab pertanyaan yang diberikan oleh sistem. Setelah itu, pengguna dapat melihat hasil diagnosa dengan representasi persentase kemungkinan kerusakan serta rekomendasi solusi yang dapat dilakukan.
            </p>
            <!-- tag button --> 
            <a href="masalahumum.php" class="button-17" >Coba Sekarang</a>
          </div>
          <div class="col d-none d-sm-block">
            <img width="500" src="gambar\msl_khusus.png" alt="hero" />
          </div>
        </div>
      </div>
    </section>

    <section id="alurkerja" style="margin-bottom: 50px;">
      <!--Content2-->
      <h2 style="font-weight: bold;text-align: center;">Alur Kerja Sistem Pakar Servis Komputer!</h2>
      <div id="konten2" class="container konten">
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
            <img src="gambar\herobaru.png" class="card-img-top" alt="...">
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
    <footer class="bg-dark text-white text-center text-lg-start mt-5">
      <div class="container p-4">
        <div class="row">
          <!-- Kolom 1 -->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">About Me</h5>
            <p>
              Cek Laptop adalah sistem pakar untuk mendiagnosis masalah komputer dengan cepat dan akurat.
            </p>
          </div>

          <!-- Kolom 2 -->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Contact</h5>
            <ul class="list-unstyled mb-0">
              <li><i class="fas fa-map-marker-alt me-2"></i> Semarang, Indonesia</li>
              <li><i class="fas fa-envelope me-2"></i> support@ceklaptop.com</li>
              <li><i class="fas fa-phone me-2"></i> +62 812 3456 7890</li>
            </ul>
          </div>

          <!-- Kolom 3 -->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Follow Me</h5>
            <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
          </div>
        </div>
      </div>
      <!-- Garis pemisah -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2025 CekLaptop. All Rights Reserved.
      </div>
    </footer>

    <!-- Tambahkan link Bootstrap & Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
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
