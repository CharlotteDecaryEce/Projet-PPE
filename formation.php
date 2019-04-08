<?php

$title="Formation";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

require_once 'include/db.php';

$req=$pdo->prepare('SELECT * FROM formation WHERE username = ?');
$req->execute([$_SESSION['auth']->username]);
$formation=$req->fetchAll();


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
                        <li class="active">Formation</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Formation 
                    <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="ajouter_form.php" class="fa fa-plus"> </a>
                     </span>
                  </header>
                  <div class="panel-body">
                  	<table class="table">
                        <?php 
                        if(count($formation)>0):
                        foreach ($formation as $form) :?>
                            <thead>
                            <tr>
                                <th> <?php echo($form->ecole); ?></th>
                                <th> <?php echo($form->diplome); ?></th>
                                <th> <?php echo($form->date_debut." - ".$form->date_fin); ?> </th>
                                <th> <span class="tools pull-right">
                                <a href=<?php echo("modif_form.php?id=".$form->id)?> class="fa fa-pencil"> </a>
                                
                                 </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a >Domaine </a></td>
                                <td><?php echo($form->domaine); ?></td>    
                                
                            </tr>
                            <tr>
                                <td><a >Associations</a></td>
                                <td><?php echo($form->associations); ?></td>    
                                
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