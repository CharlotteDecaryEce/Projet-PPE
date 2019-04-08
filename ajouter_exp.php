<?php

$title="Ajouterexperience";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 
require_once 'include/db.php';

$req=$pdo->prepare('SELECT * FROM experience WHERE username = ?');
$experience=$req->fetchAll();

if(!empty($_POST)){
    require_once 'include/db.php';
    $username = $_SESSION['auth']->username;
    $a=0;
   $req = $pdo->prepare("INSERT INTO experience SET username = ?, poste = ?, date_debut = ?, date_fin = ?, entreprise = ?, lieu = ?, description = ?")->execute([$username,$_POST['poste'], $_POST['date_debut'], $_POST['date_fin'], $_POST['entreprise'], $_POST['lieu'], $_POST['description']]);
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
                        <li class="active"><a href="modification_experience.php">Ajouter experience</a></li>

                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Experience 
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
                                <p>Poste : </p>
                                <label class="sr-only">Poste</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-suitcase"></span></div>
                                    <input type="text" name="poste" class="form-control" placeholder="Poste">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Entreprise : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-building-o"></span></div>
                                    <input type="text" name="entreprise" class="form-control" placeholder="Entreprise">
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Lieu : </p>
                                <label class="sr-only"></label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-map-marker"></span></div>
                                    <input type="text" name="lieu" class="form-control" placeholder="Lieu">
                                </div>
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