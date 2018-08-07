<?php
// include '../koneksi.php';
$conn = mysqli_connect('localhost','root','','perpustakaan');
$transaksiR = $_GET['transaksiR'];
?>


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
      // $query = "SELECT * FROM tb_transaksi WHERE status = 'pinjam' OR judul LIKE '%$transaksiR%' OR nis LIKE '%$transaksiR%' OR nama LIKE '%$transaksiR%' OR tgl_pinjam LIKE '%$transaksiR%' OR tgl_kembali LIKE '%$transaksiR%'";
      $query = "SELECT * FROM tb_transaksi WHERE status LIKE '%$transaksiR%' OR judul LIKE '%$transaksiR%' OR nis LIKE '%$transaksiR%' OR nama LIKE '%$transaksiR%' OR tgl_pinjam LIKE '%$transaksiR%' OR tgl_kembali LIKE '%$transaksiR%'";
      $sql = $conn -> query($query);
      // $sql = $koneksi -> query("select*from tb_transaksi where status='pinjam'");
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
            echo "
            <font color='red'>$lambat hari<br>(Rp $denda_a)</font>


            ";
          }else{
            echo $lambat . "Hari";
          }
          ?>
        </td>
        <td><?php echo $data['status'];?></td>
        <td>
          <!-- <a href="?page=anggota&aksi=edit&id=<?php echo $data['nim'];?>" class="btn btn-info">Edit</a>
          <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Buku Berikut?')" href="?page=transaksi&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a> -->
        </td>
      </tr>


    <?php } ?>
  </tbody>
</table>
