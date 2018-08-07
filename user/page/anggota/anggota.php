<a href="?page=anggota&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">add</i> Tambah Anggota</a>
<div class="row">
  <div class="col-md-12">
      <!-- Table data anggota -->
      <div class="panel panel-default">
          <div class="panel-heading">
               <h1>Data Anggota</h1>
          </div>
          <div class="panel-body">
              <div class="table-responsive" id="container-table-anggota">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nomor Induk Sekolah</th>
                              <th>Nama</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>Jenis Kelamin</th>
                              <th>Tingkat</th>
                              <!-- <th>Aksi </th> -->
                          </tr>
                      </thead>
                      <!-- fetching item dari database ke form -->
                      <tbody>

                        <?php
                        $no = 1;
                        // $query = "SELECT * FROM tb_anggota WHERE nis LIKE '%o%' OR nama LIKE '%o%' OR tmp_lahir LIKE '%o%' OR tgl_lahir LIKE '%o%' OR jk LIKE '%o%' OR tingkat LIKE '%o%'";
                        $query = "SELECT * FROM tb_anggota";
                        // $sql = $conn -> query("select*from tb_anggota");
                        $sql = $conn -> query($query);
                        while ($data= $sql-> fetch_assoc()){
                        $jk = ($data['jk']=='l')?"Laki - Laki":"Perempuan";
                        ?>

                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['nis'];?></td>
                          <td><?php echo $data['nama'];?></td>
                          <td><?php echo $data['tmp_lahir'];?></td>
                          <td><?php echo $data['tgl_lahir'];?></td>
                          <td><?php echo $jk;?></td>
                          <td><?php echo $data['tingkat'];?></td>
                          <!-- <td> -->
                            <!-- <div class="Aksi"> -->
                              <!-- <a href="?page=anggota&aksi=edit&id=<?php //echo $data['nis'];?>" class="btn btn-primary"><i class="material-icons md-18">edit</i> Edit</a>
                              <button class="btn btn-danger" onclick="document.getElementById('modalHapusAnggota').style.display='block'" ><i class="material-icons md-18">delete</i> Delete</button> -->
                              <!-- <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Anggota Berikut?')" href="?page=anggota&aksi=hapus&id=<?php echo $data['nis'];?>" class="btn btn-danger">Delete</a> -->
                          <!-- </div> -->
                          </td>
                        </tr>

                      <?php } ?>
                      </tbody>
                    </table>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- <script src="../assets/js/ajax/ajaxAnggota.js"></script> -->
<div id="modalHapusAnggota" class="modal">
  <div class="modal-content animate" action="/action_page.php">
    <div class="head">
      <span onclick="document.getElementById('modalHapusAnggota').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <h2>Hapus Anggota</h2>
      <p>
        Anda Yakin Ingin Menghapus Data Anggota Berikut?
        <br>
        <br>
      </p>
    </div>

    <div class="container-modal">
      <!-- <div class="logout-btn"> -->
      <div class="logout-btn2">
        <?php
        $no = 1;
        // $query = "SELECT * FROM tb_anggota WHERE nis LIKE '%o%' OR nama LIKE '%o%' OR tmp_lahir LIKE '%o%' OR tgl_lahir LIKE '%o%' OR jk LIKE '%o%' OR tingkat LIKE '%o%'";
        $query = "SELECT * FROM tb_anggota";
        // $sql = $conn -> query("select*from tb_anggota");
        $sql = $conn -> query($query);
        $data= $sql-> fetch_assoc();
        ?>
        <a href="?page=anggota&aksi=hapus&id=<?php echo $data['nis'];?>" class="btn btn-danger modalawidth">Ya</a>
        <button type="button" onclick="document.getElementById('modalHapusAnggota').style.display='none'" class="btn btn-primary modalbtnwidth">Tidak</button>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
