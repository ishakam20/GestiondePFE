<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare("SELECT * FROM promoteur WHERE co_promoteur1 = '$emailusthb' OR co_promoteur2='$emailusthb'");
    $profile->execute();
    $data_cop = $profile->fetchAll();
    
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
                        <a href=""></a>Réunions planifiées  </li>
                
                </ol>
            </div>
        </div>
        <div class="container">
 
        <div class="row">
        <?php 
foreach( $data_cop as $r)
{
    $pfe=$r['id_projet'];
    $profile1 = $bdd->prepare("SELECT * FROM reunion WHERE id_projet = '$pfe' ");
    $profile1->execute();
    $data_reu = $profile1->fetchAll();
    foreach( $data_reu as $d )
    {$em1=$d['etudiant1'];

        $stmt = $bdd->prepare("SELECT * FROM binome WHERE email_etudiant1 = '$em1' OR email_etudiant2 = '$em1' ");
        $stmt->execute();
        $data_statement2 = $stmt->fetch();         
              if( $data_statement2['email_etudiant1']===$em1)
              {
                  $em2 = $data_statement2['email_etudiant2'] ;
              }else {
                  $em2 = $data_statement2['email_etudiant1'] ;
              }
        $query = "SELECT * from etudiant where email = '$em1' ";
        $etu1 = $bdd->query($query);
        $data_etu1 = $etu1->fetch();
        $nom = $data_etu1['nom'];
        $prénom = $data_etu1['prenom'];
        $profile_consultable = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom&p=$prénom";
        $query = "SELECT * from etudiant where email = '$em2' ";
        $etu2 = $bdd->query($query);
        $data_etu2 = $etu2->fetch();
        $nom2 = $data_etu2['nom'];
        $prénom2 = $data_etu2['prenom'];
        $profile_consultable2 = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom2&p=$prénom2";
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
                                <h3> <?php echo $d['titre'] ?></h3>
                            </div>
                            <div class="blog-etu">
                                <span>Etudiant 1 <?php echo "<a href= \"$profile_consultable\">" . $nom . " " . $prénom . "</a>"; ?></span><br>
                                <span>Etudiant 2 <?php echo "<a href= \"$profile_consultable2\">" . $nom2 . " " . $prénom2 . "</a>"; ?></span>
                            </div>


                            <hr class="my-4">
                            <div class="blog-info">
                                <p> <span id="inf"> Date de la réunion :</span> <span><?php echo $d['datereu'] ?></span> </p>
                                <p> <span id="inf">Heure de la réunion :</span> <span><?php echo $d['heurereu'] ?></span> </p>
                                <p> <span id="inf">Salle de la réunion :</span> <span><?php echo $d['lieu'] ?></span> </p>
                                <p><span id="inf">Message de la réunion : </span><span><?php echo $d['description'] ?> </span> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
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