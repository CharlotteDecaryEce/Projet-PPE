<?php

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

    /////////////////////////////////////////// ENVOIE DU MAIL: ///////////////////////////////////////////////
 
 
    ini_set("SMTP","ssl:smtp.gmail.com");
    ini_set("smtp_port",465);// sachant que le port ressemblera sûrement à quelquechose comme 8025

    $mail = $_POST['email']; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Bonjour ".$_POST['prenom']." ".$_POST['nom'].",".$passage_ligne.$passage_ligne."Vous êtes invité à tester notre nouvelle plateforme partenaire: INUIT. Cette dernière vous permettra de développer vos softskills de façon ludique! Bien évidemment votre vie privée, vos données, ainsi que vos performances seront gardées secrètes!".$passage_ligne."Un membre INUIT viendra vous expliquer son fonctionnement lors de la rencontre avec votre équipe. En attendant, découvrez la plateforme grâce à vos identifiants:".$passage_ligne."PSEUDO: ".$_POST['username'].$passage_ligne."MOT DE PASSE: ".$moi->entreprise.$passage_ligne."Bien évidemment vous pourrez modifier chacune de vos informations, ainsi que votre mot de passe, directement sur la plateforme!".$passage_ligne.$passage_ligne."Bonne journée.";
    $message_html = "<html><head></head><body><b>Bonjour ".$_POST['prenom']." ".$_POST['nom'].",</b>".$passage_ligne.$passage_ligne."Vous êtes invité à tester notre nouvelle plateforme partenaire: INUIT. Cette dernière vous permettra de développer vos softskills de façon ludique! Bien évidemment votre vie privée, vos données, ainsi que vos performances seront gardées secrètes!".$passage_ligne."Un membre INUIT viendra vous expliquer son fonctionnement lors de la rencontre avec votre équipe. En attendant, découvrez la plateforme grâce à vos identifiants:".$passage_ligne."PSEUDO: ".$_POST['username'].$passage_ligne."MOT DE PASSE: ".$moi->entreprise.$passage_ligne."Bien évidemment vous pourrez modifier chacune de vos informations, ainsi que votre mot de passe, directement sur la plateforme!".$passage_ligne.$passage_ligne."Bonne journée.</body></html>";
    //==========
     
    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========
     
    //=====Définition du sujet.
    $sujet = "Vous êtes invité à tester INUIT!";
    //=========
     
    //=====Création du header de l'e-mail.
    $header = "From: \"".$moi->nom."\"<".$moi->email.">".$passage_ligne;
    $header.= "Reply-to: \"".$moi->nom."\"<".$moi->email.">".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========
     
    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========
     
    //=====Envoi de l'e-mail.
    mail($mail,$sujet,$message,$header);
    //==========
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   /* //require 'PHPmailer/PHPMailerAutoload.php';
    require_once '/phpmailer/phpmailer.php';
    require_once '../swiftmailer-master/lib/swift_required.php';

    // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
          ->setUsername('emmanuelle.thiroloix@gmail.com')
          ->setPassword('Almarem01')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Vous êtes invité à tester INUIT!'))
          ->setFrom([$moi->email => $moi->nom.$moi->prenom])
          ->setTo([$_POST['email'] => $_POST['nom'].$_POST['prenom']])
          ->setBody("Bonjour ".$_POST['prenom']." ".$_POST['nom'].",".$passage_ligne.$passage_ligne."Vous êtes invité à tester notre nouvelle plateforme partenaire: INUIT. Cette dernière vous permettra de développer vos softskills de façon ludique! Bien évidemment votre vie privée, vos données, ainsi que vos performances seront gardées secrètes!".$passage_ligne."Un membre INUIT viendra vous expliquer son fonctionnement lors de la rencontre avec votre équipe. En attendant, découvrez la plateforme grâce à vos identifiants:".$passage_ligne."PSEUDO: ".$_POST['username'].$passage_ligne."MOT DE PASSE: ".$moi->entreprise.$passage_ligne."Bien évidemment vous pourrez modifier chacune de vos informations, ainsi que votre mot de passe, directement sur la plateforme!".$passage_ligne.$passage_ligne."Bonne journée.")
          ;

        // Send the message
        $result = $mailer->send($message);*/

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
                        <li><a href="ajouter_membre.php" class="active"> Informations personelles </a></li>
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
