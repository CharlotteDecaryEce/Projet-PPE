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

$competences_acquises='';
$competences_voulues='';
$pas_ok=0;
if($moi->competences_acquises!=''){
      $competences_acquises=$moi->competences_acquises;
      foreach (explode(',',$competences_acquises) as $c) {
            if($c==$defis->competences_acquises){
                  $pas_ok=1;
            }
      }
      if($pas_ok==0){
            if($competences_acquises!=''){
                  $competences_acquises=$competences_acquises.','.$defis->competences_acquises;
            }
            else $competences_acquises=$defis->competences_acquises;
      }
}
else $competences_acquises=$defis->competences_acquises;

if($moi->competences!='' && $moi->competences_acquises!=''){
      $comp_enl='';
      foreach (explode(',',$moi->competences_acquises) as $c_acq) {
            if($c_acq==$defis->competences_acquises){
                  foreach (explode(',',$moi->competences) as $ma_compet) {
                        if($ma_compet==$c_acq){
                              $comp_enl=$c_acq;
                        }
                  }
            }
      }
      if($comp_enl!=''){
            foreach (explode(',',$moi->competences) as $c) {
                  if($c != $comp_enl){
                        if($competences_voulues!=''){
                              $competences_voulues=$competences_voulues.','.$c;
                        }
                        else{
                              $competences_voulues=$c;
                        }
                  }
            }
      }
}
else $competences_voulues=$moi->competences;


$req=$pdo->prepare('SELECT competences FROM informations WHERE id = ?');
                  $req->execute([$_SESSION['auth']->id]);
                  $comp_voulu=$req->fetch();


      $req=$pdo->prepare('UPDATE informations SET competences_acquises=?, competences=? WHERE id = ?')->execute([$competences_acquises,$competences_voulues, $_SESSION['auth']->id]);


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


$date = date("Y-m-d");
$req=$pdo->prepare('UPDATE informations SET date_ech_defis_en_cours=? WHERE id = ?')->execute([$date,$_SESSION['auth']->id]);


header('Location: algo_choix_defis.php');
exit();
?>