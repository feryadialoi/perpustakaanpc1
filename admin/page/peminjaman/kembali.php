<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $kode_pinjam = $_REQUEST['kode_pinjam'];

  $sql2 = "UPDATE tb_peminjaman SET status_pinjam = 'kembali' WHERE kode_pinjam = '$kode_pinjam'";

  $conn->query($sql2);

  //eksekusi tambah sisa buku
  $sql3 = $conn->query("SELECT * from tb_detil_peminjaman WHERE kode_pinjam = '$kode_pinjam'");
  while ($data = $sql3->fetch_assoc()) {
    $isbn = $data['isbn'];
    $conn->query("UPDATE tb_buku SET sisa_buku = (sisa_buku+1) WHERE isbn = '$isbn'");
    $kode_buku = $data['kode_buku'];
    $conn->query("UPDATE tb_detil_buku SET status_pinjam = 'kembali' WHERE kode_buku = '$kode_buku'");

  }



?>
