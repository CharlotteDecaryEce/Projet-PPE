 <?php
    
    $title="Tableau de bord";
    require 'include/functions.php';
     if(session_status() == PHP_SESSION_NONE){
         session_start();
     }
    include("include/header.inc.php");
    include("include/menu_haut.inc.php");
    include("include/menu_gauche.inc.php");
     
     define('DB_SERVER','localhost');
     define('DB_USER','root');
     define('DB_PASS','root');
     
     
    require_once 'include/db.php';
    $req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
    $req->execute([$_SESSION['auth']->id]);
    $mec=$req->fetch();
    $array_comp_acquises=explode(',',$mec->competences_acquises);
    $array_id_defis_rea=$moi->defis_realises;
$id_defis_rea=explode(',',$array_id_defis_rea);
    
    $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
    $req->execute([$mec->defis_en_cours]);
    $defis_en_cours=$req->fetch();

    $date_ech= strtotime($moi->date_ech_defis_en_cours);
$date_actuel= date("Y-m-d");
$date_actuel=strtotime($date_actuel);
$stro=$date_actuel-$date_ech;
$nbJours=round(($date_ech - $date_actuel)/(60*60*24)-1);
$nbJours=$nbJours+1;
if($nbJours<0){
  header('Location: echec_defis.php?id_defis='.$mec->defis_en_cours);
    exit();
}

    $req=$pdo->prepare('SELECT * FROM informations WHERE equipe = ? AND id!=?');
    $req->execute([$mec->equipe,$mec->id]);
    $equipe=$req->fetchAll();

    ?>


<bodyonLoad="clock()">

<section id="main-content">
<section class="wrapper">
<!-- page start-->
<div class="row">
<div class="col-md-12">
<!--breadcrumbs start -->
<ul class="breadcrumb">
<li><a href="tableau_de_bord.php"><i class="fa fa-home"></i>  Tableau de bord</a></li>
</ul>
<!--breadcrumbs end -->
</div>
</div>

        <!--fin entete-->

<!--horloge / partage  -->
<center>
<div class="row">

