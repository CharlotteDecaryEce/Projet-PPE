<?php
include("include/db.php");
session_start();

$id=$_GET['id'];

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$id]);
      $mec=$req->fetch();
      $like=($mec->likes_recus);

$req=$pdo->prepare('UPDATE informations SET likes_recus=? WHERE id = ?')->execute([($like+1),$id]);

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $mec=$req->fetch();
      $like_moi=($mec->likes_distrib)-1;

$req=$pdo->prepare('UPDATE informations SET likes_distrib=? WHERE id = ?')->execute([$like_moi,$_SESSION['auth']->id]);


header('Location: profil_info.php?id='.$id);
exit();
?>