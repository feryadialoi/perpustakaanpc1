
 <?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $kode_buku = mysqli_escape_string($conn, $_POST['kode_buku']);
  // $conn->query("DELETE FROM tb_buku where id ='$id'");
  $conn->query("DELETE FROM tb_temp_buku where kode_buku ='$kode_buku'");

 ?>

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

              // window.location.href="?page=buku";
             }
           }
         }
       });
     });
 </script> -->
