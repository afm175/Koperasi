<?php
include 'config.php';
$nama_tbl = 'simpan';
E_ALL & ~E_NOTICE;
error_reporting(0);
ini_set('display_errors', 0);


// menyimpan data kedalam variabel
if (isset($_POST['submit'])) {
	# code...

	$username       = $_POST['username'];
	$nominal1	  	= $_POST['nominal'];
	$date      		= $_POST['date'];
	$keterangan     = $_POST['keterangan'];
	$cicil 			= $_POST['cicil'];
	// query SQL untuk insert data

	$nominal = (int)$nominal1;
	$querynya = "INSERT INTO $nama_tbl VALUES('','$username','$nominal','$date','$keterangan', '$cicil')";
	//echo "INSERT INTO $table_name SET nama_kontak='$nama',pekerjaan='$pekerjaan',no_hp='$no_hp',tlp_kantor='$no_tlp', email='$email'";

	mysqli_query($connect, $querynya);

	if (!$querynya) {
		die('ERROR: Data gagal dimasukkan pada tabel ' . $nama_tbl . ': ' . mysqli_error($connect));
	}
}

session_start();

if (isset($_SESSION['message'])) {
	echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
	unset($_SESSION['message']);
	header("location:index.php");
}

$select = "SELECT * FROM user";
$data = mysqli_query($connect, $select);
$d = mysqli_fetch_array($data);


$sessionuser = $_SESSION['username'];

?>
<!-- <html>
<body>
<br>
<a href=tampil_data.php>>>Klik Untuk Tampilkan Data<<"</a>
</body>
</html> -->

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<title>
		Simpan
	</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Arvo&display=swap');

		.carousel {
			width: 60%;
			height: 10%;
		}

		* {
			transition: .5s;
		}

		body {
			background-color: #ffff;
			margin: 0px;
			padding: 0px;
			font-family: 'Arvo', serif;
			width: 100%;
			height: 100%;
			color: #334257;
			max-width: 100%;
			overflow-x: hidden;
			background-image: url(style/img/backgroundall.jpg);
		}

		.container {
			justify-content: center;

		}

		/*Style Untuk Nav*/
		.cont-nav {

			margin-right: 8vw;
			margin-left: 8vw;
			background: #78DEC7;
			border-bottom-right-radius: 40px;
			border-bottom-left-radius: 40px;
		}

		.textx {

			font-size: 24px;
			font-weight: 600;
			word-spacing: 20px;
			margin: 0px 15px 0px 30px;
		}

		a,
		a .nav-link {

			text-decoration: none !important;
		}

		.flex {
			position: relative;
			left: 4%;

		}

		.witel {
			letter-spacing: 5px;
			font-size: 30px;
			padding-left: 4rem;
			padding-bottom: 1rem;
		}

		.witel:hover {
			font-size: 35px;
			text-shadow: 0px 0px 15px white;
		}

		@media only screen and (max-width: 1460px) {
			* {
				transition: .6s;
			}

			.gambar {
				display: none;
			}

			.textt {
				position: relative;
				left: -13%;
			}
		}

		@media only screen and (max-width: 1260px) {
			.textt {
				position: relative;
				left: 27%;
			}
		}

		/*Navbar Selesai*/
		/*Layer 1 style*/
		.satu {
			width: 100%;
			display: flex;
			justify-content: center;
		}

		.layer {
			/*border:1px solid black;*/
			width: 100%;
			margin-top: 1rem;
			margin-bottom: 2rem;
		}

		.textt {
			box-sizing: border-box;
			padding: 10px;
			text-align: justify;
			font-size: 25PX;
			position: relative;
			left: -23%;

		}

		h4 {
			margin-bottom: 20px !important;
			font-size: 30px;
			font-weight: 600;
		}

		.container-paragraf {
			box-sizing: border-box;
			padding: 25px;
			position: relative;
		}

		.paragraf {
			font-size: 24px;
			font-weight: 400;
			text-align: justify;
		}

		.container-textt {
			margin-left: 70%;
		}

		.gambar {
			box-sizing: border-box;
			border-radius: 10px;
			margin: 1rem;
		}

		/*Layer 1 Done*/
		/*Layer 2 Style*/
		.grid {
			display: flex;
			justify-content: center;
		}

		.bagian {
			flex: 1;
			padding: 2rem;
			height: 30rem;
			background-color: #78DEC7;
		}

		.kiri {
			border-bottom-left-radius: 20px;
			border-top-left-radius: 20px;
			box-sizing: border-box;
		}

		.ilustrator {
			position: relative;
			bottom: 17%;
			box-sizing: border-box;
			height: 120%;
			background-image: url(style/img/dokum.svg);
			background-size: contain;
			background-position: center;
			background-repeat: no-repeat;
		}

		.kanan {
			border-bottom-right-radius: 20px;
			border-top-right-radius: 20px;
			padding: 4rem;
		}

		.logo-witl {
			position: relative;
			bottom: 9rem;
		}

		/*FORM*/
		.judul-form {

			font-family: Verdana, Arial, Helvetica, Georgia;
			font-size: 40px;
			text-align: center;
			text-shadow: 1px 1px 4px grey;
			position: relative;
			bottom: 2rem;
		}

		.form-text {
			padding: 7px 15px 7px 15px;
			font-size: 20px;
			font-weight: 600;
			border-radius: 10px;
			border: none;
			outline: none;
			text-align: left;
			width: 30rem;
		}

		.btn {
			margin-top: 2rem;
		}

		/*:ayer 2 Done*/
		.footer-text {
			font-size: 20px;
			font-weight: 200;
			letter-spacing: 3px;
			background-color: #EEEE;
			padding: 30px 0px 25px 5em;
			opacity: 0.8;
		}
	</style>
