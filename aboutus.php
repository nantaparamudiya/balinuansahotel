<?php
session_start();
//koneksi ke database
include_once('./koneksi.php');

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
      <div class="col-md-6 bg-white">
          <h4 align="justify">Nestled in the heart of lush green forests, our unique tented camp sits in harmony with the surrounding nature. Inspired by the early European settlers from the 1800s, architect Bill Bensley designed Bali Nuansa Hotel Ubud, Bali as a tribute to their spirit of adventure.</h4>
      </div>
<div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-6 bg-white">
            <center>
              <img src="https://capellahotels.com/assets/img/site_images/ubud/Capella-Ubud-Top-01.jpg" class="img-fluid" alt="New York" class="d-block" width="650" height="500">
            </center>
          </div>
          <div class="col-md-6 bg-white">
          <center>
              <img src="https://capellahotels.com/assets/img/site_images/ubud/Capella-Ubud-Top-02.jpg" class="img-fluid" alt="New York" class="d-block" width="650" height="500">
            </center>
          </div>
       </div> 
     </div>
     <div class="container-fluid mt-3" style="margin-top: 30px;">
  <div class="row">
    <div class="col-sm-6"><H1><b>ACCOMODATION</b></H1></div>
    <div class="col-sm-6"><h4 align="justify">Our refined camp is more than a hotel. Constructed within the trees and hidden from afar, it captures the imagination of those who seek a unique experience at the heart of Bali’s untouched natural surroundings. Within the camp are twenty-two one-bedroom tents as well as one two-bedroom lodge, all with private salt water pools.</h4></div>
  </div>
  <br>
</div>
<!-- About Us -->

<div class="container" style="margin-top: 30px;">
  <div class="row">
    <div class="col-md-12">
      <div class="team-heading">
        <h1 class="mb-3"><b>AWARDS</b></h1>
      </div>
    </div>
  </div>
  <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-4 bg-white">
              <img src="https://capellahotels.com/assets/img/site_images/global/travel-and-leisure-co-logo-blk.png" class="img-fluid" alt="New York" class="d-block" width="300" height="150">
              <h4>TRAVEL+LEISURE 2022</h4>
              <h4>WORLD’S BEST AWARDS</h4>
          </div>
          <div class="col-md-4 bg-white">
              <img src="https://capellahotels.com/assets/img/site_images/singapore/Capella-Singapore-Conde-Nast-Traveler-Best-Hotel-2021_1.png" class="img-fluid" alt="New York" class="d-block" width="300" height="150">
              <h4>CONDE NAST TRAVELER</h4>
              <h4>READER’S CHOICE AWARDS 2021</h4>
          </div>
          <div class="col-md-4 bg-white">
              <img src="https://capellahotels.com/assets/img/site_images/global/KIWI-COLLECTION-HOTEL-AWARDS-2021--_MOST-ROMANTIC-HOTEL.png" class="img-fluid" alt="New York" class="d-block" width="300" height="150">
              <h4>THE KIWI COLLECTION</h4>
              <h4>HOTEL AWARDS 2021</h4>
          </div>
       </div> 
     </div>

<div class="container" style="margin-top: 30px;">
  <div class="row">
    <div class="col-md-12">
      <div class="team-heading">
        <h1 class="mb-3"><b>HEALTH & SAFETY CERTIFICATES</b></h1>
      </div>
    </div>
  </div>
     <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-6 bg-white">
              <img src="https://capellahotels.com/assets/img/site_images/ubud/CHSE-CERTIFIED-HOTELS.png" class="img-fluid" alt="New York" class="d-block" width="300" height="300">
              <h4>CHSE CERTIFIED HOTELS</h4>
          </div>
          <div class="col-md-6 bg-white">
              <img src="https://capellahotels.com/assets/img/site_images/ubud/EARTHCHECK-SILVER-CERTIFIED.png" class="img-fluid" alt="New York" class="d-block" width="300" height="300">
              <h4>EARTHCHECK SILVER CERTIFIED</h4>
          </div>
       </div> 
     </div>
     <div class="container" style="margin-top: 30px;">
  <div class="row">
    <div class="col-md-12">
      <div class="team-heading">
        <h1 class="mb-3"><b>Bali Nuansa Ubud UBUD GIFTS</b></h1>
      </div>
    </div>
  </div>
     <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-5 bg-white">
          <h4>Gifts and Experiences</h4>
          <h4>Vouchers Delivered at</h4>
          <h4>Your Doorsteps</h4>
              <img src="https://capellahotels.com/assets/img/site_images/ubud/Capella-Ubud-Bottom-02.jpg" class="img-fluid" alt="New York" class="d-block" width="300" height="300">
          </div>
          <div class="col-md-6 bg-white">
              <img src="https://capellahotels.com/assets/img/site_images/ubud/Capella-Ubud-Bottom-01.jpg" class="img-fluid" alt="New York" class="d-block" width="500" height="500">
              <h4 align="justify">An exclusive offer of Gifts and Experiences vouchers by Bali Nuansa Ubud.
                                  Ubud to curate the unforgettable moments, immersing into the. local community
                                  to engage and discover local heritage and culture. on your next journey at 
                                  our tented Camp.</h4>
          </div>
       </div> 
     </div>

     <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
          <div class="col-md-12 bg-white">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.7391951987024!2d115.2634397!3d-8.5246823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23d9ecd1dee91%3A0xa6451ee013f56f8b!2sPurana%20Suite%20Ubud!5e0!3m2!1sid!2sid!4v1671457628406!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
    </div>
</section>

<div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-4 bg-white">
              <h4><b>Address</b></h4>
              <h4>Jl. Raya Pengosekan, no 1, Ubud, Gianyar Bali 80561, Indonesia</h4>
          </div>
          <div class="col-md-4 bg-white">
             <h4><b>Telephone</b></h4>
              <h4>+62 361 2091 888</h4>
          </div>
          <div class="col-md-4 bg-white">
              <h4><b>Email</b></h4>
              <h4>balinuansaubud@hotels.com</h4>
          </div>
       </div> 
     </div>

</body>
</html>