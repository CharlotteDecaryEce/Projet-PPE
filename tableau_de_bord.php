<?php

$title="Tableau de bord";
require 'include/functions.php';
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include("include/header.inc.php"); 
include("include/menu_haut.inc.php"); 
include("include/menu_gauche.inc.php"); 

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');

$database = "piscine";

$db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) {
    $sql = 'SELECT * FROM posts';
    $result = mysqli_query($db_handle, $sql);
?>


<body onLoad="clock()">

    <section id="main-content">
        <section class="wrapper">
            <!--entete-->
            <div class="row">
                    <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="tableau_de_bord.php"><i class="fa fa-home"></i> Tableau de bord </a></li>
                           
                        </ul>
                        <!--breadcrumbs end -->
                    </div>
            </div>
        <!--fin entete-->

        <!--horloge / partage  --> 
            <div class="row">
                <!--heure-->
                <div class="col-lg-4">
                    <div class="profile-nav alt">
                        <section class="panel">
                            <div class="panel-heading">
                                <h1> DATE</h1><br><br>
                                <br>
                                <p class="text-left">
                                    <form name="clock" onSubmit="0">
                                    <input type="text"  name="date" size="25" readonly="true" height="70" class="style">
                                    </form><br><br><br>
                                </p>
                            </div><br>
                            <ul id="clock">
                              <center><br>
                              <iframe src="http://free.timeanddate.com/clock/i67zh98s/n195/szw110/szh110/hbw0/hfc399/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd80/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="110" height="110"></iframe>
                               <br><br>
                    <br>
                    <br>
                    <br>
                    <br>

                           </center> 
                            </ul>
                        </section>
                    </div>
                </div>

                <!--partage-->
                <div class="col-lg-8"> 
                    <div class="panel panel-default">
                   
                        <div class="panel-heading"> Partager une photo, une vidéo, un article </div>

                             <div class="panel-body">
                                <div class="boutontab">

                                <a href="#Photo" type="button" data-toggle="modal"><i class="fa fa-camera"></i></a>
                                <a href="#Video" type="button" data-toggle="modal"><i class="fa fa-film"></i></a>
                                <a href="#Lien" type="button" data-toggle="modal"><i class="fa fa-paperclip"></i></a>
                                </div>
                                <form method="post" action="posts.php">
                                    <br> <textarea class="form-control" rows="9" name="texte" placeholder="Exprimez-vous..." ></textarea><br>
                                    <div class="input-group">
                                                           <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" class="form-control" name="heure" placeholder="Date"><br><br>
                                                              </div><br><br>

                                                        <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-smile-o"></span></div>
                                                        <select class="form-control custom-select" name="sentiment">
                                                                        <option selected="">Humeur</option>
                                                                        <option>Content(e)</option>
                                                                        <option>Fier(e)</option>
                                                                        <option>Enervé(e)</option>
                                                                        <option>Fatigué(e)</option>
                                                                        <option>Motivé(e)</option>
                                                                         <option>Déçu(e)</option>
                                                                         </select><br><br>
                                                        </div><br><br>
                                                        <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-map-marker"></span></div>
                                                        <input type="text" class="form-control" name="lieu" placeholder="Lieu"><br><br>
                                                    
                                                        </div><br><br>

                              
         
                                 <br><br>
                                                                    
                                                                  <center><button  class="btn btn-primary" type="submit">POSTER </button></center>
                                </form>
                             </div>
                     </div>
                </div>
            </div>


                <!--<section id="main-content">
                        <section class="wrapper">
                        
                            <div class="row">-->
                
                <header>

            <!--head-->
                    <div class="mini-stat clearfix">
                            <span class="mini-stat-icon blue"><i class="fa fa-info"></i></span>
                            <div class="header"><br>
                            VOTRE FIL D'ACTUALITE
                            </div>
                        </div>
                </header>
</section>
</section>



                <?php $sql = 'SELECT * FROM posts';
                    $result = mysqli_query($db_handle, $sql);

                    while ($db_field = mysqli_fetch_assoc($result)) {
                ?>
                <section id="main-content">
    <div class="col-lg-12">

            <!--entete-->

  
        
                                                <div class="alert alert-info">
                                                    <span class="alert-icon"><i class="fa fa-align-justify"></i></span>
                                                    <div class="notification-info">
                                                        <ul class="clearfix notification-meta">
                                                             <li class="pull-right notification-time"><br><?php echo $db_field['heure'];?> </li>
                                                            <li class="pull-left notification-sender">
                                                                <span><a href="#"><br> <?php echo $db_field['username'];?> </a></span> <br><br><br><br>
                                                                <?php echo $db_field['texte'];?> </li><br><br><br><br><br><br><br>
                                                                <?php if($db_field['fichier']!=""): ?>
                                                                <center><img src=<?php echo ("images/".$db_field['fichier']);?> width="300" height="180"> <br> <br><br></center><?php endif; ?><span class="alert-icon"><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;&nbsp;<?php echo $db_field['lieu'];?>
                                                                <br>
                                                                <br><span class="alert-icon"><i class="fa fa-smile-o"></i></span>&nbsp;&nbsp;&nbsp;<?php echo $db_field['sentiment'];?>
                                                           
                                                                    <br><br><br> <center><button class="btn btn-primary">J'aime</button> &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Commenter</button></center>
                                                        </ul>
                                                    </div>
                                                </div>
                                            
                                            <!--fenetre photo-->
                                            <div class="modal fade" id="Photo" tabindex="-1" role="dialog" aria-labelledby="Photo" aria-hidden="true"> 
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content"> 
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title text-center">Partager une photo</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h4 class="m-t-0">Edition</h4>
                                                        <form method="post" action="posts.php">
                                                            <div class="input-group">
                                                           <div class="input-group-addon"><span class="fa fa-pencil-square-o"></span></div> 
                                                           <textarea type="text" class="form-control" name="texte" placeholder="Veuillez entrer votre texte" autofocus></textarea><br><br>
                                                        </div><br><br>

                                                        <div class="input-group">
                                                           <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" class="form-control" name="heure" placeholder="Date"><br><br>
                                                              </div><br><br>

                                                        <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-smile-o"></span></div>
                                                        <select class="form-control custom-select" name="sentiment">
                                                                        <option selected="">Humeur</option>
                                                                        <option>Content(e)</option>
                                                                        <option>Fier(e)</option>
                                                                        <option>Enervé(e)</option>
                                                                        <option>Fatigué(e)</option>
                                                                        <option>Motivé(e)</option>
                                                                         <option>Déçu(e)</option>
                                                                         </select><br><br>
                                                        </div><br><br>
                                                        <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-map-marker"></span></div>
                                                        <input type="text" class="form-control" name="lieu" placeholder="Lieu"><br><br>
                                                        </div><br><br>
                                                        <div class="input-group">
                                                        <input type="file" name="fichier" class="default" />
                                                        </div><br><br>
                                                                    
                                                                  <center><button  class="btn btn-primary" type="submit">POSTER </button></center>
                                                       

                                                        </form>



                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--fenetre video-->
                                            <div class="modal fade" id="Video" tabindex="-1" role="dialog" aria-labelledby="Photo" aria-hidden="true"> 
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content"> 
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title text-center">Partager une vidéo</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <h4 class="m-t-0">Edition</h4>
                                                        <form method="post" action="posts.php">
                                                            <div class="input-group">
                                                           <div class="input-group-addon"><span class="fa fa-pencil-square-o"></span></div> 
                                                           <textarea type="text" class="form-control" name="texte" placeholder="Veuillez entrer votre texte" autofocus></textarea><br><br>
                                                        </div><br><br>

                                                        <div class="input-group">
                                                           <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                        <input type="date" class="form-control" name="heure" placeholder="Date"><br><br>
                                                              </div><br><br>

                                                        <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-smile-o"></span></div>
                                                        <select class="form-control custom-select" name="sentiment">
                                                                        <option selected="">Humeur</option>
                                                                        <option>Content(e)</option>
                                                                        <option>Fier(e)</option>
                                                                        <option>Enervé(e)</option>
                                                                        <option>Fatigué(e)</option>
                                                                        <option>Motivé(e)</option>
                                                                         <option>Déçu(e)</option>
                                                                         </select><br><br>
                                                        </div><br><br>
                                                        <div class="input-group">
                                                        <div class="input-group-addon"><span class="fa fa-map-marker"></span></div>
                                                        <input type="text" class="form-control" name="lieu" placeholder="Lieu"><br><br>
                                                        </div><br><br>
                                                        <div class="input-group">
                                                       <input type="file" class="default" />
                                                        </div><br><br>
                                                                    
                                                                  <center><button  class="btn btn-primary" type="submit">POSTER </button></center>
                                                       

                                                        </form>



                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--fenetre lien-->
                                            <div class="modal fade" id="Lien" tabindex="-1" role="dialog" aria-labelledby="Lien" aria-hidden="true"> 
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content"> 
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title text-center">Partager un lien </h4>
                                                        </div>

                                                        <div class="modal-body text-center">
                                                            <h4 class="m-t-0">Edition</h4>
                                                            <form method="post" action="posts.php">
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><span class="fa fa-pencil-square-o"></span></div> 
                                                                <textarea type="text" class="form-control" name="texte" placeholder="Veuillez entrer votre texte" autofocus></textarea><br><br>
                                                            </div><br><br>

                                                            <div class="input-group">
                                                                <div class="input-group-addon"><span class="fa fa-calendar"></span></div>
                                                                <input type="date" class="form-control" name="heure" placeholder="Date"><br><br>
                                                            </div><br><br>

                                                            <div class="input-group">
                                                                <div class="input-group-addon"><span class="fa fa-smile-o"></span></div>
                                                                    <select class="form-control custom-select" name="sentiment">
                                                                        <option selected="">Humeur</option>
                                                                        <option>Content(e)</option>
                                                                        <option>Fier(e)</option>
                                                                        <option>Enervé(e)</option>
                                                                        <option>Fatigué(e)</option>
                                                                        <option>Motivé(e)</option>
                                                                         <option>Déçu(e)</option>
                                                                         </select><br><br>
                                                            </div><br><br>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><span class="fa fa-map-marker"></span></div>
                                                                <input type="text" class="form-control" name="lieu" placeholder="Lieu"><br><br>
                                                            </div><br><br>
                                                            <label class="sr-only">Lien</label>
                                                                <p>Copier le lien URL : </p>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><span class="fa fa-code"></span> </div>
                                                                    
                                                                   <input class="form-control" type="url" name="fichier">
                                                               </div><br><br>
                                                            <center><button  class="btn btn-primary" type="submit">POSTER </button></center>
                                                       

                                                            </form>
                                                         </div>
                                           
                                                    </div>
                                                </div>
                                            </div>
        </div>
            

</section>

                    
            <!-- Placed js at the end of the document so the pages load faster -->

            <!--Core js-->
            <script src="../assets/js/jquery.min.js"></script>
            <script src="../assets/js/chart.js"></script>
            <script src="../assets/js/toolkit.js"></script>
            <script src="../assets/js/application.js"></script>
            <script>
                // execute/clear BS loaders for docs
                $(function(){
                    if (window.BS&&window.BS.loader&&window.BS.loader.length) {
                        while(BS.loader.length){(BS.loader.pop())()}
                    }
                })
            </script>
           






            <?php 
                        }
                        }
                        mysqli_close($db_handle);

                        include('include/right_side_bar.php');
                        include('include/js.inc.php'); 

            ?>


</body>




