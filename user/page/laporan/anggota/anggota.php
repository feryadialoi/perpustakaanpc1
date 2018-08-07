<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=laporan"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">


<h1>Laporan Data Anggota</h1>
</div>

<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-striped table-bordered" >
			<thead>
				<tr>
					<th>No</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Tingkat</th>
				</tr>
			</thead>
<?php


	$no = 1;
	$p = mysqli_query($conn,"SELECT * FROM tb_anggota");

	while($data = mysqli_fetch_array($p)){
	  $jk = ($data['jk']=='l')?"Laki - Laki":"Perempuan";
		echo"<tr>
				<td>$no</td>
				<td>$data[nis]</td>
				<td>$data[nama]</td>
				<td>$data[tmp_lahir]</td>
				<td>$data[tgl_lahir]</td>
				<td>$jk</td>
				<td>$data[tingkat]</td>
			</tr>";
	$no++;
	}

?>
</table>

</div>
</div>
</div>
 <!-- <a target="_blank" class="btn btn-primary" href="page/laporan/anggota/print/pdf_mysql.php" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> PRINT</a> -->
<a target="_blank" href="../laporan_anggota.php" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> Cetak Laporan</a>
