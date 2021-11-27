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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>History</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		body{
			background-color: grey;
		}
		/*Nav Style*/
		.cont-nav{
			border: 1px solid white;
			margin-right: 10vw;
			margin-left: 10vw;
			background: #78DEC7;
		}
		.textt{
			font-size: 24px;
			font-weight: 600;
			word-spacing: 20px;
			margin: 0px 15px 0px 15px;
		}
		/*Nav Selesai*/
		/*Container History Style*/
		.container-his{
			box-sizing: border-box;
			width: 70%;
			position: relative;
			left: 15%;
			margin-top: 4rem;
			height: auto;
			border: 1px solid black;
		}	
		/*Container Histoory selesai*/
	</style>
</head>
<body>

<!-- NAV -->
	<nav id="web-navbar" style="color: #0F044C;" class="cont-nav navbar navbar-expand-lg navbar-dark  py-2">
        <a class="navbar-brand" href="index.html"><img src="style/img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="textt nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="textt nav-item">
                    <a class="nav-link" href="history.php">History</a>
                </li>
                <li class="textt nav-item">
                    <a class="nav-link" href="#nitip">Info</a>
                </li>
                <li class="textt nav-item">
                     <a href="profile.php?id=<?php echo $d['id_user']; ?>"><p class="nav-link"><?php echo $sessionuser ?></p></a>
                </li>
            </ul>
        </div>
    </nav>
<!-- Button trigger modal -->


<!-- Modal -->

<div class="container-his">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
	    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
	    	Pinjam
	    </button>
	    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
	    	Simpan
		</button>
	</div>
	<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		  	<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Username</th>
			      <th scope="col">Nominal</th>
			      <th scope="col">Date</th>
			      <th scope="col">Keterangan</th>
			      <th scope="col">Handle</th>
			    </tr>
			  </thead>
				  	<?php 
			include 'config.php';
			$no = 1;
			$data = mysqli_query($connect, "SELECT * from pinjam");
			while ($d = mysqli_fetch_array($data)) {
				# code...
					?>
			
			  <tbody>
			    <tr>
			      <th scope="row"><?php echo $no++; ?></th>
			      <td><?php echo $d['nominal']; ?></td>
			      <td><?php echo $d['username']; ?></td>
			      <td><?php echo $d['date']; ?></td>
			      <td><?php echo $d['keterangan']; ?></td>
			      <td>
					<a href="pinjam/edit-pinjam.php?id=<?php echo $d['id_pinjam']; ?>">EDIT</a>
					<a href="proses.php?action=deletepinjam&id=<?php echo $d['id_pinjam']; ?>">EDIT</a>
				  </td>
			    </tr>
			  </tbody>
			
					<?php 
				}

			 ?>
			 </table>
		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		  	<table class="table">
		  		<tr>
			      <th scope="col">#</th>
			      <th scope="col">Username</th>
			      <th scope="col">Nominal</th>
			      <th scope="col">Date</th>
			      <th scope="col">Keterangan</th>
			      <th scope="col">Handle</th>
			    </tr>
		  	<?php 
			include 'config.php';
			$no = 1;
			$data = mysqli_query($connect, "SELECT * from simpan");
			while ($d = mysqli_fetch_array($data)) {
				# code...
					?>

			    <tr>
			      <th scope="row"><?php echo $no++; ?></th>
			      <td><?php echo $d['nominal']; ?></td>
			      <td><?php echo $d['username']; ?></td>
			      <td><?php echo $d['date']; ?></td>
			      <td><?php echo $d['keterangan']; ?></td>
			      <td>
					<a href="simpan/edit-simpan.php?id=<?php echo $d['id_simpan']; ?>">EDIT</a>
					<a href="proses.php?action=deletesimpan&id=<?php echo $d['id_simpan']; ?>">DELETE</a>
				  </td>
			    </tr>
			
					<?php 
				}

			 ?>
			 </table>
		  </div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>