<?php

$title="Experience";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

require_once 'include/db.php';

$req=$pdo->prepare('SELECT * FROM experience WHERE username = ?');
$req->execute([$_SESSION['auth']->username]);
$experience=$req->fetchAll();


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
                        <li class="active">Experience</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Experience 
                    <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="ajouter_exp.php" class="fa fa-plus"> </a>
                     </span>
                  </header>
                  <div class="panel-body">
                    <table class="table">
                        <?php 
                        if(count($experience)>0):
                        foreach ($experience as $form) :?>
                            <thead>
                            <tr>
                                <th> <?php echo($form->poste); ?></th>
                                <th> <?php echo($form->entreprise); ?></th>
                                <th> <?php echo($form->date_debut." - ".$form->date_fin); ?> </th>
                                <th> <span class="tools pull-right">
                                <a href=<?php echo("modification_experience.php?id=".$form->id)?> class="fa fa-pencil"> </a>
                                
                                 </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a >Lieu </a></td>
                                <td><?php echo($form->lieu); ?></td>    
                                
                            </tr>
                            <tr>
                                <td><a >Description</a></td>
                                <td><?php echo($form->description); ?></td>    
                            </tr>
                        </tbody><?php
                        endforeach; endif;
                        ?>
                    </table>
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