 <?php
    
    $title="Tableau de bord";
    require 'include/functions.php';
     if(session_status() == PHP_SESSION_NONE){
         session_start();
     }
    include("include/header.inc.php");
    include("include/menu_haut.inc.php");
    include("include/menu_gauche.inc.php");
     
     define('DB_SERVER','localhost');
     define('DB_USER','root');
     define('DB_PASS','root');
     
     
    require_once 'include/db.php';
    $req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
    $req->execute([$_SESSION['auth']->id]);
    $mec=$req->fetch();
    
    $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
    $req->execute([$mec->defis_en_cours]);
    $defis_en_cours=$req->fetch();
    ?>


<bodyonLoad="clock()">

<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-md-12">
<!--breadcrumbs start -->
<ul class="breadcrumb">
<li><a href="tableau_de_bord.php"><i class="fa fa-home"></i>  Tableau de bord</a></li>
</ul>
<!--breadcrumbs end -->
</div>
</div>
        <!--fin entete-->

<!--horloge / partage  -->
<center>
<div class="row">
<!--heure-->
<div class="col-lg-4">
<div class="profile-nav alt">
<section class="panel">
<div class="panel-heading">
<h3> DATE</h3>
<p class="text-left">
<form name="clock" onSubmit="0">
<input type="text"  name="date" size="15" readonly="true" height="50" class="style">
</form>
</p>
</div>
<ul id="clock">

<iframe src="http://free.timeanddate.com/clock/i67zh98s/n195/szw110/szh110/hbw0/hfc399/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd80/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="110" height="110"></iframe>
</center>
</ul>
</section>
</div>
</div>

<!--<section id="main-content">
<section class="wrapper">

<div class="row">-->

<header>

<!--head-->

<div class="header">
<center><p style="color:#FFF";>VOTRE JOURNEE :</p></center>
</div>

</header>
</section>
</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/chart.js"></script>
<script src="../assets/js/toolkit.js"></script>
<script src="../assets/js/application.js"></script>
<script>
// execute/clear BS loaders for docs
$(function(){
  if (window.BS&&window.BS.loader&&window.BS.loader.length) {
  while(BS.loader.length){(BS.loader.pop())()}
  }
  })
</script>





<?php
    

    
    
    include('include/right_side_bar.php');
    include('include/js.inc.php'); ?>


</body>
