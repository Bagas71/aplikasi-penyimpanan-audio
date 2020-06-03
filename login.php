<?php 
require 'functions.php';
session_start();
if(isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

if(isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];


  $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

      // cek username
  if(mysqli_num_rows($result) === 1) {


    //cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"]) ) {

    //set session
        $_SESSION["login"]= true;
      
    header("Location: index.php");
    exit;
    }

     echo "
            <script>
               alert('Username / Password salah!');
            </script>
        ";
    $error = true;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Login</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
  <body class="login-body">

    <div class="container">
      <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading"><img src="img/logo.png"></h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" name="username" required class="form-control" placeholder="User ID" autofocus>
                <input type="password" name="password" required class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-lg btn-login btn-block" type="submit" name="login">Sign in</button>
        </div>
      </form>
    </div>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="js/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

  </body>
</html>
