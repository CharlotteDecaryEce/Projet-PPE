<?php

$title="Modification Information";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$demandes=array();
require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM relations WHERE (id_1= ? OR id_2= ?) ');
$req->execute([$_SESSION['auth']->id,$_SESSION['auth']->id]);
$id_envoie=$req->fetchAll();
$i=0;
foreach ($id_envoie as $mec) {
  if($mec->id_1 != $_SESSION['auth']->id)
  {
    $req=$pdo->prepare('SELECT * FROM informations WHERE id= ? ');
    $req->execute([$mec->id_1]);
    $demandes[$i]=$req->fetch();
    $i++;
  }
  else{
    $req=$pdo->prepare('SELECT * FROM informations WHERE id= ? ');
    $req->execute([$mec->id_2]);
    $demandes[$i]=$req->fetch();
    $i++;
  }
}

$recherche=array();
if(!empty($_POST)){
    require_once 'include/db.php';
    if(!empty($_POST['nom']) && empty($_POST['ville']) && empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE nom = ?');
      $req->execute([$_POST['nom']]);
      $recherche=$req->fetchAll();
    }
    else if(empty($_POST['nom']) && !empty($_POST['ville']) && empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE pays = ?');
      $req->execute([$_POST['ville']]);
      $recherche=$req->fetchAll();
    }
    else if(empty($_POST['nom']) && empty($_POST['ville']) && !empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE prenom = ?');
      $req->execute([$_POST['prenom']]);
      $recherche=$req->fetchAll();
    }
    else if(empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE ( prenom = ? AND pays= ? )');
      $req->execute([$_POST['prenom'], $_POST['ville']]);
      $recherche=$req->fetchAll();
    }
    else if(!empty($_POST['nom']) && empty($_POST['ville']) && !empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE ( prenom = ? AND nom= ? )');
      $req->execute([$_POST['prenom'], $_POST['nom']]);
      $recherche=$req->fetchAll();
    }
    else if(!empty($_POST['nom']) && !empty($_POST['ville']) && empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE ( nom = ? AND pays= ? )');
      $req->execute([$_POST['nom'], $_POST['ville']]);
      $recherche=$req->fetchAll();
    }
    else if(!empty($_POST['nom']) && !empty($_POST['ville']) && !empty($_POST['prenom']))
    {
      $req=$pdo->prepare('SELECT * FROM informations WHERE ( prenom = ? AND pays= ? AND nom = ?)');
      $req->execute([$_POST['prenom'], $_POST['ville'], $_POST['nom']]);
      $recherche=$req->fetchAll();
    }


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
                        <li><a href="accueil.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="active">Mon réseau</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">  
                  <?php if($_SESSION['interraction']['success']!=""): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong></strong><?php echo($_SESSION['interraction']['success'])?>
                  </div>
                  <?php $_SESSION['interraction']['success']="";
                  endif;?>
                        <section class="panel">
                            <div class="panel-heading">
                                Retrouver un ami
                                <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down" ></a>
                                            </span>
                            </div>
                                <div class="panel-body">
            
                                    <table class="table">
                            
                                        <form action="" method="post">
                                            <p><a >Prenom</p></a>
                                                <input type="text" name='prenom' class="form-control" placeholder="Prénom" autofocus>
                                            <br><p>Nom</p>
                                                <input type="text" name='nom' class="form-control" placeholder="Nom" autofocus>
                                            <br><p>Pays</p>
                                                <input type="text" name='ville' class="form-control" placeholder="Pays" autofocus>
                                            <div class="bouton">
                                              <br>
                                                 <center> <button class="btn btn-primary" href="">Rechercher</button></center>
                                                <br>
                                                  <br>
                                           </div>
                                          </form>
                                    </table>
                                   
                            </div>
                        </section>
                </div>
                
            
                <div class="col-lg-8">
                        <section class="panel">
                          <div class="panel-heading">
                            Résultat de recherche
                            <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down" ></a>
                                            </span>
                          </div>
                          <div class="panel-body">
                            <?php  foreach ($recherche as $rech) :
                              if($rech->id != $_SESSION['auth']->id):?>
                              <div class="panel-body profile-information">
                                
                                   <div class="col-lg-4">
                                       <div class="profile-pic text-center">
                                           <a href=<?php echo("profil_info.php?id=".$rech->id)?>><img src=<?php echo("images/".$rech->photo)?> alt=""/></a>
                                       </div>
                                   </div>
                                    <div class="col-lg-6">     
                                       <div class="profile-desk">
                                        <div class="com-lg-1">
                                           <a href=<?php echo("profil_info.php?id=".$rech->id)?>><h1><?php echo($rech->nom." ".$rech->prenom)?></h1></a>

                                           <br>
                                           <p>
                                                Pays : <?php echo($rech->pays)?>
                                                <br>
                                           </p>
                                        </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-2">
                                          <span class="tools pull-right">
                                              <a href=<?php echo("ajouter.php?id=".$rech->id."&amp;nom=".$rech->nom."&amp;prenom=".$rech->prenom)?> class="fa fa-plus"> </a>
                                          </span>
                                    </div>
                              
                              </div>
                              <?php endif; endforeach; ?>
                          </div>
                        </section>
                </div>

                <div class="col-lg-8">
                        <section class="panel">
                          <div class="panel-heading">
                            Mes relations
                            <span class="tools pull-right">
                                                    <a href="javascript:;" class="fa fa-chevron-down" ></a>
                                            </span>
                          </div>
                          <div class="panel-body">
                            <?php  if($demandes!=""){
                             foreach ($demandes as $rech) :?>
                              <div class="panel-body profile-information">
                                
                                   <div class="col-lg-4">
                                       <div class="profile-pic text-center">
                                           <a href=<?php echo("profil_info.php?id=".$rech->id)?>><img src=<?php echo("images/".$rech->photo)?> alt=""/></a>
                                       </div>
                                   </div>
                                    <div class="col-lg-6">     
                                       <div class="profile-desk">
                                        <div class="com-lg-1">
                                           <a href=<?php echo("profil_info.php?id=".$rech->id)?>><h1><?php echo($rech->nom." ".$rech->prenom)?></h1></a>

                                           <br>
                                           <p>
                                                Pays : <?php echo($rech->pays)?>
                                                <br>
                                           </p>
                                        </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-2">
                                          <span class="tools pull-right">
                                                    <a href=<?php echo("delete_rel.php?id=".$rech->id."&amp;nom=".$rech->nom."&amp;prenom=".$rech->prenom)?> class="fa fa-times" ></a>
                                            </span>
                                    </div>
                              
                              </div>
                              <?php endforeach; }
                              else{
                                echo("<p> Pas de demandes </p>");
                              }
                                ?>
                          </div>

                        </section>
                </div>
                </
            

        </section>
    </section>

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>

</body>
</html>