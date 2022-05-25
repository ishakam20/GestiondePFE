<?php
session_start();              //ouverture de la session.
require_once 'db.php';
include('functions.php');
//include("../Accueil/menu_principal.php");
if (!isset($_SESSION['user'])) {
    header('Location:login5.php');
    die();
}
$email = ($_SESSION['user']);
$nom =  htmlspecialchars($_GET['n']);
$prénom =  htmlspecialchars($_GET['p']);
$type =  htmlspecialchars($_GET['t']);

if (isset($nom) && isset($prénom) && isset($type)) {
    $email = ($_SESSION['user']);
    $etudiant = $bdd->prepare("SELECT * FROM etudiant  WHERE email = '$prénom.$nom@etu.usthb.dz'");
    $etudiant->execute();
    $data_etudiant = $etudiant->fetch();

    $statement = $bdd->prepare("SELECT * FROM `profile` WHERE email = '$prénom.$nom@etu.usthb.dz'");
    $statement->execute();
    $data_profile = $statement->fetch();

    $emailetu="$prénom.$nom@etu.usthb.dz";
}



$stmt = "SELECT * from etudiant where email = '$email' ";
$data = $bdd->query($stmt);
$data_stmt = $data->fetch();                //vérifier si l'email du user connecté existe dans la table étudiant *si oui, alors ne pas l'autoriser à voir le cursus d'un autre étudiant
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Usthb Grad : Profil</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/img4.png">
    <link rel="stylesheet" href="css/style_profil.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

    <?php include('sidebar.php') ?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
             <?php if(!empty($nom) && !empty($prénom)) { ?>
                <h4 class="text">Profile</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="prof.html"></a>Profil étudiant | </li>
                   
                        <li><a href="cursus.php?emetu=<?=$emailetu?>">Son Cursus |</a></li>
                        <li><a href="mes_candidaturespfe.php">Mes Candidats </a></li>
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
                                    <h5><?php echo $data_etudiant['nom'] . "&nbsp" . $data_etudiant['prenom']; ?></h5>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mt-3">
                    <form class="form-horizontal form-material">
                        <h3>Social Media</h3>
                        <div class="group ">
                            <label class="col-md-12"><i class="fab fa-github "></i>Mon GitHub</label>
                            <div class="col-md-12">
                                <text type="text" class="form-control form-control-line"><a href="<?php echo $data_profile['Github']; ?>"><?php echo $data_profile['Github']; ?></a></text>
                            </div>
                        </div>
                        <div class="group">
                            <label class="col-md-12"><i class="fab fa-linkedin-in"></i>Mon LinkedIn</label>
                            <div class="col-md-12">
                                <text type="text" class="form-control form-control-line"><a href="<?php echo $data_profile['Linkedin']; ?>"><?php echo $data_profile['Linkedin']; ?></a></text>
                            </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-blog"></i>Mon site internet</label>
                            <div class="col-md-12">
                                <text type="text" class="form-control form-control-line"><a href="<?php echo $data_profile['Website']; ?>"><?php echo $data_profile['Website']; ?></a></text>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3" id="personal_info">
                    <div class="card-body">
                        <h3>Informations personnelles</h3>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom et Prénom</label>
                                <div class="col-md-12">
                                    <text type="text" class="form-control form-control-line"><?php echo $data_etudiant['nom'] . "&nbsp" . $data_etudiant['prenom']; ?></text>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Specialité</label>
                                <div class="col-md-12">
                                    <text type="text" class="form-control form-control-line"><?php echo $data_etudiant['specialite'] ?></text>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-12">Niveau d'étude</label>
                                <div class="col-md-12">
                                    <text type="text" class="form-control form-control-line"><?php echo $data_etudiant['annescholaire'] ?></text>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Adresse usthb</label>
                                <div class="col-md-12">
                                    <text type="email" class="form-control form-control-line"><?php echo $data_etudiant['email'] ?></text>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body" id="extra-info">
                        <div class="row ">
                            <div class="group col-md-6">
                                <label for="email" class="col-md-12"> Adresse supplmentaire</label>
                                <div class="col-md-12">
                                    <text type="email" class="form-control form-control-line"><?php echo $data_profile['autre_email'] ?></text>
                                </div>
                            </div>
                            <div class="group col-md-6">

                                <label class="col-md-12"> Numero de telephone </label>
                                <div class="col-md-12">
                                    <text type="text" class="form-control form-control-line"><?php echo $data_profile['telephone'] ?></text>
                                </div>
                            </div>
                            <div class="group col-md-12">
                                <label class="col-md-12"> Bio </label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" readonly><?php echo $data_profile['about'] ?></textarea>
                                </div>
                            </div>
                            <div class="group col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(getBinome($bdd, $email) === "$prénom.$nom@etu.usthb.dz") {?>
               <a href= "profile_etudiant_consultable.php?dissoudre=true">
                 <button class="btn btn-primary">Dissoudre binome</button> </a>
             <?php }?>
            </div>

        </div>
        
    </div>
    <?php }else 
        {
           echo "<div class=\"alert alert-warning\" role=\"alert\">Vous n'avez pas de binôme pour le moment.</div> ";
        } 
        ?>
    </div>

    


    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/profil.js"></script>

</body>

</html>