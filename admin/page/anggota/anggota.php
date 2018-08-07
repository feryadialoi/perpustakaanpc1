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
                      <th>NIS</th>
                      <th>Nama Anggota</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Tingkat</th>
                      <th>Aksi </th>
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
                      <td>
                          <a href="?page=anggota&aksi=edit&nis=<?php echo $data['nis'];?>" class="btn btn-primary"><i class="material-icons md-18">edit</i></a>
                          <a class="hapus_data_anggota btn btn-danger" data-id="<?php echo $data['nis']; ?>" href="javascript:void(0)"><i class="material-icons md-18">delete</i></a>
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
