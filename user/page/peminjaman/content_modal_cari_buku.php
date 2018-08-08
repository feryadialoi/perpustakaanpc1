<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
?>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example-buku-modal">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kode Buku</th>
                <th>ISBN</th>
                <!-- <th>Tahun Terbit</th> -->
                <th>Aksi </th>
              </tr>
            </thead>
              <!-- fetching item dari database ke form -->
            <tbody>
                <?php
                  $no = 1;
                  $sql = $conn -> query("SELECT * FROM tb_detil_buku WHERE status_pinjam = 'kembali' AND arsip = 'tidak'");
                  while ($data= $sql-> fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['judul'];?></td>
                  <td><?php echo $data['pengarang'];?></td>
                  <td><?php echo $data['penerbit'];?></td>
                  <td><?php echo $data['kode_buku'];?></td>
                  <td><?php echo $data['isbn'];?></td>
                  <!-- <td><?php //echo $data['tahun_terbit'];?></td> -->
                  <td>
                    <button id="btn_kode_buku" type="submit" form="cari_kode_buku" data-id="<?php echo $data['kode_buku']; ?>" class="simpan_temp_buku_modal btn btn-primary"><i class="material-icons md-18">add</i></button>
                  </td>
                </tr>

                <?php } ?>
              </tbody>
            </table>
<script type="text/javascript">
$(document).ready(function () {
  $('#dataTables-example-buku-modal').DataTable();
});
</script>
