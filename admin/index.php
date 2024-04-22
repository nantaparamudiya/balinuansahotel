<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","", "balinuansa_hotel");


if (! isset($_SESSION['admin'])) 
{
  echo "<script>alert('Anda harus login)</script>";
  echo "<script>location='login.php';</script>";
  header('location;login.php');
  exit();
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> BALI NUANSA HOTEL</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <script src="assets/js/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">BALI NUANSA</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo2.jpeg" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a  href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a  href="index.php?halaman=kategori"><i class="fa fa-cube"></i> Kategori</a></li>
                    <li><a  href="index.php?halaman=kamar"><i class="fa fa-tags"></i> Kamar</a></li>
                    <li><a  href="index.php?halaman=pemesanan"><i class="fa fa-shopping-cart"></i> Pemesanan</a></li>
                    <li><a  href="index.php?halaman=laporan_pemesanan"><i class="fa fa-file"></i> Laporan</a></li>
                    <li><a  href="index.php?halaman=tamu"><i class="fa fa-user"></i> Tamu</a></li>
                    <li><a  href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
              <?php
              if(isset($_GET['halaman']))
              {
                  if($_GET['halaman']=="kamar")
                  {
                      include 'kamar.php';
                  }
                  elseif ($_GET['halaman']=="pemesanan")
                  {
                    include 'pemesanan.php';
                  }
                  elseif ($_GET['halaman']=="tamu")
                  {
                    include 'tamu.php'; 
                  }
                  elseif ($_GET['halaman']=="detail")
                  {
                    include 'detail.php';  
                  }
                  elseif ($_GET['halaman']=="tambahkamar")
                  {
                    include 'tambahkamar.php';
                  }
                  elseif ($_GET ['halaman']=="hapuskamar")
                  {
                    include 'hapuskamar.php';
                  }
                  elseif ($_GET['halaman']=="ubahkamar")
                  {
                    include 'ubahkamar.php';
                  }
                  elseif ($_GET ['halaman']=="logout")
                  {
                    include 'logout.php';
                  }
                  else if ($_GET['halaman']=="pembayaran")
                  {
                    include 'pembayaran.php'; 
                  }
                  else if ($_GET['halaman']=="laporan_pemesanan")
                  {
                    include 'laporan_pemesanan.php'; 
                  }
                  else if ($_GET['halaman']=="kategori")
                  {
                    include 'kategori.php'; 
                  }
                  else if ($_GET['halaman']=="detailkamar")
                  {
                    include 'detailkamar.php'; 
                  }
                  else if ($_GET['halaman']=="hapusfotokamar")
                  {
                    include 'hapusfotokamar.php'; 
                  }
                

            }
            else
            {
                include 'home.php' ;
            }
            ?>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>