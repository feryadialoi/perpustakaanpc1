<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  // $kode_pinjam = $_REQUEST['kode_pinjam'];
  // $lambat = $_REQUEST['lambat'];
  // $maks = $_REQUEST['maks'];
  // $denda = $_REQUEST['denda'];
?>
<!-- Modal -->
<div class="modal fade" id="modal_perpanjang" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="isi_perpanjang" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="material-icons">autorenew</i> Perpanjang Peminjaman</h4>
      </div>
      <div id="body_perpanjang" class="modal-body">
<!-- ============================================================================== -->


<!-- ============================================================================== -->
      </div>
      <!-- <div class="modal-footer">
        <a data-confirm-perpanjang="<?php echo $kode_pinjam; ?>" style="min-width:80px;" type="button" class="confirm_perpanjang btn btn-primary" >Perpanjang</a>
        <button style="min-width:80px;" type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div> -->
    </div>
  </div>
</div>
