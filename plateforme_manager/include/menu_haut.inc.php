<?php 
logged_only();
require_once 'include/db.php';
$req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
      $req->execute([$_SESSION['auth']->id]);
      $moi=$req->fetch();
$like_a_distrib=$moi->likes_distrib;
$likes_recus=$moi->likes_recus;
    $req=$pdo->prepare('SELECT * FROM informations WHERE id = ?');
    $req->execute([$_SESSION['auth']->id]);
    $moi=$req->fetch();
    $nb_like_distrib=$moi->likes_distrib;
    $nb_like_recus=$moi->likes_recus;
    if($nb_like_recus==''){
        $nb_like_recus='0';
    }
    if($nb_like_distrib==''){
        $nb_like_distrib='0';
    }
    $competences=$moi->competences_acquises;
    if($competences!=''){
        $array_comp=explode(',', $competences);
        $nb_comp=count($array_comp);
    }
    else $nb_comp='0';
?>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

      <a href="tableau_de_bord.php" class="logo">
      <img src="images/logo_inuit.png" alt="">
    </a>

    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
 <ul class="nav pull-left top-menu1">
<h4><?php echo $nb_comp ?></h4>
<h4>Softskills</h4>
</ul>
<ul class="nav pull-left top-menu2">
<h4><?php echo $nb_like_recus ?></h4>
<h4>Likes reçus </h4>
</ul>
<ul class="nav pull-left top-menu3">
<h4><?php echo $nb_like_distrib ?></h4>
<h4>Likes à distribuer</h4>
</ul>
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="modification_information.php">
                <img alt="" src=<?php echo("images/".$_SESSION['auth']->photo)?>>
                <span class="username"><?php echo($_SESSION['auth']->prenom); ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="modification_information.php"><i class=" fa fa-suitcase"></i>Profil</a></li>
                <li><a href="tableau_de_bord.php"><i class="fa fa-cog"></i> Tableau de bord</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Déconnecter</a></li>
                <li><a href="modif_mdp.php" ><i class="fa fa-unlock-alt"></i> Changer password</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>

</header>

<!--header end-->

