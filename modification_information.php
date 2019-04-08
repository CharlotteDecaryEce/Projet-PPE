<?php

$title="Modification Information";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$nb_comp=count($_SESSION['auth']->competences);
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
                                            Compétences
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
                                    <?php
                                    if(!empty($_SESSION['auth']->interets)){
                                        $interets=explode(",",$_SESSION['auth']->interets);
                                        $nb_interet=count($interets);
                                    }
                                    else{
                                        $nb_interet="0";
                                        $interets="";
                                    }
                                    if(!empty($_SESSION['auth']->competences)){
                                        $competences=explode(",",$_SESSION['auth']->competences);
                                        $nb_comp=count($competences);
                                    }
                                    else{
                                        $nb_comp="0";
                                        $competences="";
                                    }
                                    ?>
                               <h1><?php echo $nb_comp ?></h1>
                               <p>Compétences</p>
                               <h1><?php echo $nb_interet ?></h1>
                               <p>Centres d'interet</p>
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