<?php
E_ALL & ~E_NOTICE;
error_reporting(0);
ini_set('display_errors', 0);

include 'config.php';

session_start();

if (isset($_SESSION['message'])) {
	echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
	unset($_SESSION['message']);
}

$select = "SELECT * FROM user";
$data = mysqli_query($connect, $select);
$d = mysqli_fetch_array($data);


$sessionuser = $_SESSION['username'];
$user = $_GET['user'];
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>History</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		body {
			background-color: #ffff;
		}

		/*Nav Style*/

		.cont-nav {
			border: 1px solid white;
			margin-right: 10vw;
			margin-left: 10vw;
			background: #78DEC7;
		}

		.textt {
			font-size: 24px;
			font-weight: 600;
			word-spacing: 20px;
			margin: 0px 15px 0px 15px;
		}

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

		.textt {
			box-sizing: border-box;
			padding: 10px;
			text-align: justify;
			font-size: 25PX;
			position: relative;
			left: 45vw;

		}

		/*Nav Selesai*/
		/*Container History Style*/
		.container-his {
			box-sizing: border-box;
			width: 70%;
			position: relative;
			left: 15%;
			margin-top: 4rem;
			height: auto;
		}

		.simpin {
			font-size: 20px;
			font-weight: 600;
			padding: 10px;
			color: black;
			opacity: 0.8;
		}

		.simpin:hover {}

		.nav {
			display: flex;
			justify-content: center;
		}

		a {
			text-decoration: none;
			color: #ffff;
			font-size: 18px;
			font-weight: 600;
		}

		a:hover {
			color: #ffff;
		}

		.active {}

		/*Container Histoory selesai*/
		table {
			border: 1px solid #ccc;
			border-collapse: collapse;
			margin: 0;
			padding: 0;
			width: 100%;
		}

		table tr {
			border: 1px solid #ddd;
			padding: 5px;
		}

		table th,
		table td {
			padding: 10px;
			text-align: center;
		}

		table th {
			font-size: 14px;
			letter-spacing: 1px;
			text-transform: uppercase;
		}

		@media screen and (max-width: 600px) {
			table {
				border: 0;
			}

			table thead {
				display: none;
			}

			table tr {
				border-bottom: 2px solid #ddd;
				display: block;
				margin-bottom: 10px;
			}

			table td {
				border-bottom: 1px dotted #ccc;
				display: block;
				font-size: 13px;
				text-align: right;
			}

			table td:last-child {
				border-bottom: 0;
			}

			table td:before {
				content: attr(data-label);
				float: left;
				font-weight: bold;
				text-transform: uppercase;
			}
		}

		/* container search */
		.container {
			display: flex;
			justify-content: center
		}

		/*History Detail*/
		.container-hist {
			box-sizing: border-box;
			display: flex;
			flex-wrap: wrap;
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 20px;
			padding: 20px;
			align-items: center;
			background-color: #78DEC7;
			transition: .5s;
			box-shadow: 0px 0px 10px 2px #78DEC7;
		}

		.container-hist:hover {
			box-shadow: none;
		}

		.judul-hist {
			padding: 20px;
		}

		.ket-hist {
			flex: 5;
		}

		.btn-hist {}
	</style>
</head>

