<?php

$title="Messagerie";
require 'include/functions.php';
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 
?>

<body>
    <!--main content start-->
    <section id="main-content" >
    <section class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="accueil.php"><i class="fa fa-home"></i> Accueil</a></li>
                        <li class="active">Messagerie</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                        <section class="panel">
                                <div class="panel-body">
                                    <a href="nouveau_message.php"  class="btn btn-compose">
                                        Nouveau message
                                    </a>
                                    <ul class="nav nav-pills nav-stacked mail-nav">
                                        <li><a href="messagerie.php"> <img src="images/charlotte_decary.jpg" style="width: 15%" > Charlotte Decray  <span class="label label-danger pull-right inbox-notification">1</span></a></li>
                                        <li><a href="messagerie.php"> <img src="images/emmanuelle.jpg" style="width: 15%" >  Emmanuelle Thiroloix</a></li>
                                </div>
                        </section>
                </div>
                <div class="col-lg-8">
                        <section class="panel panel-info">
                            <header class="panel-heading">
                                Charlotte Decary
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down" ></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                            </header>
                            <div class="panel-body">
                                <div class="chat-conversation">
                                    <ul class="conversation-list">
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="images/charlotte_decary.jpg" style="width: 120%" >
                                                <i>10:56</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Charlotte Decary </i>
                                                    <p>
                                                        Bonjour! Ca avance bien le back-end?
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="images/antoine_lame.jpg" style="width: 120%" >
                                                <i>12:00</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Antoine Lamé</i>
                                                    <p>
                                                        C'est assez compliqué, mais on va s'en sortir! On avance déjà assez vite! Et toi avec l'application IOS?
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="images/charlotte_decary.jpg" style="width: 120%" >
                                                <i>15:47</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Charlotte Decary</i>
                                                    <p>
                                                        Ca avance plutôt bien!
                                                    </p>
                                                </div>
                                            </div>
                                        </li>-->
                                    </ul>
                                    <div class="row">
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control chat-input" placeholder="Entrer votre message">
                                        </div>
                                        <div class="col-xs-3 chat-send">
                                            <button type="submit" class="btn btn-default">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                </div>
            </div>

            </div>
        </section>
    </section>

<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>

</body>
</html>