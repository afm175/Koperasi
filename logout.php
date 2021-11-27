<?php
session_start();
session_destroy();
?>
<script>
	alert("Anda Berhasil Logout")
</script>
<?php
unset($_SESSION['username']);
$_SESSION['message']="You are now logged out";
header("location:index.php");
?>