<?php

$title="Modification formation";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 


$id=$_GET['id'];    
require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM formation WHERE id = ?');
$req->execute([$id]);
$formation=$req->fetchAll();
$assos=array('BDE','BDS','Caves','Yacht','BDA','AEIP','FEDE','SDI','NOISE','JOBSERVICE','ENTREPRINE','MUSIQUE');
$diplomes=array('Master-1','Master-2','Licence','Bac','Bac+1','Bac+2','Bac+3','Bac+4','Bac+5');


if(!empty($_POST)){
    require_once 'include/db.php';
    $b=0;
    foreach ($formation as $form) {
        $id= $form->id;
        $ecole="ecole".$b;
        if (isset($_POST[$ecole])&& $_POST[$ecole]!=""){
            $pdo->prepare('UPDATE formation SET ecole = ? WHERE id = ?')->execute([$_POST[$ecole], $id]);
        } 
        $date_debut="date_debut".$b;
        if (isset($_POST[$date_debut])&& $_POST[$date_debut]!=""){
            $pdo->prepare('UPDATE formation SET date_debut = ? WHERE id = ?')->execute([$_POST[$date_debut], $id]);
        } 
        $date_fin="date_fin".$b;
        if (isset($_POST[$date_fin])&& $_POST[$date_fin]!=""){
            $pdo->prepare('UPDATE formation SET date_fin = ? WHERE id = ?')->execute([$_POST[$date_fin], $id]);
        } 
        $domaine="domaine".$b;
        if (isset($_POST[$domaine])&& $_POST[$domaine]!=""){
            $pdo->prepare('UPDATE formation SET domaine = ? WHERE id = ?')->execute([$_POST[$domaine], $id]);
        } 
        $a=0;
        $saisie=0;
        foreach ($assos as $modif) {
            $entree=$modif.$b;
            if (isset($_POST[$entree])){
                if($a==0){
                     $ok=$modif;
                }
                else{
                    $ok=$ok.",".$modif;
                } 
                $a++;
                $saisie=1;
            }    
        }
        if($saisie=1){
            $pdo->prepare('UPDATE formation SET associations = ? WHERE id = ?')->execute([$ok, $id]);
        }
        $description="description".$b;
        if (isset($_POST[$description])&& $_POST[$description]!=""){
            $pdo->prepare('UPDATE formation SET description = ? WHERE id = ?')->execute([$_POST[ $description], $id]);
        } 
        $diplome="diplome".$b;
        if (isset($_POST[$diplome])&& $_POST[$diplome]!=""){
            $pdo->prepare('UPDATE formation SET diplome = ? WHERE id = ?')->execute([$_POST[ $diplome], $id]);
        } 
        $b++;   
        $_SESSION['formation']['success']="Modification de la formation réussie!";
    }
require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM formation WHERE id = ?');
$req->execute([$id]);
$formation=$req->fetchAll();


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
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Profil</a></li>
                        <li><a href="formation.php">Formation</a></li>
                        <li class="active"><a href="modif_form.php">Modifier formation</a></li>

                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <?php if($_SESSION['formation']['success']!=""): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>SUCCESS: </strong><?php echo($_SESSION['formation']['success'])?>
                  </div>
                  <?php $_SESSION['formation']['success']="";
                  endif;?>
                <section class="panel">
                  <header class="panel-heading">
                    Formation 
                  </header>
                  <div class="panel-body">
                  	<table class="table">
                         <form  action="" method="post">
                            <?php  $b=0; foreach ($formation as $form) : ?>

                            <div class="form-group">
                                <p>Date de début : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                    <input type="date" name=<?php echo ("date_debut".$b); ?> class="form-control" placeholder=<?php echo($form->date_debut); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Date de fin : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                    <input type="date" name=<?php echo ("date_fin".$b); ?> class="form-control" placeholder=<?php echo($form->date_fin); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Ecole : </p>
                                <label class="sr-only">Ecole</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-suitcase"></span></div>
                                    <input type="text" name=<?php echo ("ecole".$b); ?> class="form-control" placeholder=<?php echo($form->ecole); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Domaine : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-flask"></span></div>
                                    <input type="text" name=<?php echo ("domaine".$b); ?> class="form-control" placeholder=<?php echo($form->domaine); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Associations : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="radios">
                                                <?php $mes_assos=explode(",", $form->associations);
                                                    if(!empty($mes_assos)): 
                                                     foreach($mes_assos as $co): ?>
                                                        <input type="checkbox" name=<?php echo $co.$b; ?> value=<?php echo $co; ?> checked/><?php echo $co; ?><br> 
                                                    <?php 
                                                    endforeach; 
                                                    endif;
                                                     $non_asso= array_diff($assos, $mes_assos);
                                                    if($non_asso!=""):
                                                     foreach($non_asso as $n): ?>
                                                        <input type="checkbox" name=<?php echo $n.$b; ?> value=<?php echo $n; ?> /><?php echo $n; ?><br> 
                                                    <?php
                                                    endforeach; 
                                                    endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Diplome :</p>
                                <label class="sr-only"></label>
                                <select name=<?php echo ("diplome".$b); ?> class="form-control" placeholder=<?php echo($form->diplome); ?>>
                                    <?php foreach($diplomes as $dip) : ?>
                                    <option value=<?php echo($dip)?>><?php echo($dip)?></option>   
                                    <?php endforeach;?>   
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Description : </p>
                                <label class="sr-only">Description</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-pencil-square-o"></span></div>
                                    <textarea class="form-control"name=<?php echo ("description".$b); ?> id="exampleTextarea" rows="4" placeholder=<?php echo($form->description); ?>></textarea>
                                </div>
                            </div>
                            <br>
                            <br><br>
                            <?php endforeach;  ?>
                            <br> <br>
                            <button class="btn btn-primary">Enregistrer</button>
                        </form>
                    </table>
                  </div>
              </section>
          </div>
          
      </div>

      
  </section>
</section>

 <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/chart.js"></script>
<script src="../assets/js/toolkit.js"></script>
<script src="../assets/js/application.js"></script>

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>
</html>