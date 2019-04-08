<?php

$title="Soumettre une offre d'emploi";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 
?>

<body>

    <section id="main-content">
        <section class="wrapper"> 
            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="active">Soumettre une offre d'emploi </li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12">

      <section class="panel">
        <header class="panel-heading">VOTRE OFFRE D'EMPLOI</header> 
        <div class="panel-body">
            <div class="position-center">
              <form class="form-signin" method="post" action="cbon.php">

            <input type="text" class="form-control" name="intitule" placeholder="Intitulé de l'offre" autofocus><br><br>
            <input type="text" class="form-control" name="type" placeholder="Type de contrat"><br><br>
            <input type="text" class="form-control" name="avantages" placeholder="Avantages"><br><br>
            <input type="text" class="form-control" name="salaire" placeholder="Salaire"><br><br>
            <input type="text" class="form-control" name="secteur" placeholder="Secteur"><br><br>
            <input type="text" class="form-control" name="langues" placeholder="Langues exigées"><br><br>
            <input type="text" class="form-control" name="lieu" placeholder="Lieu"><br><br>

            <br><br><br>

            <h3>Profil recherché</h3><br>
             <input type="text" class="form-control" name="diplome" placeholder="Diplomes"><br><br>
             <input type="text" class="form-control" name="qualites" placeholder="Qualités"><br><br>
            <input type="text" class="form-control" name="exigences" placeholder="Exigences (lettre de motivation, permis etc.)" autofocus><br><br><br><br>
            <br>
            <h3> Vos coordonnées </h3><br>
            <input type="text" class="form-control" placeholder="Nom" autofocus><br><br>
            <input type="text" class="form-control" placeholder="Prénom" autofocus><br><br>
            <input type="text" class="form-control" placeholder="Email" autofocus><br><br>
            <br>
          
       
          <center><button class="btn btn-primary"  type="submit">METTRE EN LIGNE</center> 
          <br><br>
        
      </form>

            </div>

        </div>

      </form>
      </div>

    </div>
</div>
</div>
</section>
</section> 

  <!-- Placed js at the end of the document so the pages load faster -->

    <?php


     include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>