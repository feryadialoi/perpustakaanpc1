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
<h2 align="center">Laporan Peminjaman Per 30 Hari Terakhir</h2></strong></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Nomor Induk Siswa</th>
      <th>Nama</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
      <th>Terlambat</th>
      <th>Denda</th>
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
            WHERE t1.tgl_pinjam BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";

  $sql = $conn -> query($query1);
  while ($data= $sql-> fetch_assoc()){
    $html .=
    '<tr>
      <td>'. $no++ .'</td>
      <td>'. $data["kode_pinjam"] .'</td>
      <td>'. $data["nis"] .'</td>
      <td>'. $data["nama_anggota"] .'</td>
      <td>'. $data["tgl_pinjam"] .'</td>
      <td>'. $data["tgl_kembali"] .'</td>
      <td>';

      $tgl_dateline = $data['tgl_kembali'];
      $tgl_kembali = date('Y-m-d');

      $lambat = terlambat($tgl_dateline, $tgl_kembali);

      $denda_a = $lambat * $denda;

      if($lambat>0){
        $html .='<font color="red">'.$lambat.' Hari</font>';
      }else{
        $html .= $lambat . ' Hari';
      }

      $html .= '</td>
      <td>';
      $tgl_dateline = $data['tgl_kembali'];
      $tgl_kembali = date('Y-m-d');

      $lambat = terlambat($tgl_dateline, $tgl_kembali);

      $denda_a = $lambat * $denda;

      if($lambat>0){
        $html .='<font color="red">Rp '.$denda_a.'</font>';
      }else{
        $html .='Rp '.$denda_a;
      }


      $html .= '</td>';

      $html .= '<td>'. $data["status_pinjam"] .'</td>
    </tr>';
  }
  $html .= '</tbody>
</table>
';

$mpdf->WriteHTML($html);

$mpdf->Output('laporan.pdf', \Mpdf\Output\Destination::INLINE);
?>
