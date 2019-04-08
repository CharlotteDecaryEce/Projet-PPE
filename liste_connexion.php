<?php

$title="Mes connexions";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$demandes=array();
require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM relations WHERE (id_1= ? OR id_2= ?) ');
$req->execute([$_SESSION['auth']->id,$_SESSION['auth']->id]);
$id_envoie=$req->fetchAll();
$i=0;
foreach ($id_envoie as $mec) {
  if($mec->id_1 != $_SESSION['auth']->id)
  {
    $req=$pdo->prepare('SELECT * FROM informations WHERE id= ? ');
    $req->execute([$mec->id_1]);
    $demandes[$i]=$req->fetch();
    $i++;
  }
  else{
    $req=$pdo->prepare('SELECT * FROM informations WHERE id= ? ');
    $req->execute([$mec->id_2]);
    $demandes[$i]=$req->fetch();
    $i++;
  }
}

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
                        <li class="active">Liste de mes connexions</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Striped Table
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Pseudo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  if($demandes!=""):
                                foreach ($demandes as $rech) :?>
                                <tr>
                                    <th><a href=<?php echo("profil_info.php?id=".$rech->id)?> ><?php echo($rech->prenom)?></a></th>
                                    <td><?php echo($rech->nom)?></td>
                                    <td><?php echo($rech->username)?></td>
                                </tr>
                                <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        <!-- page end-->
        </section>
    </section>
    
<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>
</html>