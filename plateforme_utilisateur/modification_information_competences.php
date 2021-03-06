<?php
$title="Modification Information Compétences";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 


$all_comp= array('Optimisme','Confiance','Sociabilite','Empathie','Communication','Efficacite','Gestion_du_stress','Creativite','Audace','Motivation','Visualisation','Présence','Adaptabilite','Curiosite','Disponibilite');

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
$comp_acquises=$moi->competences_acquises;
$array_comp_acquises=explode(',',$comp_acquises);


if(!empty($_POST)){
    require_once 'include/db.php';
    $user_id = $_SESSION['auth']->id;
    $modif_com="";
    $b=0;
    foreach ($all_comp as $modif) {
        if (isset($_POST[$modif])){
            if($b==0){
                 $modif_com=$modif;
            }
            else $modif_com=$modif_com.",".$modif;
            $b++;
        }    
    }

    $pdo->prepare('UPDATE informations SET competences = ? WHERE id = ?')->execute([$modif_com, $user_id]);
    $_SESSION['auth']->competences=$modif_com;
}

$array_id_defis_rea=$moi->defis_realises;
$id_defis_rea=explode(',',$array_id_defis_rea);

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
                        <li><a href="modification_information_competences.php" class="active"> Compétence </a></li>
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
                                </div>
                        </section>
                </div>
                
                <div class="col-lg-8">
                    <section class="panel">
                        <header class="panel-heading">
                            Softskills acquises / en cours d'acquisition
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <table class="table  table-hover general-table">
                                <tbody>
                                    <?php 
                                     if(!empty($array_comp_acquises)){
                                     foreach($array_comp_acquises as $c): 
                                        //compter progression softskills
                                        $progression=0;
                                        foreach ($id_defis_rea as $def) {
                                            $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
                                              $req->execute([$def]);
                                              $defis=$req->fetch();
                                              if($defis->competences_acquises==$c){
                                                $progression=$progression+1;
                                              }

                                        } $progression=$progression*50;
                                        ?>
                                       <tr>
                                       <td><a ><?php echo $c; ?></a> 
                                        <div class="progress">
                                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow=<?php echo($progression); ?> aria-valuemin="0" aria-valuemax="100" style=<?php echo('"width: '.$progression.'%"'); ?> >
                                        </div>
                                        </div></td>
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

                    <section class="panel">
                        <header class="panel-heading">
                            Softskills que je souhaite travailler
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                        <table class="table  table-hover general-table">
                        <tbody>
                        <?php $competences=$_SESSION['auth']->competences;
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

                    <section class="panel">
                        <header class="panel-heading">
                            Choisir mes Softskills à améliorer
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <?php 
                                $non_comp= array_diff($all_comp, $comp);
                                ?>
                            <table class="table  table-hover general-table">
                                    <tbody>
                                        <form action="" method="post">
                                            <div class="radios">
                                                <?php
                                                    if(!empty($competences)): 
                                                     foreach($comp as $co): ?>
                                                        <input type="checkbox" name=<?php echo $co; ?> value=<?php echo $co; ?> checked/><?php echo $co; ?><br> 
                                                    <?php 
                                                    endforeach; 
                                                    endif;
                                                    if($non_comp!=""):
                                                     foreach($non_comp as $n): ?>
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
