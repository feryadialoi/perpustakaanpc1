<?php
 $conn = mysqli_connect('localhost','root','','perpustakaanpc');

 $nis = $_REQUEST['nis'];
 $nama_anggota = $_REQUEST['nama_anggota'];
 $tmp_lahir = $_REQUEST['tmp_lahir'];
 $tgl_lahir = $_REQUEST['tgl_lahir'];
 $jk = $_REQUEST['jk'];
 $tingkat = $_REQUEST['tingkat'];
 $username = $_REQUEST['username'];

 $conn->query("INSERT INTO tb_anggota (nis,nama_anggota,tmp_lahir,tgl_lahir,jk,tingkat,hapus,username)
 VALUES('$nis','$nama_anggota','$tmp_lahir','$tgl_lahir','$jk','$tingkat','tidak','$username')");
?>
