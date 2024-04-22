<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php 
// mendapatkan id_kamar dari url
$id_kamar = $_GET["id"];

// query ambil data 
$ambil = $koneksi->query("SELECT * FROM kamar WHERE id_kamar='$id_kamar'");
$detail = $ambil->fetch_assoc();

echo "<pre>";
print_r($detail);
echo "</pre>";
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
        <div class="row">
            <div class="col-md-6">
                <img src="foto_kamar/<?php echo $detail["foto_kamar"]; ?>" alt="" class="
                img-responsive">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["jenis_kamar"] ?></h2>
                <h4>IDR. <?php echo number_format($detail["harga_kamar"]); ?></h4>
                <h5>Ketersediaan: <?php echo $detail['ketersediaan_kamar'] ?></h5>

                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                        <input type="number" min="1" max="<?= $detail['ketersediaan_kamar']; ?>" class="form-control" name="jumlah">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="pesan">Pesan</button>
                            </div>
                        </div>
                    </div>
                </form>

                <?php 
                // jk ada tombol pesan
                if (isset($_POST["pesan"]))
                {
                    // mendapatkan jumlah yg diinputkan 
                    $jumlah = $_POST["jumlah"];
                    // masukkan di pemesanan tamu
                    $_SESSION["pemesanan"][$id_kamar] = $jumlah; 

                    echo "<script>alert('kamar telah masuk ke pemesanan tamu');</script>";
                    echo "<script>location='pemesanan.php';</script>";
                }
                ?>

                <p><?php echo $detail["fasilitas_kamar"]; ?></p>
            </div>
        </div>
    </div>
</section>

<body>
<html>


