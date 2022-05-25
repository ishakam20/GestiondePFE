<?php
session_start();              //ouverture de la session.
require_once 'db.php';
if (!isset($_SESSION['user'])) {          //si user non connecté alors renvoyer à la page d'accueil.
    header('Location:index3.php');
    die();
}
//récuperer les candidature reçues
$email = htmlspecialchars($_SESSION['user']);

$query = $bdd->prepare("SELECT * from pfe where enseignant = ? ");
$query->execute(array($email));
$data_pfe = $query->fetchAll();
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Candidatures</title>
    <!-- Favicon icon -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_accueil.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php include('sidebar.php');?>

    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Candidats</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="#"></a> Mes candidats</li>
                </ol>
            </div>
        </div>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
  Le binôme vous sera affecté une fois qu'il aura confirmé.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php 
foreach( $data_pfe as $d3)
{
$idpfe = $d3["id"];

$query = $bdd->prepare("SELECT * from candidature where `type`='pfe' AND `email_candidat`!='$email' AND `id_sujet`='$idpfe' AND status_candidature!= 'refusé'");
$query->execute();
$data_reçu = $query->fetchAll();

    foreach ($data_reçu as $i) 
    {
        $r=$i['id_sujet'];
        $g=$i['id_candidature'];  
       
        if ( $data_pfe['id']=$i['id_sujet'])
        { 

        $email_exp = $i['email_candidat'];              //$email_exp est l'email de celui qui candidate(étudiant)
        $message_candidature = $i['message_candidature'];
        $stmt = $bdd->prepare("SELECT * FROM etudiant WHERE email = '$email_exp'");
        $stmt->execute();
        $data_statement = $stmt->fetch();   

        $stmt = $bdd->prepare("SELECT * FROM binome WHERE email_etudiant1 = '$email_exp' OR email_etudiant2 = '$email_exp' ");
        $stmt->execute();
        $data_statement2 = $stmt->fetch();         
          if( $data_statement2['email_etudiant1']==$email_exp)
          {
              $email_binome = $data_statement2['email_etudiant2'] ;
          }else {
              $email_binome = $data_statement2['email_etudiant1'] ;
          }

        $stmt = $bdd->prepare("SELECT * FROM etudiant WHERE email = '$email_binome'");
        $stmt->execute();
        $data_statement3 = $stmt->fetch(); 

        $spécialité = htmlspecialchars($data_statement['specialite']);
        $nom_exp = htmlspecialchars($data_statement['nom']);
        $prénom_exp = htmlspecialchars($data_statement['prenom']);
        $nom_binome = htmlspecialchars($data_statement3['nom']);
        $prénom_binome = htmlspecialchars($data_statement3['prenom']);
        $status_candidature = $i['status_candidature'];
        $id_candidature = $i['id_candidature'];
        $query = "SELECT * from etudiant,`profile` where etudiant.email = '$email_exp' AND etudiant.email = `profile`.email";
        $data_candidature = $bdd->query($query);
        $data_statement_candidature = $data_candidature->fetch();
        $nom = $data_statement_candidature['nom'];
        $prénom = $data_statement_candidature['prenom'];
        $profile_consultable = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom&p=$prénom";
        $query = "SELECT * from etudiant,`profile` where etudiant.email = '$email_binome' AND etudiant.email = `profile`.email";
        $data_candidature2 = $bdd->query($query);
        $data_statement_candidature2 = $data_candidature2->fetch();
        $nom2 = $data_statement_candidature2['nom'];
        $prénom2 = $data_statement_candidature2['prenom'];
        $profile_consultable2 = "http://localhost/lyd/profile_consultable.php?t=etu&n=$nom2&p=$prénom2";

?>

        <div class="container">
            <div class="row main-row p-4">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="blog-img" style="background:none;">
                        <img src="4565.jpg"  style=" box-shadow:none; opacity:2;    height: 200%;  transform: translateY(0px);
   width: 100%;" alt="projet" class="img-fluid">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <ul class="list-group list-group-horizontal " style="margin-left:-7px;">
                                
                                <li class="list-group-item">
                                <a href="reponse_encadreur.php?reponse=refuser&id_sujet=<?=$r?>&email_candidat=<?=$email_exp?>&id_candidature=<?=$g?>&email_binome=<?=$email_binome?>">
                                <i class="fas fa-user-times fa-2x"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">Refuser</span>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="far fa-eye fa-2x" data-toggle="modal"
                                            data-target="#readMorePopup<?=$d3["id"]?>"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">Voir plus</span>
                                </li>
                                <li class="list-group-item">
                                <a href="reponse_encadreur.php?reponse=accepter&id_sujet=<?=$r?>&email_candidat=<?=$email_exp?>&id_candidature=<?=$g?>&email_binome=<?=$email_binome?>">
                                        <i class="fas fa-user-check fa-2x"></i>
                                        <span class="link_name"></span>
                                    </a>
                                    <span class="tooltip">Accepter</span>
                                </li>



                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                <?php if ($status_candidature === 'accepté') {
                                echo "<div class='alert alert-info' role='alert'>candidature acceptée, en attente de confirmation !</div>";
                            }elseif ($status_candidature === 'refusé') {
                                echo "<div class='alert alert-danger' role='alert'>candidature refusé.</div>";
                             }elseif ($status_candidature === 'confirmé') {
                                echo "<div class='alert alert-success' role='alert'>candidature confirmée !</div>";
                                $sql = "UPDATE pfe SET `etudiant1`='".$email_exp."',`etudiant2` = '". $email_binome."',`etatdupfe` ='prit' WHERE id= '". $r."'";
                                $exec=$bdd->query($sql);
                            }
                                 ?>
                    <div class="blog-title">
                      
                       <h3> <?php echo $d3['intitule'] ?></h3>
                    </div>
                    <div class="blog-date">
                        <span> <?php echo $d3['date'] ?></span>
                    </div>
                    <div class="blog-info">
                        <span>Specialité des candidats: <?php echo $d3['specialité'] ?> </span>
                    </div>
               <!--     <div class="blog-info">
                        <span><?php echo "<div class=\"alert alert-primary\" role=\"alert\"> $nom2 $prénom2 et $nom $prénom ont candidaté à ce PFE !</div>" ?></span>
                    </div>-->

                    <hr class="my-4">
                    <div class="blog-desc">
                        <p> <?php echo "$message_candidature"?>
                        </p>
                    </div>
                </div>
            </div>




        <!--------------------->

        <div class="modal fade" id="readMorePopup<?=$d3["id"]?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       

                        <div class=" popup-img">
                            <img src="img/icon.png">
                        </div>
                       


                    </div> <div class=" popup-title">
                            <h4 class="modal-title">
                            <?php echo $d3['intitule'] ?></h4>
                        </div>
                    <div class="modal-body">
                        <div class="blog-date">
                            <span>Date et heure de candidature</span>
                        </div>
                        <div class="blog-info">
                            <span>Specialité: <?php echo $d3['specialité'] ?> </span>
                        </div>

                        <hr class="my-4">
                        <div class="blog-int">
                            <h5>Candidats :</h5>
                            <span>Nom et prénom de l'expediteur :</span>
                            <?php echo "<a href= \"$profile_consultable\">" . $nom_exp . " " . $prénom_exp . "</a>"; ?>
                            <br>
                            <span>Email de l'expediteur : <?php echo $email_exp ?> </span>
                            <br><br>
                            <span>Nom et prénom du binome :</span>
                            <?php echo "<a href= \"$profile_consultable2\">" . $nom_binome . " " . $prénom_binome . "</a>"; ?>
                            <br>
                            <span>Email du binome : <?php echo $email_binome ?> </span>
                        </div>
                        <hr class="my-4">
                        <div class="blog-desc">
                            <h5>Message de candidature:</h5>
                            <p> <?php echo $message_candidature ?>
                            </p>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>

            <?php }}} ?>  

        <script>
            let btn = document.querySelector("#btn");
            let sidebar = document.querySelector(".sidebar");
            let searchBtn = document.querySelector(".bx-search");

            btn.onclick = function () {
                sidebar.classList.toggle("active");
                if (btn.classList.contains("bx-menu")) {
                    btn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    btn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
            searchBtn.onclick = function () {
                sidebar.classList.toggle("active");
            }
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/profil.js"></script>

</body>

</html>