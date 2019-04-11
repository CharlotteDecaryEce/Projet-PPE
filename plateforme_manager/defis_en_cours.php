<?php

$title="Mes défis en cours";
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

$date_ech= strtotime($moi->date_ech_defis_en_cours);
$date_actuel= date("Y-m-d");
$date_actuel=strtotime($date_actuel);
$stro=$date_actuel-$date_ech;
$nbJours=round(($date_ech - $date_actuel)/(60*60*24)-1);
$nbJours=$nbJours+1;
if($nbJours<0){
  header('Location: echec_defis.php?id_defis='.$mec->defis_en_cours);
    exit();
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
                        <li class="active">Mon défis en cours</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
            <?php if($defis_en_cours!=''){?>
            	<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <center>
                        <tr><h2><?php echo($defis_en_cours->nom)?> </tr></h2></center>
                        <center>
                        <tr><?php echo ("Il vous reste: "); ?>
                        <a><b>
                        <?php echo ($nbJours. " jours");?></b></a>
                
                    </tr></center>

                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <?php  if ($defis_en_cours->competences_acquises=='Confiance'){ ?>

                                <center> <a class="displayed"><img src="images/awards/confiance.png" alt=""></a> </center>


                                <?php  }elseif ($defis_en_cours->competences_acquises=='Optimisme'){ ?>

                                <center> <a class="displayed"><img src="images/awards/optimisme.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Sociabilite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/sociabilite.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Empathie'){ ?>

                                <center> <a class="displayed"><img src="images/awards/empathie.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Communication'){ ?>

                                <center> <a class="displayed"><img src="images/awards/communication.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Efficacite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/efficacite.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Gestion_du_stress'){ ?>

                                <center> <a class="displayed"><img src="images/awards/stress.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Creativite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/creativite.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Audace'){ ?>

                                <center> <a class="displayed"><img src="images/awards/audace.png" alt=""></a> </center>

                                <?php  } elseif ($defis_en_cours->competences_acquises=='Motivation'){ ?>

                                <center> <a class="displayed"><img src="images/awards/motivation.png" alt=""></a> </center>

                                <?php   }elseif ($defis_en_cours->competences_acquises=='Visualisation'){ ?>

                                <center> <a class="displayed"><img src="images/awards/visualisation.png" alt=""></a> </center>
                                <?php   }elseif ($defis_en_cours->competences_acquises=='Presence'){ ?>

                                <center> <a class="displayed"><img src="images/awards/presence.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Adaptabilite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/adaptabilite.png" alt=""></a> </center>

                                <?php  }elseif ($defis_en_cours->competences_acquises=='Curiosite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/curiosite.png" alt=""></a> </center>

                                <?php   }elseif ($defis_en_cours->competences_acquises=='Disponibilite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/disponibilite.png" alt=""></a> </center>
                                <?php }   ?>

                                </thead>
                                <tbody>
                               
                                <tr>
                                
                                     <td><?php echo($defis_en_cours->resume)?></td>
                                </tr>
                                <tr>
                                    <td><?php echo($defis_en_cours->competences_acquises)?></td>
                               </tr>
                               <tr>
                                <td><?php echo($defis_en_cours->duree)?></td>
                                </tr>
                                
                                <tr>
                               <br>
                               <td>
                               <br>
                               <br>
                           <div class="row">

                               <div class="col-lg-6">
                               <a href=<?php echo("valider_defis.php?id_defis=".$defis_en_cours->id);?> type="button" class="btn btn-compose">J'ai réussi !</a>
                               </div>
                               <div class="col-lg-6">
                               <a href=<?php echo("echec_defis.php?id_defis=".$defis_en_cours->id);?> type="button" class="btn btn-compose">Je veux changer de défi</a></center></td>
                               </div>
                           </div>
                           </td>

                               </tr>



                                </tbody>
                            
                            </table>
                        </div>
                    </section>
                </div>
                <?php
           }
               else{?>
               <div class="col-lg-12">
                   <section class="panel">
                       <header class="panel-heading">
                       <div class="row">
                       <div class="col-lg-9">
                      
                           <h3 > Vous n'avez pas de defis en cours </h3>
                      
                       </div>
                       <div class="col-lg-3">
                      
                           <a href="defis_en_attente.php" type="button" class="btn btn-compose">Trouver un défi!</a>
                      

                       </div>
                       </div>
                      
                       </header>
                   </section>
                  
               </div>
               <?php } ?>


            </div>
        <!-- page end-->
        </section>
    </section>
    
<?php
include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>
</html>
