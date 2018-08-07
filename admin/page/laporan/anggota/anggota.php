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
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Nama Anggota</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Tingkat</th>
					</tr>
				</thead>
				<!-- fetching item dari database ke form -->
				<tbody>
					<?php
						$no = 1;
						$query = "SELECT * FROM tb_anggota WHERE hapus = 'tidak'";
						$sql = $conn -> query($query);
						while ($data= $sql-> fetch_assoc()){
						$jk = ($data['jk']=='l')?"Laki - Laki":"Perempuan";
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nis'];?></td>
						<td><?php echo $data['nama_anggota'];?></td>
						<td><?php echo $data['tmp_lahir'];?></td>
						<td><?php echo $data['tgl_lahir'];?></td>
						<td><?php echo $jk;?></td>
						<td><?php echo $data['tingkat'];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

</div>
</div>
</div>
 <!-- <a target="_blank" class="btn btn-primary" href="page/laporan/anggota/print/pdf_mysql.php" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> PRINT</a> -->
 <a target="_blank" href="../cetak_laporan/laporan_anggota.php" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> Cetak Laporan</a>
