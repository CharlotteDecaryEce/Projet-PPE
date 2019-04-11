<?php
include("include/db.php");
session_start();

$id_defis=$_GET['id_defis'];

$req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
      $req->execute([$id_defis]);
      $defis=$req->fetch();
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();

$def_non='';    
if($moi->defis_non_realises!=''){
      foreach (explode(',',$moi->defis_non_realises) as $def) {
      if($def!=$id_defis){
            if($def_non!='')
            {
                  $def_non=$def_non.','.$def;
            }
            else $def_non=$def;
      }
      }
}


//on enleve des defis en attente
$req=$pdo->prepare('UPDATE informations SET defis_non_realises=? WHERE id = ?')->execute([$def_non,$_SESSION['auth']->id]);

//on ajoute au defis en cours
$req=$pdo->prepare('UPDATE informations SET defis_en_cours=? WHERE id = ?')->execute([$id_defis,$_SESSION['auth']->id]);

//On ajoute la date d'échéance
// Date d'ajourd'hui
$timestamp_initial=date("Y-m-d");
$date = date("Y-m-d", strtotime($timestamp_initial." +".$defis->duree."days"));

echo($date);
$req=$pdo->prepare('UPDATE informations SET date_ech_defis_en_cours=? WHERE id = ?')->execute([$date,$_SESSION['auth']->id]);

header('Location: defis_en_cours.php');
exit();
?>
