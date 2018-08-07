<?php
	include 'koneksi.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");




		$cek = mysqli_fetch_array($query);
		$level = $cek['level'];

		if($cek['username'] == $username and $cek['password'] == $password) {
			session_set_cookie_params(0); //set logout when browser is closed
			session_start();

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			if ($level == 'admin') {
				$_SESSION['level'] = "loginAdmin";
				header("location:admin/index.php");
			}
			elseif($level == 'user'){
				$_SESSION['level'] = "loginUser";
				header("location:user/index.php");
			}


			// $_SESSION['level'] = "login";


			// header("location:admin/index.php");
		}
		else {
			header("location:index.php?msg=failed");
		}


?>
