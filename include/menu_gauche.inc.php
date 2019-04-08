<?php
      // On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
      $page = $_SERVER['REQUEST_URI'];
      $page = str_replace("/projet-ppe/", "",$page);
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
                <a href="liste_connexion.php" <?php if($page == "liste_connexion.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-info-circle"></i>
                    <span>Mon réseau</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" <?php if($page == "modification_information.php" || $page=="formation.php" || $page=="experience.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-user"></i>
                    <span>Profil</span>
                </a>
                <ul class="sub">
                    <li <?php if($page == "modification_information.php" ){echo 'class="active"';} ?>><a href="modification_information.php">Informations personnelles</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" <?php if($page == "defis_en_cours.php" || $page=="defis_en_attente.php"){echo 'class="active"';} ?>>
                    <i class="fa fa-signal"></i>
                    <span>Défis</span>
                </a>
                <ul class="sub">
                    <li <?php if($page == "defis_en_cours.php" ){echo 'class="active"';} ?>><a href="defis_en_cours".php">Mes défis en cours</a></li>
                </ul>
                <ul class="sub">
                    <li <?php if($page == "defis_en_attente.php" ){echo 'class="active"';} ?>><a href="defis_en_attente.php">Mes défis en attente</a></li>
                </ul>
            </li>
        </ul></div>        
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
