<?php

$title="Mes défis en attente";
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
                        <li class="active">Mon défi en cours</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Mon défis en cours
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <div class="row">
                                
                                <tr>
                                <div class="col-lg-3">
                                    <th>Intitulé</th>
                                    </div>
                                    <div class="col-lg-2">
                                    <th>Résumé</th>
                                    </div>
                                    <div class="col-lg-3">
                                    <th>Compétence apportée</th>
                                    </div>
                                    <div class="col-lg-4">
                                    <th>Durée (en jours)</th>
                                    </div>
                                    <div class="col-lg-4">
                                    <th>Voulez passer à un autre défis?</th>
                                    </div>
                                   
                                </tr>
                                </div>
                                </thead>
                                <tbody>
                                <?php if($defis_en_cours!=''){?>
                                <td><?php echo($defis_en_cours->nom)?></td>
                                
                                <td><?php echo($defis_en_cours->resume)?></td>
                                
                                <td><?php echo($defis_en_cours->competences_acquises)?></td>
                               
                                <td><?php echo($defis_en_cours->duree)?></td>
                                
                               
                                <td>  <a href=<?php echo("echec_defis.php?id_defis=".$defis_en_cours->id);?> type="button" class="btn btn-danger">Abandon</a>
                                </td>
                            <?php }else{ echo("<td>Pas de défis en cours</td>");}?>
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