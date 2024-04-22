<?php 
session_start();
//koneksi ke database
include 'koneksi.php';

// jk tidak ada session tamu(blm login), mk dilarikan ke login.php
if (!isset($_SESSION["tamu"]))
{
    echo "<script>alert('silahkan login')</script>";
    echo "<script>location='login.php'</script>";
}
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
       <h1>Pesanan Tamu</h1>
       <hr>
       <table class="table table-bordered">
           <thead>
               <tr>
                   <th>No</th>
                   <th>Kamar</th>
                   <th>Harga</th>
                   <th>Jumlah</th>
                   <th>Subharga</th>
               </tr>
            </thead>
            <tbody>
                <?php $nomor= 1; ?>
                <?php $totalpemesanan = 0; ?>
                <?php foreach($_SESSION["pemesanan"] as $id_kamar=> $jumlah): ?>
                <!-- menampilkan kamar yg sedang diperulangkan berdasarkan id_kamar -->
                <?php 
                $ambil = $koneksi->query("SELECT * FROM kamar
                    WHERE id_kamar='$id_kamar'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_kamar"] *$jumlah;
  
                ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $pecah["jenis_kamar"]; ?></td>
                    <td>IDR.<?php echo number_format ($pecah["harga_kamar"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>IDR.<?php echo number_format ($subharga); ?></td>
        
                </tr>
                <?php $nomor++; ?>
                <?php $totalpemesanan+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Pemesanan</th>
                    <th>IDR. <?php echo number_format($totalpemesanan) ?></th>
                </tr>
            </tfoot>
        </table>

      
        <form method="post">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["tamu"]['nama_tamu'] 
                            ?>" class="form-control">
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["tamu"]['telepon_tamu'] 
                            ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_layanan">
                        <option value="">Pilih Biaya Layanan</option>
                        <?php 
                        $ambil = $koneksi->query("SELECT * FROM layanan");
                        while($perlayanan = $ambil->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $perlayanan["id_layanan"] ?>">
                            <?php echo $perlayanan['nama_daerah'] ?> -
                            IDR. <?php echo number_format($perlayanan['tarif']) ?> 
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap Tamu</label>
                <textarea class="form-control" name="alamat_tamu" placeholder="masukkan alamat lengkap tamu(termasuk kode pos)"></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php 
        if (isset($_POST ["checkout"])) 
        {
            $id_tamu = $_SESSION["tamu"]["id_tamu"];
            $id_layanan = $_POST["id_layanan"];
            $tanggal_pemesanan = date("Y-m-d");
            $alamat_tamu = $_POST['alamat_tamu'];
            
           $ambil =  $koneksi->query("SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
           $arraylayanan = $ambil->fetch_assoc();
           $nama_daerah = $arraylayanan['nama_daerah'];
           $tarif = $arraylayanan['tarif'];


            $total_pembayaran = $totalpemesanan + $perlayanan;

            // 1. menyimpan data ke tabel pemesanan 
            $koneksi->query("INSERT INTO pemesanan (id_tamu,id_layanan,tanggal_pemesanan,total_pembayaran,nama_daerah,tarif,alamat_tamu) 
            VALUES ('$id_tamu','$id_layanan','$tanggal_pemesanan','$total_pembayaran','$nama_daerah', '$tarif','$alamat_tamu') "
                );
            // mendapatkan id_pemesanan barusan terjadi 
            $id_pemesanan_barusan =$koneksi->insert_id;

            foreach ($_SESSION["pemesanan"] as $id_kamar=> $jumlah)
            {

           $koneksi->query ("INSERT INTO pemesanan_kamar (id_pemesanan,id_kamar,jumlah)
               VALUES ('$id_pemesanan_barusan','$id_kamar','$jumlah') ");

            // Update ketersediaan kamar
             $koneksi->query("UPDATE kamar SET ketersediaan_kamar=ketersediaan_kamar - $jumlah WHERE id_kamar='$id_kamar'");
            }
            // mengkosongkan pemesanan tamu
            unset($_SESSION["pemesanan"]);

            // tampilan dialihkan ke halaman nota, nota dari pemesanan yang barusan
            echo "<script>alert('pemesanan sukses');</script>";
            echo "<script>location='nota.php?id=$id_pemesanan_barusan';</script>";
        }
        
        ?>

    </div>
</section>

<pre><?php print_r($_SESSION['tamu']) ?></pre>
<pre><?php print_r($_SESSION["pemesanan"]) ?></pre>



</body>
</html>


