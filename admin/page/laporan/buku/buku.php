<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=laporan"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">


<h1>Laporan Data Buku</h1>
</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
				<!-- fetching item dari database ke form -->
			<tbody>
					<?php
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
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['judul'];?></td>
						<td><?php echo $data['isbn'];?></td>
						<td><?php echo $data['pengarang'];?></td>
						<td><?php echo $data['penerbit'];?></td>
						<td><?php echo $data['tahun_terbit'];?></td>
						<td><?php echo $data['jumlah_buku'];?></td>
						<td><?php echo $data['sisa_buku'];?></td>
						<td><?php echo $data['lokasi'];?></td>
					</tr>


					<?php } ?>
				</tbody>
			</table>

</div>
</div>
</div>
 <!-- <a target="_blank" class="btn btn-primary" href="page/laporan/buku/print/pdf_mysql.php" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> PRINT</a> -->
 <a target="_blank" href="../cetak_laporan/laporan_buku.php" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">print</i> Cetak Laporan</a>
