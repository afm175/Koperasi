<?php

include('../config.php');
$id_simpan = $_GET['id'];


if (!is_null($id_simpan)) {
	# code...
	$data = mysqli_query($connect, "SELECT * from gadai where id_gadai='$id_simpan'");
	$d = mysqli_fetch_array($data);
}


?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		body {
			background: #1690A7;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			flex-direction: column;
		}

		* {
			font-family: sans-serif;
			box-sizing: border-box;
		}

		form {
			width: 500px;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;
		}

		h2 {
			text-align: center;
			margin-bottom: 40px;
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

		button {
			float: right;
			background: #555;
			padding: 10px 15px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
		}

		button:hover {
			opacity: .7;
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

		h1 {
			text-align: center;
			color: #fff;
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
	<h1>Edit Data Gadai</h1>
	<form method="post" action="../proses.php?action=updategadai">
		<input type="hidden" name="id_gadai" value=" <?php echo $d['id_gadai']; ?> " />

		<label>Username</label>
		<input type="text" disabled value="<?php echo $d['username']; ?>">

		<label>Barang</label>
		<input type="text" name="barang" value="<?php echo $d['barang']; ?>">

		<label>Lama Gadai</label>
		<input type="text" disabled value="<?php echo $d['lama_gadai']; ?>">

		<label>Tanggal Pengajuan</label>
		<input type="text" disabled value="<?php echo $d['tgl_pengajuan']; ?>">

		<input type="submit" class="ca" onclick="alert('Data Berhasil di Ubah')" value="SIMPAN">
	</form>
</body>

</html>