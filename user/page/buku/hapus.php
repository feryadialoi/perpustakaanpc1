
 <?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');
  $isbn = $_REQUEST['isbn'];

  // $conn->query("DELETE FROM tb_buku where isbn ='".mysqli_escape_string($conn, $_POST['isbn'])."'");
  $conn->query("UPDATE tb_buku SET hapus = 'ya' WHERE isbn = '$isbn'");
  $conn->query("UPDATE tb_detil_buku SET hapus = 'ya' WHERE isbn = '$isbn'");
 ?>

 <!-- <script type="text/javascript">
   alert("Data Berhasil Dihapus!")
   window.location.href="?page=buku";
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

              // window.location.href="?page=buku";
             }
           }
         }
       });
     });
 </script> -->
