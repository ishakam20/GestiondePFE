<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare("SELECT * FROM promoteur WHERE co_promoteur1 = '$emailusthb' OR co_promoteur2='$emailusthb'");
    $profile->execute();
    $data_profile = $profile->fetchAll();
    


?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Mes Projets</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/style_accueil.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php include('sidebar.php')?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Co-Encadrement</h4>
                <ol class="breadcrumb">
                    <li><a href=""></a>Mes projets |</li>
                    <li><a href="reunionco.php">Mes réunions |</a></li>
                   <!-- <li><?php include('menunotif.php'); ?></li>-->
                    

                </ol>
            </div>
        </div><div class="topnav">
                                    <input type="text" name="search" class="searchbox-input" placeholder="Search.." onkeyup="buttonUp();" required>
                </div>
        <div class="container">
        
            <?php
foreach($data_profile as $p){ 
$d = $p['id_projet'];
$pfe5= $bdd->prepare("SELECT * FROM `pfe`WHERE id = '$d'");
$pfe5->execute();
$data_pfe = $pfe5->fetch();
$etu = $data_pfe['etudiant1'];
$pfe6 =$bdd->prepare( "SELECT * FROM etudiant WHERE email = '$etu' ");
$pfe6->execute();
$data_etu= $pfe6->fetch();
$pfe6 =$bdd->prepare( "SELECT * FROM `profile` WHERE email = '$etu' ");
$pfe6->execute();
$data_etu3= $pfe6->fetch();
$etu2 = $data_pfe['etudiant2'];
$pfe7 =$bdd->prepare( "SELECT * FROM etudiant WHERE email = '$etu2' ;");
$pfe7->execute();
$data_etu2= $pfe7->fetch();
$pfe6 =$bdd->prepare( "SELECT * FROM `profile` WHERE email = '$etu2' ;");
$pfe6->execute();
$data_etu4= $pfe6->fetch();
           ?>
           <div class="carte">
                <div class="row main-row p-4">
                <div class="col-lg-3 col-md-12 col-sm-12" >
                    <div class="blog-img"  style="  text-align: center;
 background:none;">
                        <img src="10481.jpg" alt="projet" class="img-fluid"  style=" box-shadow:none; opacity:2;  transform: translateY(0px);    height: 220%;
   width: 100%;">
                    </div>
                    <div class="row"style="margin-top : 20px;">
                        <div class="col-sm-12 mb-2">
                            <ul class="list-group list-group-horizontal " style="padding-left:10px;">
                               
                                        <button class="btn btn-info" data-toggle="modal" data-target="#readMorePopup<?=$data_pfe['id']?>">Voir plus</button>
                                      <!--  <i class="far fa-eye fa-2x" data-toggle="modal" data-target="#readMorePopup<?=$data_pfe['id']?>"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">Voir plus</span>-->
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-title">
                        <h3><?=$data_pfe['intitule']?></h3>
                    </div>
                    <div class="blog-date">
                        <span><?=$data_pfe['date']?></span>
                        
                    </div>
                    <div class="blog-info">
                        <span>Specialité: <?=$data_pfe['specialité']?> </span>
                        <span>Domaine: <?=$data_pfe['domaine']?></span>

                    </div>

                    <hr class="my-4">
                    <div class="blog-desc">
                        <p><?=$data_pfe['description']?>
                        </p>
                    </div>
                </div>
            </div></div>
            <div class="modal fade" id="readMorePopup<?=$data_pfe['id']?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:700px; margin-left:-100px">
                    <div class="modal-header">
                        <div class=" popup-img">
                            <img src="img/icon.png">
                        </div>
                       
                        <hr>
                    </div>
                    
                    <div class="modal-body">
                    <div class=" popup-title">
                            <h4 class="modal-title"> <?=$data_pfe['intitule']?></h4><br>
                        </div>
                        <div class="blog-date">
                            <span><?=$data_pfe['date']?> </span> <br>
                        </div>
                        <div class="blog-info">
                           
                            <span>Type: <?=$data_pfe['type_proj']?> </span>
                            <span>Faculté: <?=$data_pfe['faculté']?> </span><br>
                            <span>Specialité: <?=$data_pfe['specialité']?> </span>
                            <span>Domaine: <?=$data_pfe['domaine']?></span><br>
                        </div>

                        <hr class="my-4">
                        <div class="blog-int">
                            <h5>Intitulé :</h5>
                            <p><?=$data_pfe['intitule']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Description :</h5>
                            <p><?=$data_pfe['description']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-res">
                            <h5>Résumé :</h5>
                            <p><?=$data_pfe['resume']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Objectif :</h5>
                            <p><?=$data_pfe['objectif']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Outils :</h5>
                            <p><?=$data_pfe['outils']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Taches :</h5>
                            <p><?=$data_pfe['taches']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Etudiant 1 :</h5>
                            <p> <?php
                                if($data_pfe['etudiant1'] != NULL){
                                    echo $data_etu['nom'];
                                    echo "\n";
                                    echo $data_etu['prenom'];
                                }else{
                                    echo "Pas encore";
                                }
                            ?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Etudiant 2 :</h5>
                            <p><?php
                                if($data_pfe['etudiant2'] != NULL){
                                    echo $data_etu2['nom'];
                                    echo "\n";
                                    echo $data_etu2['prenom'];
                                }else{
                                    echo "Pas encore";
                                }
                            ?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Encadreur :</h5>
                            <p><?php
                                    echo $data_pfe['enseignant'];
                            ?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Etat de validation :</h5>
                            <p><?=$data_pfe['etatdevalidation']?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <?php    }
            ?>
           
            <!--AAAAAAAAAAAAAAAA-->
           
        <!--------------------->

        


        <script>
            let btn = document.querySelector("#btn");
            let sidebar = document.querySelector(".sidebar");
            let searchBtn = document.querySelector(".bx-search");

            btn.onclick = function() {
                sidebar.classList.toggle("active");
                if (btn.classList.contains("bx-menu")) {
                    btn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    btn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
            searchBtn.onclick = function() {
                sidebar.classList.toggle("active");
            }
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/profil.js"></script>

        <script>
 $(document).ready(function(){
  $('.searchbox-input').on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".carte").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

        </script>

</body>

</html>