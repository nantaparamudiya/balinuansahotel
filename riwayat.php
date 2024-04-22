<?php
session_start();
//koneksi ke database
include 'koneksi.php';

// Jika tidak ada session tamu (belum login)
if(!isset($_SESSION['tamu']) OR empty($_SESSION['tamu'])){
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

// if(!isset($_SESSION["pemesanan"])){
//   // Diarahkan ke ke index.php
//   echo "<script>alert('Belum ada riwayat pembayaran!')</script>";
//   echo "<script>location='index.php';</script>";
// }

// echo "<pre>";
// print_r($_SESSION['tamu']);
// echo "</pre>";

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
    <h3>Riwayat Pemesanan <?= $_SESSION['tamu']['nama_tamu']; ?></h3>

    <table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				// Mendapatkan id_tamu yang login dari session
				$id_tamu = $_SESSION['tamu']['id_tamu'];
				$ambil = $koneksi->query("SELECT * FROM pemesanan WHERE id_tamu='$id_tamu'");
				if($ambil->num_rows == 0):
				?>
				<tr>
					<td colspan="5">Tidak ada data riwayat... </td>
				</tr>
				<?php endif; ?>
				<?php
				while($pecah = $ambil->fetch_assoc()):
				?>
				<tr>
					<th><?= $no++; ?></th>
					<td><?= date("d F Y", strtotime($pecah['tanggal_pemesanan'])); ?></td>
					<td>
						<?= $pecah['status_pemesanan']; ?><br>
						<?php if(!empty($pecah['resi_pelayanan'])): ?>
							Resi : <?= $pecah['resi_pelayanan']; ?>
						<?php endif; ?>
					</td>
					<td>Rp. <?= number_format($pecah['total_pembayaran']); ?>,-</td>
					<td>
						<a href="nota.php?id=<?= $pecah['id_pemesanan']; ?>" class="btn btn-info">Nota</a>
						
						<?php if($pecah['status_pemesanan'] == 'pending'): ?>
							<a href="pembayaran.php?id=<?= $pecah['id_pemesanan']; ?>" class="btn btn-success">Input Pembayaran</a>
							<?php else: ?>
								<a href="lihat_pembayaran.php?id=<?= $pecah['id_pemesanan']; ?>" class="btn btn-warning">Lihat Pembayaran</a>
						<?php endif; ?>
						
					</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
    </table>

  </div>
</section>

</body>
</html>