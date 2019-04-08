<?php

$title="Mon réseau";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$demandes=array();
require_once 'include/db.php';
$entreprise=$_SESSION['auth']->entreprise;
$equipe=$_SESSION['auth']->equipe;
$req=$pdo->prepare('SELECT * FROM informations WHERE entreprise=? AND equipe=? ');
$req->execute([$entreprise,$equipe]);
$collegues=$req->fetchAll();
$i=0;

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
                        <li class="active">Liste de mes collegues</li>
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
                                    <th>Fonction</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  if($collegues!=""):
                                foreach ($collegues as $col) :?>
                                <tr>
                                    <th><a href=<?php echo("profil_info.php?id=".$col->id)?> ><?php echo($col->prenom)?></a></th>
                                    <td><?php echo($col->nom)?></td>
                                    <td><?php echo($col->username)?></td>
                                    <td><?php echo($col->type)?></td>
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