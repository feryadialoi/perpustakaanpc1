<?php //include '../function.php'; ?>
<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=laporan"><i class="material-icons md-18">chevron_left</i> Kembali</a>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading">
     <h1>Laporan Peminjaman Masih Dipinjam</h1>
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example-pinjam">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Terlambat</th>
                <th>Total Denda</th>
                <th>Status Pinjam</th>
            </tr>
        </thead>
        <!-- fetching item dari database ke form -->
        <tbody>
          <?php
          $no = 1;
          $query = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t1.tgl_pinjam,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam";
          $query1 = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t3.nama_anggota,t1.tgl_pinjam,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda,t1.status_pinjam
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam
                    INNER JOIN tb_anggota t3
                    ON t1.nis = t3.nis
                    WHERE t1.status_pinjam = 'pinjam'";

          $sql = $conn -> query($query1);
          while ($data= $sql-> fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['kode_pinjam'];?></td>
            <td><?php echo $data['nis'];?></td>
            <td><?php echo $data['nama_anggota'];?></td>
            <td><?php echo $data['tgl_pinjam'];?></td>
            <td><?php echo $data['tgl_kembali'];?></td>
            <td>
              <?php
                if ($data['lama_terlambat']>0) {
                  echo "<font color='red'>".$data['lama_terlambat']." Hari</font>";
                }else {
                  echo $data['lama_terlambat']." Hari";
                }
              ?>
            </td>
            <td>
              <?php
              if ($data['grandtotal_denda']>0) {
                echo "<font color='red'>Rp ".$data['grandtotal_denda']."</font>";
              }else {
                echo "Rp ".$data['grandtotal_denda'];
              }
              ?>
            </td>
            <td><?php echo $data['status_pinjam'];?></td>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<a target="_blank" href="../cetak_laporan/laporan_peminjaman_pinjam.php" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> Cetak Laporan</a>



<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading">
     <h1>Laporan Detil Peminjaman Masih Dipinjam</h1>
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example-pinjam2">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>ISBN</th>
                <th>Kode Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Terlambat</th>
                <th>Denda</th>
                <th>Subtotal Denda</th>
                <th>Status Pinjam</th>
            </tr>
        </thead>
        <!-- fetching item dari database ke form -->
        <tbody>
          <?php
          $no = 1;
          $query = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t1.tgl_pinjam,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam";
          $query1 = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t3.nama_anggota,t1.tgl_pinjam,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda,t1.status_pinjam
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam
                    INNER JOIN tb_anggota t3
                    ON t1.nis = t3.nis
                    ";
          $query2 = "SELECT* FROM tb_anggota t1
                    INNER JOIN tb_peminjaman t2
                    ON t1.nis = t2.nis
                    INNER JOIN tb_detil_peminjaman t3
                    ON t2.kode_pinjam = t3.kode_pinjam
                    WHERE t2.status_pinjam = 'pinjam'";

          $sql2 = $conn -> query($query2);
          while ($data2= $sql2-> fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data2['kode_pinjam'];?></td>
            <td><?php echo $data2['nis'];?></td>
            <td><?php echo $data2['nama_anggota'];?></td>
            <td><?php echo $data2['isbn'];?></td>
            <td><?php echo $data2['kode_buku'];?></td>
            <td><?php echo $data2['tgl_pinjam'];?></td>
            <td><?php echo $data2['tgl_kembali'];?></td>
            <td>
              <?php
                if ($data2['lama_terlambat']>0) {
                  echo "<font color='red'>".$data2['lama_terlambat']." Hari</font>";
                }else {
                  echo $data2['lama_terlambat']." Hari";
                }
              ?>
            </td>
            <td><?php echo "Rp ".$data2['denda'];?></td>
            <td>
              <?php
                if ($data2['subtotal_denda']>0){
                  echo "<font color='red'>Rp ".$data2['subtotal_denda']."</font>";
                }else {
                  echo "Rp ".$data2['subtotal_denda'];
                }
              ?>
            </td>
            <td><?php echo $data2['status_pinjam'];?></td>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<a target="_blank" href="../cetak_laporan/laporan_detil_peminjaman_pinjam.php" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> Cetak Laporan</a>
