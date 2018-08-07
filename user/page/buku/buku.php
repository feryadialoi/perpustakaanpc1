<a href="?page=buku&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px"><i class="material-icons md-18">add</i> Tambah Buku</a>
<div class="row">
  <div class="col-md-12">
    <!-- Table data buku -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h1>Data Buku</h1>
        </div>

        <div class="panel-body">
          <div class="table-responsive" id="container-table-buku">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Pengarang(s)</th>
                  <th>Penerbit</th>
                  <th>ISBN(Kode Buku)</th>
                  <th>Jumlah Buku</th>
                  <!-- <th>Aksi </th> -->
                </tr>
              </thead>
                <!-- fetching item dari database ke form -->
              <tbody>
                  <?php
                    $no = 1;
                    $sql = $conn -> query("SELECT * FROM tb_buku");
                    while ($data= $sql-> fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['pengarang'];?></td>
                    <td><?php echo $data['penerbit'];?></td>
                    <td><?php echo $data['isbn'];?></td>
                    <td><?php echo $data['jumlah_buku'];?></td>
                    <!-- <td> -->
                      <!-- <a href="?page=buku&aksi=edit&id=<?php //echo $data['id'];?>" class="btn btn-primary"><i class="material-icons md-18">edit</i> Edit</a>
                      <button class="btn btn-danger" onclick="document.getElementById('modalHapusBuku').style.display='block'" ><i class="material-icons md-18">delete</i> Delete</button> -->
                      <!-- <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Buku Berikut?')" href="?page=buku&aksi=hapus&id=<?php //echo $data['id'];?>" class="btn btn-danger">Delete</a> -->
                    <!-- </td> -->
                  </tr>


                  <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- <script src="../assets/js/ajax/ajaxBuku.js"></script> -->
<div id="modalHapusBuku" class="modal">
  <?php
  $no = 1;
  $query = "SELECT * FROM tb_buku";
  $sql = $conn -> query($query);
  $data= $sql-> fetch_assoc();

  ?>
  <div class="modal-content animate" action="/action_page.php">
    <div class="head">
      <span onclick="document.getElementById('modalHapusBuku').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container">
      <h2>Hapus Buku</h2>
      <p>
        Anda Yakin Ingin Menghapus Data Buku Berikut?
        <br>
        <br>
      </p>
    </div>

    <div class="container-modal">
      <!-- <div class="logout-btn"> -->
      <div class="logout-btn2">

        <a href="?page=buku&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger modalawidth">Ya</a>
        <button type="button" onclick="document.getElementById('modalHapusBuku').style.display='none'" class="btn btn-primary modalbtnwidth">Tidak</button>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
