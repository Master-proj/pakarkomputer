
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
  </head>
  <body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="gambar\logobaru.png" width="150" alt="logo" />
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
              <a class="nav-link" href="index.php"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item align-self-center active">
              <a class="nav-link"  href="#alur">Alur Kerja <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item ">
              <!-- Button trigger modal -->
              <button type="button" class="btn px-4 btn-secondary ml-5 logintombol" data-toggle="modal" data-target="#exampleModal">Log In</button>
              </button>

              <!-- Login -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                      <form id="login-form" action="function.php?act=login" method="POST" >
                        <div class="form-group">
                          <div id="result"></div>
                            <label for="nama" class="col-form-label">Username :</label>
                              <input type="text" class="form-control" id="nama" name="nama" rows="3" placeholder="Username">
                              <label for="pass" class="col-form-label">Password :</label>
                              <input type="password" class="form-control" id="password" name="password" rows="3" placeholder="Password">
                          </div>
                        <div class="form-row">
                    </div>
                        <div class="modal-footer">
                          <input type="submit" name="login_btn" id="login" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a class="btn px-4 btn-primary ml-2" href="register.php" role="button"
              >Register</a>
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
            <img width="500" src="gambar\herobaru.png" alt="hero" />
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
    </sect>

    <h1>cek</h1>

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
