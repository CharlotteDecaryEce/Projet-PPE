<?php
include("include/db.php");
session_start();

$id_defis=$_GET['id_defis'];

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $defis_rea=$req->fetch();
      if(($defis_rea->defis_non_realises)!="")
      {
      	$defis_non_realises=($defis_rea->defis_non_realises).",".$id_defis;
      }
      else{
      	$defis_non_realises=$id_defis;
      }
//ajout aux defis réalisé
$req=$pdo->prepare('UPDATE informations SET defis_non_realises=? WHERE id = ?')->execute([$defis_non_realises,$_SESSION['auth']->id]);

//on enleve le defis des defis en cours
$req=$pdo->prepare('UPDATE informations SET defis_en_cours=? WHERE id = ?')->execute(['',$_SESSION['auth']->id]);


header('Location: algo_choix_defis.php');
exit();
?>