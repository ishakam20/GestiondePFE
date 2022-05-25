<?php 
    session_start();             
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
$emailusthb = ($_SESSION['user']);
$jury = $bdd->prepare("SELECT * FROM pfe WHERE  enseignant = '$emailusthb' AND type_proj='interne' AND etatdupfe='prit' ");
$jury->execute();
$data_jury = $jury->fetchAll();

?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Mes Projets</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/style_table.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

    <?php include('sidebar.php');?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
            <h4 class="text">Encadrement</h4>
                <ol class="breadcrumb">
                <li><a href="encadrement.php">Mes projets |</a></li>
                    <li><a href="mes_binomes.php">Mes binômes |</a></li>
                    <li >
                        <a href="espace_de_travail.php"> Espace de travail |</a> 
                    </li>
                    <li><a href="mes_reunions.php" >Mes réunions |</a></li>
                    <li><a href="convo_promoteur.php" class="active"></a>Mes convocations</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <br>
                    <br>


                    <table class="table">
                        <thead>
                            <tr id="header">
                                <th>N</th>
                                <th>Titre</th>
                                <th>Voir</th>

                            </tr>
<?php $cpt=1; foreach($data_jury as $d)
{ 
  $id=$d['id'];
  $pfe = $bdd->prepare("SELECT * FROM pfe WHERE id = '$id' ");
  $pfe->execute();
  $data_pfe = $pfe->fetch(); 
  $pfe_consultable = "http://localhost:8080/mes%20php/login/fichepfe.php?i=$id";
?>
                            <tbody>
                                <tr>
                                    <td><?php echo $cpt ;
                                           $cpt=$cpt+1 ;
                                        ?>
                                    </td>
                                    <td><?php echo $data_pfe['intitule'] ?></td>
                                    <td>
                                        <div class="modif">
                                            <a href="inv_promoteur.php?d=<?=$id?>"><button class="btn btn-outline-dark" id="mod">Convocation</button></a>                                            
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </thead>
                        <?php } ?>
                    </table>
                    
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