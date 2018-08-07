<!-- btn tambah buku baru -->
<?php include '../function.php'; ?>
<a href="?page=transaksi&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">add</i> Tambah Transaksi</a>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading">
     <h1>Data Transaksi</h1>
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Nomor Induk Siswa</th>
              <th>Nama</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Terlambat</th>
              <th>Status</th>
              <th>Aksi </th>
          </tr>
        </thead>
          <!-- fetching item dari database ke form -->
        <tbody>

            <?php
            $no = 1;
            $sql = $conn -> query("SELECT * FROM tb_transaksi WHERE status='pinjam'");
            while ($data= $sql-> fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['judul'];?></td>
              <td><?php echo $data['nis'];?></td>
              <td><?php echo $data['nama'];?></td>
              <td><?php echo $data['tgl_pinjam'];?></td>
              <td><?php echo $data['tgl_kembali'];?></td>
              <td>
                <?php
                 $denda = 1000;
                 $tgl_dateline = $data['tgl_kembali'];
                  $tgl_kembali = date('Y-m-d');
              //   echo $tgl_dateline2;a
                 $lambat = terlambat($tgl_dateline, $tgl_kembali);
                 //echo $lambat;
                  $denda_a = $lambat * $denda;
              //atur keterlambatan pengembalian denda
                if($lambat>0){
                  echo "<font color='red'>$lambat hari<br>(Rp $denda_a)</font>";
                }else{
                  echo $lambat . " Hari";
                }
                ?>
              </td>
              <td><?php echo $data['status'];?></td>
              <td>
                 <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id'];?>&judul=<?php echo $data['judul']; ?>&lambat=<?php echo $lambat; ?>&tgl_kembali=<?php echo $data['tgl_kembali']; ?>" class="btn btn-primary"><i class="material-icons md-18">next_week</i> Perpanjang</a>
                 <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id'];?>&judul=<?php echo $data['judul']; ?>" class="btn btn-primary"><i class="material-icons md-18">check</i> Kembalikan</a>
              </td>
          <?php } ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
