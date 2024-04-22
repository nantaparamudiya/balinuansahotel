<?php
$datakategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";

?>


<h2>Tambah Kamar</h2>

<div class="row">
	<div class="col-md-8">
		<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
					<label>Kategori</label>
					<select name="id_kategori" id="" class="form-control">
						<option value="">-Pilih kategori-</option>
						<?php foreach($datakategori as $key => $value): ?>
						<option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>jenis</label>
					<input type="text" name="jenis" class="form-control">
				</div>
				<div class="form-group">
					<label>harga (IDR)</label>
					<input type="number" name="harga" class="form-control">
				</div>
				<div class="form-group">
					<label>status</label>
					<input type="text" name="status" class="form-control">
				</div>
				<div class="form-group">
					<label>fasilitas</label>
					<textarea type="text" name="fasilitas" class="form-control" rows="20"></textarea>
				</div>
				<div class="form-group">
					<label>foto</label>
					<div class="letak-input" style="margin-bottom: 5px;">
						<input type="file" name="foto[]" class="form-control" name="foto">
					</div>
					<span class="btn btn-primary btn-tambah">
						<i class="fa fa-plus"></i>
					</span>
				</div>
				<div class="form-group">
					<label>ketersediaan</label>
					<input type="number" name="ketersediaan" class="form-control">
				</div>
			<button name="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div>

<?php  
if(isset($_POST["submit"])){
	
	$namanamafoto = $_FILES["foto"]["name"];
	$lokasilokasifoto = $_FILES["foto"]["tmp_name"];
	move_uploaded_file($lokasilokasifoto[0], "../foto_kamar/".$namanamafoto[0]);

	// menyimpan ke database
	$result = $koneksi->query("INSERT INTO kamar VALUES('', '$_POST[id_kategori]', '$_POST[jenis]', '$_POST[harga]', '$_POST[status]', '$namanamafoto[0]', '$_POST[fasilitas]', '$_POST[ketersediaan]')");

	// Mendapatkan id_kamar barusan
	$id_kamar_barusan = $koneksi->insert_id;

	// Membuat perulangan untuk memasukkan nama nama foto ke tabel
	foreach($namanamafoto as $key => $tiap_nama){
		$tiap_lokasi = $lokasilokasifoto[$key];
		move_uploaded_file($tiap_lokasi, "../foto_kamar/".$tiap_nama);

		// Memasukkan nama nama foto ke tabel kamar_foto sesuai id_kamar barusan
		$hasil = $koneksi->query("INSERT INTO 	kamar_foto(id_kamar, nama_kamar_foto) VALUES('$id_kamar_barusan','$tiap_nama')");
	}

	if($result AND $hasil){
		echo "<script>alert('Data berhasil ditambahkan');window.location='index.php?halaman=kamar';</script>";
	}

	// echo "<pre>";
	// print_r($_FILES['foto']);
	// echo "</pre>";
}
?>


<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click", function(){
			$(".letak-input").append("<input type='file' name='foto[]' class='form-control'>");
		})
	})
</script>