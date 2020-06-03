<?php 
session_start();
if(!isset($_SESSION["login"])){
  header("Location: landingPage.php");
  exit;
}
require 'functions.php';

if(isset($_POST["regis"])) {
    if(registrasi($_POST) > 0){
        echo "<script>
                alert('user baru berhasil ditambahkan!')
                document.location.href = 'login.php';
                </script>";
    }else{
        echo mysqli_error($conn);
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

    <title>Registrasi</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Registrasi</h2>
        <div class="login-wrap">
      

            <p> Silahkan Registrasi.!</p>
            <input type="text" name="username" required class="form-control" placeholder="User Name" autofocus>
            <input type="password" class="form-control" required name="password" placeholder="Password">
            <input type="password" class="form-control" required name="password1" placeholder="Re-type Password">
            <button class="btn btn-lg btn-login btn-block" type="submit" name="regis">Submit</button>

            <div class="registration">
                Already Registered.
                <a class="" href="index.php">
                    Kembali
                </a>
            </div>

      </form>

    </div>


    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="js/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>

  </body>
</html>