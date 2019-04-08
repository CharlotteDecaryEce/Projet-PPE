<?php

$title="Offre d'emplois";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 


define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','root');

$database = "piscine";

          $intitule = $_POST['intitule'];
          $type = $_POST['type'];
          $avantages = $_POST['avantages'];
          $salaire = $_POST['salaire'];
          $secteur = $_POST['secteur'];
          $langues= $_POST['langues'];
          $lieu = $_POST['lieu'];
          $diplome = $_POST['diplome'];
          $qualites = $_POST['qualites'];
          $exigences = $_POST['exigences'];


$db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
$sql = 'INSERT INTO emploi(intitule, type, avantages, salaire, secteur, langues, lieu, diplome, qualites, exigences) VALUES ("'.$intitule.'","'.$type.'", "'.$avantages.'","'.$salaire.'","'.$secteur.'", "'.$langues.'", "'.$lieu.'", "'.$diplome.'", "'.$qualites.'", "'.$exigences.'")';
   $req = mysqli_query($db_handle, $sql);
}
mysqli_close($db_handle);

?>
<body>

    <section id="main-content">
        <section class="wrapper"> 

              <div class="row">
                 <div class="col-lg-12">

                        <section class="panel">
                        <center>	<br> 	<br> 	<br> 	<br> 	<br> 	<br>
                          <header class="panel-heading"> <h1>VOTRE OFFRE D'EMPLOI A BIEN ETE POSTEE !</h1> </header> 

                        	<br> 
                        </center>
 <div class="bouton">
                  	       <center>
                      	     	<a href="tableau_de_bord.php">RETOUR A L'ACCUEIL</a><br><br><br><br><br><br>
                          	</center>
                        </div>
                      </div>


                  </section>
                </div>
            </div>
        </section>
    </section>

    <?php 


include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>

</body>


