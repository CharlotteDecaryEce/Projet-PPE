<?php
      // On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
      $page = $_SERVER['REQUEST_URI'];
      $page = str_replace("/piscine/", "",$page);
?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="tableau_de_bord.php" <?php if($page == "tableau_de_bord.php" ){echo 'class="active"';} ?>>
                    <i class="fa fa-dashboard"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" <?php if($page == "liste_connexion.php" || $page=="ajouter_qq.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-info-circle"></i>
                    <span>Mon réseau</span>
                </a>
                <ul class="sub">
                    <li <?php if($page == "liste_connexion.php" ){echo 'class="active"';} ?>><a href="liste_connexion.php">Liste des connexions</a></li>
                    <li <?php if($page == "ajouter_qq.php" ){echo 'class="active"';} ?>><a href="ajouter_qq.php">Ajouter quelqu'un</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" <?php if($page == "modification_information.php" || $page=="formation.php" || $page=="experience.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-user"></i>
                    <span>Profil</span>
                </a>
                <ul class="sub">
                    <li <?php if($page == "modification_information.php" ){echo 'class="active"';} ?>><a href="modification_information.php">Informations personnelles</a></li>
                    <li <?php if($page == "formation.php" ){echo 'class="active"';} ?>><a href="formation.php">Formation</a></li>
                    <li <?php if($page == "experience.php" ){echo 'class="active"';} ?>><a href="experience.php">Expérience</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" <?php if($page == "postuler.php" || $page=="offre_emploi.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-suitcase"></i>
                    <span>Emplois</span>
                </a>
                <ul class="sub">
                    <li><a href="offre_emploi.php" <?php if($page == "offre_emploi.php" ){echo 'class="active"';} ?>>Déposer une offre</a></li>
                    <li><a href="postuler.php" <?php if($page == "postuler.php" ){echo 'class="active"';} ?>>Postuler</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="messagerie.php" <?php if($page == "messagerie.php" || $page=="nouveau_message.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-envelope"></i>
                    <span>Messagerie</span>
                </a>
            </li>
        </ul></div>        
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
