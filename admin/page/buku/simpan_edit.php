<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $isbn = $_REQUEST['isbn'];
  $judul = $_REQUEST['judul'];
  $pengarang = $_REQUEST['pengarang'];
  $penerbit = $_REQUEST['penerbit'];
  $tahun_terbit = $_REQUEST['tahun_terbit'];
  $jumlah_buku = $_REQUEST['jumlah_buku'];
  $lokasi = $_REQUEST['lokasi'];

  // $conn->query("UPDATE tb_buku SET isbn='$isbn', judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', jumlah_buku='$jumlah_buku', lokasi='$lokasi' WHERE isbn='$isbn'");

  $conn->query("UPDATE tb_buku
                SET isbn = '$isbn', judul = '$judul', jumlah_buku = '$jumlah_buku', sisa_buku = '$jumlah_buku'
                WHERE isbn = '$isbn'");
  $conn->query("DELETE FROM tb_detil_buku WHERE isbn = '$isbn'");

  for ($i=1; $i <= $jumlah_buku ; $i++) {
    $kode_buku = $isbn.'-'.sprintf('%03d',$i);
    $conn->query("INSERT INTO tb_detil_buku (kode_buku,isbn,judul,pengarang,penerbit,tahun_terbit,lokasi)
                  VALUES ('$kode_buku','$isbn','$judul','$pengarang','$penerbit','$tahun_terbit','$lokasi')");
  }


?>
