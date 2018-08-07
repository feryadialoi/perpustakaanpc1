<?php
    $id =$_GET['id'];
    $judul = $_GET['judul'];
    $lambat = $_GET['lambat'];
    $tgl_kembali = $_GET['tgl_kembali'];

    if($lambat>7){
            ?>
            <script type="text/javascript">
            alert("Buku tidak dapat diperpanjang");
            window.location.href="?page=transaksi";
            </script>
    <?php
    }else {

    $tgl2 = date('Y-m-d',strtotime('+7 day',strtotime($tgl_kembali)));
    //pakai ini lebih mudah dan ringkas dari cara yg sebelumnya yg penuh dengan bug dan hasil belum tentu akurat =_= (line 17 - line 20)
       $sql = $conn->query("update tb_transaksi set tgl_kembali='$tgl2' where id='$id'");
              if($sql){
                ?>
                  <script type="text/javascript">
                  alert("berhasil Perpanjang!")
                  window.location.href="?page=transaksi";
                  </script>
                <?php
              }else{
                ?>
                <script type="text/javascript">
                alert("gagal perpanjang Perpanjang!")
                window.location.href="?page=transaksi";
                </script>
                <?php
       }
  }
?>
