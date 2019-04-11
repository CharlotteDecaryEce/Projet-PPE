<?php
require 'include/functions.php';
$title="Modifier password";
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 
	
$error="";
if(!empty($_POST)){

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
        $error="Les mots de passes ne correspondent pas";
    }else{
        $user_id = $_SESSION['auth']->id;
        require_once 'include/db.php';
        $pdo->prepare('UPDATE informations SET password = ? WHERE id = ?')->execute([$_POST['password'], $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
        $error="Votre mot de passe a bien été mis à jour";
    }

}
else $error="Veuillez saisir un mot de passe";
?>

<body>

<section id="main-content">
	<section class="wrapper">
        <!--entete-->
		<div class="row">
                <div class="col-md-6">
                    <form action="" method="post">
                    	<p> <?php if($error!=""){
		                  echo ($error);
		                }?></p>
				        <div class="form-group">
				            <input class="form-control" type="password" name="password" placeholder="Entrer le mot de passe"/>
				        </div>
				        <div class="form-group">
				            <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe"/>
				        </div>
				        <button class="btn btn-primary">Changer mon mot de passe</button>
				    </form>
                </div>
        </div>
        <!--fin entete-->

	</section>
</section>
                    

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>


