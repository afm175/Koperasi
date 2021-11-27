<?php
/*Eror Solve*/
E_ALL & ~E_NOTICE;
error_reporting(0);
ini_set('display_errors', 0);

session_start();
include 'config.php';

if (isset($_SESSION['message'])) {
	echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
	unset($_SESSION['message']);
}

$select = "SELECT * FROM user";
$data = mysqli_query($connect, $select);
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style/Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/Bootstrap/js/bootstrap.bundle.min.js">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<title>Witel's Dashboard</title>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Arvo&display=swap');

		body {
			margin: 0px;
			padding: 0px;
			color: #0F044C;
			font-family: 'Arvo', serif;
			background-image: url(style/img/backgroundall.jpg);
		}

		a {
			text-decoration: none;
			text-decoration-line: none;
		}

		/*Style Untuk Nav*/
		.cont-nav {

			margin-right: 8vw;
			margin-left: 8vw;
			background: #78DEC7;
			border-bottom-right-radius: 40px;
			border-bottom-left-radius: 40px;
		}

		.textt {
			font-size: 24px;
			font-weight: 600;
			word-spacing: 10px;
			margin: 0px 15px 0px 15px;
		}

		.witel {
			letter-spacing: 5px;
			font-size: 30px;
			padding-left: 4rem;
		}

		/*Navbar Selesai*/

		/*Style untuk layer 1*/
		.layer {
			text-align: center;
			margin-left: 10vw;
			margin-right: 10vw;
		}

		.pertama {
			display: flex;
			flex-direction: column;
			margin-top: 4em;

		}

		.sec-1 {
			box-sizing: border-box;
			/* flex: 4; */
			margin: 20px;
			font-size: 26px;

		}

		/*h1 style*/
		.judul {
			font-size: 40px;
			font-weight: 800;
			padding-top: 7vh;
		}

		.paragraf {
			font-size: 30px;
			padding: 25px;
			font-weight: 500;
			text-align: justify;
		}

		.sec-2 {
			flex: 1;
			margin: 20px;

		}

		.gambar {
			max-width: 70%;
			height: auto;
		}

		button {
			margin-right: 20px;
			background-color: #B5EAEA;
			padding: 10px;
			border-radius: 10px;
			box-shadow: 3px 3px 5px #78DEC7;
			outline: none;
			border: none;
			transition: .5s;
		}

		button:hover {
			padding-bottom: 10px;
			box-shadow: none;
			color: white;
			font-size: 28px;
		}

		/*Layer 1 selesai*/

		/*Layer 2 Style*/
		.kedua {}

		.flex {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-wrap: wrap;

		}

		.contain-text {
			padding: 0px 2em 0px 2em;
			margin: 5em 0em 2em;
		}

		@media only screen and (max-width: 1260px) {
			* {
				transition: .6s;
			}

			.sec-2 {
				display: none;
			}

			.pertama {
				margin-bottom: -2em;
			}
		}

		@media only screen and (max-width: 380px) {
			.pertama {
				margin-bottom: 30px;
			}
		}

		/*Card Style*/
		.card:hover {
			width: 21rem;
			height: 31rem;
			box-shadow: 1px 1px 5px 5px #78DEC7;
		}

		.card {
			padding: 15px;
			margin: 25px;
			width: 20rem;
			height: 30rem;
			border-radius: 10px;
			box-shadow: 1px 1px 5px 2px #78DEC7;
			justify-content: space-between;
			flex-wrap: wrap;
			transition: .5s;
		}

		.card-image {
			height: 50%;
			border-radius: 10px;
			background-position: center;
			background-size: cover;
		}

		.satu {
			background-image: url(style/img/service.png);
		}

		.dua {
			background-image: url(style/img/save.png);
		}

		.tiga {
			background-image: url(style/img/security.png);
		}

		.card-judul {
			box-sizing: border-box;
			padding: 10px;
			padding-bottom: 5px;
			font-size: 20px;
			font-weight: 600;
			opacity: 0.8;
		}

		.card-isi {

			box-sizing: border-box;
			height: 35%;
			font-size: 16px;
			font-weight: 400;
			text-align: justify;
		}

		/*Card Selesai*/
		/*Layer 2 Selesai*/
		/*Footer*/
		.footer-text {
			font-size: 20px;
			font-weight: 200;
			letter-spacing: 3px;
			background-color: #EEEE;
			padding: 30px 0px 25px 5em;
			opacity: 0.8;
		}

		/*Footer Selesai*/
	</style>
