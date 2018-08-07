<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $kode_pinjam = $_REQUEST['kode_pinjam'];
?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="material-icons">check</i> Kembalikan Peminjaman</h4>
      </div>
      <div id="body_perpanjang" class="modal-body">
<!-- ============================================================================== -->
        <?php
          $sql = $conn -> query("SELECT * FROM tb_peminjaman t1
                                INNER JOIN tb_anggota t2
                                ON t1.nis = t2.nis
                                WHERE kode_pinjam = '$kode_pinjam'");
          while ($data= $sql-> fetch_assoc()){
        ?>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            Nama
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <?php echo ": ".$data['nama_anggota']; ?>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            NIS
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <?php echo ": ".$data['nis']; ?>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            Kode Pinjam
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <?php echo ": ".$data['kode_pinjam']; ?>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            Tanggal Pinjam
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <?php echo ": ".$data['tgl_pinjam']; ?>
          </div>
        </div>
        <?php } ?>
        <hr>
        <p><center><b>Daftar Peminjaman</b></center></p>
        <div class="table-responsive" id="container-table-buku">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example-kembalikan">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kode Buku</th>
                <th>ISBN</th>
              </tr>
            </thead>
              <!-- fetching item dari database ke form -->
              <tbody>
                  <?php
                    $no = 1;
                    $query = "SELECT * FROM tb_detil_peminjaman t1
                              INNER JOIN tb_detil_buku t2
                              ON t1.kode_buku = t2.kode_buku
                              WHERE kode_pinjam = '$kode_pinjam'";
                    $query1 = "";
                    $sql = $conn -> query($query);
                    while ($data= $sql-> fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['pengarang'];?></td>
                    <td><?php echo $data['penerbit'];?></td>
                    <td><?php echo $data['kode_buku'];?></td>
                    <td><?php echo $data['isbn'];?></td>
                  </tr>

                  <?php } ?>
                </tbody>
            </table>
        </div>
<!-- ============================================================================== -->
      </div>
      <div class="modal-footer">
        <button data-confirm-kembalikan="<?php echo $kode_pinjam; ?>" style="min-width:80px;" type="button" class="confirm_kembalikan btn btn-primary" >Kembalikan</button>
        <button style="min-width:80px;" type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>

<script type="text/javascript">
  $(document).ready(function () {
  	$('#dataTables-example-kembalikan').DataTable();
  });
</script>
