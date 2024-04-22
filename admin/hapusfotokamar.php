<?php

$id_foto = $_GET['idfoto'];
$id_kamar = $_GET['idkamar'];

// Mengambil data
$ambilfoto = $koneksi->query("SELECT * FROM kamar_foto WHERE id_kamar_foto='$id_foto'");
$detailfoto = $ambilfoto->fetch_assoc();

$namafilefoto = $detailfoto['nama_kamar_foto'];
// Hapus namafilefoto
unlink("../foto_kamar/" . $namafilefoto);

// echo "<pre>";
// print_r($namafilefoto);
// echo "</pre>";

// Menghapus data di database
$koneksi->query("DELETE FROM kamar_foto WHERE id_kamar_foto='$id_foto'");

echo "<script>alert('Foto kamar berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=detailkamar&id=$id_kamar';</script>";


?>