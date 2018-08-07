<?php
// include '../koneksi.php';
$conn = mysqli_connect('localhost','root','','perpustakaan');
$anggotaR = $_GET['anggotaR'];
?>


<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Induk Sekolah</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Tingkat</th>
            <th>Aksi </th>
        </tr>
    </thead>
    <!-- fetching item dari database ke form -->
    <tbody>

      <?php
      $no = 1;
      $query = "SELECT * FROM tb_anggota WHERE nis LIKE '%$anggotaR%' OR nama LIKE '%$anggotaR%' OR tmp_lahir LIKE '%$anggotaR%' OR tgl_lahir LIKE '%$anggotaR%' OR jk LIKE '%$anggotaR%' OR tingkat LIKE '%$anggotaR%'";
      $sql = $conn -> query($query);
      while ($data= $sql-> fetch_assoc()){
      $jk = ($data['jk']=='l') ? "Laki - Laki":"Perempuan";
      ?>


      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nis'];?></td>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo $data['tmp_lahir'];?></td>
        <td><?php echo $data['tgl_lahir'];?></td>
        <td><?php echo $jk;?></td>
        <td><?php echo $data['tingkat'];?></td>
        <td>
          <a href="?page=anggota&aksi=edit&id=<?php echo $data['nis'];?>" class="btn btn-info">Edit</a>
          <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Anggota Berikut?')" href="?page=anggota&aksi=hapus&id=<?php echo $data['nis'];?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>


    <?php } ?>
    </tbody>
  </table>
