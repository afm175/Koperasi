<?php 
	session_start();
	include 'config.php';
	$id = $_GET['id'];
	   
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$sessionuser = $_SESSION['username'];
	$select = "SELECT * FROM user where id_user = $id";
    $data = mysqli_query($connect, $select);
	if (!$data) {
	    echo "<p> Query [$select] couldn't be executed </p>";
	    echo mysqli_error($connect);
	}
	if (mysqli_num_rows($data)>0) {
		# code...
		$d = mysqli_fetch_array($data);
		$_SESSION['id_user'] = $d['id_user'];
		$id_user = $_SESSION['id_user'];
   
    	# code...

	 ?>
	<?php 
		echo "Halo".$d['username'];
		echo $id_user;
	}	
	 ?>
</body>
</html>