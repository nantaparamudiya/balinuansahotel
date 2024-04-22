<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","", "balinuansa_hotel");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bali Nuansa Hotel</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  </head>
<style class="text/css">
body{
    background: url('https://capellahotels.com/assets/img/site_images/ubud/Capella_Ubud_One_Bedroom_Keliki_Valley_Tent1.jpg') no-repeat;
    width: 100%;
    height: 100vh;
    background-size: cover;
}
</style>
<body>
    

      <!--Start Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container px-4 px-lg-5">
             <a class="navbar-brand" href="#!"><img class="card-img-top" src="" alt="Card image" width="50" height="50"></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="pemesanan.php">Pemesanan</a></li>
                     <?php if (isset($_SESSION["tamu"])): ?>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="Riwayat.php">Riwayat Pemesanan</a></li>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
                     <?php else: ?>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Login</a></li>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="daftar.php">Daftar</a></li>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="checkout.php">Checkout</a></li>
                     <?php endif ?>
                     <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
   
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><hr class="dropdown-divider" /></li>
                             <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>
                             <li><a class="dropdown-item" href="discovery.php">Discovery</a></li>
                         </ul>
                     </li>
                 </ul>
                    <form action="pencarian.php" method="get" class="navbar-form navbar-right">
                    <input type="text" class="form-control" name="keyword">
                    <button class="btn btn-primary">Cari</button>
                    </form> 
                    </div>
                </nav>
       <!--End Navbar-->


  
</body>
</html>