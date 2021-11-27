<?php 

include 'config.php';


$action = $_GET['action'];



if ($action == "updatesimpan") {
	# code...
	$id_simpan = $_POST['id_simpan'];
	$nominal = $_POST['nominal'];
	$d = mysqli_query($connect, "UPDATE simpan set nominal ='$nominal' WHERE id_simpan = '$id_simpan'");
header('location:history.php');
}
elseif ($action == "updatepinjam") {
	# code...
	$id_pinjam = $_POST['id_pinjam'];
	$nominal = $_POST['nominal'];
	$d = mysqli_query($connect, "UPDATE pinjam set nominal ='$nominal' WHERE id_pinjam = '$id_pinjam'");
header('location:history.php');
}
elseif ($action == "updategadai") {
	# code...
	$id_gadai = $_POST['id_gadai'];
	$barang = $_POST['barang'];
	$d = mysqli_query($connect, "UPDATE gadai set barang ='$barang' WHERE id_gadai = '$id_gadai'");
header('location:history.php');
}
elseif ($action == "deletesimpan") {
	$id_simpan = $_GET['id'];
	$d = mysqli_query($connect, "DELETE from simpan WHERE id_simpan = '$id_simpan'");
header('location:history.php');
}
elseif ($action == "deletegadai") {
	$id_simpan = $_GET['id'];
	$d = mysqli_query($connect, "DELETE from gadai WHERE id_gadai = '$id_simpan'");
header('location:history.php');
}
elseif ($action == "ambilsimpan") {
	$id_simpan = $_GET['id'];
	$d = mysqli_query($connect, "DELETE from simpan WHERE id_simpan = '$id_simpan'");
header('location:history.php');
}

elseif ($action == "deletepinjam") {
	$id_pinjam = $_GET['id'];
	$d = mysqli_query($connect, "DELETE from pinjam WHERE id_pinjam = '$id_pinjam'");
header('location:history.php');
}
elseif ($action == "bayarpinjam") {
	$id_pinjam = $_GET['id'];
	$d = mysqli_query($connect, "DELETE from pinjam WHERE id_pinjam = '$id_pinjam'");
header('location:history.php');
}

 ?>