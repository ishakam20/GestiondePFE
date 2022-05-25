<?php 
    session_start();             
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
$emailusthb = ($_SESSION['user']);
if(isset($_GET['d']))
{
$id=$_GET['d'];
$jury = $bdd->prepare("SELECT * FROM `convocation-soutenance` WHERE mail_rec = '$emailusthb' OR id_projet = '$id' ");
$jury->execute();
$data_conv = $jury->fetch();

$jury4 = $bdd->prepare("SELECT * FROM soutenance_jury WHERE id_projet = '$id' ");
$jury4->execute();
$data_jury = $jury4->fetch();

$president=$data_jury['president'];
$membre=$data_jury['membre'];

$jury5 = $bdd->prepare("SELECT * FROM enseignant WHERE emailusthb = '$membre' ");
$jury5->execute();
$data_membre = $jury5->fetch();

$jury5 = $bdd->prepare("SELECT * FROM enseignant WHERE emailusthb = '$president' ");
$jury5->execute();
$data_pres = $jury5->fetch();

$jury2 = $bdd->prepare('SELECT * FROM enseignant WHERE emailusthb = ? ');
$jury2->execute(array($emailusthb));
$data_ens = $jury2->fetch();

$jury3 = $bdd->prepare(" SELECT * FROM pfe WHERE id = '$id' ");
$jury3->execute();
$data_pfe = $jury3->fetch();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Usthb Grad</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inv.css" />

    <link href="https://fonts.googleapis.com/css?family=Tangerine&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet" />
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
                <a href="encadrement.php">
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
                <h4 class="text">Ma convocation</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="prof.html"></a>Convocation  </li>
                    <li>
                </ol>
            </div>
        </div>
        <div class="container justify-content-center">
            <div class="card">
                <div class="front">
                    <div class="row justify-content-center">
                        <div class="photo">
                            <img src="img/logo_50.png">

                        </div>
                    </div>
                    <h1>Convocation de soutenance</h1>
                    <span>A Monsieur/Madame : <?php echo $data_ens['nom']." ".$data_ens['prenom'] ?></span>
                    <p><?php echo $data_pfe['intitule'] ?> </p>
                </div>

                <div class="back">
                    <h1>Informations sur la soutenance </h1>
                    <span style="font-size: 20px;"><?php echo $data_pfe['intitule'] ?></span>
                    <br>
                    <p> Nous avons l'honneur de vous présenter cette convocation pour vous informer que vous faites partie du jury sur le projet dont l'intitulé est indiqué ci-dessus </p>

                    <span>Date de soutenance : <span> <?php echo $data_conv['date_stn'] ?></span></span><br>
                    <span>Heure de soutenance : <span> <?php echo $data_conv['heure_stn'] ?></span></span><br>
                    <span>Lieu de soutenance : <span> <?php echo $data_conv['salle'] ?></span></span><br>
                    <h1>Les jurys :</h1>
                    <span> Président de jury : <?php echo $data_pres['nom']." ".$data_pres['prenom'] ?></span>
                    <br>
                    <span> Membre de jury : <?php echo $data_membre['nom']." ".$data_membre['prenom'] ?></span>
                    <br>



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