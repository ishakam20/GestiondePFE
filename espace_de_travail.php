<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare('SELECT * FROM enseignant WHERE emailusthb = ? ');
    $profile->execute(array($emailusthb));
    $data_profile = $profile->fetch();
    
    $pfe5= $bdd->prepare("SELECT * FROM `pfe`WHERE enseignant = ? AND type_proj = 'interne' AND etatdupfe = 'prit'  ");
    $pfe5->execute(array($emailusthb));
    $data_pfe = $pfe5->fetchAll();

    $_SESSION['auto']='true';

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Espace de travail</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/affiche.css">
    <link rel="stylesheet" href="css/espace.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php include('sidebar.php');?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Encadrement</h4>
                <ol class="breadcrumb">
                    <li><a href="encadrement.php">Mes projets |</a></li>
                    <li><a href="mes_binomes.php">Mes binômes |</a></li>
                    <li class="active">
                        <a href="espace_de_travail.php"> </a>Espace de travail | 
                    </li>
                    <li><a href="mes_reunions.php">Mes réunions |</a></li>
                    <li><a href="convo_promoteur.php">Mes convocations</a></li>
                </ol>
            </div>
        </div>
        <?php 
        if(isset( $_GET['planif']) && $_GET['planif']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  La reunion a été programmée!</div>";
            }elseif(isset( $_GET['planif']) && $_GET['planif']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  La reunion n'a pas été programmée!</div>";

            }
            if(isset( $_GET['auto']) && $_GET['auto']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  L'autorisation a bien été envoyée!</div>";
            }elseif(isset( $_GET['auto']) && $_GET['auto']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  Erreur d'envoi </div>";

            }
        ?>
        <div class=" courses-container">
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
$nom = $data_etu['nom'] ;
$prénom = $data_etu['prenom'] ;
$nom2 = $data_etu2['nom'];
$prénom2 = $data_etu2['prenom'];
$profile_consultable = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom&p=$prénom";
$profile_consultable2 = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom2&p=$prénom2";
           ?>
           
            <div class="row justify-content-center">
                <div class="course col-md-8">
                    <div class="col-sm-5 course-preview">
                        <h4 class="nom"><?php  echo $p['intitule']?></h4>

                    </div>
                    <div class="row justify-content-center col-md-8 course-info">
                        <span class="col-md-12"> Binome :<?php echo "<a href= \"$profile_consultable\">" . $nom . " " . $prénom . "</a>"; ?>
                        <?php echo "<a href= \"$profile_consultable2\">" . $nom2 . " " . $prénom2 . "</a>"; ?>
                        <span class="progress-text col-md-6">
                        </span>
                        </span>
                        <span class="col-md-12">Domaine : <?php echo $p['domaine'];?></span>
                        <span class="col-md-12">Niveau : <?php echo $data_etu['annescholaire'];?></span>
                        <div class="form-group col-md-6">
                        <a href="soutenance.php?idp=<?=$p['id']?>"><button class="btn" id="boutton">Soutenance</button></a>
                        </div>

                       
                        <div class="form-group col-md-6">
                            <button class="btn" id="readMore" data-toggle="modal" data-target="#readMorePopup<?=$p['id']?>">Réunion
                            </button>


                        </div>

                    </div>

                </div>


            </div>

        </div>
        
      

    <div class="modal fade" id="readMorePopup<?=$p['id']?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class=" popup-title">
                        <h4 class="modal-title">Réunion</h4>
                    </div>

                    <div class=" popup-img">
                        <img src="img/icon.png" style="margin-left: 70px;">
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close" id="closeBtn">
                        <span aria-hidden="true">x</span>
                    </button>


                </div>
                <div class="modal-body">
                    <div class="blog-titre">
                    <form method="POST" action="reunion2.php?id_pfe3=<?=$p['id']?>&etudiant1=<?=$p['etudiant1']?>&etudiant2=<?=$p['etudiant2']?>">
                        <h5 class="titre">Titre de la réunion</h5>
                        <div class="col-md-12">
                            <textarea name="titre" rows="2" class="form-control form-control-line"></textarea>
                            <hr class="my-4">
                        </div>

                    </div>

                    <div class="blog-info">
                        <h5 class="titre">Infos </h5>
                        <div class="form-group col-md-12">
                       
                            <label class="col-sm-12">Date </label>
                            <div class="col-sm-12">
                                <input id="num" name="date" type="date" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-12">Heure </label>
                            <div class="col-sm-12">
                                <input id="num" name="heure" type="time" placeholder="Emargement" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-12"> Lieu </label>
                            <div class="col-sm-12">
                                <input id="num" name="lieu" type="text" placeholder="Salle" class="form-control form-control-line">
                            </div>
                        </div>


                    </div>

                    <hr class="my-4">
                    <div class="blog-desc">
                        <h5 class="titre">Description de la réunion :</h5>
                        <div class="col-md-12">
                            <textarea rows="4" name="description" class="form-control form-control-line"></textarea>

                        </div>
                        <hr class="my-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info" id="reu"  style=" border: none">Envoyer</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    </form>
    <?php } ?>

    <div class="modal fade" id="popupEtat<?=$p['id']?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class=" popup-title">
                        <h4 class="modal-title">Renseigner état d'avancement</h4>
                    </div>

                    <div class=" popup-img">
                        <img src="img/icon.png" style="margin-left: 70px;">
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close" id="closeBtn">
                        <span aria-hidden="true">x</span>
                    </button>


                </div>
                <div class="modal-body">
                <form method="POST" action="etatav.php?id_pfeee=<?=$p['id']?>">
                    <div class="blog-info">
                      
                        <h5 class="titre">Entrevue 1 </h5>
                        <div class="form-group col-md-12">
                            <label class="col-sm-12">Date </label>
                            <div class="col-sm-12">
                                <input id="num" name="date1" type="date" placeholder="Emargement" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-12">Heure </label>
                            <div class="col-sm-12">
                                <input id="num" name=heure1 type="time" placeholder="Emargement" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-12">Etat d'avancement </label>
                            <div class="col-sm-12">
                                <input type="text" name="etatav1" placeholder="Etat d'anacement (%)" class="form-control form-control-line">
                            </div>
                            <hr class="my-4">
                        </div>


                    </div>
                    <div class="blog-desc">

                        <h5 class="titre">Remarque</h5>
                        <div class="col-md-12">
                            <textarea rows="4" name="remarque1" class="form-control form-control-line"></textarea>
                            <hr>
                        </div>
                    </div>
                    <h5 class="titre">Entrevue 2 </h5>
                    <div class="form-group col-md-12">
                        <label class="col-sm-12">Date </label>
                        <div class="col-sm-12">
                            <input id="num" name="date2" type="date" placeholder="Emargement" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-sm-12">Heure </label>
                        <div class="col-sm-12">
                            <input id="num" name="heure2" type="time" placeholder="Emargement" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-sm-12">Etat d'avancement </label>
                        <div class="col-sm-12">
                            <input type="text" name="etatav2" placeholder="Etat d'anacement (%)" class="form-control form-control-line">
                        </div>

                    </div>


                </div>
                <div class="blog-desc">
                    <div class="col-md-12">
                        <h5 class="titre">Remarque</h5>
                        <div class="col-md-12">
                            <textarea rows="4" name="remarque2" class="form-control form-control-line"></textarea>

                        </div>
                    </div>

                </div>



                <div class="group col-md-12">
                    <hr class="my-4">
                    <div class="col-sm-12">
                        <div class="sub">
                            <button class="btn btn-success" id="btn-info" style="float: right;">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>

        </div>
    </div>
    </div>


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