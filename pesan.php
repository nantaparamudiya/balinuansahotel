<?php
session_start();
//mendapatkan id_kamar dri url
$id_kamar = $_GET['id'];


// jk sudah ada kamar itu dipemesanan, maka kamar itu jumlahnya di +1
if (isset($_SESSION['pemesanan'][$id_kamar]))
{
    $_SESSION['pemesanan'][$id_kamar]+=1;
}
// selainitu(blm ada di pemesanan), mk kamar itu dianggap dipesan 1
else
{
    $_SESSION['pemesanan'][$id_kamar] = 1;
}



echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// larikan ke halaman pemesanan 
echo "<script>alert('kamar telah masuk ke pesanan tamu');</script>";
echo "<script>location='pemesanan.php';</script>";
?>