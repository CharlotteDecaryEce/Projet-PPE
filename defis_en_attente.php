<?php

$title="Mes défis en attente";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

require_once 'include/db.php';

      
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $defis=$req->fetch()->defis_en_attente; 
if($defis!=''){
    $defis_en_attente=explode(",", $defis);
}
else $defis_en_attente='';

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
                        <li class="active">Liste de mes défis en attente</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            
            <div class="row">
            <?php if($defis_en_attente!=''){
                 foreach ($defis_en_attente as $def) :
                 $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
                 $req->execute([$def]);
                 $defis=$req->fetch(); ?>

                <div class="col-lg-4">
                    <section class="panel">
                        <header class="panel-heading-defis">
                        <tr><?php echo($defis->nom)?> </tr>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <center> <a class="displayed"><img src="images/award.png" alt=""></a> </center><br>
                                </thead>
                               
                                <tbody>
                                <tr>
                                    <td> <?php echo($defis->resume)?> </td>
                                </tr> 
                                <tr>
                                    <td> Compétence: <?php echo ($defis->competences_acquises)?> </td>
                                </tr>
                                <tr>
                                    <td> Durée: <?php echo ($defis->duree)?> </td>
                                </tr>
                                <tr>
                                <?php if($moi->defis_en_cours==''){ echo("<a href=\"choisir_defis.php?id_def=".$defis->id." \"  type=\"button\" class=\"btn btn-success\">GO!</a>"); } ?>
                            </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <?php endforeach;
            }
                else{?>
                <div class="col-lg-4">
                    <section class="panel">
                        <header class="panel-heading-defis">
                        <tr>
                            <td><a >Pas de compétences acquises</a></td>
                        </tr>
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