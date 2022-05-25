<?php
session_start();              //ouverture de la séance.
    require_once 'db.php';

    $emailusthb = ($_SESSION['user']);
    $annonce = $bdd->prepare("SELECT * FROM annonce WHERE Destinataire = 'enseignant' OR Destinataire = 'TOUT LE MONDE' ");
    $annonce->execute();
    $data_annonce = $annonce->fetchAll();

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
        .blog-date span {
            color: #F4A261;
            font-size: 14px;
            margin-right: 30px;
            margin-bottom: 20px;
        }
        
        .blog-info span {
            color: #446588;
            margin-right: 30px;
            margin-top: 20px;
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
                <h4 class="text">Les annonces</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#"></a>Annonces
                    </li>
                </ol>
            </div>
        </div>
    <?php 
    foreach( $data_annonce as $d)
    { $doc= $d['document'];
      if($doc != NULL)
      {
      $document = $bdd->prepare("SELECT * FROM `file` WHERE id='$doc' ");
      $document->execute();
      $data_doc = $document->fetch();
      $path=$data_doc['path'];
      }
      else{
      $path='';
      }

    ?>
        <div class="container">
            <div class="row main-row p-2" style="margin-bottom: 40px;">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div>
                        <img src="img/Announcement.ico" alt="" class="col-md-12 " style="width: 180px; opacity: .4; margin-bottom: 40px; ">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <ul class="list-group list-group-horizontal justify-content-center">
                              <a href="<?=$path?>" type="button" class="btn btn-outline-info" id="telecharger" style="margin-right:50px"> Consulter
                               </a> 
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-12 col-sm-12" style="margin-top: 15px;">
                    <div class="blog-title">
                        <h3> <?php echo $d['titre'] ?> </h3>
                    </div>
                    <div class="blog-date">
                        <span><?php echo $d['dateAn'] ?></span>
                    </div>
                    <hr class="my-4">
                    <div class="blog-desc">
                        <p> <?php echo $d['message'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?> 
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