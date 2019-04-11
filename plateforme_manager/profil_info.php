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

$req=$pdo->prepare('SELECT * FROM informations WHERE (entreprise=? AND equipe=? AND type=?)');
$req->execute([$mec->entreprise,$mec->equipe,"manager"]);
$manager=$req->fetch(); 

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
$like_a_distrib=$moi->likes_distrib;
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
                        <li><a href="liste_connexion.php"> Liste de mes collegues</a></li>
                        <li><a href=<?php echo("profil_info.php?id=".$mec->id);?> class="active"> <?php echo($mec->prenom." ".$mec->nom) ?> </a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Informations personnelles

                  </header>
                  <div class="panel-body profile-information">
                    <div class="col-lg-6">
                            <div class="profile-pic text-center">
                               <img src=<?php echo("images/".$mec->photo)?> alt=""/>
                           </div>  <br>
                           <center>
                              <h1>  <?php echo($mec->prenom. " " .$mec->nom)?></h1> 
                     </center>
                   </div>
                    <div class="col-lg-6">
                    <table class ="table">
                       
                            <tr>
                                <td> <a href="#">NOM</a></td>
                                
                                  <td>  <?php echo($mec->nom)?> </td>
                                
                                
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
                                <td><a href="#">Entreprise</a></td>
                                <td><?php echo($mec->entreprise)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Numéro d'équipe</a></td>
                                <td><?php echo($mec->equipe)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Nom manager</a></td>
                                <td><?php echo($manager->prenom.' '.$manager->nom)?>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Like reçus</a></td>
                                <td><?php echo($mec->likes_recus)?>
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
                            <tbody>
                                    <?php $competences=$mec->competences_acquises;
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
                                       <td><a >Pas de compétences acquises</a></td>
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
                                <?php 
                                $defis=$mec->defis_realises;
                                if(!empty($defis)){
                                    $int=explode(",", $defis);
                                    foreach($int as $def): 
                                        $req=$pdo->prepare('SELECT * FROM defis WHERE id=?');
                                        $req->execute([$def]);
                                        $mon_def=$req->fetch();
                                        ?><tr>
                                          <td><a ><?php echo $mon_def->nom; ?></a></td>
                                          <td><a ><?php echo $mon_def->competences_acquises; ?></a></td>
                                          <?php if($like_a_distrib !='0'){?>
                                            <td><a href=<?php echo("liker_defis.php?id=".$id); ?>><i class="fa fa-thumbs-up"></i></a></td>
                                            <?php }?>
                                          </tr>
                                          <?php
                                    endforeach; 
                                }else{?>
                                    <tr>
                                       <td><a >Pas de défis réalisés</a></td>
                                    </tr><?php
                                }?>
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