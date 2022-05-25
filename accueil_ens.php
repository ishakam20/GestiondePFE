<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    
    $pfe5= $bdd->prepare("SELECT * FROM `pfe`WHERE type_proj='externe' ");
    $pfe5->execute();
    $data_pfe = $pfe5->fetchAll();

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Accueil </title>
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
<?php include('sidebar.php');?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Accueil</h4>
                <ol class="breadcrumb">
                    
                   <?php include('menunotif.php'); ?>
                   <li class="active"><a href="#"></a> Propositions |</li>
                   <li ><a href="candidatures.php">Mes Candidatures</a>  </li>
                </ol>
               
            </div>
        </div> <?php 
        if(isset( $_GET['candi']) && $_GET['candi']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  La candidature a bien été envoyé !</div>";
            }elseif(isset( $_GET['candi']) && $_GET['candi']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  La candidature n'a pas été envoyé</div>";

            }

        ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  Les projets auxquels vous candidatez seront en attente jusqu'à la recéption de l'accord de l'entreprise.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="topnav">
                                    <input type="text" name="search" class="searchbox-input" placeholder="Search.." onkeyup="buttonUp();" required>
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
$em=$p['encadreur_ext'];
$pfe6 =$bdd->prepare( "SELECT * FROM `encadreur_externe` WHERE mail = '$em' ;");
$pfe6->execute();
$data_ent= $pfe6->fetch();

$nom=$data_ent['nom_enc'] ;
$prénom=$data_ent['pre_enc'] ;
$profile_consultable = "http://localhost/lyd/ent_consultable.php?t=ent&n=$nom&p=$prénom";
           ?>
           <div class="carte">
                <div class="row main-row p-4">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="blog-img" style="  text-align: center;
 background:none;">
                        <img src="6308.jpg" alt="projet" class="img-fluid" style=" box-shadow:none; opacity:2;    height: 200%;
   width: 100%;">
                    </div>
                    <div class="group col-md-4">
                            <div class="col-sm-12">
                                <div class="sr">
                                
                                <button class="btn btn-outline-dark" style="background : #4B86AA; color: white; border :none; margin-left:20px; font-size:15pt" id="sr" data-toggle="modal"
                                 data-target="#msgpopup">Candidater</button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-title">
                        <a class="btn" id="popup" style="font-family:'Poppins, sans-serif'; font-size:22pt; color: #465472" data-toggle="modal" data-target="#readMorePopup<?=$p['id']?>"><?php echo $p['intitule'] ?></a>
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
                </div></div>
            </div>
            
            


          
            <div class="modal fade" id="readMorePopup<?=$p['id']?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:150%; margin-left:-100px">
                    <div class="modal-header">
                    
                        <div class=" popup-img">
                            <img src="img/icon.png">
                        </div>
                        
                    </div>
                    <div class="modal-body">
                        <div class=" popup-title">
                            <h4 class="modal-title"> <?=$p['intitule']?></h4>
                        </div>
                        <div class="blog-date"><br>
                            <span><?=$p['date']?> </span>
                        </div>
                        <div class="blog-info"><br>
                            <span>Type: <?=$p['type_proj']?> </span>
                            <span>Faculté: <?=$p['faculté']?> </span><br>
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
                            <h5>Encadreur :</h5>
                            <p><?php
                                echo "<a href= \"$profile_consultable\">" . $nom . " " . $prénom . "</a>";
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
        
        <div class="modal fade" id="msgpopup">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <div class=" popup-img">
                            <img src="img/icon.png">
                        </div>
                        
                    </div>
                    <form method="POST" action="candidater.php?ii=<?=$d?>">
                    <div class="modal-body">
                        <div class="blog-info">
                            <h5>Entrez le message de candidature</h5>
                            <textarea name="message" cols="6" rows="4" class="form-control form-control-line" id="motif"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btn-info">Envoyer</button>
                    </div>
                    </form>
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