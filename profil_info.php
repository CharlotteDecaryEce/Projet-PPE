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
                            <tr>

                                <td><a href="#">RESUME</a></td>
                                <td><?php echo($mec->resume)?></td>
                                
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
                                <td><a href="#">DATE DE NAISSANCE</a></td>
                                <td><?php echo($mec->date_naissance)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><a href="#">ADRESSE</a></td>
                                <td><?php echo($mec->adresse)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><a href="#">CODE POSTAL</a></td>
                                <td><?php echo($mec->cp)?>
                                </td>
                                
                            </tr><tr>
                                <td><a href="#">PAYS</a></td>
                                <td><?php echo($mec->pays)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td><a href="#">TELEPHONE</a></td>
                                <td><?php echo($mec->telephone)?>
                                </td>
                                
                            </tr>
                            <tr>
                            
                        </table>
                    </div>
                </div>

                 </section>
                

              </div>
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Compétences
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
                        Centres d'intérêts
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
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