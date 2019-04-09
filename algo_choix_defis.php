<?php

include("include/db.php");
session_start();

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();


$array_id_defis_rea=explode(',',$moi->defis_realises);
$id_defis_non='';
if($array_id_defis_rea!=''){
	foreach ($array_id_defis_rea as $id) {
		if($id_defis_non!=''){
			$id_defis_non=$id_defis_non.' || '.$id;
		}
		else $id_defis_non=$id;
	}
}

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
	        	  $req=$pdo->prepare('SELECT * FROM defis WHERE (id != ? AND competences_acquises=?) LIMIT 1');
                  $req->execute([$id_defis_non, $c]);
                  $defis_ok=$req->fetch();
                  $id_defis_choisi=$defis_ok->id;
	        }
	     }
        } 
        //si il n'a aucune compétence acquise en cours
        else {
        	//donner le defis associe à la plus haute priorité 
        	$req=$pdo->prepare('SELECT * FROM defis WHERE (id != ?) ORDER BY importance ASC LIMIT 1');
                  $req->execute([$id_defis_non]);
                  $defis_ok=$req->fetch();
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
	        		$req=$pdo->prepare('SELECT * FROM defis WHERE (id != ? AND competences_acquises=?) LIMIT 1');
                  	$req->execute([$id_defis_non, $c]);
                  	$defis_ok=$req->fetch();
                  	$id_defis_choisi=$defis_ok->id;
	        	}
	        	else if ($ok==1 && $comp_voulu==$c){
	        		$req=$pdo->prepare('SELECT * FROM defis WHERE (id != ? AND competences_acquises=?) LIMIT 1');
                    $req->execute([$id_defis_non, $c]);
                    $defis_ok=$req->fetch();
                  $id_defis_choisi=$defis_ok->id;
	        	}
                  
	        }
	     }
        } 


	//si choisie + pas commencée
}

if($moi->defis_en_attente!=''){
	$id_defis=$moi->defis_en_attente.','.$id_defis_choisi;
}
else $id_defis=$id_defis_choisi;
$req=$pdo->prepare('UPDATE informations SET defis_en_attente=? WHERE id = ?')->execute([$id_defis,$_SESSION['auth']->id]);

?>