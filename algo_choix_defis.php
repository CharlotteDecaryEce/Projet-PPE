<?php

include("include/db.php");
session_start();


$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
		$array_id_defis_rea=explode(',',$moi->defis_realises);
		$array_id_defis_att=explode(',',$moi->defis_en_attente);
		$id_defis_non=array();

	if($moi->defis_realises!=''){
		foreach ($array_id_defis_rea as $def) {
			$id_defis_non[]=$def;
		}
	}
	if($moi->defis_en_attente!=''){
		foreach ($array_id_defis_att as $def) {
			$id_defis_non[]=$def;
		}
	}


	foreach($array_id_defis_rea as $a){
		echo("            ".$a);
	}
	foreach($id_defis_non as $a){
		echo("            ".$a);
	}
	$taille_non=count($id_defis_non);

	$array_comp_acquises=explode(',', $moi->competences_acquises);
	$id_defis_choisi='';

	/// On récupère les id des défis dispo par ordre de priorité
	if($taille_non==0){
		$req=$pdo->prepare('SELECT * FROM defis ORDER BY importance ASC');
          $req->execute();
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==1){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$c]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==2){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==3){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==4){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==5){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==6){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==7){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==8){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==9){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==10){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==11){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==12){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==13){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==14){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==15){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==16){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==17){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==18){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==19){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18]]);
          $defis_ok=$req->fetchAll();
	}
	if($taille_non==20){
		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC');
          $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$id_defis_non[19]]);
          $defis_ok=$req->fetchAll();
	}

	$array_id_defis_ok=array();
	foreach ($defis_ok as $defis) {
			$array_id_defis_ok[]=$defis->id;
	}

	///POUR TOUS LES DEFIS POSSIBLES

	///////// COMPETENCES VOULUES ET EN COURS D'ACQUISITION///////
	for($i=0;$i<count($array_id_defis_ok);$i++){
		
		$req=$pdo->prepare('SELECT competences_acquises FROM defis WHERE id =?');
			$req->execute([$array_id_defis_ok[$i]]);
			$competence_du_defis=$req->fetch();

		if($moi->competences!='' && $id_defis_choisi=='' && $moi->competences_acquises!=''){
			$comp_voulu_ok=0;
			$comp_acqu_ok=0;
			foreach (explode(',',$moi->competences) as $mes_competence) {
				if($mes_competence==$competence_du_defis){
					$comp_voulu_ok=1;
				}
			}
			foreach ($moi->competences_acquises as $mes_competence_acquises) {
				if($mes_competence_acquises==$competence_du_defis){
					//on regarde si la competence est bien en cours d'acquisition et non finie 
					$progression=0;
		            foreach (explode(',',$moi->defis_realises) as $def) {
		                $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
		                  $req->execute([$def]);
		                  $defis=$req->fetch();
		                  if($defis->competences_acquises==$mes_competence_acquises){
		                    $progression=$progression+1;
		                  }
		            }$progression=$progression*50;
		            if($progression==50){
		            	$comp_acqu_ok=1;
		            }
				}
			}
			if($comp_voulu_ok==1 && $comp_acqu_ok==1){
				$id_defis_choisi=$array_id_defis_ok[$i];
			}
		}
	}

	///////// COMPETENCES VOULUES ///////
	///On regarde si il a choisi des competences à travailler et qui sont dispo en defis:
	if($id_defis_choisi==''){
		for($i=0;$i<count($array_id_defis_ok);$i++){
		
			$req=$pdo->prepare('SELECT competences_acquises FROM defis WHERE id =?');
				$req->execute([$array_id_defis_ok[$i]]);
				$competence_du_defis=$req->fetch();

			if($moi->competences!='' && $id_defis_choisi=='' ){
				foreach (explode(',',$moi->competences) as $mes_competence) {
					if($mes_competence==$competence_du_defis){
						$id_defis_choisi=$array_id_defis_ok[$i];
						break;
					}
				}
			}
		}
	}
	

	//////// COMPETENCES EN COURS //////
	///On regarde si cette competence est en cours d'acquisition
	if($id_defis_choisi==''){
		for($i=0;$i<count($array_id_defis_ok);$i++){
		
			if($moi->competences_acquises!='' && $id_defis_choisi==''){
				foreach (explode(',',$moi->competences_acquises) as $mes_competence_acquises) {
					if($mes_competence_acquises==$competence_du_defis){
						//on regarde si la competence est bien en cours d'acquisition et non finie 
						$progression=0;
			            foreach (explode(',',$moi->defis_realises) as $def) {
			                $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
			                  $req->execute([$def]);
			                  $defis=$req->fetch();
			                  if($defis->competences_acquises==$mes_competence_acquises){
			                    $progression=$progression+1;
			                  }
			            }$progression=$progression*50;
			            if($progression==50){
			            	$id_defis_choisi=$array_id_defis_ok[$i];
			            	break;
			            }
					}
				}
			}
		}
	}

	if($id_defis_choisi==''){
		$id_defis_choisi=$array_id_defis_ok[0];
	}


	if($moi->defis_en_attente!=''){
		$id_defis=$moi->defis_en_attente.','.$id_defis_choisi;
	}
	else $id_defis=$id_defis_choisi;
	$req=$pdo->prepare('UPDATE informations SET defis_en_attente=? WHERE id = ?')->execute([$id_defis,$_SESSION['auth']->id]);
		
header('Location: defis_en_cours.php');
exit();


?>