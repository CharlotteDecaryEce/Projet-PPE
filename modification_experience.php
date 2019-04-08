

<?php

$title="Modification experience";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 


require_once 'include/db.php';
$id=$_GET['id']; 
$req=$pdo->prepare('SELECT * FROM experience WHERE id = ?');
$req->execute([$id]);
$experience=$req->fetchAll();
if(!empty($_POST)){
    require_once 'include/db.php';
    $b=0;
    foreach ($experience as $form) {
        $id= $form->id;
        $poste="poste".$b;
        if (isset($_POST[$poste])&& $_POST[$poste]!=""){
            $pdo->prepare('UPDATE experience SET poste = ? WHERE id = ?')->execute([$_POST[$poste], $id]);
        } 
        $date_debut="date_debut".$b;
        if (isset($_POST[$date_debut])&& $_POST[$date_debut]!=""){
            $pdo->prepare('UPDATE experience SET date_debut = ? WHERE id = ?')->execute([$_POST[$date_debut], $id]);
        } 
        $date_fin="date_fin".$b;
        if (isset($_POST[$date_fin])&& $_POST[$date_fin]!=""){
            $pdo->prepare('UPDATE experience SET date_fin = ? WHERE id = ?')->execute([$_POST[$date_fin], $id]);
        } 
        $entreprise="entreprise".$b;
        if (isset($_POST[$entreprise])&& $_POST[$entreprise]!=""){
            $pdo->prepare('UPDATE experience SET entreprise = ? WHERE id = ?')->execute([$_POST[$entreprise], $id]);
        } 
        $lieu="lieu".$b;
        if (isset($_POST[$lieu])&& $_POST[$lieu]!=""){
            $pdo->prepare('UPDATE experience SET lieu = ? WHERE id = ?')->execute([$_POST[$lieu], $id]);
        } 
        $description="description".$b;
        if (isset($_POST[$description])&& $_POST[$description]!=""){
            $pdo->prepare('UPDATE experience SET description = ? WHERE id = ?')->execute([$_POST[ $description], $id]);
        } 

        $b++;   
        $_SESSION['experience']['success']="Modification de l'expérience réussie!";
    }
    $req=$pdo->prepare('SELECT * FROM experience WHERE username = ?');
$req->execute([$_SESSION['auth']->username]);
$experience=$req->fetchAll();
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
                        <li><a href="experience.php">Experience</a></li>
                        <li class="active"><a href="modification_experience.php">Modifier experience</a></li>

                    </ul>
                    <!--breadcrumbs end -->
                </div>
        </div>


            <div class="row">

              <div class="col-lg-12">
<<<<<<< HEAD
                <?php if($_SESSION['experience']['success']!=""): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>SUCCESS: </strong><?php echo($_SESSION['experience']['success'])?>
                  </div>
                  <?php $_SESSION['experience']['success']="";
                  endif;?>
                <section class="panel">
                  <header class="panel-heading">
                    Experience 
                  </header>
=======
                    <section class="panel">
                              <header class="panel-heading">
                                Experience 
                              </header>
>>>>>>> e586b02c07c69c9a079330eb78ada88ddf998907
                  <div class="panel-body">
                    <table class="table">
                         <form  action="" method="post">
                            <?php  $b=0; foreach ($experience as $form) : ?>

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
                                <p>Poste : </p>
                                <label class="sr-only">Poste</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-suitcase"></span></div>
                                    <input type="text" name=<?php echo ("poste".$b); ?> class="form-control" placeholder=<?php echo($form->poste); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Entreprise : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-building-o"></span></div>
                                    <input type="text" name=<?php echo ("entreprise".$b); ?> class="form-control" placeholder=<?php echo($form->entreprise); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Lieu : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-map-marker"></span></div>
                                    <input type="text" name=<?php echo ("lieu".$b); ?> class="form-control" placeholder=<?php echo($form->lieu); ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Description : </p>
                                <label class="sr-only">Description</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-pencil-square-o"></span></div>
                                    <textarea class="form-control" name=<?php echo ("description".$b); ?> id="exampleTextarea" rows="4" placeholder=<?php echo($form->description); ?>></textarea>
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