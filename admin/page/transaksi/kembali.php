<?php

        $id = $_GET['id'];
        $judul = $_GET['judul'];

    //    $judul = $_POST['judul'];
       $sql =$conn->query("update tb_transaksi set status='kembali' where id='$id'");
        //koding jalan yeeea~


      $sql = $conn->query("update tb_buku set jumlah_buku = (jumlah_buku+1) where judul = '$judul'");
       //querry nya sndiri ud bner tp ntah knp gk bisa nambah buku di DB nya =_=
        //apa yg unfaedah coba dari koding yg ad di sini ? =_=
       //clear nb : spasi rupanya sangat berpengaruh jika dimasukkan ke dalam syntax =_=


?>
<script type="text/javascript">
alert("Buku Berhasil Dikembalikan!")
window.location.href="?page=transaksi";
</script>
