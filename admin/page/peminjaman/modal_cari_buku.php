<!-- Modal -->
<div class="modal fade" id="modal_cari_buku" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="material-icons">exit_to_app</i> Daftar Buku</h4>
      </div>
      <div class="modal-body">

        <div class="table-responsive" id="container-table-buku">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example-buku-modal">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kode Buku</th>
                <th>ISBN</th>
                <!-- <th>Tahun Terbit</th> -->
                <th>Aksi </th>
              </tr>
            </thead>
              <!-- fetching item dari database ke form -->
            <tbody>
                <?php
                  $no = 1;
                  $sql = $conn -> query("SELECT * FROM tb_detil_buku");
                  while ($data= $sql-> fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['judul'];?></td>
                  <td><?php echo $data['pengarang'];?></td>
                  <td><?php echo $data['penerbit'];?></td>
                  <td><?php echo $data['kode_buku'];?></td>
                  <td><?php echo $data['isbn'];?></td>
                  <!-- <td><?php //echo $data['tahun_terbit'];?></td> -->
                  <td>
                    <button id="btn_kode_buku" type="submit" form="cari_kode_buku" data-id="<?php echo $data['kode_buku']; ?>" class="simpan_temp_buku_modal btn btn-primary"><i class="material-icons md-18">add</i></button>
                  </td>
                </tr>

                <?php } ?>
              </tbody>
            </table>
        </div>


      </div>
      <div class="modal-footer">
        <!-- <a style="min-width:80px;" href="" class="btn btn-danger">Ya</a> -->
        <button style="min-width:80px;" type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
