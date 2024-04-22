<?php
session_start();

// Koneksi ke database
include 'koneksi.php';
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


<section class="konten">
    <div class="container-fluid" style="margin-top: 100px;">
    <!-- nota disini copas saja dari nota yang ada di admin -->
    <h2>Detail Pemesanan</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN tamu ON pemesanan.id_tamu = tamu.id_tamu WHERE pemesanan.id_pemesanan = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

?>


<!-- jika tamu yg pesan tidak sama dengan tamu yg login, mk dilarikan ke riwayat.php 
karena dia tidak berhak melihat nota orang lain -->
<!-- tamu yg pesan harus tamu yg login -->
<?php 
// mendapatkan id_tamu yg pesan 
$idtamuyangpesan = $detail["id_tamu"];

// mendapatkan id_tamu yg login 
$idtamuyanglogin = $_SESSION["tamu"]["id_tamu"];

if($idtamuyangpesan!==$idtamuyanglogin)
{
    echo "<script>alert('Akses ditolak!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>



<div class="row" style="margin-bottom:10px;">
	<div class="col-md-4">
		<h3>Pemesanan</h3>
        <strong>No.Pemesanan: <?php echo $detail['id_pemesanan'] ?></strong><br>
		tanggal : <?= $detail["tanggal_pemesanan"]; ?><br>
		total : Rp.<?= number_format($detail["total_pembayaran"]); ?>,- <br>
	</div>
	<div class="col-md-4">
		<h3>Tamu</h3>
		<strong><?= $detail["nama_tamu"]; ?></strong><br>
		<?= $detail["telepon_tamu"]; ?><br>
		<?= $detail["email_tamu"]; ?>
    </div>
	<div class="col-md-4">
		<h3>Negara</h3>
		<strong><?php echo $detail['nama_daerah'] ?></strong><br>
		Biaya Layanan: IDR. <?= number_format($detail['tarif']); ?>,-<br>
		Alamat: <?php echo $detail['alamat_tamu']; ?>
    </div>
    </div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>jenis kamar</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr> 
    </thead>
    <tbody>

    <?php $no=1; ?>
        <!-- menggabungkan (join) tabel kamar dengan tabel pemesanan_produk -->
        <?php $ambil = $koneksi->query("SELECT * FROM pemesanan_kamar JOIN kamar ON pemesanan_kamar.id_kamar = kamar.id_kamar WHERE pemesanan_kamar.id_pemesanan = '$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()): ?>
        <tr>
            <td><?= $no; ?>.</td>
            <td><?= $pecah["jenis_kamar"]; ?></td>
            <td>IDR. <?= number_format($pecah["harga_kamar"]); ?>,-</td>
            <td><?= $pecah["jumlah"]; ?></td>
            <td>IDR. <?= number_format($pecah["jumlah"]*$pecah["harga_kamar"]); ?>,-</td>
        </tr>
        <?php $no++; ?>
        <?php endwhile; ?>

    </tbody>
</table>


<div class="row">
      <div class="col-md-7">
        <div class="alert alert-info">
          <p>
            Silahkan lakukan pembayaran kamar Rp. <?= number_format($detail['total_pembayaran']); ?>,- ke <br>
            <strong>BANK MANDIRI 123-111-111 AN Sintya Cahyani 
			(total pembayaran kamar akan dikenakan biaya layanan daerah.
            Biaya Layanan daerah dapat dibayarkan saat check-in)</strong>
          </p>
        </div>
      </div>
    </div>

    </div>
</section>

</body>
</html>

