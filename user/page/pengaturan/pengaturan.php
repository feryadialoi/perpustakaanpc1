<?php
  $sql = $conn -> query("SELECT * FROM tb_pengaturan");
  $data = $sql -> fetch_assoc();

?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1>Pengaturan</h1>
  </div>
<div class="panel-body">
<div class="row">
  <div class="col-md-4">
    <h2>Denda / hari</h2>
  </div>
  <div class="col-md-4">
    <?php echo "<h2>: Rp ".number_format($data['denda'])."</h2>"; ?>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <h2>Maksimal Lama Pinjam</h2>
  </div>
  <div class="col-md-4">
    <?php echo "<h2>: ".$data['maksimal_lama_pinjam']." Hari</h2>"; ?>
  </div>
</div>

<br><hr>

<div class="">
  <form class="" action="" method="post" id="formPengaturan">
    <div class="form-group">
      <label>Denda</label>
      <input value="<?php echo number_format($data['denda']); ?>" id="pengaturan_denda" class="form-control" name="pengaturan_denda" required/>
    </div>
    <div class="form-group">
      <label>Maksimal Lama Pinjam</label>
      <!-- <select value="<?php echo $data['maksimal_lama_pinjam']; ?>" id="pengaturan_maksimal_lama_pinjam" name="pengaturan_maksimal_lama_pinjam" style="height:34px;" class="form-control" name="pengaturan_maksimal_lama_pinjam">
        <?php
          for ($i=1; $i <100 ; $i++) {
            //echo "<option value='$i' >".$i."</option>";
          }
        ?>
      </select> -->
      <input class="form-control" type="number" id="pengaturan_maksimal_lama_pinjam" name="pengaturan_maksimal_lama_pinjam" value="<?php echo $data['maksimal_lama_pinjam']; ?>">
    </div>
    <div class="">
      <button type="submit" name="simpan" form="formPengaturan" value="submit" class="simpan_pengaturan btn btn-primary"><i class="material-icons md-18">save</i> Simpan</button>
    </div>
  </form>
</div>
</div>
</div>
<?php
  // $pengaturan_denda = $_POST['pengaturan_denda'];
  // $maksimal_lama = $_POST['pengaturan_maksimal_lama_pinjam'];
  // $simpan = $_POST['simpan'];
  // $sql = "UPDATE tb_pengaturan SET denda = $pengaturan_denda, maksimal_lama_pinjam = $maksimal_lama
  // WHERE id_pengaturan = 1";
  // if ($simpan == true) {
  //   // code...
  //   $conn->query($sql);
  //   echo "
  //   <script>
  //     alert('Pengaturan sudah disimpan');
  //     window.location.href='?page=pengaturan';
  //   </script>
  //   ";
  // }
?>
