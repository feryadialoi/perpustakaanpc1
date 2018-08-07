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
$pdf->Cell(190,7,'Laporan Data Buku.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,10,'NO',1,0,'C');
$pdf->Cell(40,10,'Judul',1,0,'C');
$pdf->Cell(40,10,'Pengarang ',1,0,'C');
$pdf->Cell(40,10,'Penerbit',1,0,'C');
$pdf->Cell(25,10,'Tahun Terbit',1,0,'C');
$pdf->Cell(40,10,'Kode Buku (ISBN)',1,0,'C');
$pdf->Cell(25,10,'Jumlah Buku',1,0,'C');
$pdf->Cell(25,10,'Lokasi',1,0,'C');
$pdf->Cell(25,10,'Tanggal Input',1,1,'C');


 $no = 1;
$pdf->SetFont('Arial','',10);
$query = mysqli_query($conn, "SELECT * FROM tb_buku");
while ($row = mysqli_fetch_array($query)){
//	$jk = ($row['jk']=='l')?"Laki - Laki":"Perempuan";

    $pdf->Cell(5,10,$no,1,0,'C');
    $pdf->Cell(40,10,$row['judul'],1,0,'C');
    $pdf->Cell(40,10,$row['pengarang'],1,0,'C');
    $pdf->Cell(40,10,$row['penerbit'],1,0,'C');
    $pdf->Cell(25,10,$row['tahun_terbit'],1,0,'C');
    $pdf->Cell(40,10,$row['isbn'],1,0,'C');
  	$pdf->Cell(25,10,$row['jumlah_buku'],1,0,'C');
    $pdf->Cell(25,10,$row['lokasi'],1,0,'C');
    $pdf->Cell(25,10,$row['tgl_input'],1,1,'C');
	$no++;
}

$pdf->Output();
?>
