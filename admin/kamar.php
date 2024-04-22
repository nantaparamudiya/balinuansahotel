<h2>Data Kamar</h2>

<table class="table - bordered">
    <tthead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Foto</th>
            <th>Fasilitas</th>
            <th>Ketersediaan</th>
            <th>Pilihan</th>
        </tr>
    </tthead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM kamar LEFT JOIN kategori on kamar.id_kategori=kategori.id_kategori"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_kategori']; ?></td>
            <td><?php echo $pecah['jenis_kamar'];?></td>
            <td><?php echo $pecah['harga_kamar'];?></td>
            <td><?php echo $pecah['status_kamar'];?></td>
            <td>
                <img src="../foto_kamar/<?php echo $pecah['foto_kamar']; ?>" width="100">
            </td>
            <td><?php echo $pecah['fasilitas_kamar'];?></td>
            <td><?php echo $pecah['ketersediaan_kamar'];?></td>
            <td>
                <a href="index.php?halaman=hapuskamar&id=<?= $pecah['id_kamar']; ?>"class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i>hapus</a>
                <a href="index.php?halaman=ubahkamar&id=<?= $pecah['id_kamar']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i>ubah</a>

                <a href="index.php?halaman=detailkamar&id=<?= $pecah['id_kamar']; ?>" class="btn btn-info btn-info"><i class="glyphicon glyphicon-eye"></i>detail</a>

        </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahkamar" class="btn btn-primary">Tambah Data</a>