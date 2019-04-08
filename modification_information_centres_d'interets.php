<?php

$title="Modification Information centre d'interets";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$all_int= array('Ingénérie','Animaux','Sport','Musique','Voyage','Cuisine','Jardinage','Médecine','Astro-physique','Mode','Voyage','Dessin','Peinture','Sculpture','Astrologie','Jeux vidéo','Cinéma','Réseaux sociaux','Architechture');

if(!empty($_POST)){
    require_once 'include/db.php';
    $user_id = $_SESSION['auth']->id;
    $modif_int="";
    $a=0;
    foreach ($all_int as $modif) {
        if (isset($_POST[$modif])){
            if($a==0){
                 $modif_int=$modif;
            }
            else $modif_int=$modif_int.",".$modif;
            $a++;
        }    
    }

    $pdo->prepare('UPDATE informations SET interets = ? WHERE id = ?')->execute([$modif_int, $user_id]);
    $_SESSION['auth']->interets=$modif_int;
}

?>

<body>
    <!--main content start-->
    <section id="main-content" >
    <section class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li><a href="modification_information.php"> Profil</a></li>
                        <li><a href="modification_information_centres_d'interets.php" class="active"> Centres d'intérêt </a></li>
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
                        <header class="panel-heading">
                            Centres d'intêret
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th> Nom</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $interets=$_SESSION['auth']->interets;
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
                    <section class="panel">
                        <header class="panel-heading">
                            Modifier mes centres d'intérêt
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <?php 
                                $non_int= array_diff($all_int, $int);
                                ?>
                            <table class="table  table-hover general-table">
                                    <tbody>
                                        <form action="" method="post">
                                            
                                            <div class="radios">
                                                <?php
                                                    if(!empty($interets)): 
                                                     foreach($int as $co): ?>
                                                        <input type="checkbox" name=<?php echo $co; ?> value=<?php echo $co; ?> checked/><?php echo $co; ?><br> 
                                                    <?php 
                                                    endforeach; 
                                                    endif;
                                                    if($non_int!=""):
                                                     foreach($non_int as $n): ?>
                                                        <input type="checkbox" name=<?php echo $n; ?> value=<?php echo $n; ?> /><?php echo $n; ?><br> 
                                                    <?php
                                                    endforeach; 
                                                    endif;?>
                                            </div>
                                            <br> <br>
                                            <button class="btn btn-primary">Enregistrer</button>
                                        </form>
                                    </tbody>
                                </table>
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