<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');

  $pengaturan_denda = $_REQUEST['denda'];
  $maksimal_lama = $_REQUEST['maks'];
  // $simpan = $_POST['simpan'];
  $sql = "UPDATE tb_pengaturan SET denda = $pengaturan_denda, maksimal_lama_pinjam = $maksimal_lama
  WHERE id_pengaturan = 1";
  $conn->query($sql);

  //if ($simpan == true) {
    // code...
    //$conn->query($sql);
    // echo "
    // <script>
    //   alert('Pengaturan sudah disimpan');
    //   window.location.href='?page=pengaturan';
    // </script>
    // ";
  //}
?>
