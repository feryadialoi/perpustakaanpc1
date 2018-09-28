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
<h2 align="center">Laporan Detil Peminjaman Sudah Dikembalikan</h2></strong></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
  <tr>
    <th>No</th>
    <th>Kode Pinjam</th>
    <th>Nis</th>
    <th>Nama</th>
    <th>ISBN</th>
    <th>Kode Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Terlambat</th>
    <th>Denda</th>
    <th>Subtotal Denda</th>
    <th>Status Pinjam</th>
  </tr>
  </thead>
  <tbody>'.

  $no = 1;
  $query = "SELECT DISTINCT t1.kode_pinjam,t1.nis,t3.nama_anggota,t1.tgl_pinjam,t2.tgl_kembali,t2.lama_terlambat,t1.grandtotal_denda,t1.status_pinjam
            FROM tb_peminjaman t1
            INNER JOIN tb_detil_peminjaman t2
            ON t1.kode_pinjam = t2.kode_pinjam
            INNER JOIN tb_anggota t3
            ON t1.nis = t3.nis
            WHERE t1.status_pinjam = 'kembali'";
  $query1 = "SELECT * FROM tb_anggota t1
            INNER JOIN tb_peminjaman t2
            ON t1.nis = t2.nis
            INNER JOIN tb_detil_peminjaman t3
            ON t2.kode_pinjam = t3.kode_pinjam
            WHERE t2.status_pinjam = 'kembali'";

  $sql = $conn -> query($query1);
  while ($data= $sql-> fetch_assoc()){
    $html .=
    '<tr>
      <td>'. $no++ .'</td>
      <td>'. $data["kode_pinjam"] .'</td>
      <td>'. $data["nis"] .'</td>
      <td>'. $data["nama_anggota"] .'</td>
      <td>'. $data["isbn"] .'</td>
      <td>'. $data["kode_buku"] .'</td>
      <td>'. $data["tgl_pinjam"] .'</td>
      <td>'. $data["tgl_kembali"] .'</td>';
      if ($data["lama_terlambat"]>0) {
        $html .= '<td><font color="red">'. $data["lama_terlambat"].' Hari</font></td>';
      }else {
        $html .= '<td>'. $data["lama_terlambat"].' Hari</td>';
      }
      $html .='
      <td>Rp '. $data['denda'].'</td>';

      if ($data["subtotal_denda"]>0) {
        $html .= '<td><font color="red">Rp '. $data["subtotal_denda"].'</font></td>';
      }else {
        $html .= '<td>Rp '. $data["subtotal_denda"].'</td>';
      }
      $html .='
      <td>'. $data["status_pinjam"] .'</td>
    </tr>';
  }
  $html .= '</tbody>
  </table>
  ';

  $mpdf->WriteHTML($html);

  $mpdf->Output('laporan.pdf', \Mpdf\Output\Destination::INLINE);
  ?>
