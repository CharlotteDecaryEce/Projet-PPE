<?php

$title="Mes défis réalisés";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

require_once 'include/db.php';

      
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $defis=$req->fetch()->defis_realises; 
$defis_realises=explode(",", $defis);
 
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
                        <li class="active">Liste de mes défis réalisés</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Liste de mes défis réalisés
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Intitulé</th>
                                    <th>Résumé</th>
                                    <th>Compétence apportée</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($defis_realises!=''){
                                    foreach ($defis_realises as $def) :
                                        $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
                                          $req->execute([$def]);
                                          $defis=$req->fetch(); ?>
                                <tr>
                                    <td><?php echo($defis->nom)?></td>
                                
                                <td><?php echo($defis->resume)?></td>
                                
                                <td><?php echo($defis->competences_acquises)?></td>
                               
                                <td><?php echo($defis->duree)?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php }else{ echo("<td>Pas de défis réalisés</td>");}?>
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