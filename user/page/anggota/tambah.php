<!-- <div class="float-tombol">
  <a class="btn btn-primary" href="?page=anggota">Kembali</a>
</div> -->
<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=anggota"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<div class="panel panel-default">
<div class="panel-heading">
  <h1>Tambah Data Anggota</h1>
  </div>
<div class="panel-body">
                           <div class="row">
                               <div class="col-md-12">

                                   <form method="POST" id="formTambahAnggota">
                                       <div class="form-group">
                                           <label>Nomor Induk Siswa</label>
                                           <input class="form-control" name="nis" required/>

                                       </div>
                                       <div class="form-group">
                                           <label>Nama</label>
                                           <input class="form-control" name="nama" required/>

                                       </div>
                                       <div class="form-group">
                                           <label>Tempat Lahir</label>
                                           <input class="form-control" name="tmp_lahir" required/>

                                       </div>
                                       <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" name="tgl_lahir" type="date" required/>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                             <label>Jenis Kelamin</label>
                                             <select style="height:34px;"  class="form-control" name="jk">
                                                 <option value="l" >Laki - Laki</option>
                                                 <option value="p" >Perempuan</option>
                                             </select>
                                         </div>


                                         <div class="form-group">
                                              <label>Tingkat</label>
                                              <select style="height:34px;" class="form-control" name="tingkat">
                                                  <option value="TK/PG" >TK/PG</option>
                                                  <option value="SD" >SD</option>
                                                  <option value="SMP" >SMP</option>
                                                  <option value="SMA" >SMA</option>
                                              </select>
                                          </div>
                                         <div>
                                           <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"> -->
                                           <button type="submit" name="simpan" form="formTambahAnggota" value="submit" class="btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
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
 $nis = $_POST['nis'];
 $nama = $_POST['nama'];
 $tmp_lahir = $_POST['tmp_lahir'];
 $tgl_lahir = $_POST['tgl_lahir'];
 $jk = $_POST['jk'];
 $tingkat = $_POST['tingkat'];
 $simpan = $_POST['simpan'];
  if($simpan){
    //$cek validasi data input ganda 'note kevin'
    $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tb_anggota WHERE nis='$nis'"));
   if ($cek > 0){
   echo "<script>window.alert('NIS ini sudah terdaftar!')
   window.location='?page=anggota&aksi=tambah'</script>";
 }
    else{
      //koneksi ke db n save data yg sudah di cek 'note kevin'
    $sql = $conn->query("insert INTO tb_anggota (nis,nama,tmp_lahir,tgl_lahir,jk,tingkat)
    VALUES('$nis','$nama','$tmp_lahir','$tgl_lahir','$jk','$tingkat')");
}

   if($sql){
 ?>
     <script type="text/javascript">
     alert("Data Berhasil Disimpan!")
     // lempar ke anggota.php
     window.location.href="?page=anggota";
     </script>

     <?php
   }
 }


 ?>
