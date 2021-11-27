<?php
include 'config.php';
$nama_tbl = 'user';
	if (isset($_POST['submit'])) {
		# code...
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$telpon = $_POST['telpon'];
		$alamat = $_POST['alamat'];
		$php = mysqli_query($connect, "INSERT INTO $nama_tbl VALUES('','$username','$pass','$telpon', '$alamat')");
		if ($php) {
			# code...
			header("location: login.php");
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
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registrasi User's Koperasi Simpan Pinjam</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		
	</style>
</head>
<body>
	<main>
		<section class="cont-sec 1">
			<div class="contain">
				<div>
					<img src="style/img/pet.jpg">
					<div>
						<h2>Halo Selamat datang</h2>
						<h4>Memberikan solusi keuangan kepada Anda Semua</h4>
					</div>
					
				</div>
			</div>
			<div class="contain">
				<form action="registerasi.php" method="post">
					<h4 >Daftar Akun</h4>
					<div>
						<label >Username</label><br>
						<input type="text" name="username" placeholder="Username">
						<br>
						<label>Password</label><br>
						<input type="password" name="pass" placeholder="password">
						<br>
						<label>Alamat</label><br>
						<input type="text" name="alamat" placeholder="Alamat">
						<br>
						<label>No. Handphone</label><br>
						<input type="text" name="telpon" placeholder="Nomor Handphone">
						<br>
						<input type="submit" class="btn btn-primary"  name="submit" value="Masuk" style=""> 

					</form>
				</div>
			</div>
		</section>
	</main>
</body>
</html>