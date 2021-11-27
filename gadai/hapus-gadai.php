<?php 

include '../config.php';
$id_simpan = $_GET['id'];
$data = mysqli_query($connect, "DELETE from gadai WHERE id_gadai = '$id_simpan'");
header('location:../history.php');
 ?>

