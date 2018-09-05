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
<h2 align="center">Laporan Data Buku</h2></strong></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>ISBN</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
      <th>Jumlah Buku</th>
      <th>Sisa Buku</th>
      <th>Lokasi</th>
    </tr>
  </thead>
  <tbody>'.

  $no = 1;
  $query = "SELECT DISTINCT t1.judul,
                            t1.isbn,
                            t2.pengarang,
                            t2.penerbit,
                            t2.tahun_terbit,
                            t1.jumlah_buku,
                            t1.sisa_buku,
                            t2.lokasi
            FROM tb_buku t1
            INNER JOIN tb_detil_buku t2
            ON t1.isbn = t2.isbn
            WHERE t1.hapus = 'tidak'";
  $sql = $conn -> query($query);
  while ($data= $sql-> fetch_assoc()){
    $html .=
    '<tr>
      <td>'. $no++ .'</td>
      <td>'. $data["judul"] .'</td>
      <td>'. $data["isbn"] .'</td>
      <td>'. $data["pengarang"] .'</td>
      <td>'. $data["penerbit"] .'</td>
      <td>'. $data["tahun_terbit"] .'</td>
      <td>'. $data["jumlah_buku"] .'</td>
      <td>'. $data["sisa_buku"] .'</td>
      <td>'. $data["lokasi"] .'</td>
    </tr>';
  }
  $html .= '</tbody>
</table>
</body>
';

$mpdf->WriteHTML($html);

$mpdf->Output('laporan.pdf', \Mpdf\Output\Destination::INLINE);
?>
