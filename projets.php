<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare('SELECT * FROM enseignant WHERE emailusthb = ? ');
    $profile->execute(array($emailusthb));
    $data_profile = $profile->fetch();
    
    $pfe5= $bdd->prepare('SELECT * FROM `pfe`WHERE enseignant = ? ');
    $pfe5->execute(array($emailusthb));
    $data_pfe = $pfe5->fetchAll();

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
    <link rel="stylesheet" href="css/style_table.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img src="img/icon.png" alt="" class="image-logo">
                <div class="logo_name"> USTHB Grad</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>

        </div>

        <ul class="nav_list">

            <li>
                <a href="accueil_ens.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Accueil</span>
                </a>
                <span class="tooltip">Accueil</span>
            </li>
            <li>
                <a href="prof_ens.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">profil</span>
                </a>
                <span class="tooltip">profil</span>
            </li>
            <li>
                <a href="proposer.php">
                    <i class='bx bx-upload'></i>
                    <span class="links_name">Proposer un PFE</span>
                </a>
                <span class="tooltip">Proposer un PFE</span>
            </li>
            <li>
                <a href="projets.php">
                    <i class='bx bx-file-blank'></i>
                    <span class="links_name">Mes projets</span>
                </a>
                <span class="tooltip">Mes projets</span>
            </li>
            <li>
                <a href="espace_de_travail.php">
                    <i class='bx bx-library'></i>
                    <span class="links_name">Espace de travail</span>
                </a>
                <span class="tooltip">Espace de travail</span>
            </li>

            <li>
                <a href="mes_candidaturespfe.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Candidatures</span>
                </a>
                <span class="tooltip">Candidatures</span>
            </li>
            <li>
                <a href="jury.php">
                    <i class='bx bxs-graduation'></i>
                    <span class="links_name">Jury</span>
                </a>
                <span class="tooltip">Jury</span>
            </li>
            <li>
                <a href="table_commission.php">
                    <i class='bx bx-group'></i>
                    <span class="links_name">Commission</span>
                </a>
                <span class="tooltip">Commission</span>
            </li>
            <li>
                <a href="commissionsuivi.php">
                    <i class='bx bx-group'></i>
                    <span class="links_name">Commission de suivi</span>
                </a>
                <span class="tooltip">Commission de suivi</span>
            </li>
            <li>
                <a href="annonces_admin.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Annonces</span>
                </a>
                <span class="tooltip">Annonces</span>
            </li>


        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="deconnexion.php"><i class='bx bx-log-out' id="log_out"></i></a>


            </div>
        </div>
    </div>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Mes projets </h4>
                <ol class="breadcrumb">
                    
                   
                    

                </ol>
            </div>
        </div>
        <div class="container">
            <?php
foreach($data_pfe as $p){ 
$d = $p['id'];
$etu = $p['etudiant1'];
$pfe6 =$bdd->prepare( "SELECT * FROM etudiant WHERE email = '$etu' ");
$pfe6->execute();
$data_etu= $pfe6->fetch();
$pfe6 =$bdd->prepare( "SELECT * FROM `profile` WHERE email = '$etu' ");
$pfe6->execute();
$data_etu3= $pfe6->fetch();
$etu2 = $p['etudiant2'];
$pfe7 =$bdd->prepare( "SELECT * FROM etudiant WHERE email = '$etu2' ;");
$pfe7->execute();
$data_etu2= $pfe7->fetch();
$pfe6 =$bdd->prepare( "SELECT * FROM `profile` WHERE email = '$etu2' ;");
$pfe6->execute();
$data_etu4= $pfe6->fetch();
           ?>
                <div class="row main-row p-4">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="blog-img">
                        <img src="img/icon.png" alt="projet" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <ul class="list-group list-group-horizontal " style="padding-left:10px;">
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="far fa-eye fa-2x" data-toggle="modal" data-target="#readMorePopup<?=$p['id']?>"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">Voir plus</span>
                                </li>
                                <li class="list-group-item">
                                    <a href="supprimerpfe.php?id=<?=$d?>">
                                        <i class="far fa-trash-alt fa-2x"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">supprimer</span>
                                </li>
                                <li class="list-group-item">
                                    <a href="modifierpfe.php?idpf=<?=$d?>">
                                        <i class="far fa-edit fa-2x"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">Modifier</span>
                                </li>



                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-title">
                        <h3><?=$p['intitule']?></h3>
                    </div>
                    <div class="blog-date">
                        <span><?=$p['date']?></span>
                        
                    </div>
                    <div class="blog-info">
                        <span>Specialité: <?=$p['specialité']?> </span>
                        <span>Domaine: <?=$p['domaine']?></span>

                    </div>

                    <hr class="my-4">
                    <div class="blog-desc">
                        <p><?=$p['description']?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="readMorePopup<?=$p['id']?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class=" popup-title">
                            <h4 class="modal-title">Titre du projet : <?=$p['intitule']?></h4>
                        </div>

                        <div class=" popup-img">
                            <img src="img/icon.png">
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close" id="closeBtn">
                            <span aria-hidden="true"></span>x
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="blog-date">
                            <span><?=$p['date']?> </span>
                        </div>
                        <div class="blog-info">
                            <span>Type: <?=$p['type_proj']?> </span>
                            <span>Faculté: <?=$p['faculté']?> </span>
                            <span>Specialité: <?=$p['specialité']?> </span>
                            <span>Domaine: <?=$p['domaine']?></span>
                        </div>

                        <hr class="my-4">
                        <div class="blog-int">
                            <h5>Intitulé :</h5>
                            <p><?=$p['intitule']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Description :</h5>
                            <p><?=$p['description']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-res">
                            <h5>Résumé :</h5>
                            <p><?=$p['resume']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Objectif :</h5>
                            <p><?=$p['objectif']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Outils :</h5>
                            <p><?=$p['outils']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Taches :</h5>
                            <p><?=$p['taches']?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Etudiant 1 :</h5>
                            <p> <?php
                                if($p['etudiant1'] != NULL){
                                    echo $data_etu['nom'];
                                    echo "\n";
                                    echo $data_etu['prénom'];
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
                                if($p['etudiant2'] != NULL){
                                    echo $data_etu2['nom'];
                                    echo "\n";
                                    echo $data_etu2['prénom'];
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
                                    echo $p['enseignant'];
                            ?>
                            </p>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Etat de validation :</h5>
                            <p><?=$p['etatdevalidation']?>
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

</body>

</html>