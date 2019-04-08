<?php

$title="Postuler";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');

$database = "piscine";

$db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    
?>

<header>
	<section id="main-content">
			<!--entete-->
            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="active">Vos offres d'emplois </li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <!--entete-->

            <!--head-->
			<div class="mini-stat clearfix"><br><br>
                <div class="col-lg-12">
                            <span class="mini-stat-icon green"><i class="fa fa-suitcase"></i></span>
                            <div class="mini-stat-info">
                                <br>VOS OFFRES D'EMPLOI
                           
                            </div>
                        </div>
            </div>
            <!--head-->
    </section>
</header>


<?php $sql = 'SELECT * FROM emploi';
    $result = mysqli_query($db_handle, $sql);

    while ($db_field = mysqli_fetch_assoc($result)) {
?>

        <body>
    <section id="main-content">
        <div class="col-lg-12">
            
                <div class="col-lg-12"> 
                    <div class="panel panel-default">
                   
                            <div class="panel-heading">

                        <?php echo $db_field['intitule'];?>
                    
                        <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down" ></a>
                                <a href="" class="fa fa-times"></a>
                        </span>
                     </div>

                            <div class="panel-body">
                                            
                                            <h4>Descripion de l'offre </h4><br><br>

                                                Type de contrat : <?php echo $db_field['type'];?><br>
                                                Avantages : <?php echo $db_field['avantages'];?><br>
                                                Salaire : <?php echo $db_field['salaire'];?><br>
                                                Secteur : <?php echo $db_field['secteur'];?><br>
                                                Langues exigées : <?php echo $db_field['langues'];?> <br>
                                                Lieu : <?php echo $db_field['lieu'];?><br>
                                                <br><br>

                                            <h4>Profil recherché</h4><br>

                                                Diplomes : <?php echo $db_field['diplome'];?><br>
                                                Qualités : <?php echo $db_field['qualites'];?><br>
                                                Exigences (lettre de motivation, permis etc.) : <?php echo $db_field['exigences'];?><br>
                                                <br><br><br>

                                            <div class="bouton">
                                                <center><a href="#Postuler" type="button" class="btn btn-primary" data-toggle="modal">JE POSTULE MAINTENANT !</i></a></center><br>
                                            </div>
                            </div>
                    </div>
                </div>
        </div>

                                            <!--fenetre CV-->
                                            <div class="modal fade" id="Postuler" tabindex="-1" role="dialog" aria-labelledby="Video" aria-hidden="true"> 
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content"> 
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title text-center">Pièces nécessaires pour postuler</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                    
                                                        <form>
                                                            <br>
                                                            <div class="form-group">
                                                                <label class="sr-only">CV</label>
                                                               <div class="text-left"> <h5>CV : </h5></div>
                                                                <div class="input-group">
                                                                   <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
                                                                    <center><h5><input type="file" name="upl" multiple=""></h5>
                                                                       <ul>
                                                                    <!-- The file uploads will be shown here -->
                                                                       </ul></center>  
                                                                   </form>
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <label class="sr-only">Lettre de motivation</label>
                                                                <div class="text-left"> <h5>Lettre de motivation : </h5></div>
                                                                <div class="input-group">
                                                                   <form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
                                                                    <center><h5><input type="file" name="upl" multiple=""></h5>
                                                                       <ul>
                                                                    <!-- The file uploads will be shown here -->
                                                                       </ul></center>  
                                                                   </form>
                                                                </div>
                                                            </div>
                                                            
                                                        <div class="bouton">
                                                            <br><a href="tableau_de_bord.php">POSTULER</a><br><br><br>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
    </section>


<!-- Placed js at the end of the document so the pages load faster -->

	 <?php 
}}
mysqli_close($db_handle);
 include('include/right_side_bar.php');
 include('include/js.inc.php'); 
 ?>


	</body>





