<?php
session_start();              //ouverture de la session.
require_once 'db.php';

if(!isset($_SESSION['user']))
{
    header('Location:index3.php'); 
    die();
}

$email = $_GET['emetu'];

$profile = $bdd->prepare("SELECT * FROM cursus WHERE Email = '$email' ");
$profile->execute();
$data_cursus = $profile->fetchAll();

$profile2 = $bdd->prepare("SELECT * FROM etudiant WHERE email = '$email' ");
$profile2->execute();
$data_profile = $profile2->fetch();

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Usthb Grad : Mon Cursus</title>
      <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon-16x16.png">
    <link rel="stylesheet" href="../../css/style_profil.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

 <?php include('sidebar.php'); ?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Profile</h4>
                <ol class="breadcrumb">
                    <li><a href="#"> </a>Son Cursus | </li>
                    <li class="active"><a href="profil_consultable.php">Son Profil  | </a></li> 
                    <li class="active"><a href="mes_candidaturespfe.php">Mes Candidats   </a></li> 
                </ol>
            </div>
        </div>
        <!---
            <div class="col-md-12">
                <div class="container col-md-12">
                    <div class="container-fluid col-md-12">
                    
                    <div class="col-md-8" >
             
        
    </div>-->


        <div class="container justify-content-center">

            
<!------------------->            

 <!-- row -->
 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3>Mon Cursus</h3>
            <p class="text-muted">Cursus Universitaire></p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Année Universitaire</th>
                            <th>Année d'étude</th>
                            <th>Filière</th>
                            <th>Section</th>
                            <th>Groupe</th>
                            <th>Moy S1</th>
                            <th>Moy S2</th>
                            <th>Moy Annuelle</th>
                            
                        </tr>
                    </thead>
<?php 
foreach( $data_cursus as $d)
{
?>
                    <tbody>
                        <tr>
                            <td><?php echo $d['annéeuniv'] ?> </td>
                            <td><?php echo $d['annéeetude'] ?> </td>
                            <td><?php echo $d['filiere'] ?></td>
                            <td><?php echo $d['section'] ?></td>
                            <td><?php echo $d['groupe'] ?></td>
                            <td><?php echo $d['S1'] ?></td>
                            <td><?php echo $d['S2'] ?></td>
                            <td><?php echo $d['MoyenneAnn'] ?></td>                         
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!------------------->
   

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