<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: landingPage.php");
  exit;
}
require 'functions.php';

//data di ambil melalui url
$id = $_GET['id'];

// query data inputan berdasarkan id
$ubah_inputan = query("SELECT * FROM data_inputan WHERE id = $id")[0];

//apakah tombol ubah sudah di tekan
if (isset($_POST["ubah"])) {
 
 
    if (ubah($_POST) > 0) {
        // data berhasil ditambahkan
        echo "
            <script>
               alert('data berhasil diubah!')
                document.location.href = 'index.php';
            </script>

        ";
    }else{
        // data gagal di tambahkan
        echo "
            <script>
                alert('data gagal diubah!')
                document.location.href = '#';
            </script>
            ";
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

    <title>Inputan Data Rekaman</title>

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--responsive table-->
    <link href="css/table-responsive.css" rel="stylesheet" />

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

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        <img src="images/logo.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/avatar1_small.jpg">
                <span class="username">Admin</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="registrasi.php"><i class="fa fa-key"></i> Tambah Admin</a></li>  
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->  
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->           
         <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="index.php">
                    <i class="fa fa-sign-out"></i>
                    <span>Kembali</span>
                </a>
            </li>
         </div>        
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
       <div class="col-lg-12">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        Input Data 
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <center><h1>Masukan Data Baru</h1></center>
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                                <!-- data id dan suara lama  -->
                            <input type="hidden" name="id" value="<?= $ubah_inputan["id"]; ?>">
                            <input type="hidden" name="suara_lama" value="<?= $ubah_inputan["suara"]; ?>"> 

                            <div class="form-group">
                                <label for="nama" class="col-lg-2 col-sm-2 control-label" style="text-align: justify;">Nama Perekam</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nama" required class="form-control" id="nama" value="<?= $ubah_inputan["nama_perekam"]; ?>">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="rekaman" class="col-lg-2 col-sm-2 control-label" style="text-align: justify;">Nama Rekaman</label>
                                <div class="col-lg-10">
                                    <input type="text" name="rekaman" required class="form-control" id="rekaman" value="<?= $ubah_inputan["nama_rekaman"]; ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="jenis" class="col-lg-2 col-sm-2 control-label" style="text-align: justify;">Jenis Rekaman</label>
                                 <div class="col-lg-10">
                                    <select id="jenis" class="form-control m-bot15" name="jenis"  required value="<?= $ubah_inputan["jenis_rekaman"]; ?>">
                                    <option> PRO1 </option>
                                    <option> PRO2 </option>
                                    <option> PRO3 </option> 
                                    <option> PRO4 </option>  
                                    </select>
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label for="suara" class="col-lg-2 col-sm-2 control-label" style="text-align: justify;">File Audio</label>
                                <div class="col-lg-10">
                                    <input type="file" name="suara"  class="form-control" id="suara" >
                                     <audio controls style="width: 150px; margin-top: 20px;">
                                        <source src="suara/<?= $ubah_inputan["suara"]; ?>" type="audio/mpeg">
                                   </audio>      
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="col-lg-2 col-sm-2 control-label" style="text-align: justify;">Keterangan</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="keterangan" required class="form-control" id="keterangan"><?= $ubah_inputan["keterangan"]; ?></textarea>
                                </div>
                            </div>
   
            
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="ubah"  class="btn btn-success btn-sm">Simpan</button> 
                                     <button type="reset" name="reset" value="reset form"  class="btn btn-outline-danger">Reset</button> 
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    <!--main content end-->




<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="js/jquery.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<!-- <script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.pie.resize.js"></script> -->


<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
