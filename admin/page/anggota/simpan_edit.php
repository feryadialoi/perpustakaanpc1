<?php
$conn = mysqli_connect('localhost','root','','perpustakaanpc');
 $nis = $_REQUEST['nis'];
 $nama_anggota = $_REQUEST['nama_anggota'];
 $tmp_lahir = $_REQUEST['tmp_lahir'];
 $tgl_lahir = $_REQUEST['tgl_lahir'];
 $jk = $_REQUEST['jk'];
 $tingkat = $_REQUEST['tingkat'];

 $conn->query("UPDATE tb_anggota SET nis='$nis',nama_anggota='$nama_anggota',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',jk='$jk',tingkat='$tingkat' WHERE nis='$nis'");

?>
