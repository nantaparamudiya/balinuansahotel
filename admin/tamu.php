<h2>Data Tamu</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?> 
        <?php $ambil=$koneksi->query("SELECT * FROM tamu"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_tamu'];?></td>
            <td><?php echo $pecah['email_tamu'];?></td>
            <td><?php echo $pecah['telepon_tamu'];?></td>
            <td>
                <a href=""class ="btn-danger btn">hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
