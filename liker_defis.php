<?php

$id=$_GET['id'];

require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$id]);
      $mec=$req->fetch();
      $like=($mec->likes_recus)+1;

$req=$pdo->prepare('UPDATE informations SET likes_recus=? WHERE id = ?');
      $req->execute([$like,$id]);

$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $mec=$req->fetch();
      $like_moi=($mec->likes_recus)-1;

$req=$pdo->prepare('UPDATE informations SET likes_recus=? WHERE id = ?');
      $req->execute([$like_moi,$_SESSION['auth']->id]);
      $mec=$req->fetch();
?>