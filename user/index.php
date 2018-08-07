<!-- php code untuk session login mengecek status login start-->
<?php
  include '../koneksi.php';
  //mengaktifkan session_start
  session_start();
  //cek apakah user telah login, jika belum login maka di alihkan ke halaman Login
  if($_SESSION['status'] !="loginUser") {
    header("location:../index.php");
  }
?>
<!-- php code untuk session login mengecek status login end-->

<!DOCTYPE html>
<html>
<head>
  <title>Anggota - Perpustakaan Pelita Cemerlang</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="../assets/img/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</head>
<body onload="setInterval('displayServerTime()', 1000);">
  <!-- topbar menu start -->
  <div class="top-bar">
    <div class="hamburger">
      <button class="hamburger-button" onclick="toggleNav()"><i class="material-icons logout-button">menu</i></button>
    </div>
    <div id="logoutButton" class="hamburger hamburger-logout">
      <button class="hamburger-button" data-toggle="modal" data-target="#myModal"><i class="material-icons logout-button">exit_to_app</i> Logout</button>
    </div>
    <div class="top-bar-menu">
      <script type="text/javascript">
          //set timezone
          <?php date_default_timezone_set('Asia/Jakarta'); ?>
          //buat object date berdasarkan waktu di server
          var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
          //buat object date berdasarkan waktu di client
          var clientTime = new Date();
          //hitung selisih
          var Diff = serverTime.getTime() - clientTime.getTime();
          //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
          function displayServerTime(){
              //buat object date berdasarkan waktu di client
              var clientTime = new Date();
              //buat object date dengan menghitung selisih waktu client dan server
              var time = new Date(clientTime.getTime() + Diff);
              //ambil nilai jam
              var sh = time.getHours().toString();
              //ambil nilai menit
              var sm = time.getMinutes().toString();
              //ambil nilai detik
              var ss = time.getSeconds().toString();
              //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
              document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
          }
      </script>
      <?php
      date_default_timezone_set("Asia/Jakarta");
        function hari(){
            switch (date("N")) {
              case '1':
                $hari = "Senin";
                break;
              case '2':
                $hari = "Selasa";
                break;
              case '3':
                $hari = "Rabu";
                break;
              case '4':
                $hari = "Kamis";
                break;
              case '5':
                $hari = "Jumat";
                break;
              case '6':
                $hari = "Sabtu";
                break;
              case '7':
                $hari = "Minggu";
                break;
            }
            return($hari);
        }
        $tanggal = hari().", ". date("j M Y");
        echo $tanggal;
      ?>
      <span id="clock"><?php print date('H:i:s'); ?></span>
    </div>
    <div class="top-bar-menu" style="color:yellow; padding-left:20px; font-size:14px;">
      <?php
        include '../koneksi.php';
        // session_start();
          $username = $_SESSION['username'];

        mysqli_select_db($conn,'perpustakaan');
        $result = mysqli_query($conn,"SELECT * FROM tbuser WHERE username = '$username'");

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            // echo "id: " . $row["id"]. " - Name: " . $row["nama"]."<br>";
            echo $row['nama'];
          }
        }

      ?>
    </div>
  </div>
  <!-- topbar menu end -->
  <!-- sidenav start -->
  <div id="mySidenav" class="sidenav tab">
    <!-- logo dan tagline start -->
    <div style="background:white;padding:10px;">
      <h2 id="admin" class="admin">USER</h2>
      <center><img src="../assets/img/logo.png" style="width:230px;" alt="logo"></center>
      <h2 style="text-align: Center;">Perpustakaan</h2>
    </div>
    <!-- logo dan tagline end -->
    <!-- menu sidenav start -->
    <a class="<?php if($_GET['page'] == ''){ echo ' active';}?>" href="index.php"><i class="material-icons">dashboard</i> Dashboard</a>
    <a class="<?php if($_GET['page'] == 'anggota'){ echo ' active';}?>" href="?page=anggota"><i class="material-icons">account_box</i> Anggota</a>
    <a class="<?php if($_GET['page'] == 'buku'){ echo ' active';}?>" href="?page=buku"><i class="material-icons">book</i> Buku</a>
    <a class="<?php if($_GET['page'] == 'transaksi'){ echo ' active';}?>" href="?page=transaksi"><i class="material-icons">event_note</i> Transaksi</a>
    <a class="<?php if($_GET['page'] == 'laporan'){ echo ' active';}?>" href="?page=laporan"><i class="material-icons">perm_device_information</i> Laporan</a>
    <!-- <a href="?page=pengaturan"><i class="material-icons">settings</i> Pengaturan</a> -->
    <!-- menu sidenav end -->
  </div>
  <!-- sidenav end -->

  <!-- main start -->
  <div id="main" class="main">

    <div class="sub-main">
        <div class="content">

          <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            // halaman klik
            // page anggota: tambah, edit, hapus
            if($page == "anggota"){
              if (isset($_GET['aksi'])){
                if ($aksi=="tambah"){
                  include "./page/anggota/tambah.php";
                }
                elseif ($aksi=="edit"){
                  include "./page/anggota/edit.php";
                }
                elseif ($aksi=="hapus"){
                  include "./page/anggota/hapus.php";
                }
                elseif ($aksi=="coba"){
                  include "./page/anggota/coba.php";
                }
              }
              else {
                include "./page/anggota/anggota.php";
              }
            }
            // page buku: tambah, edit, hapus
            elseif($page == "buku"){
              if (isset($_GET['aksi'])){
                if ($aksi=="tambah"){
                  include "./page/buku/tambah.php";
                }
                elseif ($aksi=="edit"){
                  include "./page/buku/edit.php";
                }
                elseif ($aksi=="hapus"){
                  include "./page/buku/hapus.php";
                }
              }
              else {
                include "./page/buku/buku.php";
              }
            }
            // page transaksi: tambah
            elseif($page == "transaksi"){
              if (isset($_GET['aksi'])){
                if ($aksi=="tambah"){
                  include "./page/transaksi/tambah.php";
                }
                elseif ($aksi=="kembali"){
                  include "./page/transaksi/kembali.php";
                }
                elseif ($aksi=="perpanjang"){
                  include "./page/transaksi/perpanjang.php";
                }
              }
              else {
                include "./page/transaksi/transaksi.php";
              }
            }
            // page laporan:
            elseif($page == "laporan"){
              if (isset($_GET['aksi'])){
                if ($aksi=="anggota"){
                  include "./page/laporan/anggota/anggota.php";
                }
	              elseif ($aksi=="buku"){
                  include "./page/laporan/buku/buku.php";
	              }
		            elseif ($aksi=="transaksi"){
                  include "./page/laporan/transaksi/transaksi.php";
                }
		            elseif ($aksi=="btgl"){
                  include "./page/laporan/transaksi/transaksi_tgl.php";
                }
		            elseif ($aksi=="bsp"){
                  include "./page/laporan/transaksi/transaksi_bsp.php";
                }
		            elseif ($aksi=="bsk"){
                  include "./page/laporan/transaksi/transaksi_bsk.php";
                }
              }
              else {
                include "./page/laporan/laporan.php";
              }
            }
            else {
              include "./page/dashboard.php";
            }
          ?>
        </div>
      </div>
  </div>
  <!-- main end -->

  <script>
  function toggleNav() {
    var x = document.getElementById("mySidenav");
    var y = document.getElementById("main");
    if (y.style.marginLeft === "0px") {
      // sidenav close
      x.style.marginLeft = "0px";
      y.style.marginLeft = "250px";
    } else {
      // sidenav open
      x.style.marginLeft = "-250px";
      y.style.marginLeft = "0px";
    }
  }
  </script>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="material-icons">exit_to_app</i> Logout</h4>
          </div>
          <div class="modal-body">
            <p>Anda yakin ingin keluar ?</p>
          </div>
          <div class="modal-footer">
            <a style="min-width:80px;" href="logout.php" class="btn btn-danger">Ya</a>
            <button style="min-width:80px;" type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
          </div>
        </div>

      </div>
    </div>


  <!-- script anti enter start -->
  <script type="text/javascript">
    function stopRKey(evt) {
      var evt = (evt) ? evt : ((event) ? event : null);
      var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
      if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    }
    document.onkeypress = stopRKey;
  </script>
  <!-- script anti enter end -->

  <!-- generator transaksi bag nis dan nama murid start-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
    $(function() {
      $("#nis").change(function(){
        var nis = $("#nis").val();

        $.ajax({
          url: '../prosesNis.php',
          type: 'POST',
          dataType: 'json',
          data: {
            'nis': nis
          },
          success: function (siswa) {
            $("#nama").val(siswa['nama']);
          }
        });
      });

      $("form").submit(function(){

      });
    });
  </script>
  <!-- generator transaksi bag nis dan nama murid end-->

  <!-- generator bag isbn dan nama buku start-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
      $(function() {
        $("#isbn").change(function(){
          var isbn = $("#isbn").val();

          $.ajax({
            url: '../prosesIsbn.php',
            type: 'POST',
            dataType: 'json',
            data: {
              'isbn': isbn
            },
            success: function (siswa) {
              $("#judul").val(siswa['judul']);
            }
          });
        });

        $("form").submit(function(){

        });
      });
    </script>
  <!-- generator bag isbn dan nama buku end-->

  <script type="text/javascript"src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
    $(document).ready(function () {
      $('#dataTables-example').DataTable();
    });

    $(document).ready(function () {
      $('#dataTables-example-pinjam').DataTable();
    });

    $(document).ready(function () {
      $('#dataTables-example-kembali').DataTable();
    });
  </script>
  </body>
  </html>
