
<?php 

E_ALL & ~E_NOTICE;
error_reporting(0);
ini_set('display_errors',0);

include 'config.php';

session_start();

    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }

        $select = "SELECT * FROM user";
    $data = mysqli_query($connect, $select);
	$d = mysqli_fetch_array($data);


$sessionuser = $_SESSION['username'];


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		body {
	background: #78DEC7;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
	}

	*{
		font-family: sans-serif;
		box-sizing: border-box;
		transition: .5s;
	}

	form {
		width: 500px;
		height: 800px;
		border: 2px solid #ccc;
		padding: 30px;
		background: #fff;
		border-radius: 15px;
	}

	h1 {
		text-align: center;
		margin-bottom: px;
		padding: 0px 20px 0px 20px;
		opacity: 0.8;
		font-size: 17px;
	}

	.input {
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
	.witel{
		color: #78DEC7;
	}
	a{
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
	.text{
		font-size: 17px;
		font-weight: 600;
		opacity: 0.8;
	}
	.button:hover{
		opacity: .7;
		box-shadow: none;
		padding: 12px 17px;
	}
	.text:hover{
		font-size: 16px;

	}
	span:hover{
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
	<?php 	
				$action = $_GET['named'];
				
					# code...
	 ?>
		<section class="cont-sec 1">
			<div class="contain">
				<div>
					<!-- <img src="style/img/pet.jpg"> -->					
				</div>
			</div>
			<div class="contain">
				<?php
					if ($action == "simpan") {
				
				    if(isset($_SESSION['message']))
				    {
				         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				         unset($_SESSION['message']);
				    }
				?>
				<?php 
       			$id_simpan = $_GET['id'];
				$data = mysqli_query($connect, "SELECT * From simpan WHERE id_simpan = '$id_simpan'");
				while ($d = mysqli_fetch_array($data)) { 
						$nominal 	= $d['nominal'];
						$date 		= $d['date'];
/*						$cicil1		= $d['cicil'];
						$cicil = (int)$cicil1;*/
						$user = $sessionuser;
						$tes = 10;
						$tes1 = 3;

/*						$total = $nominal/$cicil;*/

					?>
				<form action="login.php" method="post" onsubmit="return login(this)">
					<h2>Bukti Transaksi Atas Nama <span class="witel"><?php echo "$user"; ?></span></h2>
				
					<h1>Ini Bukti Transaksi Simpan mu di Hari <br><br><span class="witel"><?php echo $date ?></span></h1>
					<div>
						<label>Username</label><br>
						<p class="input"><?php echo "$user"; ?></p>
						<br>
						<label>Nominal Simpan Dana</label><br>
						<p class="input"><?php echo $nominal ?></p>
						<br>
						<label>Tanggal Simpan</label><br>
						<p class="input"><?php echo $date ?></p>
						<br>
					<?php 	} ?>
						

						<a class="text button btn btn-primary" href="history.php">Kembali</a>

					</form>
				</div>
			<?php 	} ?>
			</div>
		</section>
		<section class="cont-sec 1">
			<div class="contain">
				<div>
					<!-- <img src="style/img/pet.jpg"> -->					
				</div>
			</div>
			<div class="contain">
				<?php
					if ($action == "pinjam") {
				
				    if(isset($_SESSION['message']))
				    {
				         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				         unset($_SESSION['message']);
				    }
				?>
				<?php 
       			$id_pinjam = $_GET['id'];
				$data = mysqli_query($connect, "SELECT * From pinjam WHERE id_pinjam = '$id_pinjam'");
				while ($d = mysqli_fetch_array($data)) { 
						$nominal1 	= $d['nominal'];
						$date 		= $d['date'];
						$cicil1		= $d['cicil'];
						$cicil = (int)$cicil1;
						$nominal = (int)$nominal1;
						$user = $sessionuser;
						$tes = 10;
						$tes1 = 3;
						$bunga = 0.1*$nominal;
				$total = $nominal+$cicil+$bunga;
						

					?>
				<form action="login.php" method="post" onsubmit="return login(this)">
					<h2>Bukti Transaksi Atas Nama <span class="witel"><?php echo "$user"; ?></span></h2>
				
					<h1>Ini Bukti Transaksi Simpan mu di Hari <br><br><span class="witel"><?php echo $date ?></span></h1>
					<div>
						<label>Username</label><br>
						<p class="input"><?php echo "$user"; ?></p>
						<br>
						<label>Nominal Simpan Dana</label><br>
						<p class="input"><?php echo $nominal ?></p>
						<br>
						<label>Tanggal Simpan</label><br>
						<p class="input"><?php echo $date ?></p>
						<br>
						<label>Cicilan Selama</label><br>
						<p class="input"><?php echo $cicil ?>x</p>
						<br>
						<label>Besaran Bunga</label><br>
						<p class="input"><?php echo $bunga ?></p>
						<br>
						<label>Bayaran Per Bulan</label><br>
						<p class="input"><?php echo $total ?></p>
						<br>
					<?php 	} ?>
						

						<a class="text button btn btn-primary" href="history.php">Kembali</a>

					</form>
				</div>
			<?php 	} ?>
			</div>
		</section>
		<section class="cont-sec 1">
			<div class="contain">
				<div>
					<!-- <img src="style/img/pet.jpg"> -->					
				</div>
			</div>
			<div class="contain">
				<?php
					if ($action == "bayar") {
						?>
						<script>alert("Anda Sudah Membayar")</script>
						<?php 	
				    if(isset($_SESSION['message']))
				    {
				         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				         unset($_SESSION['message']);
				    }
				?>
				<?php 
       			$id_pinjam = $_GET['id'];
				$data = mysqli_query($connect, "SELECT * From pinjam WHERE id_pinjam = '$id_pinjam'");
				while ($d = mysqli_fetch_array($data)) { 
						$nominal1 	= $d['nominal'];
						$date 		= $d['date'];
						$cicil1		= $d['cicil'];
						$cicil = (int)$cicil1;
						$nominal = (int)$nominal1;
						$user = $sessionuser;
						$tes = 10;
						$tes1 = 3;
						$bunga = 0.1*$nominal;
				$total = $nominal+$cicil+$bunga;
						

					?>
				<form action="login.php" method="post" onsubmit="return login(this)">
					<h2>Bukti Transaksi Atas Nama <span class="witel"><?php echo "$user"; ?></span></h2>
				
					<h1>Ini Bukti Transaksi Simpan mu di Hari <br><br><span class="witel"><?php echo $date ?></span></h1>
					<div>
						<label>Username</label><br>
						<p class="input"><?php echo "$user"; ?></p>
						<br>
						<label>Nominal Simpan Dana</label><br>
						<p class="input"><?php echo $nominal ?></p>
						<br>
						<label>Tanggal Simpan</label><br>
						<p class="input"><?php echo $date ?></p>
						<br>
						<label>Cicilan Anda Tersisa</label><br>
						<p class="input"><?php echo $cicil ?>x</p>
						<br>
						<label>Besaran Bunga</label><br>
						<p class="input"><?php echo $bunga ?></p>
						<br>
						<label>Bayaran Per Bulan</label><br>
						<p class="input"><?php echo $total ?></p>
						<br>
					<?php 	} ?>
						

						<button type="button" class="text button btn btn-danger"><a href="proses.php?action=bayarpinjam&id=<?php echo $d['id_pinjam']; ?>" onclick="alert('Berhasil Melakukan Pembayaran')">Bayar</a>
							</button>

					</form>
				</div>
			<?php 	} ?>
			</div>
		</section>

	</main>
</body>
</html>
