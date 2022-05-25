<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare('SELECT * FROM enseignant WHERE emailusthb = ? ');
    $profile->execute(array($emailusthb));
    $data_ens = $profile->fetch();
    
    $pfe5= $bdd->prepare("SELECT * FROM `pfe`WHERE enseignant = ? AND type_proj='interne' AND etatdupfe='prit' ");
    $pfe5->execute(array($emailusthb));
    $data_pfe = $pfe5->fetchAll();

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Mes Binômes</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mes_binomes.css">
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
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Accueil</span>
                </a>
                <span class="tooltip">Accueil</span>
            </li>
            <li>
                <a href="prof_ens.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profil</span>
                </a>
                <span class="tooltip">Profil</span>
            </li>
            <li>
                <a href="proposer.php">
                    <i class='bx bx-upload'></i>
                    <span class="links_name">Proposer un PFE</span>
                </a>
                <span class="tooltip">Proposer un PFE</span>
            </li>
            <li>
                <a href="mes_candidaturespfe.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Candidats</span>
                </a>
                <span class="tooltip">Candidats</span>
            </li>
            <li>
                <a href="accueil_ens.php">
                    <i class='bx bx-file-blank'></i>
                    <span class="links_name">Encadrement</span>
                </a>
                <span class="tooltip">Encadrement</span>
            </li>
            <li>
                <a href="espace_de_travail.php">
                    <i class='bx bx-library'></i>
                    <span class="links_name">Co-encadrement</span>
                </a>
                <span class="tooltip">Co-encadrement</span>
            </li>
            <li>
                <a href="mes_candidaturespfe.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Commission de suivi</span>
                </a>
                <span class="tooltip">Commission de suivi</span>
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
                    <i class='bx bx-check'></i>
                    <span class="links_name">Commission validation</span>
                </a>
                <span class="tooltip">Commission de validation</span>
            </li>
            <li>
                <a href="commissionsuivi.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name">Commission de suivi</span>
                </a>
                <span class="tooltip">Commission de suivi</span>
            </li>
            <li>
                <a href="annonces_admin.php">
                    <i class='bx bxs-megaphone'></i>
                    <span class="links_name">Annonces</span>
                </a>
                <span class="tooltip">Annonces</span>
            </li>
            <li>
                <a href="annonces_admin.php">
                    <i class='bx bxs-bell-plus'></i>
                    <span class="links_name">Notifications</span>
                </a>
                <span class="tooltip">Notifications</span>
            </li>


        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="deconnexion.php"><i class='bx bx-log-out' id="log_out"></i></a>


            </div>
        </div>
    </div>
</div>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Encadrement</h4>
                <ol class="breadcrumb">
                <li><a href="encadrement.php">Mes projets |</a></li>
                    <li><a href="mes_binomes.php"></a>Mes binômes |</li>
                    <li >
                        <a href="espace_de_travail.php"> Espace de travail |</a> 
                    </li>
                    <li><a href="mes_reunions.php" class="active">Mes réunions |</a></li>
                    <li><a href="convo_promoteur.php">Mes convocations</a></li>
                </ol>
            </div>
        </div>
<?php 

foreach($data_pfe as $d)
{
$etu1=$d['etudiant1'] ;
$etu2=$d['etudiant2'] ;

$profile2 = $bdd->prepare("SELECT * FROM etudiant WHERE email = '$etu1' ");
$profile2->execute();
$data_etu1 = $profile2->fetch();

$profile3 = $bdd->prepare("SELECT * FROM etudiant WHERE email = '$etu2' ");
$profile3->execute();
$data_etu2 = $profile3->fetch();

$nom=$data_etu1['nom'];
$nom2=$data_etu2['nom'];
$prénom=$data_etu1['prenom'];
$prénom2=$data_etu2['prenom'];

$profile_consultable = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom&p=$prénom";
$profile_consultable2 = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom2&p=$prénom2";

?>
        <div class="container">
            <div class="row justify-content-center" id="titre"> <?php echo $d['intitule']?> </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="profile-card">
                        <div class="card-header">
                            <div class="pic">
                                <img src="img/img2.png" alt="">
                            </div>
                            <div class="name"><?php echo $data_etu1['nom']." ".$data_etu1['prenom'] ?></div>
                            <div class="niv">Niveau : <?php echo $data_etu1['annescholaire']?> </div>
                            <div class="dom">Domaine : <?php echo $d['domaine']?> </div>
                            <?php echo "<a href= \"$profile_consultable\" class='profil' > Voir profil </a>"; ?>
                        </div>

                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="profile-card">
                        <div class="card-header">
                            <div class="pic">
                                <img src="img/img1.jpg" alt="">
                            </div>
                            <div class="name"><?php echo $data_etu2['nom']." ".$data_etu2['prenom'] ?></div>
                            <div class="niv">Niveau : <?php echo $data_etu2['annescholaire']?></div>
                            <div class="dom">Domaine : <?php echo $d['domaine']?> </div>
                            <?php echo "<a href= \"$profile_consultable2\" class='profil' > Voir profil </a>"; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div><hr>
        <?php } ?>
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

</html>