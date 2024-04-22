<?php
$id_kamar = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM kamar LEFT JOIN kategori ON kamar.id_kategori=kategori.id_kategori WHERE id_kamar='$id_kamar'");
$detailkamar = $ambil->fetch_assoc();

$fotokamar = array();
$ambilfoto = $koneksi->query("SELECT * FROM kamar_foto WHERE id_kamar='$id_kamar'");
while($tiap = $ambilfoto->fetch_assoc()){
  $fotokamar[] = $tiap;
}

// echo "<pre>";
// print_r($detailkamar);
// print_r($fotokamar);
// echo "</pre>";

?>


<table class="table">
  <tr>
    <th>Jenis</th>
    <td><?= $detailkamar['jenis_kamar']; ?></td>
  </tr>
  <tr>
    <th>Kategori</th>
    <td><?= $detailkamar['nama_kategori']; ?></td>
  </tr>
  <tr>
    <th>Harga</th>
    <td>IDR. <?= number_format($detailkamar['harga_kamar']) ?>,-</td>
  </tr>
  <tr>
    <th>Status</th>
    <td><?= $detailkamar['status_kamar']; ?></td>
  </tr>
  <tr>
    <th>Fasilitas</th>
    <td><?= $detailkamar['fasilitas_kamar']; ?></td>
  </tr>
  <tr>
    <th>Ketersediaan</th>
    <td><?= $detailkamar['ketersediaan_kamar']; ?></td>
  </tr>
</table>

<div class="row">
  <?php foreach($fotokamar as $key => $value): ?>
  <div class="col-md-4 text-center">
    <img src="../foto_kamar/<?= $value['nama_kamar_foto']; ?>" alt="" class="img-responsive"><br>
    <a href="index.php?halaman=hapusfotokamar&idfoto=<?= $value['id_kamar_foto']; ?>&idkamar=<?= $id_kamar; ?>" class="btn btn-danger btn-sm">hapus</a>
  </div>
  <?php endforeach; ?>
</div><br>

<div class="row">
  <div class="col-md-4">
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">file foto</label>
        <input type="file" name="kamar_foto" class="form-control" required>
      </div>
      <button class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['simpan'])){
  $lokasifoto = $_FILES['kamar_foto']['tmp_name'];
  $namafoto = $_FILES['kamar_foto']['name'];
  $namafoto = date('YmdHis') . $namafoto;

  // Upload ke folder foto_kamar
  move_uploaded_file($lokasifoto, '../foto_kamar/' . $namafoto);

  // Memasukkan nama foto ke tabel kamar_foto
  $koneksi->query("INSERT INTO kamar_foto(id_kamar, nama_kamar_foto) VALUES('$id_kamar', '$namafoto')");

  echo "<script>alert('Foto kamar berhasil ditambahkan');</script>";
  echo "<script>location='index.php?halaman=detailkamar&id=$id_kamar';</script>";
}

?>