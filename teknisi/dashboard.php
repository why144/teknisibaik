<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['login'])) {
	header("Location: loginteknisi.php");
	exit;

}


// mengambil nama dari user
$user = $_SESSION['userteknisi'];

// untuk set waktu lokal
date_default_timezone_set('Asia/Jakarta');
$waktu = date('d-m-Y H:i:s');

// menghubungkan ke halaman function
require '../function.php';

// query ambil order dimanana statusnya belum completed
$perbaikan = query("SELECT * FROM orderperbaikan WHERE status != 'Completed' ORDER BY id DESC ")

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

    <title>Dashboard Teknisi</title>
  </head>
  <body>

    <!-- navbar -->
        
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../index.html">Teknisi Baik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="order.php">Order Anda</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#"><?= $user; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->


    <!-- card history -->
    
    <section class="history mt-5 pt-5">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-11">
            <p>Terakhir Update : <?= $waktu ?></p>
          </div>
          <div class="col-md-1">
            <a href="refresh.php" class="btn btn-primary">Refresh</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php $i=1; ?>
            <?php foreach($perbaikan as $data) : ?>
            <div class="card mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-10">
                    <h5><?= $i; ?>. Layanan Perbaikan <?= $data["layananperbaikan"]; ?></h5>
                     <p>Merk : <?= $data["merk"]; ?></p>
                  </div>
                  <div class="col-md-2">
                    <p><?= $data["tanggal"]; ?> <?= $data["waktu"]; ?></p>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    <table border="0" cellspacing="" cellpadding="5">
                      <tr>
                        <td>Jenis Perbaikan </td>
                        <td>: <?= $data['jenisperbaikan']; ?></td>
                      </tr>
                      <tr>
                        <td>Status </td>
                        <td>: <?= $data['status']; ?></td>
                      </tr>
                      <tr>
                        <td>Teknisi </td>
                        <td>: <?= $data['teknisi']; ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-2">
                     <a href="ambilorder.php?id=<?= $data["id"]; ?>" class="btn btn-success" onclick="return confirm('Anda yakin?')">Ambil Order</a> 
                     <p class="text-danger">*Pastikan untuk menghubungi pelanggan terlebih dahulu sebelum ambil order</p>
                  </div>
                </div>
                
                <hr>
                <h5 class="card-title">Identitas Pelanggan</h5>
                <table border="0" cellspacing="" cellpadding="5">
                  <tr>
                    <td>Atas Nama </td>
                    <td>: <?= $data["nama"]; ?></td>
                  </tr>
                  <tr>
                    <td>No. Hp </td>
                    <td>: <?= $data["hp"]; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat </td>
                    <td>: <?= $data["alamat"]; ?></td>
                  </tr>
                </table>
              </div>
            </div>
             <?php $i++; ?>
             <?php endforeach; ?>
          </div>  
        </div>
      </div>
     
    </section>

    <!-- akhir card history -->
   
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>