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

      if($moi->competences_acquises!='')
      {
            if($competences_acquises!=''){
                  $competence_acquise=$moi->competences_acquises.",".$defis->competences_acquises;
            }
      	else $competence_acquise=$defis->competences_acquises;
      }
      else{
      	$competence_acquise=$defis->competences_acquises;
      }

if($moi->competences_acquises!=''){
      $competenc_acquises=explode(',',$moi->competences_acquises);
}
else $competenc_acquises='';
$compe='';
$ok=1;
$req=$pdo->prepare('SELECT competences FROM informations WHERE id = ?');
                  $req->execute([$_SESSION['auth']->id]);
                  $comp_voulu=$req->fetch();

if($competenc_acquises!='')
{
      foreach ($competenc_acquises as $c) {
            if($c=!$defis->competences_acquises) {
                  if($compe!=''){
                        $compe=$compe.','.$c;
                  }
                  else $compe=$c;
            }
      }
}
//ajout compétence acquise
if($ok==1){
      $req=$pdo->prepare('UPDATE informations SET competences_acquises=?, competences=? WHERE id = ?')->execute([$competence_acquise,$compe, $_SESSION['auth']->id]);
}

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $defis_rea=$req->fetch();
      if(($defis_rea->defis_realises)!=""){
      	$defis_realises=($defis_rea->defis_realises).",".$id_defis;
      }
      else{
      	$defis_realises=$id_defis;
      }
      
//ajout aux defis réalisé
$req=$pdo->prepare('UPDATE informations SET defis_realises=? WHERE id = ?')->execute([$defis_realises,$_SESSION['auth']->id]);

//on enleve le defis des defis en cours
$req=$pdo->prepare('UPDATE informations SET defis_en_cours=? WHERE id = ?')->execute(['',$_SESSION['auth']->id]);



header('Location: algo_choix_defis.php');
exit();
?>