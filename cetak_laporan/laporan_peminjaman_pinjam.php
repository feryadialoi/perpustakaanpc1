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
<h2 align="center">Laporan Peminjaman Masih Dipinjam</h2></strong></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
  <tr>
    <th>No</th>
    <th>Kode Pinjam</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Terlambat</th>
    <th>Total Denda</th>
    <th>Status Pinjam</th>
  </tr>
  </thead>
  <tbody>'.

  $no = 1;
  $query1 = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t3.nama_anggota,t1.tgl_pinjam,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda,t1.status_pinjam
            FROM tb_peminjaman t1
            INNER JOIN tb_detil_peminjaman t2
            ON t1.kode_pinjam = t2.kode_pinjam
            INNER JOIN tb_anggota t3
            ON t1.nis = t3.nis
            WHERE t1.status_pinjam = 'pinjam'";

  $sql = $conn -> query($query1);
  while ($data= $sql-> fetch_assoc()){
    $html .=
    '<tr>
      <td>'. $no++ .'</td>
      <td>'. $data["kode_pinjam"] .'</td>
      <td>'. $data["nis"] .'</td>
      <td>'. $data["nama_anggota"] .'</td>
      <td>'. $data["tgl_pinjam"] .'</td>
      <td>'. $data["tgl_kembali"] .'</td>';
        if ($data["lama_terlambat"]>0) {
          $html .= '<td><font color="red">'. $data["lama_terlambat"].' Hari</font></td>';
        }else {
          $html .= '<td>'. $data["lama_terlambat"].' Hari</td>';
        }
        if ($data["grandtotal_denda"]>0) {
          $html .= '<td><font color="red">Rp '. number_format($data["grandtotal_denda"]).'</font></td>';
        }else {
          $html .= '<td>Rp '. number_format($data["grandtotal_denda"]).'</td>';
        }
      $html .='
      <td>'. $data['status_pinjam'].'</td>
    </tr>';
  }
  $html .= '</tbody>
  </table>
  ';

  $mpdf->WriteHTML($html);

  $mpdf->Output('laporan.pdf', \Mpdf\Output\Destination::INLINE);
  ?>
