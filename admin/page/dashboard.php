<!-- tagline -->
  <p class="dashboard-text">Selamat Datang!</p>
  <p class="dashboard-text2">Di Halaman Pengelolaan Aplikasi Perpustakaan Sekolah Pelita Cemerlang</p>
<!-- menu dashboard start-->
<hr>
<div class="row">
  <div class="content-dash-item col-sm-6 col-xs-12 col-md-6 col-lg-4 col-xl-4">
    <div class="dash-item col-sm-12 col-xs-12">
      <p>Jumlah Anggota :</p>
      <p>
        <?php
          $sql = "SELECT * FROM tb_anggota";
          $result = mysqli_query($conn,$sql);
          $rows = mysqli_num_rows($result);
          echo "<strong>".$rows." orang</strong>";
        ?>
      </p>
      <hr>
    </div>
  </div>
  <div class="content-dash-item col-sm-6 col-xs-12 col-md-6 col-lg-4 col-xl-4">
    <div class="dash-item col-sm-12 col-xs-12">
      <p>Jumlah Judul Buku :</p>
      <p>
        <?php
        $sql = "SELECT judul FROM tb_buku";
          $result = mysqli_query($conn,$sql);
          $rows = mysqli_num_rows($result);
          echo "<strong>".$rows." judul</strong>";
        ?>
      </p>
      <hr>
    </div>
  </div>
  <div class="content-dash-item col-sm-6 col-xs-12 col-md-6 col-lg-4 col-xl-4">
    <div class="dash-item col-sm-12 col-xs-12">
      <p>Jumlah Total Buku :</p>
      <p>
        <?php
        $sql = "SELECT SUM(jumlah_buku) AS total_buku FROM tb_buku";
          $result = mysqli_query($conn,$sql);
          $rows = mysqli_fetch_assoc($result);
          $sum = $rows['total_buku'];
          echo "<strong>".$sum." buku</strong>";
        ?>
      </p>
      <hr>
    </div>
  </div>
  <div class="content-dash-item col-sm-6 col-xs-12 col-md-6 col-lg-4 col-xl-4">
    <div class="dash-item col-sm-12 col-xs-12">
      <p>Jumlah Peminjam 30 Hari Terakhir :</p>
      <p>
        <?php
          $sql = "SELECT * FROM tb_peminjaman WHERE tgl_pinjam BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
          $result = mysqli_query($conn,$sql);
          $rows = mysqli_num_rows($result);
          echo "<strong>".$rows." orang</strong>";
        ?>
      </p>
      <hr>
    </div>
  </div>
  <div class="content-dash-item col-sm-6 col-xs-12 col-md-6 col-lg-4 col-xl-4">
    <div class="dash-item col-sm-12 col-xs-12">
      <p>Jumlah Buku Yang Dipinjam 30 Hari Terakhir :</p>
      <p>
        <?php
          $sql = "SELECT * FROM tb_peminjaman t1
                  INNER JOIN tb_detil_peminjaman t2
                  ON t1.kode_pinjam = t2.kode_pinjam
                  WHERE t1.status_pinjam='pinjam'
                  AND t1.tgl_pinjam BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
          $result = mysqli_query($conn,$sql);
          $rows = mysqli_num_rows($result);
          echo "<strong>".$rows." buku</strong>";
        ?>
      </p>
      <hr>
    </div>
  </div>
  <div class="content-dash-item col-sm-6 col-xs-12 col-md-6 col-lg-4 col-xl-4">
    <div class="dash-item col-sm-12 col-xs-12">
      <p>Jumlah Buku Yang Dikembalikan 30 Hari Terakhir :</p>
      <p>
        <?php
        $sql = "SELECT * FROM tb_peminjaman t1
                INNER JOIN tb_detil_peminjaman t2
                ON t1.kode_pinjam = t2.kode_pinjam
                WHERE t1.status_pinjam='kembali'
                AND t1.tgl_pinjam BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
          $result = mysqli_query($conn,$sql);
          $rows = mysqli_num_rows($result);
          echo "<strong>".$rows." buku</strong>";
        ?>
      </p>
      <hr>
    </div>
  </div>

</div>
<hr>
<!-- menu dashboard end -->

<?php //include '../function.php'; ?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading">
     <strong>Data Peminjaman Buku Berstatus Pinjam 30 Hari Terakhir</strong>
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
                <th>Tanggal Harus Kembali</th>
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
          $query = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t1.tgl_pinjam,t2.tgl_harus_kembali,t2.lama_terlambat,t1.grandtotal_denda
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam";
          $query1 = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t3.nama_anggota,t1.tgl_pinjam,t2.tgl_harus_kembali,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda,t1.status_pinjam
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
            <td><?php echo $data['tgl_harus_kembali'];?></td>
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
                // echo "<font color='red'>Rp ".$data['grandtotal_denda']."</font>";
                // echo "<font color='red'>Rp ".number_format($data['grandtotal_denda'],2,",",".")."</font><br>";
                echo "<font color='red'>Rp ".number_format($data['grandtotal_denda'])."</font>";
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

<!-- ============================================================================== -->

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading">
     <strong>Data Peminjaman Buku Berstatus Kembali 30 Hari Terakhir</strong>
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example-kembali">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Harus Kembali</th>
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
          $query = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t1.tgl_pinjam,t2.tgl_harus_kembali,t2.lama_terlambat,t1.grandtotal_denda
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam";
          $query1 = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t3.nama_anggota,t1.tgl_pinjam,t2.tgl_harus_kembali,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda,t1.status_pinjam
                    FROM tb_peminjaman t1
                    INNER JOIN tb_detil_peminjaman t2
                    ON t1.kode_pinjam = t2.kode_pinjam
                    INNER JOIN tb_anggota t3
                    ON t1.nis = t3.nis
                    WHERE t1.status_pinjam = 'kembali'";

                    $sql = $conn -> query($query1);
                    while ($data= $sql-> fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['kode_pinjam'];?></td>
                      <td><?php echo $data['nis'];?></td>
                      <td><?php echo $data['nama_anggota'];?></td>
                      <td><?php echo $data['tgl_pinjam'];?></td>
                      <td><?php echo $data['tgl_harus_kembali'];?></td>
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
                        if ($data['lama_terlambat']>0) {
                          echo "<font color='red'>Rp ".number_format($data['grandtotal_denda'])."</font>";
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
