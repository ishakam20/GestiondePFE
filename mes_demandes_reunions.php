<?php

session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $reunion = $bdd->prepare('SELECT * FROM reunion_etudiant WHERE email_ens = ? ');
    $reunion->execute(array($emailusthb));
    $data_reunion = $reunion->fetchAll();
    
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
        
        .btn {
            color: rgba(5, 34, 129, 0.815);
            border: none;
        }
        
        #accuser:hover {
            background: rgba(5, 34, 129, 0.815);
        }
    </style>
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<?php include('sidebar.php');?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Mes réunions</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="mes_demandes_reunions.php"></a>Demandes de réunions | </li>
                    <li><a href="mes_reunions.php">Réunions planifiées | </a></li>
                    <li><a href="encadrement.php">Mes Projets</a></li>
                </ol>
            </div>
        </div>

        <?php 
        if(isset( $_GET['accusé']) && $_GET['accusé']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  L'accusé à bien été envoyé !</div>";
            }else echo '';

        ?>
        <div class="container">
            <div class="row">
<?php 
foreach($data_reunion as $d) { 
    $id=$d['id_reunion_etu'];
    $em1=$d['email_etu'];
    $query = "SELECT * from binome where email_etudiant1 = '$em1' OR email_etudiant2 = '$em1' ";
    $etu5 = $bdd->query($query);
    $data_etu5 = $etu5->fetch();
    if($data_etu5['email_etudiant1']=$em1)
    {
    $em2 = $data_etu5['email_etudiant2'];
    }else {
    $em2 = $data_etu5['email_etudiant1'];
    }

    $query = "SELECT * from pfe where etudiant1 = '$em1' OR etudiant2 = '$em1' ";
    $pfe = $bdd->query($query);
    $data_pfe = $pfe->fetch();

    $query = "SELECT * from etudiant where email = '$em1' ";
    $etu2 = $bdd->query($query);
    $data_etu1 = $etu2->fetch();

    $query = "SELECT * from etudiant where email = '$em2' ";
    $etu2 = $bdd->query($query);
    $data_etu2 = $etu2->fetch();

    $nom = $data_etu1['nom'];
    $prénom = $data_etu1['prenom'];
    $profile_consultable = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom&p=$prénom";
    $nom2 = $data_etu2['nom'];
    $prénom2 = $data_etu2['prenom'];
    $profile_consultable2 = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom2&p=$prénom2";
 
?>
      
                <div class="col-md-6">
                    <div class="row main-row p-2" style="margin-bottom: 40px; margin-right: 40px;">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div>
                                <img src="img/inbox.png" alt="" class="col-md-12 " style="width: 180px; opacity: .4; margin-top: 130px;">
                            </div>


                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12" style="margin-top: 15px;">
                            <div class="blog-title">
                                <h3> <?php echo $d['titre_reunion'] ?>  </h3>
                            </div>
                            <div class="blog-etu">
                            <div class="blog-etu">
                                <span>Etudiant 1 :<?php echo "<a href= \"$profile_consultable\">" . $nom . " " . $prénom . "</a>"; ?></span>
                                <br>
                                <span>Etudiant 2 :<?php echo "<a href= \"$profile_consultable2\">" . $nom2 . " " . $prénom2 . "</a>"; ?></span>
                            </div>
                            </div>


                            <hr class="my-4">
                            <div class="blog-info">
                            <p> <span id="inf"> Intitulé du projet :</span> <span><?php echo $data_pfe['intitule'] ?></span> </p>
                                <p> <span id="inf"> Status de la reunion :</span> <span><?php echo $d['status_reunion'] ?></span> </p>
                                <p><span id="inf">Message de la réunion : </span><span><?php echo $d['description_reunion'] ?>  </span> </p>
                                <br>
                                <a href="reception.php?idreu=<?=$id?>"><button type="button" class="btn btn-outline-dark" style="float: right;" id="accuser">Accuser la réception</button></a>
                            </div>
                        </div>
                    </div>
                </div>  
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