<?php
 $conn = mysqli_connect('localhost','root','','perpustakaanpc');

 $nis = $_REQUEST['nis'];
 $nama_anggota = $_REQUEST['nama_anggota'];
 $tmp_lahir = $_REQUEST['tmp_lahir'];
 $tgl_lahir = $_REQUEST['tgl_lahir'];
 $jk = $_REQUEST['jk'];
 $tingkat = $_REQUEST['tingkat'];
 $nama_user = $_REQUEST['nama_user'];

 $conn->query("INSERT INTO tb_anggota (nis,nama_anggota,tmp_lahir,tgl_lahir,jk,tingkat,hapus,nama_user)
 VALUES('$nis','$nama_anggota','$tmp_lahir','$tgl_lahir','$jk','$tingkat','tidak','$nama_user')");
?>
