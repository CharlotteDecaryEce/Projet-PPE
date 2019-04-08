<?php

$title="Nouveau message";
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
                        <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i>Tableau de bord</a></li>
                        <li class="active">Nouveau Message</li>
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
		                <section class="panel">
		                    <header class="panel-heading wht-bg">
		                       <h4 class="gen-case"> Nouveau message</h4>
		                    </header>
		                    <div class="panel-body">
		                        <div class="compose-mail">
		                            <form role="form-horizontal" id='compose_mail'>
				                        <div class="col-lg-12">
				                            <select class="form-control m-bot15">
				                                <option>Choisir un destinataire</option>
				                                <option>Manu</option>
				                                <option>Smoothie</option>
				                            </select>
				                        </div>

		                                <div class="compose-editor">
		                                    <textarea class="wysihtml5 form-control" rows="9"></textarea>
		                                    <input type="file" class="default" id="message">
		                                </div>
		                                <div class="compose-btn">
		                                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i> Envoyer</button>
		                                </div>

		                            </form>
		                        </div>
		                    </div>
		                </section>
            	</div>
        </div>
	 </section>
    </section>



	<?php include('include/right_side_bar.php');
 include('include/js.inc.php'); ?>


</body>
</html>