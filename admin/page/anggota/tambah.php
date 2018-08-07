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
                                           <label>NIS</label>
                                           <input id="nis_tambah_anggota" class="form-control" name="nis" required/>

                                       </div>
                                       <div class="form-group">
                                           <label>Nama Anggota</label>
                                           <input id="nama_tambah_anggota" class="form-control" name="nama" required/>

                                       </div>
                                       <div class="form-group">
                                           <label>Tempat Lahir</label>
                                           <input id="tmp_lahir_tambah_anggota" class="form-control" name="tmp_lahir" required/>

                                       </div>
                                       <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input id="tgl_lahir_tambah_anggota" class="form-control" name="tgl_lahir" type="date" required/>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                             <label>Jenis Kelamin</label>
                                             <select id="jk_tambah_anggota" style="height:34px;"  class="form-control" name="jk">
                                                 <option value="l" >Laki - Laki</option>
                                                 <option value="p" >Perempuan</option>
                                             </select>
                                         </div>


                                         <div class="form-group">
                                              <label>Tingkat</label>
                                              <select id="tingkat_tambah_anggota" style="height:34px;" class="form-control" name="tingkat">
                                                  <option value="TK/PG" >TK/PG</option>
                                                  <option value="SD" >SD</option>
                                                  <option value="SMP" >SMP</option>
                                                  <option value="SMA" >SMA</option>
                                              </select>
                                          </div>
                                         <div>
                                           <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"> -->
                                           <button type="submit" name="simpan" form="formTambahAnggota" value="submit" class="simpan_tambah_anggota btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
                                         </div>
                                       </div>
                                     </form>
                              </div>
</div>
</div>
