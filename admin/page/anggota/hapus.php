<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $nis = $_REQUEST['nis'];
  $nis = mysqli_escape_string($conn, $_POST['nis']);

  $conn->query("UPDATE tb_anggota SET hapus = 'ya' WHERE nis ='$nis'");
?>

<!-- <script type="text/javascript">
  alert("Data Berhasil Dihapus!")
  window.location.href="?page=anggota";
</script> -->


<!-- <script>
  $(document).ready(function(){

      bootbox.dialog({
        message: "Data Berhasil Dihapus!",
        title: "<i class='glyphicon glyphicon-trash'></i> Hapus",
        buttons: {
          success: {
            label: "OK",
            className: "btn-success",
            callback: function() {
            $('.bootbox').modal('hide');

             // window.location.href="?page=anggota";
            }
          }
        }
      });
    });
</script> -->
