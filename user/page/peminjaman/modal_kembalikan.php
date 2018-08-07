<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $kode_pinjam = $_REQUEST['kode_pinjam'];
?>
<!-- Modal -->
<div class="modal fade" id="modal_kembalikan" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="isi_kembalikan" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="material-icons">check</i> Kembalikan Peminjaman</h4>
      </div>
      <div id="body_kembalikan" class="modal-body">
<!-- ============================================================================== -->


<!-- ============================================================================== -->

      </div>
      <!-- <div class="modal-footer">
        <a style="min-width:80px;" type="button" class="confirm_kembalikan btn btn-primary">Kembalikan</a>
        <button style="min-width:80px;" type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div> -->
    </div>
  </div>
</div>
