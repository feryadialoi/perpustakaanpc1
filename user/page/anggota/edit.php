<!-- <div class="float-tombol">
  <a class="btn btn-primary" style="margin-bottom: 10px" href="?page=anggota">Kembali</a>
</div> -->
<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=anggota"><i class="material-icons md-18">chevron_left</i> Kembali</a>
<?php

$nis= $_GET['nis'];
$sql = $conn->query("select * from tb_anggota where nis='$nis'");

$tampil = $sql->fetch_assoc();
$jk_A=$tampil['jk'];
$tingkat_A=$tampil['tingkat'];

 ?>

 <div class="panel panel-default">
 <div class="panel-heading">
   <h1>Edit Data Anggota</h1>
   </div>
   <div class="panel-body">
                              <div class="row">
                                  <div class="col-md-12">

                                      <form id="formEditAnggota" method="POST">
                                          <div class="form-group">
                                              <label>Nomor Induk Siswa</label>
                                              <input id="nis_edit_anggota"class="form-control" name="nis"value="<?php echo $tampil['nis'];  ?>"readonly/>

                                          </div>
                                          <div class="form-group">
                                              <label>Nama</label>
                                              <input id="nama_edit_anggota"class="form-control" name="nama" value="<?php echo $tampil['nama_anggota'];  ?>"/>

                                          </div>
                                          <div class="form-group">
                                              <label>Tempat Lahir</label>
                                              <input id="tmp_lahir_edit_anggota" class="form-control" name="tmp_lahir" value="<?php echo $tampil['tmp_lahir'];  ?>"/>

                                          </div>
                                          <div class="form-group">
                                               <label>Tanggal Lahir</label>
                                               <input id="tgl_lahir_edit_anggota" class="form-control" name="tgl_lahir" type="date" value="<?php echo $tampil['tgl_lahir'];  ?>"/>
                                               </select>
                                           </div>
                                           <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select id="jk_edit_anggota" class="form-control" name="jk">
                                                    <option value="l"<?php if ($jk_A== 'l') {echo "selected";}?>>Laki - Laki</option>
                                                    <option value="p"<?php if ($jk_A== 'p') {echo "selected";}?>>Perempuan</option>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                 <label>Tingkat</label>
                                                 <select id="tingkat_edit_anggota" class="form-control" name="tingkat">
                                                     <option value="TK/PG"<?php if ($tingkat_A== 'TK/PG') {echo "selected";}?>>TK/PG</option>
                                                     <option value="SD"<?php if ($tingkat_A== 'SD') {echo "selected";}?>>SD</option>
                                                     <option value="SMP"<?php if ($tingkat_A== 'SMP') {echo "selected";}?>>SMP</option>
                                                     <option value="SMA"<?php if ($tingkat_A== 'SMA') {echo "selected";}?>>SMA</option>

                                                 </select>
                                             </div>
                                            <div>
                                              <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"> -->
                                              <button type="submit" name="simpan" form="formEditAnggota" value="submit" class="simpan_edit_anggota btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
                                            </div>
                                          </div>
                                        </form>
                                 </div>
 </div>
 </div>
 </div>
