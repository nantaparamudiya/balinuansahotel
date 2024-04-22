<h2>Data Pembayaran</h2>

<?php
// Mendapatkan id_pemesanan dari url
$id_pemesanan = $_GET['id'];

// Mengambil data pembayaran berdasarkan id_pemesanan
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pemesanan='$id_pemesanan'");
$detail = $ambil->fetch_assoc();

?>


<div class="row">
  <div class="col-md-6">
    <table class="table">
      <tr>
        <th>Nama</th>
        <td><?= $detail['nama']; ?></td>
      </tr>
      <tr>
        <th>Bank</th>
        <td><?= $detail['bank']; ?></td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td>Rp. <?= number_format($detail['jumlah']); ?>,-</td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><?= $detail['tanggal']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <img src="../bukti_pembayaran/<?= $detail['bukti']; ?>" alt="" class="img-responsive">
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <form action="" method="post">
      <div class="form-group">
        <Label>No Resi Pelayanan</Label>
        <input type="text" class="form-control" name="resi">
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
          <option value="">Pilih Status</option>
          <option value="Belum dibayar">Belum dibayar</option>
          <option value="Sudah mengirim pembayaran">Sudah mengirim pembayaran</option>
          <option value="Batal">Batal</option>
          <option value="Lunas">Lunas</option>
        </select>
      </div>
      <button class="btn btn-success" name="proses">Proses</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['proses'])){
  $resi = $_POST['resi'];
  $status = $_POST['status'];
  $koneksi->query("UPDATE pemesanan SET resi_pelayanan='$resi', status_pemesanan='$status' WHERE id_pemesanan='$id_pemesanan'");

  echo "<script>alert('Data pemesanan terupdate');</script>";
  echo "<script>location='index.php?halaman=pemesanan';</script>";
}

?>


