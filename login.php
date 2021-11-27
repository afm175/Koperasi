<?php
/*require_once 'auth.php';*/
/*include 'config.php';
	if (isset($_POST['submit'])) {
		# code...
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$php = mysqli_query($connect, "INSERT INTO user VALUES('','$username','$pass')");
		if ($php) {
			# code...
			if($auth->isLoggedIn()) {
			 header('location:index.php');
			
			?>
				<script>
					alert("Berhasil!");
				</script>
				<?php
		}
		else{
			?>
				<script>
					alert("Tidak Berhasil!");
				</script>
				<?php
		}
	}
}*/
E_ALL & ~E_NOTICE;
error_reporting(0);
ini_set('display_errors', 0);

session_start();
if (isset($_SESSION['username'])) {
	header("location:index.php");
	die();
}
//connect to database
include 'config.php';
if ($connect) {
	if (isset($_POST['login_btn'])) {
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = $_POST['pass'];
		$id_user = mysqli_real_escape_string($connect, $_POST['id_user']);
		//   $pass=md5($pass); //Remember we hashed password before storing last time
		$sql = "SELECT * FROM user WHERE username='$username' ";
		$result = mysqli_query($connect, $sql);
		$enc=password_hash($password, PASSWORD_DEFAULT);
		if ($result) {

			if (mysqli_num_rows($result) >= 1) {
				
				$row = mysqli_fetch_array($result);
				// var_dump($row["pass"], $enc);
				
				if (password_verify($password, $row["pass"])) {
					?>
					<script>
						alert("Kamu Berhasil Login")
					</script>
					<?php
					$_SESSION['username'] = $username;
					$_SESSION['id_user'] = $id_user;
					header("location:login.php");
				}
				/*$_SESSION['message']="You are now Loggged In";*/
			} else {
				/*$_SESSION['message']="Username and Password combiation incorrect";*/
				?>
				<script>
					alert('Username dan Password Anda Salah')
				</script>
				<?php
			}
		}
	}
}

$_SESSION['id_user'] = $id_user;
$id_user = $_SESSION['id_user'];
?>



<!DOCTYPE html>
<html>

<head>
	<title>Login User's Koperasi</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		body {
			background: #78DEC7;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			flex-direction: column;
		}

		* {
			font-family: sans-serif;
			box-sizing: border-box;
			transition: .5s;
		}

		form {
			width: 500px;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;
		}

		h1 {
			text-align: center;
			margin-bottom: 40px;
			padding: 0px 20px 0px 20px;
			opacity: 0.8;
			font-size: 17px;
		}

		input {
			display: block;
			border: 2px solid #ccc;
			width: 95%;
			padding: 10px;
			margin: 10px auto;
			border-radius: 5px;
		}

		label {
			color: #888;
			font-size: 18px;
			padding: 10px;
		}

		.witel {
			color: #78DEC7;
		}

		a {
			text-decoration: none;
		}

		.button {
			float: right;
			background: #B5EAEA;
			padding: 10px 15px;
			color: black;
			box-shadow: 3px 3px 5px #78DEC7;
			border-radius: 10px;
			margin-right: 10px;
			border: none;
			cursor: pointer;
		}

		.text {
			font-size: 17px;
			font-weight: 600;
			opacity: 0.8;
		}

		.button:hover {
			opacity: .7;
			box-shadow: none;
			padding: 12px 17px;
		}

		.text:hover {
			font-size: 16px;

		}

		span:hover {
			font-size: 25px;
			text-shadow: 2px 2px 2px 2px #78DEC7;
		}

		.error {
			background: #F2DEDE;
			color: #A94442;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
			margin: 20px auto;
		}

		.success {
			background: #D4EDDA;
			color: #40754C;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
			margin: 20px auto;
		}

		h2 {
			text-align: center;
			color: black;
			opacity: 0.8;
			padding: 0px 20px 0px 20px;
		}

		.ca {
			font-size: 14px;
			display: inline-block;
			padding: 10px;
			text-decoration: none;
			color: #444;
		}

		.ca:hover {
			font-size: 15px;
			color: black;
			opacity: 0.7;
			transition: .4s;
		}
	</style>
</head>

<body>
	<main>
		<section class="cont-sec 1">
			<div class="contain">
				<div>
					<!-- <img src="style/img/pet.jpg"> -->
				</div>
			</div>
			<div class="contain">
				<?php
				if (isset($_SESSION['message'])) {
					echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
					unset($_SESSION['message']);
				}
				?>
				<form action="login.php" method="post" onsubmit="return login(this)">
					<h2>Welcome To <a href="index.php"><span class="witel">Witel</span></a></h2>
					<h1>Solusi keuangan kepada Anda Semua</h1>
					<div>
						<label>Username</label><br>
						<input type="text" name="username" placeholder="Usename" required>
						<br>
						<label>Password</label><br>
						<input type="password" name="pass" placeholder="Password" required>
						<br>
						<input type="submit" class="text button btn btn-primary" name="login_btn" value="Masuk">

						<a class="ca" href="signup.php">Create an Account</a>

				</form>
			</div>
			</div>
		</section>
	</main>
	<script src="js/validate.js"></script>
</body>

</html>