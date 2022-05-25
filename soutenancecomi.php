<?php 
    session_start();             
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
$email=$_SESSION['user'];
    
if(isset($_GET['idpp']))
{
$id=$_GET['idpp'];
$_SESSION['iddd']=$id;
$pfe7= $bdd->prepare("SELECT * FROM `autorisation` WHERE idpfe = '$id' ");
$pfe7->execute();
$data_auto = $pfe7->fetch();
$pfe7= $bdd->prepare("SELECT * FROM `pfe` WHERE id = '$id' ");
$pfe7->execute();
$data_pfe = $pfe7->fetch();

$ens = $data_pfe['encadreur_ext'];
$etu1 = $data_pfe['etudiant1'];
$etu2 = $data_pfe['etudiant2'];

$pfe1= $bdd->prepare("SELECT * FROM `encadreur_externe` WHERE mail = '$ens' ");
$pfe1->execute();
$data_ens = $pfe1->fetch();

$pfe9= $bdd->prepare("SELECT * FROM `enseignant` WHERE emailusthb = '$email' ");
$pfe9->execute();
$data_ens2 = $pfe9->fetch();

$pfe2= $bdd->prepare("SELECT * FROM `etudiant` WHERE email = '$etu1' ");
$pfe2->execute();
$data_etu1 = $pfe2->fetch();

$pfe3= $bdd->prepare("SELECT * FROM `profile` WHERE email = '$etu1' ");
$pfe3->execute();
$data_profile1 = $pfe3->fetch();

$pfe4= $bdd->prepare("SELECT * FROM `etudiant` WHERE email = '$etu2' ");
$pfe4->execute();
$data_etu2 = $pfe4->fetch();

$pfe5= $bdd->prepare("SELECT * FROM `profile` WHERE email = '$etu2' ");
$pfe5->execute();
$data_profile2 = $pfe5->fetch();

}

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Usthb Grad</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_soutenance.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
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
                <a href="co_encadrement.php">
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
                <a href="notif.php">
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
                <h4 class="text">Accord de soutenance</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="prof.html"></a>Fiche
                    </li>
                    <li><a href="commissionsuivi.php">Commission de suivi </a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-8 justify-content-center">
            <div class="card mb-3" id="Fiche">

                <div class="row justify-content-center">
                    <div class="photo">
                        <img src="img/logo_50.png" alt="">

                    </div>
                </div>
                <br>
               
                <span id="fichesout">Accord de Soutenance </span>
                <hr>
