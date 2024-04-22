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


<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
      <div class="col-md-7 bg-white">
          <h1><b>Welcome to the new Bali Nuansa Hotel</b></h1>
          <h1><b>DISCOVERY programme</b></h1>
          <img src="https://capellahotels.com/assets/img/site_images/discovery/discovery-precontentimg-01.jpg" class="img-fluid" alt="New York" class="d-block" width="750" height="500">          
      </div>
      <div class="col-md-3 bg-white">
          <h4 align="justify">Bali Nuansa Hotel  DISCOVERY is newly enhanced. Expect more recognition, more rewards and more access in more places. In other words even more in it for you. </h4>
          <img src="https://capellahotels.com/assets/img/site_images/discovery/discovery-precontentimg-02.jpg" class="img-fluid" alt="New York" class="d-block" width="350" height="380">          
      </div>
   </div> 
 </div>

 <div class="container-fluid" style="margin-top: 50px;">
  <div class="row">
    <div class="col-md-12">
      <div class="team-heading">
        <h1 class="mb-3"><b>HOW IT WORKS</b></h1>
      </div>
    </div>
  </div>
  <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
          <div class="col-md-4 bg-white">
              <h4><b>Join Bali Nuansa DISCOVERY</b></h4>
              <h4 align="justify">Bali Nuansa DISCOVERY is newly enhanced. Expect more recognition, more rewards and more access in more places. In other words: even more in it for you.
                  We now offer recognition from Day One, so our rewards, DISCOVERY Dollars (D$), Experiences and Live Local are available to you instantly, at all membership
                  levels.</h4>
          </div>
          <div class="col-md-4 bg-white">
             <h4><b>Earn DISCOVERY Dollars (D$)</b></h4>
             <h4 align="justify">Earn D$ on purchases across the hotel. Magnificent hotel rooms, luxury dining, specially curated activities … there are tons of gratifying ways to earn DISCOVERY Dollars (D$) with us.</h4>
          </div>
          <div class="col-md-4 bg-white">
              <h4><b>Spend D$ your way</b></h4>
              <h4 align="justify">Use your D$ toward your stay, room upgrades, dining, spa treatments or other indulgences along the way. The choice is yours! Simply put your D$ towards your bill at check-out.</h4>
          </div>
       </div> 
     </div>

 
<div class="container-fluid" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-7 bg-white">
          <h1><b>MEMBER BENEFITS</b></h1>
      </div>
      <div class="col-md-5 bg-white">
          <h4>Bali Nuansa Hotel DiSCOVERY comes with an abundance of benefits available at every</h4>
          <h4>level. There are three ways to advance your membership status — by accumulating</h4>
          <h4>nights, reaching eligible spend amounts or staying in multiple hotel brands.</h4>
      </div>
   </div> 
 </div>

 <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
          <div class="col-md-3 bg-white">
          <img src="https://capellahotels.com/assets/img/site_assets/gha/mb-card-silver.png" class="img-fluid" alt="New York" class="d-block" width="250" height="150">         
              <h4><b>Silver</b></h4>
              <h5>Upon Joining</h5>
              <h5 align="justify">Member Rates - Save 10% or more
                 Exclusive Offers
                 Earn D$ on Eligible Spend - 4%
                 Complimentary Wi-Fi
                 Experiences
                 Local Offers
                 Welcome Amenity</h5>
          </div>
          <div class="col-md-3 bg-white">
          <img src="https://capellahotels.com/assets/img/site_assets/gha/mb-card-gold.png" class="img-fluid" alt="New York" class="d-block" width="250" height="150">         
             <h4><b>Gold</b></h4>
             <h5>2 Stays or USD 1,000</h5>
             <h5 align="justify">Member Rates - Save 10% or more
                Exclusive Offers
                Earn D$ on Eligible Spend - 5%
                Complimentary Wi-Fi
                Experiences
                Local Offers
                Welcome Amenity</h5>
         </div>
          <div class="col-md-3 bg-white">
          <img src="https://capellahotels.com/assets/img/site_assets/gha/mb-card-platinum.png" class="img-fluid" alt="New York" class="d-block" width="250" height="150">         
              <h4><b>Platinum</b></h4>
              <h5>10 Nights, USD 5,000 or 2 brands</h5>
              <h5 align="justify">Member Rates - Save 10% or more
                Exclusive Offers
                Earn D$ on Eligible Spend - 6%
                Complimentary Wi-Fi
                Experiences
                Local Offers
                Welcome Amenity
                Later Checkout - 3pm*
                Room Upgrade*</h5>
            </div>
        <div class="col-md-3 bg-white">
          <img src="https://capellahotels.com/assets/img/site_assets/gha/mb-card-titanium.png" class="img-fluid" alt="New York" class="d-block" width="250" height="150">         
              <h4><b>Titanium</b></h4>
              <h5>30 Nights, USD 15,000 or 4 brands</h5>
              <h5 align="justify">Member Rates - Save 10% or more
               Exclusive Offers Earn D$ on Eligible Spend - 
               7% Complimentary Wi-Fi 
               Experiences Local Offers 
               Welcome Amenity 
               Guaranteed Room Availability (48hrs prior) 
               Early Check-in - 11am* 
               Later Checkout - 4pm* 
               Room Upgrade - 
               Double* Status 
               Sharing Additional Brand Benefits</h5>
          </div>
         </div>
       </div> 
     </div>

 
</body>
</html>