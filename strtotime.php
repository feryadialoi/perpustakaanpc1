<?php

date_default_timezone_set('Asia/Jakarta');

$tgl1 = "06-2-2016";
$tgl2 = "08-2-2016";
$selisih = strtotime($tgl1) -  strtotime($tgl2);
$hari = $selisih/(60*60*24);
echo "Selisih tanggal $tgl2 dan $tgl1 adalah $hari hari";
// Penjumlahan Tanggal di PHP
// -Menambahkan suatu tanggal beberapa hari, berikut adalah scriptnya:
echo "<br><br>";

$tgl1 = "2016-01-23";// pendefinisian tanggal awal
$tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
echo $tgl2; //print tanggal


?>
