<?php


include("include/db.php");
session_start();

$id_ajout=$_GET['id'];
$username_ajout=$_GET['nom'];
$prenom=$_GET['prenom'];

$req = $pdo->prepare("DELETE FROM relations WHERE id_1 = ? AND id_2= ?");
$req->execute([$_SESSION['auth']->id,$id_ajout]);
$req = $pdo->prepare("DELETE FROM relations WHERE id_2 = ? AND id_1= ?");
$req->execute([$_SESSION['auth']->id,$id_ajout]);
$_SESSION['interraction']['success'] = $username_ajout.' '.$prenom.' a bien été supprimé';
header('Location: ajouter_qq.php');
exit();

?>