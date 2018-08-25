<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $isbn = $_REQUEST['isbn'];
  $judul = $_REQUEST['judul'];
  $pengarang = $_REQUEST['pengarang'];
  $penerbit = $_REQUEST['penerbit'];
  $tahun_terbit = $_REQUEST['tahun_terbit'];
  $jumlah_buku = $_REQUEST['jumlah_buku'];
  $lokasi = $_REQUEST['lokasi'];
  $username = $_REQUEST['username'];

  // $conn->query("INSERT INTO tb_buku (isbn,judul,pengarang,penerbit,tahun_terbit,jumlah_buku,lokasi) VALUES('$isbn','$judul','$pengarang','$penerbit','$tahun_terbit','$jumlah_buku','$lokasi')");
  $conn->query("INSERT INTO tb_buku (isbn,judul,jumlah_buku,sisa_buku,hapus,username)
                VALUES ('$isbn','$judul','$jumlah_buku','$jumlah_buku','tidak','$username')");

  for ($i=1; $i <= $jumlah_buku ; $i++) {
    $kode_buku = $isbn.'-'.sprintf('%03d',$i);
    $conn->query("INSERT INTO tb_detil_buku (kode_buku,isbn,judul,pengarang,penerbit,tahun_terbit,lokasi,status_pinjam,arsip,hapus)
                  VALUES ('$kode_buku','$isbn','$judul','$pengarang','$penerbit','$tahun_terbit','$lokasi','kembali','tidak','tidak')");
  }

  $kode_buku2 = $isbn.'-'.sprintf('%03d',1);
  $conn->query("UPDATE tb_detil_buku SET arsip = 'ya' WHERE kode_buku = '$kode_buku2' ");





?>
