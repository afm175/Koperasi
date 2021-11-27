<?php
include 'config.php';
$nama_tbl = 'pinjam';
E_ALL & ~E_NOTICE;
error_reporting(0);
ini_set('display_errors', 0);


// menyimpan data kedalam variabel
if (isset($_POST['submit'])) {
	# code...

	$username       = $_POST['username'];
	$nominal	  		= $_POST['nominal'];
	$date      		 = $_POST['date'];
	$keterangan        = $_POST['keterangan'];
	$cicil 			= $_POST['cicil'];
	// query SQL untuk insert data


	$querynya = "INSERT INTO pinjam VALUES('','$username','$nominal','$date','$keterangan','$cicil')";
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
	<title>
		Pinjam
	</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Arvo&display=swap');

		.carousel {
			width: 60%;
			height: 10%;
		}

		body {
			background-color: grey;
			margin: 0px;
			padding: 0px;
			font-family: 'Arvo', serif;
			width: 100%;
			height: 100%;
			color: #334257;
			background-image: url(style/img/backgroundall.jpg);
		}

		.container {
			justify-content: center;

		}

		/*Style Untuk Nav*/
		.cont-nav {

			margin-right: 10vw;
			margin-left: 10vw;
			background: #78DEC7;
			border-bottom-left-radius: 40px;
			border-bottom-right-radius: 40px;
			margin-bottom: 3rem;
		}

		.textx {

			font-size: 24px;
			font-weight: 600;
			word-spacing: 20px;
			margin: 0px 15px 0px 15px;
		}

		a .nav-link {
			color: #334257 !important;
		}

		.witel {
			letter-spacing: 5px;
			font-size: 30px;
			margin-left: 2em;
		}

		.navbar-text {
			position: relative;
			left: 59%;

		}

		@media only screen and (max-width: 1460px) {
			* {
				transition: .6s;
			}

			.navbar-text {
				position: relative;
				left: 47%;
			}

			.contain {
				width: 50%;
				margin-right: 20em;

			}

			/* .kiri {
				display: none;
			}

			.kanan {
				border-radius: 20px;
				justify-content: center;
			} */
		}

		@media only screen and (max-width: 1260px) {
			.navbar-text {
				position: relative;
				left: 37%;
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

		.contain {
			box-sizing: border-box;
			background: #B0EACD;
			padding: 10px 2rem 10px 2rem;
			text-align: justify;
			margin: auto;
			/*top-right-bottom-left*/
			width: 100%;
			border-top-right-radius: 60px;
			border-bottom-left-radius: 60px;
			border-bottom-right-radius: 10px;
			border-top-left-radius: 10px;
		}

		.textt {
			/*text*/
			text-align: center;
			font-size: 20px;
			font-weight: 400;
			line-height: 1.4;
		}

		.Sub {
			font-size: 30px;
			font-weight: 700;
			opacity: .8;
			text-align: center;
			margin-bottom: 20px;
		}

		.gambar {
			box-sizing: border-box;
			border-radius: 10px;
			margin: 1rem;
			position: relative;
			top: 3rem;
		}

		/*Layer 1 Done*/
		/*Layer 2 Style*/
		.grid {
			display: flex;
			justify-content: center;
			/* flex-wrap: wrap; */
		}

		.bagian {
			flex: 1;
			padding: 2rem;
			height: 30rem;
			background-color: #78DEC7;
		}

		/* .background {
			background-image: url(style/img/mural.jpg);
		} */

		.kiri {
			border-bottom-left-radius: 20px;
			border-top-left-radius: 20px;
			box-sizing: border-box;
		}

		.ilustrasi {
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
		/*Card Style*/
		.flex {
			display: flex;
			position: relative;
			flex-wrap: wrap;

			align-items: center;
			justify-content: center;
		}

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
	<nav id="web-navbar" style="color: #878384;" class="cont-nav navbar navbar-expand-lg navbar-dark  py-2">
		<a class="navbar-brand textx witel" href="index.php">Witel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto navbar-text">
				<li class="textx nav-item active">
					<a class="nav-link riggt" href="index.php">Home</a>
				</li>
				<li class="textx nav-item">
					<a class="nav-link" onclick="return invalid(this)" href="history.php?user=<?php echo $sessionuser ?>">History</a>
				</li>
				<li class="textx nav-item">
					<a style="text-decoration: none; color: #ffff !important;" href="#">
						<p class="nav-link"><?php echo $sessionuser ?></p>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Nav Selesai -->

	<div class="container">
		<!-- Kalimat -->
		<div class="contain textt">
			<div class="Sub">Petunjuk Peminjaman Dana</div>
			<div class="textt">Waktu adalah uang, oleh karenanya kamu berhak mendapatkan proses pengajuan pinjaman yang begitu mudah</div>

		</div>
		<!-- Kalimat END -->
		<div class="layer 2">
			<div class="grid">
				<div class="bagian kiri">
					<div class="ilustrasi"></div>
					<!-- <div class="judul-sec">
					</div>
					
					<div class="foot-sec">			
					</div> -->
				</div>


				<div class="bagian kanan">
					<form method="post" action="pinjam.php" onsubmit="return alerta_save_load(this)">
						<table border="0">
							<tr><span class="judul-form">Pinjam Dana</span></tr>
							<tr>

								<td><input readonly class="form-text" type="text" name="username" maxlength="25" value=<?php echo $sessionuser ?>></td>
							</tr>
							<tr>
								<td><input class="form-text" type="text" name="nominal" maxlength="12" required placeholder="Nominal Simpan"></td>
							</tr>
							<tr>
								<td><input class="form-text" type="number" name="cicil" maxlength="12" required placeholder="Tenor"></td>
							</tr>
							<tr>
								<td><input class="form-text" type="date" required name="date"></td>
							</tr>
							<tr>
								<td><input class="form-text" type="text" name="keterangan" required placeholder="Keterangan Pinjam Dana"></td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn btn-primary" type="submit" name="submit" value="simpan">Ajukan Pinjam Dana</button></td>
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