<?php

/*BLOCK FUNCTION EXCELL*/
function cleanDataExcel(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
  //  if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
  //      $str = "'$str";
  //  }
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
$result=mysqli_query($link,"SELECT * FROM tb_anggota");
while($row=mysqli_fetch_array($result)){

	$jka = ($row['jk']=='l')?"Laki - Laki":"Perempuan";

    $keluarga[]=array(
        "NIS"=>$row['nis'],
        "Nama"=>$row['nama'],
        "Tempat Lahir"=>$row['tmp_lahir'],
        "Tanggal lahir"=>$row['tgl_lahir'],
        "Jenis Kelamin"=>$jka,
		"Tingkat"=>$row['tingkat']

    );
}
/*END BLOCK FUNCTION SQL*/

/*TRANSFER KE SYSTEM*/
createExcel("Laporan Anggota Perpustakaan.xls",$keluarga);

?>
