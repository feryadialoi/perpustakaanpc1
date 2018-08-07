<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM tb_buku WHERE isbn='".mysqli_escape_string($conn, $_POST['isbn'])."'");
$data = mysqli_fetch_array($query);

echo json_encode($data);
?>
