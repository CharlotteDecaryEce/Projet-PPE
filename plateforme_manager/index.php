<?php
require_once 'include/functions.php';
reconnect_from_cookie();
$error="";
if(isset($_SESSION['auth'])){
    header('Location: init_defis_en_attente.php');
    exit();
}
if(empty($_POST)){
 if(empty($_POST['username'])){
  $_SESSION['flash']['danger'] = "Vous n'avez pas saisi d'identifiant!";
  $error="Veuillez saisir un identifiant ";
}
else if(empty($_POST['password'])){
  $_SESSION['flash']['danger'] = "Vous n'avez pas saisi de mot de passe!";
  $error="Veuillez saisir un mot de passe";
}
}
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'include/db.php';
    $req = $pdo->prepare('SELECT * FROM informations WHERE (username = ?)');
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    if(!empty($user->password)){
      if($_POST['password']== $user->password){
        echo "oyhijkb";
          $_SESSION['auth'] = $user;
          $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
          if($_POST['remember']){
              $remember_token = str_random(250);
              $pdo->prepare('UPDATE informations SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
              setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'ratonlaveurs'), time() + 60 * 60 * 24 * 7);
          }
          $_SESSION['flash']['danger'] ="";
          header('Location: init_defis_en_attente.php');
          exit();
      }else{
          $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
           $error="Identifiant ou mot de passe incorrects";
      }
  }else{
          $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
          $error="Identifiant ou mot de passe incorrects";
      }

}

?>

<?php 
$title="Connexion";
include("include/header.inc.php"); 

?>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <center><div class="form-signin-heading"><img src="images/logocon.png" alt="" /></div></center>
        <div class="login-wrap">
          
            <div class="user-login-info">
              <?php if($_SESSION['flash']['danger'] !=""): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>WARNING: </strong><?php echo($_SESSION['flash']['danger'] )?>
                  </div>
                  <?php $_SESSION['flash']['danger'] ="";
                  endif;?>
                <p> <?php if($error!=""){
                  echo ($error);
                }?></p>
                <input type="text" class="form-control" name="username" placeholder="Pseudo" autofocus>
                <input type="password" class="form-control" name="password" placeholder="Mot de passe">
            </div>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit"> Brise la Glace ! </button>

         <center>   <div class="registration">
                <a class="" href="inscription.php">
                    Créer mon compte
                </a>
            </div>
        </center>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Mot de passe oublié ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Etrez votre email avant de renouveler votre mot de passe</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Supprimer</button>
                          <button class="btn btn-success" type="button">Valider</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!--Core js-->
    <?php include('include/js.inc.php'); ?>


  </body>
</html>
