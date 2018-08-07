<?php
    $conn = mysqli_connect('localhost','root','','perpustakaanpc');
    $kode_pinjam = $_REQUEST['kode_pinjam'];
    $lambat = $_REQUEST['lambat'];
    $maks = $_REQUEST['maks'];
    $denda = $_REQUEST['denda'];
    $perpanjang = $_REQUEST['perpanjang'];

    $sql = $conn->query("SELECT * FROM tb_detil_peminjaman WHERE kode_pinjam = '$kode_pinjam'");
    while ($data = $sql->fetch_assoc()){
      $lama_pinjam = $data['lama_pinjam'];
      $tgl_kembali = $data['tgl_kembali'];
      $tgl2 = date('Y-m-d',strtotime('+'.$perpanjang.' day',strtotime($tgl_kembali)));
      $sql = $conn->query("UPDATE tb_detil_peminjaman
                          SET lama_pinjam = (lama_pinjam+$perpanjang), tgl_kembali='$tgl2'
                          WHERE kode_pinjam = '$kode_pinjam'");
    }
?>
