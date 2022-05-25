<?php
session_start();              //ouverture de la session.
require_once 'db.php';


if (!isset($_SESSION['user'])) {
  header('Location:index3.php');
  die();
}

$email = ($_SESSION['user']);
$id =  htmlspecialchars($_GET['i']);

if (isset($id)) {
  $pfe = $bdd->prepare("SELECT * FROM pfe  WHERE id = '$id'");
  $pfe->execute();
  $data_pfe = $pfe->fetch(); 
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
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Proposer PFE</title>
      <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

    <link rel="stylesheet" href="css/styleFiche.css">  
      <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php include('sidebar.php')?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Projet</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href=""></a>Fiche du projet 
                </li>
                   

                </ol>
            </div>
        </div>
        <div class="col-md-8 justify-content-center" >
            <div class="card mb-3" id="FichePFE">
            <div class="row justify-content-center">
                    <div class="photo">
                        <img src="img/logo_50.png" alt="">

                    </div>
                </div><span id="tit">Fiche de proposition de PFE </span>
                <hr class="my-4">
                <br>
                <div class="card-body">
                <div class="form-group col-md-12" style="text-align: center; margin-top: 0px;">
                <span id="desc">Informations </span>
                </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-sm-12" id="info">Faculté</label>
                            <input name='faculté' disabled value="<?php echo $data_pfe['faculté'] ?>" class="form-control form-control-line"></input>
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12"id="info">Domaine</label>
                            <input name='domaine' disabled value="<?php echo $data_pfe['domaine'] ?>" class="form-control form-control-line"></input>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-12"id="info">Spécialités</label>
                            <input name='spécialités' disabled value="<?php echo $data_pfe['specialité'] ?>" class="form-control form-control-line"></input>
                        </div>
                        <br>
                        
                    
                        <br>
                        <div class="form-group col-md-12"><hr>
                            <label class="col-md-12"id="info">Intitulé</label>
                            <div class="col-md-12">
                                <textarea disabled value="" name="intitule" class="form-control form-control-line"><?php echo $data_pfe['intitule'] ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12"id="info">Résumé</label>
                            <div class="col-md-12">
                                <textarea disabled value="" name="resume" rows="5" class="form-control form-control-line"><?php echo $data_pfe['resume'] ?></textarea>
                            </div><hr>
                        </div>

                        
                        <div class="form-group col-md-12" style="text-align: center;">
                        <span id="desc">Description complète du sujet </span>
                        </div><br>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12"id="info">1- Description complète du sujet – travail attendu</label>
                            <div class="col-md-12">
                                <textarea disabled value=""  name="description" rows="5" class="form-control form-control-line"><?php echo $data_pfe['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12"id="info">2-Résultats attendus </label>
                            <div class="col-md-12">
                                <textarea disabled value="" name="objectif" rows="5" class="form-control form-control-line"><?php echo $data_pfe['objectif'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12"id="info">3-Plan de travail avec échéancier </label>
                            <div class="col-md-12">
                                <textarea disabled value="" name="taches" rows="5" class="form-control form-control-line"><?php echo $data_pfe['taches'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="col-md-12"id="info">4-Outils Utilisés</label>
                            <div class="col-md-12">
                                <textarea disabled value="" name="outils" rows="5" class="form-control form-control-line"><?php echo $data_pfe['outils'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="col-md-12"id="info">5-Références bibliographiques</label>
                            <div class="col-md-12">
                                <textarea disabled value="" name="ref" rows="5" class="form-control form-control-line"><?php echo $data_pfe['reference'] ?></textarea>
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