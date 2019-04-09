<?php

$title="Modification Information";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
$nb_like_distrib=$moi->likes_distrib;
$nb_like_recus=$moi->likes_recus;
if($nb_like_recus==''){
  $nb_like_recus='0';
}
if($nb_like_distrib==''){
  $nb_like_distrib='0';
}
$competences=$moi->competences_acquises;
if($competences!=''){
  $array_comp=explode(',', $competences);
$nb_comp=count($array_comp);
}
else $nb_comp='0';
?>
<body>
    <!--main content start-->
    <section id="main-content" >
    <section class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="accueil.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="active">Profil</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                        <section class="panel">
                            <div class="panel-heading">
                                Informations du profil
                            </div>
                                <div class="panel-body">
            
                                    
                                        <a href="modification_information_modifs.php" class="btn btn-compose">
                                            Informations personnelles
                                        </a><br><br>

                                        <a href="modification_information_competences.php" class="btn btn-compose">
                                            Softskills
                                        </a><br><br>

                                        <a href="modification_information_centres_d'interets.php" class="btn btn-compose">
                                            Centre d'intérêts
                                        </a>
                                </div>
                        </section>
                </div>
                
            
                <div class="col-lg-8">
                        <section class="panel">
                    <div class="panel-body profile-information">
                       <div class="col-lg-4">
                           <div class="profile-pic text-center">
                               <img src=<?php echo("images/".$_SESSION['auth']->photo)?> alt=""/>
                           </div>
                       </div>
                       <div class="col-lg-4">
                           <div class="profile-desk">
                               <h1><?php echo($_SESSION['auth']->nom." ".$_SESSION['auth']->prenom); ?></h1>
                            </div>
                       </div>
                       <div class="col-lg-4">
                           <div class="profile-statistics">
                               <h1><?php echo $nb_comp ?></h1>
                               <p>Softskills</p>
                               <h1><?php echo $nb_like_recus ?></h1>
                               <p>Likes reçus</p>
                               <h1><?php echo $nb_like_distrib ?></h1>
                               <p>Likes à distribuer</p>
                           </div>
                       </div>
                    </div>
                </section>
                </div>
            </div>

            </div>
        </section>
    </section>

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>

</body>
</html>
