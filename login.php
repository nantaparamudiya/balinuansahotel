<?php 
session_start();
$koneksi = new mysqli("localhost","root","", "balinuansa_hotel");
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

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login Tamu</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                        <label>Passsword</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="login">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
// jk ada tombol login (tombol login ditekan)
if (isset($_POST["login"])) 
{
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    // lakukan kuery ngecek akun di tabel tamu di db 
    $ambil = $koneksi->query("SELECT * FROM tamu WHERE email_tamu='$email' AND password_tamu='$password'");

    // ngitung akun yg terambil 
    $akunyangcocok = $ambil->num_rows;

    // jika 1 akun yang cocok, maka diloginkan
    if ($akunyangcocok==1) 
    {
        // and sukses login 
        // mendapatkan akun dlm bentuk array
        $akun = $ambil->fetch_assoc();
        // simpan di session tamu
        $_SESSION["tamu"] = $akun;
        echo "<script>alert('anda sukses login');</script>";

        // jk sudah pesan 
        if (isset($_SESSION["pemesanan"]) OR ! empty($_SESSION["pemesanan"]))
        {
            echo "<script>location='checkout.php'</script>";
        }
        else 
        {
            echo "<script>location='riwayat.php'</script>";
        }
        
    }
    else
    {
        // anda gagal login 
        echo "<script>alert('anda gagal login, periksa akun Anda');</script>";
        echo "<script>location='login.php'</script>";
    }

}

?>






</body>
</html>