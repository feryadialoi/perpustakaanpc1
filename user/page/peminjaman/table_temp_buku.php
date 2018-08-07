<?php
// include '../koneksi.php';
$conn = mysqli_connect('localhost','root','','perpustakaanpc');
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example-temp-buku">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Pengarang(s)</th>
      <th>Penerbit</th>
      <th>Kode Buku</th>
      <th>ISBN</th>
      <!-- <th>Tahun Terbit</th> -->
      <th>Aksi</th>
    </tr>
  </thead>
    <!-- fetching item dari database ke form -->
  <tbody>
      <?php
        $no = 1;
        $sql = $conn -> query("SELECT * FROM tb_temp_buku");
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
          <a class="btn btn-danger hapus_temp_buku" data-id="<?php echo $data['kode_buku']; ?>" href="javascript:void(0)"><i class="material-icons md-18">delete</i></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