<form method="POST" action="autorisationcomi.php">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Date </label>
                            <div class="col-sm-8">
                                <div class='input-group date'>
                                    <input disabled value="<?php echo $data_auto['date'] ?>" name="Dateautorisation" type="text" id="updatedDate" class="datepicker" placeholder="Séléctionnez une date" name="updatedDate" data-date-format="dd/mm/yyyy" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Numéro de Projet </label>
                            <div class="col-sm-8">
                                <input id="num" disabled value="<?php echo $data_pfe['codepfe'] ?> " name="codeprojet" type="text" placeholder="Numéro de projet" class="form-control form-control-line" >
                            </div>
                        </div>

                             <div class="form-group col-md-12">
                            <label class="col-sm-6">Projet avec commission de suivi ? </label>
                            <input name="commission" disabled value="<?php echo"oui" ?>" id="comi" type="text" class="form-control form-control-line" >

                        </div>

                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <div class="col-sm-12" id="section">Le(s) Etudiant(s) </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Nom </label>
                            <div class="col-sm-12">
                                <input name="Nom 1" disabled value="<?php echo $data_etu1['nom'] ?>" id="spec" type="text" placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Prénom </label>
                            <div class="col-sm-12">
                                <input name="Prenom 1" disabled value="<?php echo $data_etu1['prenom'] ?>" id="spec" type="text" placeholder="Prénom" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Nom </label>
                            <div class="col-sm-12">
                                <input  name="Nom 2" disabled value="<?php echo $data_etu2['nom'] ?>" id="spec" type="text" placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Prénom </label>
                            <div class="col-sm-12">
                                <input name="Prenom 2" disabled value="<?php echo $data_etu2['prenom'] ?>" id="spec" type="text" placeholder="Prénom" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <div class="col-sm-12">Titre du sujet </div>
                            <textarea rows="2" disabled value="" name="Titre" class="form-control form-control-line"><?php echo $data_pfe['intitule'] ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">Organisme d'accueil </div>
                            <textarea rows="4" disabled value="" name ="Organisme" class="form-control form-control-line"><?php echo $data_auto['Organisme'] ?> </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <div class="col-sm-12" id="section">Cadre résérvé au(x) promoteur(s) </div>
                        </div>
                        <div class="form-group col-md-7">
                            <label class="col-sm-12">Promoteur 1 </label>
                            <div class="col-sm-12">
                                <input disabled value="<?php echo $data_ens['nom_enc']." ".$data_ens ['pre_enc'];?>" name ="Promoteur1" id="num" type="text" placeholder="Nom et prénom du promoteur" class="form-control form-control-line">
                            </div>
                        </div>
     
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <div class="col-sm-12" id="section"> Avis de soutenance </div>
                        </div>
                        <br><br>
                        <div class="form-group col-md-6">

                            <label class="col-sm-12" id="avis"> <u>Favorable</u>   </label>
                            <div class="col-sm-12">
                                <li>
                                    <label id="lab">Etude Bibliographique</label>
                                    <input disabled value="<?php echo $data_auto['biblio'] ?>" type="checkbox" name="biblio" value="" id="flexCheckDefault">
                                </li>

                                <br>
                            </div>
                            <div class="col-sm-12">
                                <li>
                                    <label id="lab">Conception</label>
                                    <input disabled value="<?php echo $data_auto['conception'] ?>" type="checkbox" name="conception" value="" id="flexCheckDefault">
                                </li>

                                <br>
                            </div>
                            <div class="col-sm-12">
                                <li>
                                    <label id="lab">Document Finalisé</label>
                                    <input disabled value="<?php echo $data_auto['document'] ?>" type="checkbox" name="document" value="" id="flexCheckDefault">
                                </li>

                                <br>
                            </div>
                            <div class="col-sm-12">
                                <li>
                                    <label id="lab">Réalisation</label>
                                    <input disabled value="<?php echo $data_auto['realisation'] ?>" type="text" name="realisation" placeholder="80% min" style="margin-left: 20px; size: 2px;">
                                </li><br>

                            </div>
                            <div class="col-sm-12">
                                <li>
                                    <label id="lab">Autre</label>
                                    <textarea disabled value="<?php echo $data_auto['autre'] ?>" rows="5" name="autre" class="form-control form-control-line"></textarea>
                                </li>

                            </div>

                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-sm-12" id="avis"><u>Défavorable</u>   </label>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <li>
                                        <label id="lab">Motif</label>
                                        <textarea disabled value="<?php echo $data_auto['motif'] ?>" rows="15" name="motif" class="form-control form-control-line"></textarea>
                                    </li>
                                </div>

                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <div class="col-sm-12" id="section">Cadre résérvé à la commission de suivi s'il y a eu lieu. </div>
                        </div>
                        <div class="form-group col-md-7">
                            <label class="col-sm-12">Membre 1 </label>
                            <div class="col-sm-12">
                                <input disabled value="<?php echo $data_ens2['nom']." ".$data_ens2['prenom'] ?>" name="membre1" id="num" type="text" placeholder="Nom et prénom du membre" class="form-control form-control-line">
                            </div>
                        </div>


                        <div class="form-group col-md-7">
                            
                            <div class="col-sm-12">
                                <input name="membre2" id="num" type="text" placeholder="Nom et prénom du membre" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <div  class="col-sm-12" id="section"> Avis de soutenance </div>
                        </div>
                        <br><br>
                        <div class="form-group col-md-6">

                            <label class="col-sm-12" id="avis"> <u>Favorable</u>   </label>
                            <div class="col-sm-12">
                                <li>
                                    <label id="lab">Avis </label>
                                    <textarea  name="commentairecomi"  rows="5" class="form-control form-control-line"></textarea>
                                </li>

                            </div>

                        </div>
                        <div class="form-group col-md-6">

                            <label class="col-sm-12" id="avis"><u>Défavorable</u>   </label>
                            <div class="col-sm-12">


                                <div class="col-sm-12">
                                    <li>
                                        <label id="lab">Motif</label>
                                        <textarea  name="motifcomi"  rows="5" class="form-control form-control-line"></textarea>
                                    </li>

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

                    </div>





                </div>
            </div>

        </div>
    </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#updatedDate').datepicker();



        });
    </script>



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
    <script src="js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="css/datepicker.css">

</body>

</html>