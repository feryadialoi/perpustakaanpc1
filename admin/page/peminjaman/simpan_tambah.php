<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');

  $denda = $_REQUEST['denda'];
  $kode_pinjam = $_REQUEST['kode_pinjam'];
  $nis = $_REQUEST['nis'];
  $tgl_pinjam = $_REQUEST['tgl_pinjam'];
  $nama = $_REQUEST['nama'];
  $lama_pinjam = $_REQUEST['lama_pinjam'];




  // definisi tanggal kembali
  $tgl_kembali = date('Y-m-d', strtotime('+'.$lama_pinjam.' days', strtotime($tgl_pinjam))); //operasi penjumlahan tanggal sebanyak 6 hari
  //print tanggal
  //echo $tgl_kembali;

  //query insert tb_peminjaman
  $conn->query("INSERT INTO tb_peminjaman (kode_pinjam, nis, tgl_pinjam,status_pinjam)
                VALUES ('$kode_pinjam','$nis','$tgl_pinjam','pinjam')");

  //query insert tb_detil_peminjaman
  $conn->query("INSERT INTO tb_detil_peminjaman (kode_pinjam,kode_buku,isbn,judul,tgl_pinjam,lama_pinjam,tgl_kembali,denda)
                SELECT '$kode_pinjam',kode_buku, isbn, judul,'$tgl_pinjam','$lama_pinjam','$tgl_kembali','$denda'
                FROM tb_temp_buku
                WHERE kode_buku = kode_buku");

  //eksekusi kurang sisa buku
  $sql = $conn->query("SELECT * from tb_detil_peminjaman WHERE kode_pinjam = '$kode_pinjam'");
  while ($data = $sql->fetch_assoc() ) {
    $isbn = $data['isbn'];
    $conn->query("UPDATE tb_buku SET sisa_buku = (sisa_buku-1) WHERE isbn = '$isbn'");
  }


?>