<!--heure-->
<center>
<div class="col-lg-8">
    <section class="panel">
                        <header class="panel-heading">
                            Softskills acquises / en cours d'acquisition
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <table class="table  table-hover general-table">
                                <tbody>
                                    <?php 
                                     if(!empty($array_comp_acquises)){
                                     foreach($array_comp_acquises as $c): 
                                        //compter progression softskills
                                        $progression=0;
                                        foreach ($id_defis_rea as $def) {
                                            $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
                                              $req->execute([$def]);
                                              $defis=$req->fetch();
                                              if($defis->competences_acquises==$c){
                                                $progression=$progression+1;
                                              }

                                        } $progression=$progression*50;
                                        ?>
                                       <tr>
                                       <td><a ><?php echo $c; ?></a> 
                                        <div class="progress">
                                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow=<?php echo($progression); ?> aria-valuemin="0" aria-valuemax="100" style=<?php echo('"width: '.$progression.'%"'); ?> >
                                        </div>
                                        </div></td>
                                        </tr>
                                    <?php endforeach; 
                                    }
                                    else{?>
                                    <tr>
                                       <td><a >Pas de compétences</a></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
    </section>
</div>
<div class="col-lg-4">
<div class="profile-nav alt">
<center>
<section class="panel">
    <header class="panel-heading">
    <?php echo(date('d-m-Y'));?>
  </header>

<ul id="clock">

<iframe src="http://free.timeanddate.com/clock/i67zh98s/n195/szw110/szh110/hbw0/hfc399/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd80/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="110" height="110"></iframe>
</center>
</ul>
</section>
</center>
</div>
</center>


<!--<section id="main-content">
<section class="wrapper">

<div class="row">-->

<div class="row">
    <div class="col-lg-8">
        <section class="panel">
                  <header class="panel-heading">
                    Mon équipe
                  </header>
            <div class="panel-body profile-information">
                <div class="col-lg-12">
                    <br><br>
                    <div class="profile-pic">
                    <?php if(!empty($equipe)){?>
                    <?php foreach($equipe as $membre){?>
                        
                               <a href=<?php echo("profil_info.php?id=".$membre->id);?> title=<?php echo($membre->prenom); ?> ><img src=<?php echo("images/".$membre->photo)?> alt=""/></a>
                        
                <?php }}
                else echo("Pas d'équipe");?>
                    </div>
                    <br><br>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                 <center>
                        <tr><h2><?php echo($defis_en_cours->nom)?> </tr></h2></center>
                        <center>
                        <tr><?php echo ("Il vous reste: "); ?>
                        <a><b>
                        <?php echo ($nbJours. " jours");?></b></a>
                
                    </tr></center>
            </header>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <?php  if ($defis_en_cours->competences_acquises=='Confiance'){ ?>

                    <center> <a class="displayed"><img src="images/awards/confiance.png" alt=""></a> </center>


                    <?php  }elseif ($defis_en_cours->competences_acquises=='Optimisme'){ ?>

                    <center> <a class="displayed"><img src="images/awards/optimisme.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Sociabilite'){ ?>

                    <center> <a class="displayed"><img src="images/awards/sociabilite.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Empathie'){ ?>

                    <center> <a class="displayed"><img src="images/awards/empathie.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Communication'){ ?>

                    <center> <a class="displayed"><img src="images/awards/communication.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Efficacite'){ ?>

                    <center> <a class="displayed"><img src="images/awards/efficacite.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Gestion_du_stress'){ ?>

                    <center> <a class="displayed"><img src="images/awards/stress.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Creativite'){ ?>

                    <center> <a class="displayed"><img src="images/awards/creativite.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Audace'){ ?>

                    <center> <a class="displayed"><img src="images/awards/audace.png" alt=""></a> </center>

                    <?php  } elseif ($defis_en_cours->competences_acquises=='Motivation'){ ?>

                    <center> <a class="displayed"><img src="images/awards/motivation.png" alt=""></a> </center>

                    <?php   }elseif ($defis_en_cours->competences_acquises=='Visualisation'){ ?>

                    <center> <a class="displayed"><img src="images/awards/visualisation.png" alt=""></a> </center>

                    <?php   }elseif ($defis_en_cours->competences_acquises=='Presence'){ ?>

                    <center> <a class="displayed"><img src="images/awards/presence.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Adaptabilite'){ ?>

                    <center> <a class="displayed"><img src="images/awards/adaptabilite.png" alt=""></a> </center>

                    <?php  }elseif ($defis_en_cours->competences_acquises=='Curiosite'){ ?>

                    <center> <a class="displayed"><img src="images/awards/curiosite.png" alt=""></a> </center>

                    <?php   }elseif ($defis_en_cours->competences_acquises=='Disponibilite'){ ?>

                    <center> <a class="displayed"><img src="images/awards/disponibilite.png" alt=""></a> </center>
                    <?php }   ?>
                    <br>

                    </thead>
                   
                    <tbody>
                   
                        <tr>
                            <td><?php echo("<b>Compétence acquise:</b> ".$defis_en_cours->competences_acquises)?></td>
                       </tr>
                       <tr>
                        <td><?php echo("<b>Durée:</b> ".$defis_en_cours->duree)?></td>
                        </tr>
                        
                        <tr>
                       <td>
                       <br>
                        <div class="row">

                               <div class="col-lg-6">
                               <a href=<?php echo("valider_defis.php?id_defis=".$defis_en_cours->id);?> type="button" class="btn btn-compose">Réussi</a>
                               </div>
                               <div class="col-lg-6">
                               <a href=<?php echo("echec_defis.php?id_defis=".$defis_en_cours->id);?> type="button" class="btn btn-compose">Changer</a></center></td>
                               </div>
                           </div>
                           </td>

                               </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>



<div class ="row">
<div class="col-lg-12">


<section class="panel">

<div class="panel-body">


<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title: {
    text: "Les compétences les plus travaillées par mon équipe"
  },
  axisY: {
    title: "Nombre de défis réalisés",
    includeZero: false
  },
  data: [{
    type: "column",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                    



</div

</section>

</div>
</div>



</div>
<!-- page end-->
</section>
</section>



<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/chart.js"></script>
<script src="../assets/js/toolkit.js"></script>
<script src="../assets/js/application.js"></script>






<?php

    
    include('include/right_side_bar.php');
    include('include/js.inc.php'); ?>

<script type="text/javascript">
$(function(){
  if (window.BS&&window.BS.loader&&window.BS.loader.length) {
  while(BS.loader.length){(BS.loader.pop())()}
  }
  })

</script>

</body>
