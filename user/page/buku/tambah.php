<!-- <div class="float-tombol">
  <a class="btn btn-primary" href="?page=buku">Kembali</a>
</div> -->
<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=buku"><i class="material-icons md-18">chevron_left</i> Kembali</a>

<div class="panel panel-default">
<div class="panel-heading">
  <h1>Tambah Data Buku</h1>
</div>
  <script type=”text/javascript”>

  <script type="text/javascript">

  function stopRKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
  }

  document.onkeypress = stopRKey;

  </script>
<div class="panel-body">
                           <div class="row">
                               <div class="col-md-12">

                                   <form id="formTambahBuku" method="POST">
                                       <div class="form-group">
                                           <label>Judul Buku</label>
                                           <input class="form-control" name="judul" required/>

                                       </div>
                                       <div class="form-group">
                                           <label>Pengarang</label>
                                           <input class="form-control" name="pengarang" required/>

                                       </div>
                                       <div class="form-group">
                                           <label>Penerbit</label>
                                           <input class="form-control" name="penerbit" required/>

                                       </div>
                                       <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select style="height:34px;"  class="form-control" name="tahun_Terbit">
                                              <?php
                                                  $tahun =date("Y");

                                                  for($i=$tahun-50;$i<= $tahun; $i++){
                                                    echo'

                                                        <option value="'.$i.'">'.$i.'</option>

                                                    ';
                                                  }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input class="form-control" name="isbn" required/>

                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jumlah_Buku" required/>

                                        </div>
                                        <div class="form-group">
                                             <label>Lokasi Buku</label>
                                             <select style="height:34px;"  class="form-control" name="lokasi">
                                                 <option value="rak1">Rak 1</option>
                                                 <option value="rak2">Rak 2</option>
                                                 <option value="rak3">Rak 3</option>
                                                 <option value="rak4">Rak 4</option>
                                                 <option value="rak5">Rak 5</option>
                                                 <option value="rak6">Rak 6</option>
                                                 <option value="rak7">Rak 7</option>
                                                 <option value="rak8">Rak 8</option>
                                                 <option value="rak9">Rak 9</option>
                                                 <option value="rak10">Rak 10</option>
                                             </select>
                                         </div>
                                         <div class="form-group">
                                             <label>Tanggal Input</label>
                                             <input class="form-control" name="tgl_Input" type="date" required/>

                                         </div>
                                         <div>
                                           <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"> -->
                                           <button type="submit" name="simpan" form="formTambahBuku" value="submit" class="btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
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
 $judul = $_POST['judul'];
 $pengarang = $_POST['pengarang'];
 $penerbit = $_POST['penerbit'];
 $tahun_Terbit = $_POST['tahun_Terbit'];
 $isbn = $_POST['isbn'];
 $jumlah_buku = $_POST['jumlah_Buku'];
 $lokasi = $_POST['lokasi'];
 $tgl_Input = $_POST['tgl_Input'];
 $simpan = $_POST['simpan'];
 if($simpan){
   $sql = $conn->query("insert into tb_buku (judul,pengarang,penerbit,tahun_terbit,isbn,jumlah_buku,lokasi,tgl_Input)
   values('$judul','$pengarang','$penerbit','$tahun_Terbit','$isbn','$jumlah_buku','$lokasi','$tgl_Input')");
   if($sql){
 ?>
     <script type="text/javascript">
     alert("Data Berhasil Disimpan!")
     // lempar ke buku.php
     window.location.href="?page=buku";
     </script>
     <?php
   }
 }


 ?>
