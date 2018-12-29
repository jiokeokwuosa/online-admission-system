<?php
session_start();
require_once'functions.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title>Online Admission System </title>
    
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" />  
    <link href="css/font-awesome.css" rel="stylesheet"/>
    
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <header id="header1">
        <div class="container">
          <div class="row">
            <div class="col-md-6"><br />
                <a href="index.php"><img src="image/banner3.png" width="80%" class="img-responsive"/></a>
            </div>
            <div class="col-md-6 right clearlink">
            <br />
      <?php 
      if(!isset($_SESSION['login'])){
         
      ?>      <a href="index.php">Home</a>  <?php  }else{?>    
          
           <a href="transact.php?action=logout">LogOut</a>
             <?php }?>
            </div>
          
          </div>
        </div>
    </header><br />
    <header id="header2">
    
    
    
    </header>