<body>

	<!-- NAV -->
	<nav id="web-navbar" style="color: #0F044C;" class="cont-nav navbar navbar-expand-lg navbar-dark  py-2">
		<a class="navbar-brand witel" href="index.php">Witel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto container-textt">
				<li class="nav-item active">
					<a class="textt nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class=" textt nav-link" onclick="return invalid(this)" href="history.php?user=<?php echo $sessionuser ?>">History</a>
				</li>

				<li class="nav-item">
					<a href="#">
						<p class=" textt nav-link"><?php echo $sessionuser ?></p>
					</a>
				</li>

			</ul>
		</div>
	</nav>
	<!-- Button trigger modal -->


	<!-- Modal -->
	<?php
	if (isset($_GET['cari'])) {
		$cari = $_GET['cari'];
		echo "<b>Hasil pencarian : " . $cari . "</b>";
	}
	?>
	<div class="container-his">
		<div class="nav nav-tabs" id="nav-tab" role="tablist" style="background-color: #78DEC7;">
			<button class="nav-link simpin active" onclick="active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
				Pinjam Dana
			</button>
			<button class="nav-link simpin" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
				Simpan Dana
			</button>
			<button class="nav-link simpin" id="nav-non-tab" data-bs-toggle="tab" data-bs-target="#nav-non" type="button" role="tab" aria-controls="nav-non" aria-selected="false">
				Gadai Barang
			</button>
		</div>

		<!-- pinjam start -->
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<!-- <form action="history2.php" method="get">
					<label>Cari data pinjaman:</label>
					<input type="text" name="cari">
					<input type="submit" value="Cari">
				</form> -->
				<table class="table table-striped">
					<thead>
						
						<tr>
							<th scope="col">No</th>
							<th scope="col">Username</th>
							<th scope="col">Nominal</th>
							<th scope="col">Date</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<?php
					include 'config.php';
					$data = mysqli_query($connect, "SELECT * from pinjam where username like '$sessionuser'");
					$user = $_GET['user'];
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$data = mysqli_query($connect, "SELECT * from pinjam where keterangan like '%" . $cari . "%'");
					} else {
						$data = mysqli_query($connect, "SELECT * from pinjam where username like '$sessionuser'");
					}
					$no = 1;
					while ($d = mysqli_fetch_array($data)) {
						# code...
					?>
						<tr>
							<th scope="row"><?php echo $no++; ?></th>
							<td><?php echo $d['username']; ?>
							<td><?php echo $d['nominal']; ?></td>
							<td><?php echo $d['date']; ?></td>
							<td><?php echo $d['keterangan']; ?></td>
							<td>
								<button type="button" class="btn btn-info"><a href="pinjam/edit-pinjam.php?id=<?php echo $d['id_pinjam']; ?>">EDIT</a></button>
								<button type="button" class="btn btn-danger"><a href="proses.php?action=deletepinjam&id=<?php echo $d['id_pinjam']; ?>" onclick="alert('Berhasil Menghapus Data')">Delete</a></button>
							</td>
						</tr>


					<?php
					}

					?>
				</table>
			</div>
			<!-- pinjam end -->

			<!-- simpan start -->
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<!-- <form action="history.php" method="get">
					<label>Cari data simpan:</label>
					<input type="text" name="cari">
					<input type="submit" value="Cari">
				</form> -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Username</th>
							<th scope="col">Nominal</th>
							<th scope="col">Date</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<?php
					include 'config.php';
					$data = mysqli_query($connect, "SELECT * from simpan where username like '$sessionuser'");
					$user = $_GET['user'];
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$data = mysqli_query($connect, "SELECT * from simpan where keterangan like '%" . $cari . "%'");
					} else {
						$data = mysqli_query($connect, "SELECT * from simpan where username like '$sessionuser'");
					}
					$no = 1;

					while ($d = mysqli_fetch_array($data)) {
						# code...
					?>

						<tr>
							<th scope="row"><?php echo $no++; ?></th>
							<td><?php echo $d['username']; ?></td>
							<td><?php echo $d['nominal']; ?></td>
							<td><?php echo $d['date']; ?></td>
							<td><?php echo $d['keterangan']; ?></td>
							<td>

								<button type="button" class="btn btn-info"><a href="simpan/edit-simpan.php?id=<?php echo $d['id_simpan']; ?>">EDIT</a></button>
								<button type="button" class="btn btn-danger"><a href="proses.php?action=deletesimpan&id=<?php echo $d['id_simpan']; ?>" onclick="alert('Berhasil Menghapus Data')">Delete</a></button>
							</td>
						</tr>

					<?php
					}

					?>
				</table>
			</div>
			<!-- simpan end -->

			<!-- gadai start -->
			<div class="tab-pane fade" id="nav-non" role="tabpanel" aria-labelledby="nav-non-tab">
				<!-- <form action="history.php" method="get">
					<label>Cari barang gadai:</label>
					<input type="text" name="cari">
					<input type="submit" value="Cari">
				</form> -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Username</th>
							<th scope="col">Nama Barang</th>
							<th scope="col">Lama Gadai</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<?php
					include 'config.php';
					$data = mysqli_query($connect, "SELECT * from gadai where username like '$sessionuser'");
					$user = $_GET['user'];
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$data = mysqli_query($connect, "SELECT * from gadai where barang like '%" . $cari . "%'");
					} else {
						$data = mysqli_query($connect, "SELECT * from gadai where username like '$sessionuser'");
					}
					// include 'config.php';
					$no = 1;
					while ($d = mysqli_fetch_array($data)) {
						# code...
					?>


						<tr>
							<th scope="row"><?php echo $no++; ?></th>
							<td><?php echo $d['username']; ?>
							<td><?php echo $d['barang']; ?></td>
							<td><?php echo $d['lama_gadai']; ?></td>
							<td>
								<button type="button" class="btn btn-info"><a href="gadai/edit-gadai.php?id=<?php echo $d['id_gadai']; ?>">EDIT</a></button>
								<button type="button" class="btn btn-danger"><a href="proses.php?action=deletegadai&id=<?php echo $d['id_gadai']; ?>" onclick="alert('Berhasil Menghapus Data')">Delete</a></button>

							</td>
						</tr>


					<?php
					}

					?>
				</table>
			</div>
			<!-- gadai end -->

			<!-- tombol cari -->
			<div class="container">
				<button type="button" class="btn btn-info"><a href="search.php">Cari Data</a></button>
			</div>

			<!-- Bagian kwitansi -->


			<!-- Button trigger modal -->
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>