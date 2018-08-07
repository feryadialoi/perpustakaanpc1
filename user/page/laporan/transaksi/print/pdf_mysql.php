<?php



$conn    = mysqli_connect("localhost", "root", "", "perpustakaan");


// Koneksi library FPDF
require('fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Sekolah Pelita Cemerlang',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Jl. Perdana no. 18 Pontianak Tenggara.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'NO',1,0,'C');
$pdf->Cell(40,10,'NIS',1,0,'C');
$pdf->Cell(40,10,'Nama ',1,0,'C');
$pdf->Cell(40,10,'Tempat Lahir',1,0,'C');
$pdf->Cell(40,10,'Tanggal Lahir',1,0,'C');
$pdf->Cell(40,10,'Jenis Kelamin',1,0,'C');
$pdf->Cell(20,10,'Tingkat',1,1,'C');

 $no = 1;
$pdf->SetFont('Arial','',10);
$query = mysqli_query($conn, "SELECT * FROM tb_anggota");
while ($row = mysqli_fetch_array($query)){
	$jk = ($row['jk']=='l')?"Laki - Laki":"Perempuan";

    $pdf->Cell(20,10,$no,1,0,'C');
    $pdf->Cell(40,10,$row['nis'],1,0,'C');
    $pdf->Cell(40,10,$row['nama'],1,0,'C');
    $pdf->Cell(40,10,$row['tmp_lahir'],1,0,'C');
    $pdf->Cell(40,10,$row['tgl_lahir'],1,0,'C');
    $pdf->Cell(40,10,$jk,1,0,'C');
	$pdf->Cell(20,10,$row['tingkat'],1,1,'C');
	$no++;
}

$pdf->Output();
?>
