<?php
session_start();
//koneksi ke database
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

<div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
          <div class="col-md-6 bg-white">
            <center>
              <img src="admin/assets/img/logo2.jpeg" class="img-fluid" alt="New York" class="d-block" style="margin-top: 70px" width="700" height="350" >
        </center>
          </div>
          <div class="col-md-6 bg-white">
            <center>
          <img src="admin/assets/img/logofix.jpg" class="img-fluid" alt="New York" class="d-block" width="500" height="200">
        </center>
        </div>
       </div> 
     </div>


      <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->


<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="https://capellahotels.com/assets/img/site_images/ubud/Capella_Ubud_One_Bedroom_Keliki_Valley_Tent1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
    <div class="carousel-caption">
      <h3>No.7 Best Hotel In the World</h3>
    </div>
  </div>
  <div class="carousel-item">
    <img src="https://capellahotels.com/assets/img/site_images/ubud/ubud-experiences-jungle_wedding-05.jpg" alt="Chicago" class="d-block" style="width:100%">
    <div class="carousel-caption">
      <h3>No.3 Best Resort in Asia</h3>
    </div> 
  </div>
  <div class="carousel-item">
    <img src="https://capellahotels.com/assets/img/site_images/ubud/Capella_Ubud-Bali_by_Georg-Roske__1098_LowRes.jpg" alt="New York" class="d-block" style="width:100%">
    <div class="carousel-caption">
      <h3>Travel + Leisure World’s Best Awards 2022</h3>
    </div>  
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>



<!-- konten   -->
<section class="content">
  <div class="container">
    <div class="row">
      <?php
      $ambil = $koneksi->query("SELECT * FROM kamar");
      while($perkamar = $ambil->fetch_assoc()):
      ?>
      <div class="col-md-3">
        <div class="thumbnail">
          <img src="foto_kamar/<?= $perkamar['foto_kamar']; ?>">
          <div class="caption">
            <h3><?= $perkamar['jenis_kamar']; ?></h3>
            <h5>IDR. <?= number_format($perkamar['harga_kamar']); ?>,-</h5>
            <a href="pesan.php?id=<?= $perkamar['id_kamar']; ?>" class="btn btn-primary">pesan</a>
            <a href="detail.php?id=<?= $perkamar['id_kamar']; ?>" class="btn btn-default">detail</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
  



<div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-4 bg-secondary">
            <h1 class="text-light">Address</h1>
            <h4 class="text-light">Jl. Raya Pengosekan, no 1, Ubud, Indonesia</h4>
              
          </div>
          <div class="col-md-4 bg-secondary">
            <h1 class="text-light">Telephone</h1>
            <h4 class="text-light">+62 361 2091 888</h4>

          </div>
          <div class="col-md-4 bg-secondary">
            <h1 class="text-light">Email</h1>
            <h4 class="text-light">balinuansaubud@hotels.com</h4>
          </div>
       </div> 
     </div>
     <div class="container-fluid" style="margin-top: 0px;" >
        <div class="row">
          <div class="col-md-12 bg-secondary">
            <center>
             <h4 class="text-light">Find Us</h4>
              <a href="https://wa.me/6283115266831?text=Halo,%20saya%20mau%20pesan%20kamar"><img src="admin/assets/img/wafi.png" width="40px" height="30px"></a>
    			  <a href="https://www.instagram.com"><img src="https://png.pngtree.com/png-clipart/20180626/ourmid/pngtree-instagram-icon-instagram-logo-png-image_3584852.png" width="30px" height="30px"></a>
    			  <a href="https://www.twitter.com"><img src="admin/assets/img/twitfix.png" width="30px" height="30px"></a></p>
            <p class="text-light">2022 &copy All - Right Reserved</p>
          </center>
          </div>
       </div> 
     </div>

</body>
</html>