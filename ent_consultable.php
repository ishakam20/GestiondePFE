<?php
session_start();              //ouverture de la session.
require_once 'db.php';


if (!isset($_SESSION['user'])) {
  header('Location:index3.php');
  die();
}

$email = ($_SESSION['user']);
$nom =  $_GET['n'];
$prénom =  $_GET['p'];
$type =  $_GET['t'];

if (isset($nom) && isset($prénom) && isset($type)) {
  $mail = $nom.$prénom ;
  $profile = $bdd->prepare("SELECT * FROM encadreur_externe WHERE mail = '$mail@usthb.dz'");
  $profile->execute();
  $data_profile = $profile->fetch();

  $em=$data_profile['mail'];

  $profile2 = $bdd->prepare("SELECT * FROM `profile` WHERE email = '$em' ");
  $profile2->execute();
  $data_profile2 = $profile2->fetch();

  $ent= $data_profile['id_ent']; 

  $profile3 = $bdd->prepare("SELECT * FROM `entreprise` WHERE id_ent = '$ent' ");
  $profile3->execute();
  $data_profile3 = $profile3->fetch();
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
    <link rel="stylesheet" href="css/style_profil.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <h4 class="text">Profile</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="prof_ens.php"></a>Mes Infos  | </li>
                    
                </ol>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="profil-pic-div">
                                <div class="mt-3">
                                    <h5>Nom Prenom</h5>
                                    <?php echo $data_profile['nom_enc']."\n" ;
                                          echo $data_profile['pre_enc'] ; ?>
                                </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                            <img src="img/img2.png" alt="Admin"  id="photo" class="rounded-circle" width="150">
                            <input type="file" id="pic_file" name="fileimg" class="input-file">
                            <label for="pic_file" class="label-file" id="upload-btn">choisir une photo</label>
                            </form>

                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-3">

                        <h3>Social Media</h3>
                        <div class="group ">
                            <label class="col-md-12"><i class ="fab fa-github "></i>GitHub</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="<?php echo $data_profile2['Github'] ; ?>" placeholder="link" class="form-control form-control-line">  </div>
                        </div>
                        <div class="group">
                            <label class="col-md-12"><i class ="fab fa-linkedin-in"></i>LinkedIn</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="<?php echo $data_profile2['Linkedin'] ; ?>" placeholder="link" class="form-control form-control-line"> </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-blog"></i>personal website</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="<?php echo $data_profile2['Website'] ; ?>" placeholder="link" class="form-control form-control-line">  </div>
                        </div>
                        
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3"id="personal_info">
                    <div class="card-body">
                        <h3>Personal Informations</h3>
                        <div class="row">                    
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['nom_enc'] ; ?> class="form-control form-control-line"> 
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Prénom</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['pre_enc'] ; ?> class="form-control form-control-line"> 
                                    
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['mail'] ; ?> class="form-control form-control-line"> </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-12">Organisme</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile3['nom_ent'] ; ?> class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Direction </label>
                                <div class="col-md-12">
                                    <input type="email" disabled value=<?php echo $data_profile['direction'] ; ?> class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Département</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value=<?php echo $data_profile['departement'] ; ?> class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" >
                    <div class="card-body" id="extra-info">
                        <div class="row ">
                            <div class="group col-md-6">
                                <label for="email" class="col-md-12"> Adresse supplmentaire</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value="<?php echo $data_profile2['autre_email'] ; ?>" placeholder="Entrez votre adresse" class="form-control form-control-line"> </div>
                            </div>
                            <div class="group col-md-6">

                                <label class="col-md-12"> Numero de telephone </label>
                                <div class="col-md-12">
                                    <input type="text"  disabled value="<?php echo "" ; ?>" placeholder="" > </div>
                            </div>
                            <div class="group col-md-12">
                                <label class="col-md-12"> Bio </label>
                                <div class="col-md-12">
                                    <textarea rows="6" disabled value="" class="form-control form-control-line "> <?php echo $data_profile2['about'] ; ?> </textarea>
                                </div>
                            </div>                                                       
                        </div>
                    </div>
                </div>
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