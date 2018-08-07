<?php
require_once __DIR__ . './vendor/autoload.php';
include '../function.php';
include '../koneksi.php';
// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

$html = '
<body style="font-family:arial;">
<H2 align="center">Sekolah Pelita Cemerlang</H2>
<p align="center"><strong>Jl. Perdana no. 18 Pontianak Tenggara<br>
<h2 align="center">Laporan Data Anggota</h2></strong></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Tingkat</th>
      <th>Nama User</th>
    </tr>
  </thead>
  <tbody>'.

  $no = 1;
  // $sql = $conn -> query("SELECT * FROM tb_transaksi WHERE tgl_pinjam BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()");
  $sql = $conn -> query("SELECT * FROM tb_anggota");
  while ($data= $sql-> fetch_assoc()){
    $jk = ($data['jk']=='l')?"Laki - Laki":"Perempuan";
    $html .=
    '<tr>
      <td>'. $no++ .'</td>
      <td>'. $data["nis"] .'</td>
      <td>'. $data["nama_anggota"] .'</td>
      <td>'. $data["tmp_lahir"] .'</td>
      <td>'. $data["tgl_lahir"] .'</td>
      <td>'. $jk .'</td>
      <td>'. $data["tingkat"] .'</td>
      <td>'. $data["nama_user"] .'</td>
    </tr>';
  }
  $html .= '</tbody>
</table>
</body>
';

$mpdf->WriteHTML($html);

$mpdf->Output('laporan.pdf', \Mpdf\Output\Destination::INLINE);
?>
