<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=laporan"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">


<h1>Laporan Data Buku</h1>
</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-striped table-bordered" >
			<thead>
				<tr>
          <th>No</th>
        	<th>Judul</th>
        	<th>Pengarang</th>
        	<th>Penerbit</th>
        	<th>Tahun Terbit</th>
        	<th>Kode Buku (ISBN)</th>
        	<th>Jumlah Buku</th>
          <th>Lokasi</th>
          <th>Tanggal Input</th>
				</tr>
			</thead>
<?php



	$no = 1;
	$p = mysqli_query($conn,"SELECT * FROM tb_buku");

	while($data = mysqli_fetch_array($p)){
		echo"<tr>
				<td>$no</td>
				<td>$data[judul]</td>
				<td>$data[pengarang]</td>
				<td>$data[penerbit]</td>
				<td>$data[tahun_terbit]</td>
				<td>$data[isbn]</td>
				<td>$data[jumlah_buku]</td>
        <td>$data[lokasi]</td>
        <td>$data[tgl_input]</td>
			</tr>";
	$no++;
	}

?>
</table>

</div>
</div>
</div>
 <!-- <a target="_blank" class="btn btn-primary" href="page/laporan/buku/print/pdf_mysql.php" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> PRINT</a> -->
<a target="_blank" href="../laporan_buku.php" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> Cetak Laporan</a>
