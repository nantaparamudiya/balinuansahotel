<?php
session_start();
$id_kamar=$_GET["id"];
unset($_SESSION["pemesanan"][$id_kamar]);

echo "<script>alert('kamar dihapus dari pemesanan');</script>";
echo "<script>location='pemesanan.php';</script>";
?>