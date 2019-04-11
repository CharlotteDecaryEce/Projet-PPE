<?php
    
    $title="Tableau de bord";
    require 'include/functions.php';
    include("include/header.inc.php");
    include("include/menu_haut.inc.php");
    include("include/menu_gauche.inc.php");
    
    require_once 'include/db.php';
    $req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
    $req->execute([$_SESSION['auth']->id]);
    $mec=$req->fetch();
    
    $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
    $req->execute([$mec->defis_en_cours]);
    $defis_en_cours=$req->fetch();
    
    
    
    ?>
<body>
<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-md-12">
<!--breadcrumbs start -->
<ul class="breadcrumb">
<li><a href="tableau_de_bord.php"><i class="fa fa-home"></i>Tableau de bord</a></li>
</ul>
<!--breadcrumbs end -->
</div>
</div>



<?php include('include/right_side_bar.php');
    include('include/js.inc.php'); ?>


</body>
</html>
