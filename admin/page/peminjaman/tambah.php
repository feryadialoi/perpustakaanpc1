<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $sql = "SELECT * FROM tb_peminjaman ORDER BY kode_pinjam DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $kode_pinjam = $row['kode_pinjam'];
    $kode_pinjam++;
  }else{
    $kode_pinjam = "P0001";
  }
?>
<a class="btn btn-primary" style="margin-bottom: 10px" href="?page=peminjaman"><i class="material-icons md-18">chevron_left</i> Kembali</a>

<div class="panel panel-default">
<div class="panel-heading">
  <strong>Peminjaman</strong>
</div>
  <!-- free for Edit
  editable -->
<div class="panel-body">
    <div class="row">
      <div class="col-md-12">
      <!-- data pinjam -->
      <form id="formPinjam" method="post">
        <div class="form-group row">
           <label class="col-sm-2 col-form-label">Kode Pinjam</label>
           <div class="col-sm-10">
           <input class="form-control" name="kode_pinjam" id="kode_pinjam" value="<?php echo $kode_pinjam; ?>" required readonly/>
           </div>
        </div>
        <div class="form-group row">
           <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
           <div class="col-sm-10">
           <input class="form-control" name="tgl_pinjam" id="tgl_pinjam"  value="<?php echo date('Y-m-d') ?>" required/>
           </div>
         </div>
         <div class="form-group row">
           <label class="col-sm-2 col-form-label">Nis</label>
           <div class="col-sm-10">
           <input class="form-control" name="nis" id="nis" required/>
           </div>
        </div>
        <div class="form-group row">
           <label class="col-sm-2 col-form-label">Nama</label>
           <div class="col-sm-10">
           <input class="form-control" name="nama" id="nama" required readonly/>
           </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Lama Pinjam</label>
          <div class="col-sm-10">
            <!-- <input type="number" class="form-control" name="lama_pinjam" id="lama_pinjam" value="7" required/> -->
            <input min="1" max="<?php echo $_SESSION['maksimal_lama_pinjam']; ?>" type="number" class="form-control" name="lama_pinjam" id="lama_pinjam" value="<?php echo $_SESSION['maksimal_lama_pinjam']; ?>" required/>
          </div>
        </div>



      </form>
        <!-- data pinjam -->
    </div>
  </div>
</div>
</div>

  <label class="col-xs-3 col-sm-2">Kode Buku</label>
  <div class="col-xs-5 col-sm-3">
    <input id="cari_kode_buku" name="cari_kode_buku" class="form-control">
  </div>

  <div class="col-xs-4 padding-bottom-10 col-sm-7">
    <button id="btn_kode_buku" type="submit" form="btn_kode_buku" class="simpan_temp_buku btn btn-primary"><i class="material-icons md-18">add</i> Tambah</button>
    <button data-toggle="modal" data-target="#modal_cari_buku" class="modal_cari btn btn-primary"><i class="material-icons md-18">search</i></button>
  </div>


  <div class="col-xs-offset-4 col-xs-4 padding-top-10 padding-bottom-10">
    <button class="col-xs-12 simpan_tambah_pinjam btn btn-success">Simpan Peminjaman</button>
  </div>

<br><br><br>
<br><br><br>
<div class="panel panel-default">
<div class="panel-heading">
  <strong>Daftar Buku</strong>
</div>
<div class="panel-body">
  <div class="row">
    <div class="col-sm-12">

  <div class="table-responsive" id="container-table-temp-buku">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example-temp-buku">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Kode Buku</th>
          <th>ISBN</th>
          <th>Aksi</th>
        </tr>
      </thead>
        <!-- fetching item dari database ke form -->
      <tbody>
          <?php
            $no = 1;
            $query = "SELECT * FROM tb_temp_buku";
            $sql = $conn -> query($query);
            while ($data= $sql-> fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['judul'];?></td>
            <td><?php echo $data['pengarang'];?></td>
            <td><?php echo $data['penerbit'];?></td>
            <td><?php echo $data['kode_buku'];?></td>
            <td><?php echo $data['isbn'];?></td>
            <td>
              <a class="hapus_temp_buku btn btn-danger " data-id="<?php echo $data['kode_buku']; ?>" href="javascript:void(0)"><i class="material-icons md-18">delete</i></a>
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

<!-- <script src="../admin/page/peminjaman/ajaxtemp.js"></script> -->
