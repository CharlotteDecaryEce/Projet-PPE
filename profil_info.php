<?php

$title="Profil";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php");

$id=$_GET['id'];
require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$id]);
      $mec=$req->fetch(); 
$req=$pdo->prepare('SELECT nom FROM informations WHERE entreprise=? AND equipe=? and type=?');
$req->execute([$mec->entreprise],[$mec->equipe],["manager"]);
$manager=$req->fetch(); 
?>

  <body>
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Tableau de bord</a></li>
                        <li class="active"></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Informations personelles

                  </header>
                  <div class="panel-body">
                    <div class="col-lg-6">
                        
                        <table class="table">
                            <tr>
                                  <img src=<?php echo("images/".$mec->photo)?> alt="">
                                  <br>
                                  <br>
                            </tr>
                        </table>

                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <tr>
                                <td><a href="#">NOM</a></td>
                                <td>
                                    <?php echo($mec->nom)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><a href="#">PRENOM</a></td>
                                <td>
                                    <?php echo($mec->prenom)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><a href="#">PSEUDO</a></td>
                                <td><?php echo($mec->username)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><a href="#">EMAIL</a></td>
                                <td><?php echo($mec->email)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Entreprise</a></td>
                                <td><?php echo($mec->entreprise)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Numéro d'équipe</a></td>
                                <td><?php echo($mec->équipe)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Nom manager</a></td>
                                <td><?php echo($mec->manager)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Like reçus</a></td>
                                <td><?php echo($mec->likes_reçus)?>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                </div>

                 </section>
                

              </div>
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Compétences Acquises
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> Nom</th>                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php $competences=$mec->competences;
                                    $comp=explode(",", $competences);
                                     if(!empty($competences)){
                                     foreach($comp as $c): ?>
                                       <tr>
                                       <td><a ><?php echo $c; ?></a></td>
                                        </tr>
                                    <?php endforeach; 
                                    }
                                    else{?>
                                    <tr>
                                       <td><a >Pas de compétences</a></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                        </table>
                    </div>
                </section>
            </div>
            

    <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Défis réalisé
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> Nom</th>                                <th>Compétences acquises</th>
                            </tr>
                            </thead>
                           <tbody>
                                    <?php $interets=$mec->interets;
                                    $int=explode(",", $interets);
                                     if(!empty($interets)){
                                     foreach($int as $c): ?>
                                       <tr>
                                       <td><a ><?php echo $c; ?></a></td>
                                        </tr>
                                    <?php endforeach; 
                                    }
                                    else{?>
                                    <tr>
                                       <td><a >Pas de centre d'intérêt</a></td>
                                        </tr>
                                    <?php }?>
                            </tbody> 
                          
                        </table>
                    </div>
                </section>
            </div>

        <!-- page end-->
        </section>
    </section>

</div>
</div>
<!--right sidebar end-->

</section>
   
   <?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>

  </body>
</html>