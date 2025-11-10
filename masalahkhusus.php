<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
    crossorigin="anonymous"
  />
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=swap"
    rel="stylesheet"
  />
  <title>Fix.CO - Masalah Khusus</title>

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #f8faff 0%, #eef3ff 100%);
      color: #333;
      overflow-x: hidden;
    }

    .test {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .question-container {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      padding: 50px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 90%;
      max-width: 1100px;
    }

    .question-box {
      flex: 1;
      padding-right: 40px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-radius: 15px;
      padding: 30px;
      animation: fadeInLeft 0.8s ease forwards;
    }

    .question-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 123, 255, 0.15);
      background-color: #f9fbff;
    }

    .question-box h2 {
      font-weight: 700;
      color: #222;
      margin-bottom: 25px;
      font-size: 1.8rem;
    }

    .btn {
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      font-size: 1.05rem;
      padding: 10px 30px;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
    }

    .btn-danger:hover {
      background-color: #a71d2a;
      transform: scale(1.05);
    }

    .image-box {
      flex: 1;
      text-align: right;
    }

    .image-box img {
      width: 430px;
      max-width: 100%;
      border-radius: 10px;
    }

    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-40px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @media (max-width: 992px) {
      .question-container {
        flex-direction: column;
        text-align: center;
        padding: 40px 25px;
      }
      .question-box {
        padding-right: 0;
      }
      .image-box {
        text-align: center;
        margin-top: 30px;
      }
    }
  </style>
</head>

<body>
  <!-- MAIN CONTENT -->
  <section class="test">
    <div class="question-container">
      <!-- Kiri -->
      <div class="question-box">
        <h2>Apakah laptop Anda cepat panas dan kipas bersuara keras?</h2>
        <form action="" method="post" enctype="multipart/form-data" role="form">
          <input type="submit" class="btn btn-primary mr-3" name="ya" value="Ya" formaction="analisis.php">
          <input type="submit" class="btn btn-danger" name="tidak" value="Tidak">
        </form>
      </div>

      <!-- Kanan -->
      <div class="image-box">
        <img src="gambar/alldesain.png" alt="Ilustrasi visual" />
      </div>
    </div>
  </section>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
