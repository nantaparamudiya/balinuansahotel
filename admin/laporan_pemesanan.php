<?php
$semuadata = [];
$tgl_mulai = "-";
$tgl_selesai = "-";
$status ="";
if(isset($_POST['kirim'])){
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];
  $status = $_POST["status"];
  $ambil = $koneksi->query("SELECT * FROM pemesanan pm LEFT JOIN tamu pl ON pm.id_tamu=pl.id_tamu WHERE status_pemesanan='$status' AND tanggal_pemesanan BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while($pecah = $ambil->fetch_assoc()){
    $semuadata[] = $pecah;
  }

  // echo "<pre>";
  // print_r($semuadata);
  // echo "</pre>";

}


?>


<h2>Laporan Pemesanan dari <?= $tgl_mulai; ?> sampai <?= $tgl_selesai; ?></h2>
<hr>

<form action="" method="post">
  <div class="row">
    <div class="col-md-3">
        <label>DARI TANGGAL</label>
        <input type="date" class="form-control" name="tglm" value="<?= $tgl_mulai; ?>">
      </div>
    <div class="col-md-3">
        <label>SAMPAI TANGGAL</label>
        <input type="date" class="form-control" name="tgls" value="<?= $tgl_selesai; ?>">
      </div>
      <div class="col-md-3">
        <label>STATUS</label>
        <select class="form-control" name="status">
        <option value="">Pilih Status</option>
          <option value="Belum dibayar" <?php echo $status=="Belum dibayar"?"selected":""; ?> >Belum dibayar</option>
          <option value="Sudah mengirim pembayaran" <?php echo $status=="Sudah mengirim pembayaran"?"selected":""; ?> >Sudah mengirim pembayaran</option>
          <option value="Batal" <?php echo $status=="Batal"?"selected":""; ?> >Batal</option>
          <option value="Lunas" <?php echo $status=="Lunas"?"selected":""; ?> >Lunas</option>
        </select>
      </div>
    <div class="col-md-2">
      <label>&nbsp;</label><br>
      <button class="btn btn-primary" name="kirim"><i class="glyphicon glyphicon-tasks"></i>Lihat Laporan</button>
    </div>
  </div>
</form>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Tamu</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $total=0; ?>
    <?php foreach($semuadata as $key => $value): ?>
    <?php $total += $value['total_pembayaran']; ?>
    <tr>
      <td><?= $key+1; ?>.</td>
      <td><?= $value['nama_tamu']; ?></td>
      <td><?= date("d-F-Y",strtotime($value["tanggal_pemesanan"])); ?></td>
      <td>IDR. <?= number_format($value['total_pembayaran']); ?>,-</td>
      <td><?= $value['status_pemesanan']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="3">Total</th>
      <th>IDR. <?= number_format($total); ?>,-</th>
    </tr>
  </tfoot>
</table>