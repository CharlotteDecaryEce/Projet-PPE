<?php
include("include/db.php");
session_start();

$id_defis=$_GET['id_def'];

$req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
      $req->execute([$id_defis]);
      $defis=$req->fetch();
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
      
$def_en_attente='';
foreach (explode(',',$moi->defis_en_attente) as $def) {
      if($def!=$id_defis){
            if($def_en_attente!='')
            {
                  $def_en_attente=$def_en_attente.','.$def;
            }
            else $def_en_attente=$def;
      }
}

//on enleve des defis en attente
$req=$pdo->prepare('UPDATE informations SET defis_en_attente=? WHERE id = ?')->execute([$def_en_attente,$_SESSION['auth']->id]);

//on ajoute au defis en cours
$req=$pdo->prepare('UPDATE informations SET defis_en_cours=? WHERE id = ?')->execute([$id_defis,$_SESSION['auth']->id]);



header('Location: defis_en_cours.php');
exit();
?>
