<h2>Detail Pemesanan</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN tamu ON pemesanan.id_tamu = tamu.id_tamu WHERE pemesanan.id_pemesanan = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

?>

<!-- <pre><?php // print_r($detail); ?></pre> -->

<div class="row" style="margin-bottom:10px;">
	<div class="col-md-4">
		<h3>Pemesanan</h3>
        <strong>No.Pemesanan: <?php echo $detail['id_pemesanan'] ?></strong><br>
		tanggal : <?= $detail["tanggal_pemesanan"]; ?><br>
		total : IDR.<?= number_format($detail["total_pembayaran"]); ?>,- <br>
        Status : <?= $detail["status_pemesanan"]; ?>
	</div>
	<div class="col-md-4">
		<h3>Tamu</h3>
		<strong><?= $detail["nama_tamu"]; ?></strong><br>
		<?= $detail["telepon_tamu"]; ?><br>
		<?= $detail["email_tamu"]; ?>
    </div>
	<div class="col-md-4">
		<h3>Negara</h3>
		<strong><?php echo $detail['nama_daerah'] ?></strong><br>
		Biaya Layanan: IDR. <?= number_format($detail['tarif']); ?>,-<br>
		Alamat: <?php echo $detail['alamat_tamu']; ?>
    </div>
    </div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>jenis kamar</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr> 
    </thead>
    <tbody>

    <?php $no=1; ?>
        <!-- menggabungkan (join) tabel kamar dengan tabel pemesanan_produk -->
        <?php $ambil = $koneksi->query("SELECT * FROM pemesanan_kamar JOIN kamar ON pemesanan_kamar.id_kamar = kamar.id_kamar WHERE pemesanan_kamar.id_pemesanan = '$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()): ?>
        <tr>
            <td><?= $no; ?>.</td>
            <td><?= $pecah["jenis_kamar"]; ?></td>
            <td>IDR. <?= number_format($pecah["harga_kamar"]); ?>,-</td>
            <td><?= $pecah["jumlah"]; ?></td>
            <td>IDR. <?= number_format($pecah["jumlah"]*$pecah["harga_kamar"]); ?>,-</td>
        </tr>
        <?php $no++; ?>
        <?php endwhile; ?>

    </tbody>
</table>