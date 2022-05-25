<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile1 = $bdd->prepare("SELECT * FROM reunion WHERE organisateur= '$emailusthb' ");
    $profile1->execute();
    $data_cop = $profile1->fetchAll();
    
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .blog-etu span {
            color: #F4A261;
            font-size: 14px;
            margin-right: 30px;
            margin-bottom: 20px;
        }
        
        .blog-info span {
            margin-right: 30px;
            margin-top: 20px;
        }
        
        #inf {
            font-size: 17px;
            color: black;
        }
        
        .blog-title h3 {
            font-style: normal;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        
        .blog-desc p {
            font-style: normal;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<?php include('sidebar.php')?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Mes réunions</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href=""></a>Réunions planifiées | </li>
                    <li><a href="mes_demandes_reunions.html">Demandes de réunions | </a></li>
                </ol>
            </div>
        </div>
        <div class="container">
             <div class="row">
        <?php 
foreach( $data_cop as $r)
{
    $pfe=$r['id_projet'];
    $profile1 = $bdd->prepare("SELECT * FROM pfe WHERE id = '$pfe' ");
    $profile1->execute();
    $data_reu = $profile1->fetch();

    if($data_reu['type_proj']==='externe')
    {
?>

                <div class="col-md-6">
                    <div class="row main-row p-2" style="margin-bottom: 40px; margin-right: 40px;">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div>
                                <img src="img/calendar (1).png" alt="" class="col-md-12 " style="width: 180px; opacity: .4; margin-top: 150px;">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-top: 15px;">
                            <div class="blog-title">
                                <h3> <?php echo $r['titre'] ?></h3>
                            </div>
                            <div class="blog-etu">
                                <span>Etudiant 1</span>
                                <span>Etudiant 2</span>
                            </div>


                            <hr class="my-4">
                            <div class="blog-info">
                                <p> <span id="inf"> Date de la réunion :</span> <span><?php echo $r['datereu'] ?></span> </p>
                                <p> <span id="inf">Heure de la réunion :</span> <span><?php echo $r['heurereu'] ?></span> </p>
                                <p> <span id="inf">Salle de la réunion :</span> <span><?php echo $r['lieu'] ?></span> </p>
                                <p><span id="inf">Message de la réunion : </span><span><?php echo $r['description'] ?> </span> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{
                    echo '';
                } } ?>
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