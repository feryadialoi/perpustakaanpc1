<?php
// include '../koneksi.php';
$conn = mysqli_connect('localhost','root','','perpustakaan');
$bukuR = $_GET['bukuR'];
?>


<table class="table table-striped table-bordered table-hover" id="dataTables-x">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Pengarang(s)</th>
      <th>Penerbit</th>
      <th>ISBN(Kode Buku)</th>
      <th>Jumlah Buku</th>
      <th>Aksi </th>
    </tr>
  </thead>
    <!-- fetching item dari database ke form -->
  <tbody>
      <?php
        $no = 1;
        $query = "SELECT * FROM tb_buku WHERE judul LIKE '%$bukuR%' OR pengarang LIKE '%$bukuR%' OR penerbit LIKE '%$bukuR%' OR isbn LIKE '%$bukuR%' OR jumlah_buku LIKE '%$bukuR%'";
        $sql = $conn -> query($query);
        while ($data= $sql-> fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['judul'];?></td>
        <td><?php echo $data['pengarang'];?></td>
        <td><?php echo $data['penerbit'];?></td>
        <td><?php echo $data['isbn'];?></td>
        <td><?php echo $data['jumlah_buku'];?></td>
        <td>
          <a href="?page=buku&aksi=edit&id=<?php echo $data['id'];?>" class="btn btn-info">Edit</a>
          <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Buku Berikut?')" href="?page=buku&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>


      <?php } ?>
    </tbody>
  </table>
