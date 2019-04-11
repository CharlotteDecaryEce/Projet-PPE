<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$title="Ajouter un membre à l'équipe";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();

if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){
    $errors = array();
    require_once 'include/db.php';
        $pdo->prepare('INSERT INTO informations (username,nom,prenom,email,equipe,entreprise,type,likes_distrib,likes_recus,defis_realises,defis_en_cours,defis_en_attente,defis_non_realises,competences,competences_acquises,password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)')->execute([$_POST['username'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$moi->equipe,$moi->entreprise,'employe','30','0','','','','','','',$moi->entreprise]);

    ///////////////////////////////////////// ENVOIE DU MAIL ////////////////////////////////////////////////////////

    
    require_once('phpmailer/src/PHPMailer.php');
    require_once('phpmailer/src/OAuth.php');
    require_once('phpmailer/src/Exception.php');
    require_once('phpmailer/src/POP3.php');
    require_once('phpmailer/src/SMTP.php');
    $mail = new PHPMailer();
    /* Open the try/catch block. */
    try {
            $mail->isSMTP();
            $mail->Host     = "smtp.gmail.com";
            // $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->Username = "emmanuelle.thiroloix@gmail.com";
            $mail->Password = "Almarem01";
            $mail->Port     = 587;

       $mail->setFrom($moi->email, $moi->prenom." ".$moi->nom);

       /* Add a recipient. */
       $mail->addAddress($_POST['email'], $_POST['prenom']." ".$_POST['nom']);

       /* Set the subject. */
       $mail->Subject = 'Vous etes invite à tester INUIT!';

       /* Set the mail message body. */
       $mail->Body = "Bonjour ".$_POST['prenom']." ".$_POST['nom'].", \n\n Vous etes invite a tester notre nouvelle plateforme partenaire: INUIT. Cette derniere vous permettra de developper vos softskills de façon ludique! Bien evidemment votre vie privee, vos donnees, ainsi que vos performances seront gardees secretes!\nUn membre INUIT viendra vous expliquer son fonctionnement lors de la rencontre avec votre equipe. En attendant, decouvrez la plateforme grace a vos identifiants:\nPSEUDO: ".$_POST['username']."\nMOT DE PASSE: ".$moi->entreprise."\nBien evidemment vous pourrez modifier chacune de vos informations, ainsi que votre mot de passe, directement sur la plateforme!\n\nBonne journee.";

       /* Finally send the mail. */
       $mail->send();
    }
    catch (Exception $e)
    {
       /* PHPMailer exception. */
       $_SESSION['flash']['errors'] =$e->errorMessage();
    }
    catch (\Exception $e)
    {
       /* PHP exception (note the backslash to select the global namespace Exception class). */
       $_SESSION['flash']['errors'] = $e->getMessage();
    }

    $_SESSION['flash']['success'] = "Votre membre à bien été ajouté";
    $_SESSION['flash']['errors'] = '';
}
else{
     $_SESSION['flash']['success'] = '';
    $_SESSION['flash']['errors'] = "Veuillez saisir tous les champs!";
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
                        <li><a href="ajouter_membre.php" class="active"> Ajouter membre </a></li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <?php if(!empty($_SESSION['flash']['success'])){?>
                        <div class="alert alert-success">
                          <?php echo($_SESSION['flash']['success']); ?>
                        </div>
                    <?php }?>
                    <?php if(!empty($_SESSION['flash']['errors'])){?>
                        <div class="alert alert-danger">
                          <?php echo($_SESSION['flash']['errors']); ?>
                        </div>
                    <?php }?>
                        <section class="panel">
                            <header class="panel-heading">
                                Saisissez ses informations
                                <span class="tools pull-right">
                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                 </span>
                            </header>
                          <div class="panel-body profile-information">
                              <div class="col-lg-10">
                                <form action="" method="post" >
                                  <br><br>
                                  <p>Les informations saisies pourront être modifiées à tout moment par le membre ajouté via sa session. Le mot de passe initial sera le nom de l'entreprise, qu'il pourra également modifier. A la suite de ce formulaire un mail sera envoyé au membre en question.</p>
                                  <br><br>
                                  <p>Nom</p>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nom" placeholder="Nom" />
                                    </div>
                                    <p>Prénom</p>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="prenom" placeholder="Prénom" />
                                      </div>
                                      <p>Pseudo</p>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="username" placeholder="Pseudo" />
                                      </div>
                                      <p>E-mail</p>
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="email" placeholder="E-mail" />
                                      </div>
                                    <br>
                                  <button class="btn btn-primary">Ajouter à l'équipe</button>
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
