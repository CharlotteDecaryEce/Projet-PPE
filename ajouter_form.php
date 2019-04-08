<?php

$title="Ajouterformation";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 
require_once 'include/db.php';

$req=$pdo->prepare('SELECT * FROM formation WHERE username = ?');
$formation=$req->fetchAll();
$assos=array('BDE','BDS','Caves','Yacht','BDA','AEIP','FEDE','SDI','NOISE','JOBSERVICE','ENTREPRINE','MUSIQUE');
$diplomes=array('Master-1','Master-2','Licence','Bac','Bac+1','Bac+2','Bac+3','Bac+4','Bac+5');

if(!empty($_POST)){
    require_once 'include/db.php';
    $username = $_SESSION['auth']->username;
    $associations="";
    $a=0;
    foreach ($assos as $modif) {
        if (isset($_POST[$modif])){
            if($a==0){
                 $associations=$modif;
            }
            else $associations=$associations.",".$modif;
            $a++;
        }    
    }
   $req = $pdo->prepare("INSERT INTO formation SET username = ?, ecole = ?, date_debut = ?, date_fin = ?, domaine = ?, diplome = ?, description = ?, associations = ?")->execute([$username,$_POST['ecole'], $_POST['date_debut'], $_POST['date_fin'], $_POST['domaine'], $_POST['diplome'], $_POST['description'], $associations]);
   $_SESSION['formation_add']['success']="Ajout de la formation à: ".$_POST['ecole']." réussie!";
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
                        <li class="active"><a href="modif_form.php">Ajouter formation</a></li>

                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <?php if($_SESSION['formation_add']['success']!=""): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>SUCCESS: </strong><?php echo($_SESSION['formation_add']['success'])?>
                  </div>
                  <?php $_SESSION['formation_add']['success']="";
                  endif;?>
                <section class="panel">

                  <header class="panel-heading">
                    Formation 
                  </header>
                  <div class="panel-body">
                  	<table class="table">
                         <form  action="" method="post">
                            <div class="form-group">
                                <p>Date de début : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                    <input type="date" name="date_debut" class="form-control" placeholder="Date de debut">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Date de fin : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                    <input type="date" name="date_fin" class="form-control" placeholder="Date de fin">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Ecole : </p>
                                <label class="sr-only">Ecole</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-suitcase"></span></div>
                                    <input type="text" name="ecole" class="form-control" placeholder="Ecole">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Domaine : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-flask"></span></div>
                                    <input type="text" name="domaine" class="form-control" placeholder="Domaine">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Associations : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="radios">
                                                <?php 
                                                    if(!empty($assos)): 
                                                     foreach($assos as $co): ?>
                                                        <input type="checkbox" name=<?php echo $co; ?> value=<?php echo $co; ?>/><?php echo $co; ?><br> 
                                                    <?php 
                                                    endforeach; 
                                                    endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Diplome :</p>
                                <label class="sr-only"></label>
                                <select name="diplome" class="form-control" placeholder="Diplome">
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
                                    <textarea class="form-control" name="description" id="exampleTextarea" rows="4" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <br>
                            <br><br>
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
<script>
// execute/clear BS loaders for docs
    $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
            while(BS.loader.length){(BS.loader.pop())()}
        }
    })
</script>

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>
</html>