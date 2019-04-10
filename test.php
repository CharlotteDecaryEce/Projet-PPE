<?php

	include("include/db.php");
	session_start();

	$req=$pdo->prepare('UPDATE informations SET defis_en_attente=? WHERE id = ?')->execute(['',$_SESSION['auth']->id]);


	for ($i=0; $i<5; $i++) {

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
		$taille_non=count($id_defis_non);
		echo("///////  taille: ".$taille_non);

		$array_comp_acquises=explode(',', $moi->competences_acquises);
		$id_defis_choisi=0;

		if($moi->competences==''){ //si il n'a pas sélectionné de compétence à acquérir
			//on choisi les compétences qu'il n'a pas et qui ont la plus hautre priorité

				//on regarde si toutes ses compétences acquises sont complètes
				if($moi->competences_acquises!=''){
		         foreach($array_comp_acquises as $c){
		            //compter progression softskills
		            $progression=0;
		            foreach ($array_id_defis_rea as $def) {
		                $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
		                  $req->execute([$def]);
		                  $defis=$req->fetch();
		                  if($defis->competences_acquises==$c){
		                    $progression=$progression+1;
		                  }
		            }$progression=$progression*50;

			        //si il possède une compétence pas fini d'apprentissage, on lui donne celle qui à la plus haute priorité
			        if($progression!=100)
			        {
		                  if($taille_non==0){
			        			$req=$pdo->prepare('SELECT * FROM defis WHERE competences_acquises=? LIMIT 1');
				                  $req->execute([$c]);
				                  $defis_ok=$req->fetch();
			        		}
			        		if($taille_non==1){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==2){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==3){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==4){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==5){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==6){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==7){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==8){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==9){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==10){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==11){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==12){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==13){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==14){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==15){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==16){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==17){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==18){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==19){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==20){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$id_defis_non[19],$c]);
				                  $defis_ok=$req->fetch();
				        	}
		                  $id_defis_choisi=$defis_ok->id;
			        }
			     }
		        } 
		        //si il n'a aucune compétence acquise en cours
		        else {
		        	//donner le defis associe à la plus haute priorité 
		        	if($taille_non==1){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==2){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==3){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==4){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==5){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==6){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==7){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==8){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==9){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==10){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==11){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==12){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==13){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==14){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==15){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==16){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==17){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==18){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==19){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18]]);
		                  $defis_ok=$req->fetch();
		        	}
		        	if($taille_non==20){
		        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ORDER BY importance ASC LIMIT 1');
		                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$id_defis_non[19]]);
		                  $defis_ok=$req->fetch();
		        	}
		            $id_defis_choisi=$defis_ok->id;
		        }
			
		}
		else{
			    //on regarde si toutes ses compétences acquises sont complètes
				if($moi->competences_acquises!=''){
				 $ok=0;
				 foreach (explode(',',$moi->competences_acquises) as $acquises) {
				 	foreach (explode(',',$moi->competences) as $voulu) {
				 		if($moi->competences_acquises==$moi->competences){
				 			$ok=1;
				 			$comp_voulu=$moi->competences_acquises;
				 		}
				 	}
				 }
		         foreach($array_comp_acquises as $c){
		            //compter progression softskills
		            $progression=0;
		            foreach ($array_id_defis_rea as $def) {
		                $req=$pdo->prepare('SELECT * FROM defis WHERE id = ?');
		                  $req->execute([$def]);
		                  $defis=$req->fetch();
		                  if($defis->competences_acquises==$c){
		                    $progression=$progression+1;
		                  }
		            }$progression=$progression*50;

			        //si il possède une compétence pas fini d'apprentissage, on lui donne celle qui à la plus haute priorité
			        if($progression!=100)
			        {
			        	if($ok==0){
			        		if($taille_non==0){
			        			$req=$pdo->prepare('SELECT * FROM defis WHERE competences_acquises=? LIMIT 1');
				                  $req->execute([$c]);
				                  $defis_ok=$req->fetch();
			        		}
				        	if($taille_non==1){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==2){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==3){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==4){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==5){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==6){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==7){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==8){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==9){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==10){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==11){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==12){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==13){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==14){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==15){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==16){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==17){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==18){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==19){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==20){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$id_defis_non[19],$c]);
				                  $defis_ok=$req->fetch();
				        	}
		                  	$id_defis_choisi=$defis_ok->id;
			        	}
			        	else if ($ok==1 && $comp_voulu==$c){
			        		if($taille_non==0){
			        			$req=$pdo->prepare('SELECT * FROM defis WHERE competences_acquises=? LIMIT 1');
				                  $req->execute([$c]);
				                  $defis_ok=$req->fetch();
			        		}
			        		if($taille_non==1){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==2){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==3){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==4){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==5){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==6){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==7){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==8){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==9){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==10){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==11){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==12){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==13){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==14){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==15){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==16){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==17){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==18){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==19){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==20){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$id_defis_non[19],$c]);
				                  $defis_ok=$req->fetch();
				        	}
		                  	$id_defis_choisi=$defis_ok->id;
		                  $id_defis_choisi=$defis_ok->id;
			        	}
		                  
			        }
			     }
		        } 
				//si choisie + pas commencée
		        else{
		        	//on choisi la competence voulu avec la prio la plus haute
		        	$prio_max=31;
		        	$comp='';
		        	foreach (explode(',',$moi->competences) as $c_voulu) {
		        		if($taille_non==0){
			        			$req=$pdo->prepare('SELECT * FROM defis WHERE competences_acquises=? LIMIT 1');
				                  $req->execute([$c]);
				                  $defis_ok=$req->fetch();
			        		}
			        		if($taille_non==1){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==2){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==3){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==4){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==5){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==6){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==7){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==8){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==9){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==10){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==11){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==12){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==13){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==14){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==15){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==16){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==17){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==18){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==19){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$c]);
				                  $defis_ok=$req->fetch();
				        	}
				        	if($taille_non==20){
				        		$req=$pdo->prepare('SELECT * FROM defis WHERE id NOT IN(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) AND competences_acquises=? LIMIT 1');
				                  $req->execute([$id_defis_non[0],$id_defis_non[1],$id_defis_non[2],$id_defis_non[3],$id_defis_non[4],$id_defis_non[5],$id_defis_non[6],$id_defis_non[7],$id_defis_non[8],$id_defis_non[9],$id_defis_non[10],$id_defis_non[11],$id_defis_non[12],$id_defis_non[13],$id_defis_non[14],$id_defis_non[15],$id_defis_non[16],$id_defis_non[17],$id_defis_non[18],$id_defis_non[19],$c]);
				                  $defis_ok=$req->fetch();
				        	}
		                    if($defis_ok->importance<$prio_max){
		                    	$prio_max=$defis_ok->importance;
		                    	$comp=$c_voulu;
		                    }
		        	}
		        	$req=$pdo->prepare('SELECT * FROM defis WHERE competences_acquises=? LIMIT 1');
		                    $req->execute([$comp]);
		                    $defis_ok=$req->fetch();
		                    $id_defis_choisi=$defis_ok->id;

		        }
		}

		$id_defis=$id_defis_choisi;
		$req=$pdo->prepare('UPDATE informations SET defis_en_attente=? WHERE id = ?')->execute([$id_defis,$_SESSION['auth']->id]);
		
	}

	//header('Location: defis_en_cours.php');
    //exit();
?>