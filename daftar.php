<?php
//koneksi ke database
include 'koneksi.php';

// Jika tombol daftar ditekan
if(isset($_POST['daftar'])){
  // Mengambil isian nama, email, password, alamat, telepon
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];

  // Cek apakah email sudah digunakan atau belum
  $ambil = $koneksi->query("SELECT * FROM tamu WHERE email_tamu='$email'");
  $yangcocok = $ambil->num_rows;
  if($yangcocok == 1){
    echo "<div class='alert alert-danger'>Pendaftaran gagal, email sudah digunakan!</div>";
		echo "<meta http-equiv='refresh' content='1;url=daftar.php'>";
  }
  else{
    // Insert ke tabel tamu
    $koneksi->query("INSERT INTO tamu(email_tamu, password_tamu, nama_tamu, telepon_tamu, alamat_tamu) VALUES('$email', '$password', '$nama', '$telepon', '$alamat')");
    echo "<div class='alert alert-success'>Pendaftaran sukses, Silahkan login</div>";
		echo "<meta http-equiv='refresh' content='1;url=login.php'>";
  }

}

?>

<?php include 'koneksi.php'; ?>

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
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Daftar Tamu</h3>
          </div>
          <div class="panel-body">
            <form action="" method="post" class="form-horizontal">
              <div class="form-group">
                <label for="nama" class="control-label col-md-3">Nama</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="control-label col-md-3">Email</label>
                <div class="col-md-7">
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="control-label col-md-3">Password</label>
                <div class="col-md-7">
                  <input type="password" class="form-control" name="password" required>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat" class="control-label col-md-3">Alamat</label>
                <div class="col-md-7">
                  <textarea name="alamat" id="" cols="30" rows="4" class="form-control" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="telepon" class="control-label col-md-3">Telepon / HP</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="telepon" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button class="btn btn-primary" name="daftar">Daftar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
</body>
</html>