<?php

include("include/db.php");
session_start();


$id_ajout=$_GET['id'];
$username_ajout=$_GET['nom'];
$prenom=$_GET['prenom'];

require_once 'include/db.php';

$req = $pdo->prepare("INSERT INTO relations SET id_1 = ?, id_2 = ?");
$req->execute([$_SESSION['auth']->id,$id_ajout]);
$_SESSION['interraction']['success'] = $username_ajout.' '.$prenom.' a bien été ajouté';
header('Location: ajouter_qq.php');
exit();

?>
