<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Analisis - PACCOM</title>
    <link rel="stylesheet" href="hasil2.css" />
    <!-- Library html2pdf.js untuk cetak PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1 class="title">Hasil Analisis Kerusakan Komputer</h1>

      <div id="hasil-area" class="content-wrapper">
        <!-- Kolom Kiri - Semua Card -->
        <div class="card-container">
          <div class="card">
            <h3>Permasalahan yang Dialami</h3>
            <p>Laptop cepat panas dan kipas bersuara keras</p>
          </div>

          <div class="card">
            <h3>Analisis Kerusakan</h3>
            <p>
              Berdasarkan gejala tersebut, sistem mendeteksi kemungkinan adanya penumpukan debu pada sistem pendingin,
              pasta termal yang sudah kering, atau beban kerja CPU/GPU yang terlalu tinggi.
              Kipas yang bersuara keras menandakan kipas bekerja ekstra untuk menurunkan suhu.
            </p>
          </div>

          <div class="card">
            <h3>Saran Perbaikan</h3>
            <p>
              Bersihkan ventilasi dan kipas dari debu menggunakan kompresor udara atau jasa servis profesional.
              Ganti pasta termal pada prosesor jika sudah lama tidak dilakukan.
              Hindari menutup ventilasi udara saat laptop digunakan dan gunakan cooling pad untuk membantu menjaga suhu tetap stabil.
            </p>
          </div>
        </div>

        <!-- Kolom Kanan - Gambar -->
        <div class="image-container">
          <img src="gambar/solusi.png" alt="Ilustrasi Komputer" />
        </div>
      </div>

      <div class="text-center">
        <a href="index.php" class="btn-home">Kembali ke Home</a>
        <button id="btn-pdf" class="btn-pdf">Cetak ke PDF</button>
      </div>
    </div>

    <script>
      document.getElementById("btn-pdf").addEventListener("click", () => {
        const element = document.getElementById("hasil-area");
        const opt = {
          margin: 0.5,
          filename: "Hasil_Analisis_PACCOM.pdf",
          image: { type: "jpeg", quality: 0.98 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: "in", format: "a4", orientation: "portrait" },
        };
        html2pdf().set(opt).from(element).save();
      });
    </script>
  </body>
</html>
