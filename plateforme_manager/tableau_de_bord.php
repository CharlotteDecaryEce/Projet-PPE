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
     
     //DEFIS EN COURS 
    require_once 'include/db.php';
    $req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
    $req->execute([$_SESSION['auth']->id]);
    $mec=$req->fetch();
    
    $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
    $req->execute([$mec->defis_en_cours]);
    $defis_en_cours=$req->fetch();


    //recuperer le numéro de l'équipe du manager 
    $num_equipe=$moi->equipe;

    $req=$pdo->prepare('SELECT * FROM informations WHERE equipe =?');
    $req->execute([$num_equipe]);
    $equipe=$req->fetchAll();



    $disponibilité='';
    $motivation='';
    $sociabilite='';
    $communication='';
    $gestion_du_stress='';
    $efficacite='';
    $creativite='';
    $audace='';
    $optimisme='';
    $confiance='';
    $visualisation='';
    $presence='';
    $empathie='';
    $adaptabilite='';
    $curiosite='';


    foreach($equipe as $e):
        foreach(explode(',',$e->defis_realises) as $defis):

    
             if ($defis=='1'|| $defis=='12' ){
                 $disponibilité ++;
             }
             elseif ($defis =='2'|| $defis =='14' ){
                $motivation ++;
            }
            elseif ($defis =='13'|| $defis =='3' ){
                $sociabilite ++;
            }
            elseif ($defis =='4'|| $defis =='15' ){
                $communication ++;
            }
            elseif ($defis =='5'|| $defis =='16' ){
                $gestion_du_stress ++;
            }
            elseif ($defis =='6'|| $defis =='17' ){
                $efficacite ++;
            }
            elseif ($defis =='7'|| $defis =='24' ){
                $creativite ++;
            }
            elseif ($defis =='8'|| $defis =='28' ){
                $audace ++;
            }
            elseif ($defis =='9'|| $defis =='26' ){
                $optimisme ++;
            }
            elseif ($defis =='10'|| $defis =='30' ){
                $confiance ++;
            }
            elseif ($defis =='11'|| $defis =='29' ){
                $visualisation ++;
            }
            elseif ($defis =='19'|| $defis =='18' ){
                $presence ++;
            }
            elseif ($defis =='20'|| $defis =='21' ){
                $empathie ++;
            }
            elseif ($defis =='22'|| $defis =='31' ){
                $adaptabilite ++;
            }
            elseif ($defis =='24'|| $defis =='25' ){
                $curiosite ++;
            }


        endforeach;
    endforeach;


//PARTIE GRAPH
 
$dataPoints = array(
	array("label"=> "Disponibilité", "y"=> $disponibilité),
    array("label"=> "Motivation", "y"=> $motivation),
	array("label"=> "Sociabilité", "y"=> $sociabilite),
	array("label"=> "Communication", "y"=> $communication),
	array("label"=> "Gestion du stress", "y"=> $gestion_du_stress),
	array("label"=> "Efficacité", "y"=> $efficacite),
	array("label"=> "Creativité", "y"=> $creativite),
	array("label"=> "Audace", "y"=> $audace),
	array("label"=> "Optimisme", "y"=>$optimisme),
    array("label"=> "Confiance", "y"=> $confiance),
    array("label"=> "Visualisation", "y"=> $visualisation),
	array("label"=> "Présence", "y"=> $presence),
	array("label"=> "Empathie", "y"=> $empathie),
	array("label"=> "Adaptabilité", "y"=> $adaptabilite),
	array("label"=> "Curiosité", "y"=> $curiosite)
);
	
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
<div class="col-lg-4">
<div class="profile-nav alt">
<center>
<section class="panel">
<p class="text-left">
<form name="clock" onSubmit="0">
 <?php echo date('d/m/Y');  ?>
</form>
</p>
<ul id="clock">

<iframe src="http://free.timeanddate.com/clock/i67zh98s/n195/szw110/szh110/hbw0/hfc399/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd80/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="110" height="110"></iframe>
</center>
</ul>
</section>
</center>
</div>
</div>

<!--<section id="main-content">
<section class="wrapper">

<div class="row">-->

</section>
</section>



<section id="main-content">
<section class="wrapper">




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


<!-- page start-->
<div class="row">





<div class="col-md-12">

</div>
</div>
<div class="row">
<?php if($defis_en_cours!=''){?>
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
<center>
<tr><h2><?php echo($defis_en_cours->nom)?> </tr></h2></center>

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

</thead>
<tbody>

<tr>

<td><?php echo($defis_en_cours->resume)?></td>
</tr>
<tr>
<td><?php echo($defis_en_cours->competences_acquises)?></td>
</tr>
<tr>
<td><?php echo($defis_en_cours->duree)?></td>
</tr>

<tr>
<br>
<td>
<br>
<br>

</td>

</tr>



</tbody>

</table>
</div>
</section>
</div>
<?php
    }
    else{?>
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
<div class="row">
<div class="col-lg-9">

<h3 > Vous n'avez pas de defis en cours </h3>

</div>
<div class="col-lg-3">

<a href="defis_en_attente.php" type="button" class="btn btn-compose">Trouver un défi!</a>


</div>
</div>

</header>
</section>

</div>
<?php } ?>


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
<script>
// execute/clear BS loaders for docs
$(function(){
  if (window.BS&&window.BS.loader&&window.BS.loader.length) {
  while(BS.loader.length){(BS.loader.pop())()}
  }
  })
</script>





<?php

    
    include('include/right_side_bar.php');
    include('include/js.inc.php'); ?>


</body>
