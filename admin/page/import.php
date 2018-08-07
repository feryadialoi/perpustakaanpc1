<?php

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'data.xlsx';

  // Load librari PHPExcel nya
  require_once 'PHPExcel/PHPExcel.php';

  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

  // Buat query Insert
  $sql = $pdo->prepare("INSERT INTO tb_anggota VALUES(:nis,:nama,:tmp_lahir,:tgl_lahir,:jk,:tingkat)");

  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $nis = $row['A'];
    $nama = $row['B'];
    $tmp_lahir = $row['C'];
    $tgl_lahir = $row['D'];
    $jk = $row['E'];
    $tingkat = $row['F'];


    // Cek jika semua data tidak diisi
    if(empty($nis) && empty($nama) && empty($tmp_lahir) && empty($tgl_lahir) && empty($jk) && empty($tingkat))
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
      $sql->bindParam(':nis', $nis);
      $sql->bindParam(':nama', $nama);
      $sql->bindParam(':tmp_lahir', $tmp_lahir);
      $sql->bindParam(':tgl_lahir', $tgl_lahir);
      $sql->bindParam(':jk', $jk);
      $sql->bindParam(':tingkat', $tingkat);
      $sql->execute(); // Eksekusi query insert
    }

    $numrow++; // Tambah 1 setiap kali looping
  }
}
//header('location: index.php'); // Redirect ke halaman awal
?>
