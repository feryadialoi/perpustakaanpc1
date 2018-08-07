<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/logo.png">
    <style>
      body {
        background-image: url("./assets/img/bg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body>

  <img class="bg-img bg-blur" src="./assets/img/bg.jpg" alt="">
  <div class="bg-blur">
  </div>
  <!-- panel content start -->
  <div class="panel_">
    <div class="panel_heading">
      <center><span class="login-title">Perpustakaan Sekolah Pelita Cemerlang</span></center>
    </div>
    <div class="panel_body">
      <center><img src="./assets/img/logo.png" alt="logo" width="200px"></center>
      <form role="form" action="login.php" method="post" id="form" onsubmit="return validasi()">
        <div class="form-group">
          <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <hr><!--  garis pembatas -->
        <div >
          <input class="btn btn-primary" type="submit" name="login" value="Login">
        </div>
      </form>
    </div>
  </div>
  <!-- panel content end -->
  </body>

<?php
  if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
    echo '<script language="javascript">';
    echo 'alert("Username atau Password salah !")';
    echo '</script>';
  }
?>
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		if (username != "" && password!="") {
			return true;
    }else{
			alert('Username dan Password harus di isi !');
			return false;
		}
  }
</script>
</html>
