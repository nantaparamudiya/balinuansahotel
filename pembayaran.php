<?php
session_start();

// Koneksi ke database
include 'koneksi.php';

// Jika tidak ada session tamu (belum login)
if(!isset($_SESSION['tamu']) OR empty($_SESSION['tamu'])){
  echo "<script>alert('Silahkan login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}

// Mendapatkan id_pemesanan dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan='$idpem'");
$detpem = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";

// Mendapatkan id_tamu yg pesan
$id_tamu_pesan = $detpem['id_tamu'];
// Mendapatkan id_tamu yg login
$id_tamu_login = $_SESSION['tamu']['id_tamu'];

if($id_tamu_pesan != $id_tamu_login){
  echo "<script>alert('Akses ditolak!');</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bali Nuansa Hotel</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <link rel="stylesheet" href="homestyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Bali Nuansa Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pemesanan.php">Pemesanan</a>
        </li>
        <?php if (isset($_SESSION["tamu"])): ?>
        <li class="nav-item">
          <a class="nav-link" href="riwayat.php">Riwayat Pemesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar.php">Daftar</a>
        </li>
        <?php endif ?>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php">Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="discovery.php">Discovery</a>
        </li>
      </ul>
      <form action="pencarian.php" method="get" class="navbar-form navbar-right">
          <input type="text" class="form-control" name="keyword">
          <button class="btn btn-primary">Cari</button>
        </form>
    </div>
  </div>
</nav>

<section class="content">
  <div class="container-fluid" style="margin-top: 100px;">
    <h3>Konfirmasi Pembayaran</h3>
    <p>Kirim bukti pembayaran anda disini</p>
    <div class="row">
      <div class="col-md-8">
        <div class="alert alert-info">total tagihan kamar anda <strong>IDR. <?= number_format($detpem['total_pembayaran']); ?>,-</strong></div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama Penyetor</label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="form-group">
            <label for="">Bank</label>
            <input type="text" class="form-control" name="bank">
          </div>
          <div class="form-group">
            <label for="">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" min="1">
          </div>
          <div class="form-group">
            <label for="">Foto Bukti</label>
            <input type="file" class="form-control" name="bukti">
            <p class="text-danger">foto bukti harus JPG maksimal 2 MB</p>
          </div>
          <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>

        <?php
        // Jika tombol kirim di pencet
        if(isset($_POST['kirim'])){
          // Upload dulu foto bukti
          $namabukti = $_FILES['bukti']['name'];
          $lokasibukti = $_FILES['bukti']['tmp_name'];
          $namafiks = date('YmdHis').$namabukti;
          move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

          $nama = $_POST['nama'];
          $bank = $_POST['bank'];
          $jumlah = $_POST['jumlah'];
          $tanggal = date('Y-m-d');

          // Insert ke tabel pembayaran
          $koneksi->query("INSERT INTO pembayaran(id_pemesanan, nama, bank, jumlah, tanggal, bukti) VALUES('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

          // Update data pemesanan dari pending menjadi sudah kirim pembayaran
          $koneksi->query("UPDATE pemesanan SET status_pemesanan='sudah kirim pembayaran' WHERE id_pemesanan='$idpem'");

          echo "<script>alert('Terima kasih sudah melakukan pembayaran');</script>";
          echo "<script>location='riwayat.php';</script>";
        }
        ?>

      </div>
    </div>
  </div>
</section>
  
</body>
</html>

