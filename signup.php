<?php
session_start();
//connect to database
include 'config.php';
if (isset($_POST['register_btn'])) {
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $telpon = mysqli_real_escape_string($connect, $_POST['telpon']);
  $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
  $password = mysqli_real_escape_string($connect, $_POST['pass']);
  $password2 = mysqli_real_escape_string($connect, $_POST['pass2']);
  $query = "SELECT * FROM user WHERE username = '$username'";
  $result = mysqli_query($connect, $query);
  if ($result) {

    if (mysqli_num_rows($result) > 0) {

      echo '<script language="javascript">';
      echo 'alert("Username already exists")';
      echo '</script>';
    } else {

      if ($password == $password2) { //Create User
        $pass = password_hash($password, PASSWORD_DEFAULT); //hash password before storing for security purposes
        $sql = "INSERT INTO user(username, email, pass, telpon, alamat) VALUES('$username','$email','$pass','$telpon','$alamat')";
        mysqli_query($connect, $sql);
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;
        header("location:login.php");  //redirect home page
      } else {
?>
        <script>
          alert('Kedua Password Tidak Memiliki Kesamaan');
        </script>
<?php
      }
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrasi User's Koperasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
      background: #78DEC7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    * {
      font-family: sans-serif;
      box-sizing: border-box;
      transition: .5s;
    }

    form {
      width: 500px;
      padding: 30px;
      background: #fff;
      border-radius: 15px;
    }

    h1 {
      text-align: center;
      margin-bottom: 40px;
      padding: 0px 20px 0px 20px;
      opacity: 0.8;
      font-size: 17px;
    }

    input {
      display: block;
      border: 2px solid #ccc;
      outline: none;
      width: 95%;
      padding: 10px;
      margin: 0px 10px 0px 10px;
      border-radius: 5px;
      font-size: 16px;
    }

    label {
      color: #888;
      font-size: 18px;
      padding: 10px;
    }

    .witel {
      color: #78DEC7;
    }

    a {
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

    .text {
      font-size: 17px;
      font-weight: 600;
      opacity: 0.8;
    }

    .button:hover {
      opacity: .7;
      box-shadow: none;
      padding: 12px 17px;
    }

    .text:hover {
      font-size: 16px;

    }

    span:hover {
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

    a {
      text-decoration: none !important;
    }

    h2 {
      text-align: center;
      color: black;
      opacity: 0.8;
      padding: 0px 20px 0px 20px;
      margin-bottom: 1em;
      font-weight: 500;
    }

    .Register {
      margin-top: 20px;
      float: right;
      background: #B5EAEA;
      color: black;
      box-shadow: 3px 3px 5px #78DEC7;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-size: 18px;
      letter-spacing: 1px;
      font-weight: 600;
    }

    .Register:hover {
      padding-bottom: 10px;
      box-shadow: none;
      color: #262A53;
      font-size: 18px;
      font-weight: 400;
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

  <div class="container">



    <main class="main-content">

      <div class="col-md-6 col-md-offset-2">

        <?php
        if (isset($_SESSION['message'])) {
          echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
          unset($_SESSION['message']);
        }
        ?>
        <form method="post" action="signup.php" onsubmit="return signup(this);">
          <h2>Register For Your Account</h2>


          <label>Username : </label>
          <input type="text" name="username" required class="textInput">
          <label>Email : </label>
          <input type="email" name="email" required class="textInput">
          <label>No. Telpon </label>
          <input type="text" name="telpon" required class="textInput">

          <label>Alamat</label>
          <input type="text" name="alamat" required class="textInput">


          <label>Password : </label>
          <input type="password" name="pass" required class="textInput">

          <label>Password again: </label>
          <input type="password" name="pass2" required class="textInput">


          <input type="submit" name="register_btn" required class="Register">

          <a href="login.php" class="ca outline">Already have an account?</a>


        </form>
      </div>

    </main>
  </div>

</body>

</html>