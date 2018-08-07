<?php
include '../koneksi.php';
	//$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
$query = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE nis='".mysqli_escape_string($conn, $_POST['nis'])."'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
?>