</head>

<body>
	<?php
	$sessionuser = $_SESSION['username'];
	$sessionid = $_SESSION['id_user'];
	?>
	<!-- Nav bar -->
	<nav id="web-navbar" style="color: #0F044C;" class="cont-nav navbar navbar-expand-lg navbar-dark  py-2">
		<a class="navbar-brand textt witel" href="index.php">Witel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="textt nav-item active">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="textt nav-item">
					<a class="nav-link" onclick="return invalid(this)" href="history.php?user=<?php echo $sessionuser ?>">History</a>
				</li>
				<li class="textt nav-item">
					<a class="nav-link" href="#info">Info</a>
				</li>
				<li class="textt nav-item">
					<a class="nav-link" href="login.php">Login</a>
				</li>
				<li class="textt nav-item">
					<a class="nav-link" href="logout.php" onclick="alert('Berhasil Logout')">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Layer 1 -->
	<div class="layer pertama">
		<div class="sec-1">
			<picture> <img srcset="style/img/home1.png" class="gambar"></picture>
			<h1 class="judul">Witel</h1>
			<p class="paragraf">Selamat datang di Witel: Koperasi Witel adalah koperasi karyawan, pensiunan dan rekan Witel. Anggota Koperasi Witel adalah karyawan tetap yang terdaftar sebagai anggota. Dengan dukungan PT. Telkom Indonesia, menjadikan koperasi yang keberadaannya dibutuhkan, memberi kepuasan serta memenuhi kebutuhan anggota. </p>
			<div>
				<a href="pinjam.php" class="button"><button>Ajukan Pinjam Dana</button></a>
				<a href="simpan.php" class="button"><button>Ajukan Simpan Dana</button></a>
				<a href="gadai.php" class="button"><button>Ajukan Gadai Barang</button></a>
			</div>
		</div>
		<!-- <div class="sec-2">
			
		</div> -->
	</div>
	<!-- Layer 2 -->
	<div class="layer kedua">
		<!-- Pembuatan Grid untuk card promosi -->
		<div class="contain-text">
			<h2>Proses Mudah dan Cepat</h2>
			<h5>Waktu adalah peluang, peluang adalah uang yang tertunda maka dapat kan lah dengan proses yang mudah</h5>
		</div>
		<div class="flex">
			<div class="card">
				<div class="card-image satu"></div>
				<div class="card-judul">
					Service
				</div>
				<div class="card-isi">
					Pelayanan kepada anggota dan client merupakan concern kami.
				</div>
			</div>
			<div class="card">
				<div class="card-image dua"></div>
				<div class="card-judul">
					Pencairan Dana
				</div>
				<div id="info" class="card-isi">
					Menyediakan kebutuhan yang di perlukan anggota dengan pencairan dana
				</div>
			</div>
			<div class="card">
				<div class="card-image tiga"></div>
				<div class="card-judul">
					Aman Terpercaya
				</div>
				<div class="card-isi">
					Koperasi Witel secara resmi terdaftar dan diawasi oleh Kementrian Koperasi.
				</div>
			</div>
		</div>

	</div>

	<footer style="background-color: #EEEEEE; height: auto;">
		<div class="footer-text">&copy; 2021, Witel. Prototype.</div>
	</footer>
</body>

</html>