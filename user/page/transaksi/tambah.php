<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=transaksi"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<div class="panel panel-default">
<div class="panel-heading">
  <h1>Transaksi Peminjaman Buku</h1>
</div>
  <!-- free for Edit
  editable -->
<div class="panel-body">
  <!-- note : disable dgn readonly fungsinya berbeda kalo disable itu gk bisa masuk datanya. kalo readonly datanya masih bisa masuk  -->
                           <div class="row">
                             <div class="col-md-12">

                                   <form id="formTambahTransaksi" method="POST">
                                       <div class="form-group">
                                         <div class="form-group">
                                             <label>Nomor Induk Siswa</label>
                                             <input class="form-control" name="nis" id="nis" required/>
                                         </div>
                                         <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input class="form-control" name="nama" id="nama" readonly/>
                                            </div>
                                       <div class="form-group">
                                           <label>Nomor Buku / ISBN</label>
                                           <input class="form-control" name="isbn" id="isbn" required/>
                                       </div>
                                       <div class="form-group">
                                           <label>Judul Buku</label>
                                           <input class="form-control" name="judul" id="judul" readonly/>
                                       </div>
                                     <div class="form-group">
                                         <label>Tanggal Pinjam</label>
                                         <input class="form-control" name="tgl_pinjam" type="date" id="tgl_pinjam" value="<?php echo $tgl_pinjam ?>" required/>
                                     </div>
                                     <div class="form-group">
                                         <label>Tanggal Kembali</label>
                                         <input class="form-control" name="tgl_kembali" type="date" id="tgl_kembali" value="<?php echo $kembali ?>" required/>
                                     </div>
                                     <div class="form-group">
                                       <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"> -->
                                       <button type="submit" name="simpan" form="formTambahTransaksi" value="submit" class="btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
                                     </div>
                                   </div>
                               </form>
                              </div>
</div>
</div>
<!-- entah kenapa tanggal inputnya tidak berjalan -->
<!-- problem solved tanggal bisa berjalan -->
<!-- sebelumnya gk jalan coz lupa tanda petik ('') wakwkwkkwkwkwk -->
<?php
if(isset($_POST['simpan'])){
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];
  $judul = $_POST['judul'];
  $nama = $_POST['nama'];
  $nis = $_POST['nis'];
  $isbn = $_POST['isbn'];

$sql = $conn-> query("select * from tb_buku where judul = '$judul'");
while($data = $sql->fetch_assoc()){
$sisa = $data['jumlah_buku'];
  if($sisa == 0){
?>
          <script type="text/javascript">
          alert("Stock Buku Kosong!. Transaksi tidak bisa dilanjutkan!")
          window.location.href="?page=transaksi&aksi=tambah";
          </script>
<?php
}else{
  $sql1 = $conn->query("insert into tb_transaksi(judul, nis, nama, tgl_pinjam, tgl_kembali, status)values('$judul', '$nis', '$nama', '$tgl_pinjam', '$tgl_kembali', 'pinjam')"); //sudah fix

  $sql2 = $conn->query("update tb_buku set jumlah_buku=(jumlah_buku-1)where judul = '$judul'"); //sudah bner ini wae

  ?>
            <script type="text/javascript">
            alert("Simpan Data Berhasil")
            window.location.href="?page=transaksi";
            </script>
  <?php
}
  }
}
