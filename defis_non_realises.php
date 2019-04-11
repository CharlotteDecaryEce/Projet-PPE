<?php

$title="Mes défis non réalisés";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

require_once 'include/db.php';

      
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $defis=$req->fetch()->defis_non_realises; 
if($defis!=''){
    $defis_realises=explode(",", $defis);
}
else $defis_realises='';

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
            <?php if($defis_realises!=''){
                 foreach ($defis_realises as $def) :
                 $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
                 $req->execute([$def]);
                 $defis=$req->fetch(); ?>

            	<div class="col-lg-4">
                    <section class="panel">
                        <header class="panel-heading">
                        <tr><?php echo($defis->nom)?></tr>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <?php  if ($defis->competences_acquises=='Confiance'){ ?>

                                <center> <a class="displayed"><img src="images/awards/confiance.png" alt=""></a> </center>


                                <?php  }elseif ($defis->competences_acquises=='Optimisme'){ ?>

                                <center> <a class="displayed"><img src="images/awards/optimisme.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Sociabilite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/sociabilite.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Empathie'){ ?>

                                <center> <a class="displayed"><img src="images/awards/empathie.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Communication'){ ?>

                                <center> <a class="displayed"><img src="images/awards/communication.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Efficacite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/efficacite.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Gestion_du_stress'){ ?>

                                <center> <a class="displayed"><img src="images/awards/stress.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Creativite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/creativite.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Audace'){ ?>

                                <center> <a class="displayed"><img src="images/awards/audace.png" alt=""></a> </center>

                                <?php  } elseif ($defis->competences_acquises=='Motivation'){ ?>

                                <center> <a class="displayed"><img src="images/awards/motivation.png" alt=""></a> </center>

                                <?php   }elseif ($defis->competences_acquises=='Visualisation'){ ?>

                                <center> <a class="displayed"><img src="images/awards/visualisation.png" alt=""></a> </center>

                                <?php   }elseif ($defis->competences_acquises=='Presence'){ ?>

                                <center> <a class="displayed"><img src="images/awards/presence.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Adaptabilite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/adaptabilite.png" alt=""></a> </center>

                                <?php  }elseif ($defis->competences_acquises=='Curiosite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/curiosite.png" alt=""></a> </center>

                                <?php   }elseif ($defis->competences_acquises=='Disponibilite'){ ?>

                                <center> <a class="displayed"><img src="images/awards/disponibilite.png" alt=""></a> </center>
                                <?php }   ?>
                                <br>

                                </thead>
                               
                                <tbody>
                               
                                <tr>
                                    <td> Bravo! Vous avez amélioré votre compétence: <?php echo ($defis->competences_acquises)?> </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <?php endforeach;
            }
                else{?>
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                    
                        <div class="row">
                       <div class="col-lg-9">
                      
                           <h3 > Vous n'avez réalisé encore aucun défi </h3>
                      
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
    
<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>
</html>