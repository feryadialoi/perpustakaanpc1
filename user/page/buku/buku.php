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
                  <th>ISBN</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Jumlah Buku</th>
                  <th>Sisa Buku</th>
                  <th>Lokasi</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
                <!-- fetching item dari database ke form -->
              <tbody>
                  <?php
                    $no = 1;
                    $query = "SELECT DISTINCT t1.judul,
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
                              WHERE t1.hapus = 'tidak'";
                    $sql = $conn -> query($query);
                    while ($data= $sql-> fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['isbn'];?></td>
                    <td><?php echo $data['pengarang'];?></td>
                    <td><?php echo $data['penerbit'];?></td>
                    <td><?php echo $data['tahun_terbit'];?></td>
                    <td><?php echo $data['jumlah_buku'];?></td>
                    <td><?php echo $data['sisa_buku'];?></td>
                    <td><?php echo $data['lokasi'];?></td>
                    <!-- <td>
                      <a href="?page=buku&aksi=edit&isbn=<?php echo $data['isbn'];?>" class="btn btn-primary"><i class="material-icons md-18">edit</i></a>
                      <a class="btn btn-danger hapus_data_buku" data-id="<?php echo $data['isbn']; ?>" href="javascript:void(0)"><i class="material-icons md-18">delete</i></a>
                    </td> -->
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