</head>

<body>
	<!-- Nav -->

	<!-- Nav bar -->
	<nav id="web-navbar" style="color: #0F044C;" class="cont-nav navbar navbar-expand-lg navbar-dark  py-2">
		<a class="navbar-brand witel" href="index.php">Witel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto container-textt">
				<li class="textt nav-item active">
					<a class="textt nav-link" href="index.php">Home</a>
				</li>
				<li class="textt nav-item">
					<a class="nav-link" onclick="return invalid(this)" href="history.php?user=<?php echo $sessionuser ?>">History</a>
				</li>
				<li class="textt nav-item">
					<a href="#">
						<p class="nav-link"><?php echo $sessionuser ?></p>
					</a>
				</li>

			</ul>
		</div>
	</nav>
	<!-- Nav Selesai -->
	<div class="container">
		<div class="layer satu">
			<img height="500" width="700" class="gambar" src="style/img/cat.jpg">
			<div class="container-paragraf">
				<h4>Tentang Simpan Dana Witel</h4>
				<h2 class="paragraf">halo Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h2>
			</div>


		</div>
		<div class="layer 2">
			<div class="grid">
				<div class="bagian kiri">
					<div class="ilustrator"></div>
				</div>

				<div class="bagian kanan">
					<form method="post" action="simpan.php" onsubmit="return alerta_save_load(this)">
						<table border="0">
							<tr><span class="judul-form">Simpan Dana</span></tr>
							<tr>
								<td><input readonly class="form-text" type="text" name="username" maxlength="25" value=<?php echo $sessionuser ?>></td>
							</tr>
							<tr>
								<td><input class="form-text" type="text" name="nominal" maxlength="12" required placeholder="Nominal Simpan"></td>
							</tr>
							<tr>
								<td><input class="form-text" type="text" name="date" readonly value="<?php echo date('l,  d-m-y - h:i:s a') ?>"></td>
							</tr>
							<tr>
								<td><input class="form-text" type="text" name="keterangan" required placeholder="Keterangan Simpan uang"></td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-primary" type="submit" name="submit" value="simpan">Ajukan Simpan Dana</button></td>
								<td></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer style="background-color: #EEEEEE; height: auto;">
		<div class="footer-text">&copy; 2021, Witel. Prototype.</div>
	</footer>
	<script src="js/validate.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>