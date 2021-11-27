<?php 

include '../config.php';
$id_simpan = $_GET['id'];
$data = mysqli_query($connect, "DELETE from simpan WHERE id_simpan = '$id_simpan'");
header('location:../history.php');
 ?>

