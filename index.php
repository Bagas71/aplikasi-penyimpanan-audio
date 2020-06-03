<?php 
require 'functions.php';
global $conn;
 session_start();

 if(!isset($_SESSION["login"]) ){
    header("Location: landingPage.php");
    exit;
  }


$hasil = mysqli_query($conn, "SELECT * FROM data_inputan");



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Hasil Input Fashion & Beuty-LoeStore</title>

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
               <li><a href="logout.php"><i class="fa fa-key"></i> Log Out </a></li>
            </ul>
        </li>
     
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

        <!-- bagian dari data tables -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    <ul class="sub">
                        <li><a href="input.php">Input Data</a></li>
                    </ul>
                </li>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
           <section class="panel panel-primary">
                    <header class="panel-heading">
                        Hasil Inputan
                       
                    </header>
                    <div class="panel-body">
                        <section id="no-more-tables">
                            <table action="" method="post" class="table text-center table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Perekam </th>
                                <th class="text-center"> Nama Rekaman </th>
                                <th class="text-center"> Jenis Rekaman </th> 
                                <th class="text-center"> Audio </th>
                                <th class="text-center"> Keterangan </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($hasil as $hsl) :?>
                             <tr>
                                <td data-title="No.">
                                    <?= $i;  ?> 
                                </td>
                                <td data-title="Nama Perekam">
                                    <?= $hsl["nama_perekam"] ; ?>
                                </td>
                                <td data-title="Nama Rekaman">
                                    <?= $hsl["nama_rekaman"] ; ?>
                                </td>
                                <td data-title="Jenis Rekaman">
                                    <?= $hsl["jenis_rekaman"]; ?>
                                </td>
                                <td class="text-center" data-title="Audio">
                                   <audio controls style="width: 150px;"> 
                                        <source src="suara/<?= $hsl["suara"]; ?>" type="audio/mpeg">
                                   </audio>       
                                </td>
                                <td data-title="Keterangan"><?= $hsl["keterangan"]; ?></td>
                                <td data-title="Tanggal">
                                    <?= $hsl["tanggal"]; ?>
                                </td>
                                <td data-title="Aksi">
                                    <a href="ubah_data.php?id=<?=$hsl["id"];?>" class="btn btn-info">Ubah</a>  |
                                   <button class="btn btn-outline-secondary" type="button">
                                    <a href="hapus_data.php?id=<?=$hsl["id"];?>" onclick="return confirm('apakah anda yakin.?')" >Hapus</a>
                                   </button>
                                </td>
                            </tr>
                             <?php $i++; ?>
                            <?php endforeach; ?>
                               
                                </tbody>
                            </table>
                        </section>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>

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
<!-- <script src="js/flot-chart/jquery.flot.js"></script> -->
<!-- <script src="js/flot-chart/jquery.flot.tooltip.min.js"></script> -->
<!-- <script src="js/flot-chart/jquery.flot.resize.js"></script> -->
<!-- <script src="js/flot-chart/jquery.flot.pie.resize.js"></script> -->


<!--common script init for all pages-->
<script src="js/scripts.js"></script>

</body>
</html>
