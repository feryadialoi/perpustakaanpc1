<?php //include_once '../function.php';?>
<a href="?page=peminjaman&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">add</i> Tambah Peminjaman</a>
<div class="row">
  <div class="col-md-12">
      <!-- Table data anggota -->
      <div class="panel panel-default">
          <div class="panel-heading">
               <h1>Data Peminjaman</h1>
          </div>
          <div class="panel-body">
              <div class="table-responsive" id="container-table-anggota">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example-peminjaman">
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
                              <th>Aksi</th>
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
                          <td>
                            <!-- button aksi menggunakan data-attr -->
                            <button data-lambat="<?php echo $lambat; ?>"
                                    data-maks="<?php echo $maks; ?>"
                                    data-denda="<?php echo $denda; ?>"
                                    data-pinjam="<?php echo $data['kode_pinjam']; ?>"
                                    data-toggle="modal"
                                    data-target="#modal_perpanjang" class="perpanjang btn btn-primary"><i class="material-icons md-18">autorenew</i></button>
                            <button data-pinjam="<?php echo $data['kode_pinjam']; ?>" data-toggle="modal" data-target="#modal_kembalikan" class="kembalikan btn btn-success"><i class="material-icons md-18">check</i></button>
                          </div>
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
