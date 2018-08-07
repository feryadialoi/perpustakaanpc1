<?php
$isbn= $_GET['isbn'];
// $sql = $conn->query("SELECT * FROM tb_buku WHERE isbn='$isbn'");
$sql = $conn->query("SELECT DISTINCT t1.judul,
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
          WHERE t1.isbn = '$isbn'");

$tampil = $sql->fetch_assoc();

$tahun2 = $tampil['tahun_terbit'];
$lokasi = $tampil['lokasi'];
 ?>
 <a class="btn btn-primary" style="margin-bottom: 10px" href="?page=buku"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<div class="panel panel-default">
<div class="panel-heading">
  <h1>Edit Data Buku</h1>
  </div>
<div class="panel-body">
                           <div class="row">
                               <div class="col-md-12">

                                   <form method="POST" id="formEditBuku">
                                       <div class="form-group">
                                           <label>Judul Buku</label>
                                           <input id="judul_edit_buku" class="form-control" name="judul" value="<?php echo $tampil['judul'];  ?>"/>

                                       </div>
                                       <div class="form-group">
                                           <label>Pengarang</label>
                                           <input id="pengarang_edit_buku" class="form-control" name="pengarang" value="<?php echo $tampil['pengarang'];?>"/>

                                       </div>
                                       <div class="form-group">
                                           <label>Penerbit</label>
                                           <input id="penerbit_edit_buku" class="form-control" name="penerbit" value="<?php echo $tampil['penerbit'];?>"/>

                                       </div>
                                       <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <select id="tahun_terbit_edit_buku" class="form-control" name="tahun_Terbit">
                                              <?php
                                                  $tahun =date("Y");

                                                  for($i=$tahun-50;$i<= $tahun; $i++){
                                                    //echo'
                                                    if($i==$tahun2){
                                                    echo'  <option value="'.$i.'" selected>'.$i.'</option>';

                                                    }else{
                                                      echo'  <option value="'.$i.'">'.$i.'</option>';
                                                      }
                                                  }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input id="isbn_edit_buku" class="form-control" name="isbn" value="<?php echo $tampil['isbn'];?>">

                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input id="jumlah_buku_edit_buku" class="form-control" name="jumlah_Buku"/ value="<?php echo $tampil['jumlah_buku'];?>">

                                        </div>
                                        <div class="form-group">
                                             <label>Lokasi Buku</label>
                                             <select id="lokasi_edit_buku" class="form-control" name="lokasi">
                                                 <option value="rak1"<?php if ($lokasi== 'rak1') {echo "selected";}?>>Rak 1</option>
                                                 <option value="rak2"<?php if ($lokasi== 'rak2') {echo "selected";}?>>Rak 2</option>
                                                 <option value="rak3"<?php if ($lokasi== 'rak3') {echo "selected";}?>>Rak 3</option>
                                                 <option value="rak4"<?php if ($lokasi== 'rak4') {echo "selected";}?>>Rak 4</option>
                                                 <option value="rak5"<?php if ($lokasi== 'rak5') {echo "selected";}?>>Rak 5</option>
                                                 <option value="rak6"<?php if ($lokasi== 'rak6') {echo "selected";}?>>Rak 6</option>
                                                 <option value="rak7"<?php if ($lokasi== 'rak7') {echo "selected";}?>>Rak 7</option>
                                                 <option value="rak8"<?php if ($lokasi== 'rak8') {echo "selected";}?>>Rak 8</option>
                                                 <option value="rak9"<?php if ($lokasi== 'rak9') {echo "selected";}?>>Rak 9</option>
                                                 <option value="rak10"<?php if ($lokasi== 'rak10') {echo "selected";}?>>Rak 10</option>
                                             </select>
                                         </div>
                                         <div>
                                           <button type="submit" name="simpan" form="formEditBuku" value="submit" class="simpan_edit_buku btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
                                         </div>
                                       </div>
                                     </form>
                              </div>
</div>
</div>
</div>
