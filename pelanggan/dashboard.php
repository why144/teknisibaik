<?php

// CEK SESSION APAKAH SUDAH LOGIN ATAU BELUM
session_start();
if (!isset($_SESSION['loginpelanggan'])) {
	header("Location: loginpelanggan.php");
	exit;

}

// MENGAMBIL NAMA DARI USER
$user = $_SESSION['userpelanggan'];



?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css costum -->
    <link rel="stylesheet" href="../style.css" />

    <title>Dashboard Pelanggan</title>
  </head>
  <body>
    <!-- navbar -->
        
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="history.php">History</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href=""><?= $user; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Menu Pelanggan -->

    <section class="mt-5 pt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2>Pilih Jenis Perbaikan</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="card-title">Perbaikan Electronic</h5>
              </div>
              <div class="card-body text-center">
                <div class="row">
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Mesin Cuci" ?>"><img src="../img/mesincuci.png"></a>
                    <p class="mt-2">Mesin Cuci</p>
                  </div>
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Computer" ?>"><img src="../img/computer.png"></a>
                    <p class="mt-2">Computer</p>
                  </div>
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "AC" ?>"><img src="../img/pendingin.png"></a>
                    <p class="mt-2">AC</p>
                  </div>
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Kulkas" ?>"><img src="../img/kulkas.png"></a>
                    <p class="mt-2">Kulkas</p>
                  </div>
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Printer" ?>"><img src="../img/printer.png"></a>
                    <p class="mt-2">Printer</p>
                  </div>
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "TV" ?>"><img src="../img/tv.png"></a>
                    <p class="mt-2">TV</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="card-title">Perbaikan Kendaraan</h5>
              </div>
              <div class="card-body text-center">
                <div class="row">
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Mobil" ?>"><img src="../img/mobil.png"></a>
                    <p class="mt-2">Mobil</p>
                  </div>
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Motor" ?>"><img src="../img/sepedamotor.png"></a>
                    <p class="mt-2">Sepeda Motor</p>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Perbaikan Listrik</h5>
              </div>
              <div class="card-body text-center">
                <div class="row">
                  <div class="col-md-3">
                    <a href="order.php?layanan=<?= "Listrik" ?>"><img src="../img/listrik.png"></a>
                    <p class="mt-2">Listrik</p>     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- akhir menu pelanggan-->
   
   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>