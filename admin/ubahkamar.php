<?php
$ambil = $koneksi->query("SELECT * FROM kamar WHERE id_kamar = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$datakategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";

if(isset($_POST['ubah'])){
  $namafoto = $_FILES['foto']['name'];
  $lokasifoto = $_FILES['foto']['tmp_name'];

  // jika foto dirubah
  if(!empty($lokasifoto)){
    move_uploaded_file($lokasifoto, "../foto_kamar/$namafoto");

    $koneksi->query("UPDATE kamar SET id_kategori='$_POST[id_kategori]', jenis_kamar='$_POST[jenis]', harga_kamar='$_POST[harga]', status_kamar='$_POST[status]', foto_kamar='$namafoto', fasilitas_kamar='$_POST[fasilitas]', ketersediaan_kamar='$_POST[ketersediaan]' WHERE id_kamar='$_GET[id]'");
  }
  else{
    $koneksi->query("UPDATE kamar SET id_kategori='$_POST[id_kategori]', jenis_kamar='$_POST[jenis]', harga_kamar='$_POST[harga]', status_kamar='$_POST[status]', fasilitas_kamar='$_POST[fasilitas]', ketersediaan_kamar='$_POST[ketersediaan]' WHERE id_kamar='$_GET[id]'");
  }

  echo "<script>alert('Data berhasil diubah');</script>";
  echo "<script>location='index.php?halaman=kamar';</script>";
}

?>


<h2>Ubah Kamar</h2>

<div class="row">
	<div class="col-md-8">
    <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label>kategori</label>
        <select name="id_kategori" id="" class="form-control">
          <option value="">-Pilih kategori-</option>
          <?php foreach($datakategori as $key => $value): ?>
          <option value="<?= $value['id_kategori'] ?>" <?php if($pecah['id_kategori']==$value['id_kategori']){echo "selected";} ?>>
            <?= $value['nama_kategori']; ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="">jenis kamar</label>
        <input type="text" name="jenis" class="form-control" value="<?= $pecah['jenis_kamar']; ?>">
      </div>
      <div class="form-group">
        <label for="">harga IDR.</label>
        <input type="number" name="harga" class="form-control" value="<?= $pecah['harga_kamar']; ?>">
      </div>
      <div class="form-group">
        <label for="">status</label>
        <input type="text" name="status" class="form-control" value="<?= $pecah['status_kamar']; ?>">
      </div>
      <div class="form-group">
        <label for="">foto kamar</label><br>
        <img src="../foto_kamar/<?= $pecah['foto_kamar']?>" width="200">
      </div>
      <div class="form-group">
        <label for="">ganti foto</label>
        <input type="file" name="foto" class="form-control">
      </div>
      <div class="form-group">
        <label for="">fasilitas</label>
        <textarea name="fasilitas" class="form-control" rows="10">
          <?= $pecah['fasilitas_kamar']; ?>
        </textarea>
      </div>
      <div class="form-group">
        <label for="">ketersediaan</label>
        <input type="number" name="ketersediaan" class="form-control" value="<?= $pecah['ketersediaan_kamar']; ?>">
      </div>
      <button name="ubah" class="btn btn-primary">Ubah</button>
    </form>
  </div>
</div>




