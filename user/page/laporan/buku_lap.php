<?php

/*BLOCK FUNCTION EXCELL*/
function cleanDataExcel(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) ) {
        $str = "'$str";
    }
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

function createExcel($filename,$array){
    // filename for download
    $filename = $filename.".xls";
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    $flag = false;
    foreach($array as $row) {
        if(!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        array_walk($row, 'cleanDataExcel');
        echo implode("\t", array_values($row)) . "\r\n";
    }
    return;
}
/*END OF - BLOCK FUNCTION EXCELL*/

/*BLOCK FUNCTION SQL*/
$keluarga=array();
$link = mysqli_connect("localhost", "root", "", "perpustakaan");
$result=mysqli_query($link,"SELECT * FROM tb_buku");
while($row=mysqli_fetch_array($result)){

    $keluarga[]=array(
      "Judul"=>$row['judul'],
      "Pengarang"=>$row['pengarang'],
      "Penerbit"=>$row['penerbit'],
      "Tahun Terbit"=>$row['tahun_terbit'],
      "Kode Buku/ISBN"=>$row['isbn'],
      "Jumlah Buku"=>$row['jumlah_buku'],
      "Lokasi Buku"=>$row['lokasi'],
  		"Tanggal Input"=>$row['tgl_input']

    );
}
/*END BLOCK FUNCTION SQL*/

/*TRANSFER KE SYSTEM*/
createExcel("Laporan Buku Perpustakaan.xls",$keluarga);

?>
