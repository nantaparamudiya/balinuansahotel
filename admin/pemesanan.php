<h2>Data Pemesanan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Tanggal Pemesanan</th>
            <th>Status Pemesanan</th>
            <th>Total Pembayaran</th>
            <th>Aksi</th>
        <tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM pemesanan JOIN tamu ON pemesanan.id_tamu=tamu.id_tamu"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_tamu'];?></td>
            <td><?php echo $pecah['tanggal_pemesanan'];?></td>
            <td><?php echo $pecah['status_pemesanan'];?></td>
            <td><?php echo $pecah['total_pembayaran'];?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pemesanan']?>" class="btn btn-info">detail</a>
                <?php if($pecah['status_pemesanan'] != 'pending'): ?>
					<a href="index.php?halaman=pembayaran&id=<?= $pecah['id_pemesanan']; ?>" class="btn btn-success btn-xs">Pembayaran</a>
				<?php endif; ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>