<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare('SELECT * FROM enseignant WHERE emailusthb = ? ');
    $profile->execute(array($emailusthb));
    $data_profile = $profile->fetch();
    
    $pfe5= $bdd->prepare("SELECT * FROM `pfe`WHERE enseignant = ? AND type_proj = 'externe' AND etatdupfe = 'prit'  ");
    $pfe5->execute(array($emailusthb));
    $data_pfe = $pfe5->fetchAll();

    $_SESSION['auto']='true';

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Usthb Grad</title>
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
<?php include('sidebar.php'); ?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Commission de suivi</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="espace_de_travail.php"> </a>Espace de travail 
                    </li>
                   
                </ol>
            </div>
        </div>
        <?php 
        if(isset( $_GET['planifs']) && $_GET['planifs']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  La reunion a été programmée!</div>";
            }elseif(isset( $_GET['planifs']) && $_GET['planifs']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  La reunion n'a pas été programmée!</div>";

            }
        if(isset( $_GET['auto2']) && $_GET['auto2']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  L'autorisation a bien été envoyée!</div>";
            }elseif(isset( $_GET['auto2']) && $_GET['auto2']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  Erreur d'envoi </div>";

            }
            if(isset( $_GET['etat']) && $_GET['etat']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  L'etat d'avancement a bien été envoyé!</div>";
            }elseif(isset( $_GET['etat']) && $_GET['etat']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  Erreur d'envoi </div>";

            }
        ?>
        <div class=" courses-container">
        <?php
foreach($data_pfe as $p){ 
$d = $p['id'];
$etu = $p['etudiant1'];
$intitule = $p['intitule'];
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
$profile_consultable = "http://localhost:8080/mes%20php/login/profile_consultable.php?t=etu&n=$nom&p=$prénom";
$profile_consultable2 = "http://localhost:8080/mes%20php/login/profile_consultable.php?t=etu&n=$nom2&p=$prénom2";
$pfe_consultable = "http://localhost:8080/mes%20php/login/fichepfe.php?i=$d"; 
 ?>
            <div class="row justify-content-center">
                <div class="course col-md-8">
                    <div class="col-sm-5 course-preview">
                        <h4 class="nom"> 
                        <div class="form-group col-md-12">
                          
                            <h4 data-toggle="modal" data-target="#readMorePopup<?=$p['id']?>" class="nom" style="cursor: pointer; color:black;"><?php  echo $p['intitule']?></h4>

                        </div>
                        </h4>

                    </div>
                    <div class="row justify-content-center col-md-8 course-info">
                        <span class="col-md-12"> Binome :<?php echo "<a href= \"$profile_consultable\">" . $nom . " " . $prénom . "</a>"; ?>
                        <?php echo "<a href= \"$profile_consultable2\">" . $nom2 . " " . $prénom2 . "</a>"; ?>
                        <span class="progress-text col-md-6">
                        </span>
                        </span>
                        <span class="col-md-12">Domaine : <?php echo $p['domaine'];?></span>
                        <span class="col-md-12">Niveau : <?php echo $data_etu['annescholaire'];?></span>
                        <div class="form-group col-md-4">
                        <a href="soutenancecomi.php?idpp=<?=$p['id']?>"><button class="btn" id="boutton">Soutenance</button></a>
                        </div>

                        <div class="form-group col-md-4">
                            <button class="btn" id="popup" data-toggle="modal" data-target="#popupEtat<?=$p['id']?>">Avancement</button>
                        </div>
                        <div class="form-group col-md-4">
                            <button class="btn" id="readMore" data-toggle="modal" data-target="#readMorePopu<?=$p['id']?>">Réunion
                            </button>


                        </div>

                    </div>

                </div>


            </div>

        </div>
    
        <div class="modal fade" id="readMorePopup<?=$p['id']?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:150%; opacity :0.9; margin-left:-30%">
                <div class="modal-header"style="align-self:center; padding-bottom:-50px">
                
                <div class=" popup-img" >
                    <img src="img/icon.png" >
                </div>

            </div>
                    <div class="modal-body"><div class=" popup-title">
                            <h4 class="modal-title"><?=$p['intitule']?></h4><br>
                        </div>
                        <div class="blog-date">
                            <span><?=$p['date']?> </span><br>
                        </div>
                        <div class="blog-info">
                            <span>Type: <?=$p['type_proj']?> </span>
                            <span>Faculté: <?=$p['faculté']?> </span><br>
                            <span>Specialité: <?=$p['specialité']?> </span>
                            <span>Domaine: <?=$p['domaine']?></span><br>
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
                                if($p['etudiant2'] != NULL){
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
                            <h5>Encadreur externe :</h5>
                            <p><?php
                                    echo $p['encadreur_ext'];
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
        
      

    <div class="modal fade" id="readMorePopu<?=$p['id']?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content"style="width:120%; margin-left:-50px">
            <div class="modal-header"style="align-self:center; margin-bottom:-5%">
                
                <div class=" popup-img" >
                    <img src="img/icon.png" >
                </div>

            </div>
                <div class="modal-body">  <div class=" popup-title">
                        <h4 class="modal-title">Réunion</h4><hr>
                    </div>
                    <div class="blog-titre">
                    <form method="POST" action="reunion3.php?id_pfe3=<?=$p['id']?>&etudiant1=<?=$p['etudiant1']?>&etudiant2=<?=$p['etudiant2']?>">
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
                            <button type="submit" class="btn btn-info" id="reu" style=" border: none">Envoyer</button>
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
            <div class="modal-content"style="width:120%; margin-left:-50px">
                <div class="modal-header"style="align-self:center; margin-bottom:-5%">
                
                    <div class=" popup-img" >
                        <img src="img/icon.png" >
                    </div>

                </div>
                <div class="modal-body"> <div class=" popup-title">
                        <h4 class="modal-title">Renseigner état d'avancement</h4><hr><br>
                    </div>
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
                    <div class="col-md-12">
                            <button type="submit" class="btn btn-info" id="reu"  style=" border: none; margin-bottom:8px;margin-top:-5px">Envoyer</button>
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