<?php

$title="Modification Information Modifs";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 


if(!empty($_POST)){
    $errors = array();
    require_once 'include/db.php';
    $user_id = $_SESSION['auth']->id;
    if(!empty($_POST['username'])){
        $pdo->prepare('UPDATE formation SET username = ? WHERE username = ?')->execute([$_POST['username'], $_SESSION['auth']->username]);
        $pdo->prepare('UPDATE informations SET username = ? WHERE id = ?')->execute([$_POST['username'], $user_id]);
        $_SESSION['flash']['success'] = "Votre pseudo a bien été mis à jour";
        $error['username']="Votre pseudo à bien été mis à jour!";
        $_SESSION['auth']->username=$_POST['username'];
    }
    if(!empty($_POST['nom'])){
        $pdo->prepare('UPDATE informations SET nom = ? WHERE id = ?')->execute([$_POST['nom'], $user_id]);
        $_SESSION['flash']['success'] = "Votre nom a bien été mis à jour";
        $error['nom']="Votre nom à bien été mis à jour!";
        $_SESSION['auth']->nom=$_POST['nom'];
    }
    if(!empty($_POST['prenom'])){
        $pdo->prepare('UPDATE informations SET prenom = ? WHERE id = ?')->execute([$_POST['prenom'], $user_id]);
        $_SESSION['flash']['success'] = "Votre prénom a bien été mis à jour";
        $error['prenom']="Votre prénom à bien été mis à jour!";
        $_SESSION['auth']->prenom=$_POST['prenom'];
    }
    if(!empty($_POST['photo'])){
        $pdo->prepare('UPDATE informations SET photo = ? WHERE id = ?')->execute([$_POST['photo'], $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
        $error['photo']="Votre nom à bien été mis à jour!";
        $_SESSION['auth']->username=$_POST['photo'];
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
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li><a href="modification_information.php"> Profil</a></li>
                        <li><a href="modification_information_modifs.php" class="active"> Informations personelles </a></li>
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
                                Mes informations
                                <span class="tools pull-right">
                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                 </span>
                            </header>
                          <div class="panel-body profile-information">


                              <div class="col-lg-4">
                                  <div class="profile-pic text-center">
                                    <img src=<?php echo("images/".$_SESSION['auth']->photo)?> alt=""/>
                                  </div>
                              </div>

                              <div class="col-lg-1"></div>

                              <div class="col-lg-4">
                                
                                  <h1><?php echo($_SESSION['auth']->nom." ".$_SESSION['auth']->prenom); ?></h1>
                                  <p>
                                    <?php
                                    if(($_SESSION['auth']->competences)==""){
                                      $comp="Pas de compétences.";
                                    }else {$comp=$_SESSION['auth']->competences;}

                                    ?>
                                    Sofskills: <?php echo($comp); ?>  
                                  </p>
                              </div>

                              <div class="col-lg-10">
                                <table class="table">
                                <br><br><br><br>
                            
                                    <tr>
                                        <td><a>NOM</a></td>
                                        <td>
                                            <?php echo($_SESSION['auth']->nom); ?>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td><a >PRENOM</a></td>
                                        <td>
                                            <?php echo($_SESSION['auth']->prenom); ?>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td><a >PSEUDO</a></td>
                                        <td>
                                            <?php echo($_SESSION['auth']->username); ?>
                                        </td>
                                    </tr>
                                </table>
                              </div>

                          </div>
                        </section>
                        <section class="panel">
                            <header class="panel-heading">
                                Modifier mes informations
                                <span class="tools pull-right">
                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                 </span>
                            </header>
                          <div class="panel-body profile-information">
                              <div class="col-lg-10">
                                <form action="" method="post" >
                                  <br><br>
                                  <p>Nom</p>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nom" placeholder=<?php echo($_SESSION['auth']->nom); ?> />
                                    </div>
                                    <p>Prénom</p>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="prenom" placeholder=<?php echo($_SESSION['auth']->prenom); ?> />
                                      </div>
                                      <p>Pseudo</p>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="username" placeholder=<?php echo($_SESSION['auth']->username); ?> />
                                      </div>
                                    <br>
                                    <p>Photo</p>
                                    <div class="form-group">
                                     <center><input type="file" class="default" name="photo" />
                                        </center>  
                                    </div>
                                  <button class="btn btn-primary">Enregistrer</button>
                                </form>
                              </div>

                          </div>
                      </section>
                </div>
            </div>
        </section>
    </section>

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>

</body>
</html>
