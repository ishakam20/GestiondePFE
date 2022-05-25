<?php 
    session_start();    
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
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
    <link rel="stylesheet" href="css/style_modele.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styleFiche.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php include('sidebar.php'); ?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Commission de validation</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="#"></a>Mes projets à evaluer</li>
                    
                </ol>
            </div>
        </div>
        <div class="col-md-8 justify-content-center">
            <div class="card mb-3" id="Info">
                <div class="card-title"></div>
              <div class="col-md-6">     <h3>Informations</h3>  </div>
                <hr class="my-4">
<?php 
    if(isset($_GET['id_pfe2']))
    {
    $id=$_GET['id_pfe2']; 
    $commi = $bdd->prepare("SELECT * FROM `pfe`WHERE id ='$id' AND etatdupfe ='prit' ");
    $commi->execute();
    $data_pfe2 = $commi->fetch();
    $email=$data_pfe2['enseignant'];

    $promo = $bdd->prepare("SELECT * FROM promoteur WHERE id_projet ='$id' ");
    $promo->execute();
    $data_pfe3 = $promo->fetch();

    if(!empty($data_pfe3))
    {
      $em = $data_pfe3['co_promoteur1'];
      $promo2 = $bdd->prepare("SELECT * FROM enseignant WHERE emailusthb ='$em' ");
      $promo2->execute();
      $data_co= $promo2->fetch();
      $nom=$data_co['nom'];
      $prenom=$data_co['prenom'];
      $profession=$data_co['profession'];
      $grade=$data_co['Grade'];
      $numtel=$data_co['numerotel'];
    }else
    {    
        $em='Aucun ';
        $nom='Aucun ';
        $prenom='Aucun ';
        $profession='Aucun ';
        $grade='Aucun ';
        $numtel=' Aucun';

    }
    $prof = $bdd->prepare("SELECT * FROM `enseignant`WHERE emailusthb = '$email'");
    $prof->execute();
    $data_profile = $prof->fetch();

    $emailetu1=$data_pfe2['etudiant1'];
    $etu1 = $bdd->prepare("SELECT * FROM `etudiant`WHERE email = '$emailetu1'");
    $etu1->execute();
    $data_etu1 = $etu1->fetch();

    $profileetu1 = $bdd->prepare("SELECT * FROM `profile`WHERE email = '$emailetu1'");
    $profileetu1->execute();
    $data_profileetu1 = $profileetu1->fetch();

    $emailetu2=$data_pfe2['etudiant2'];
    $etu2 = $bdd->prepare("SELECT * FROM `etudiant`WHERE email = '$emailetu2'");
    $etu2->execute();
    $data_etu2 = $etu2->fetch();

    $profileetu2 = $bdd->prepare("SELECT * FROM `profile`WHERE email = '$emailetu2'");
    $profileetu2->execute();
    $data_profileetu2  = $profileetu2->fetch();


$domaine=$data_pfe2['domaine'];
    if(  strcmp($domaine,'Génie Logiciel, Système d’Information et Base de Données' )==0)
    {
      $dom='SIBD';
    }elseif (strcmp($domaine,'Réseaux Sécurité, Réseaux Mobiles et Système dExploitation')==0 )
    {
      $dom='RESSEC';
    }elseif(strcmp($domaine,'Intelligence Artificielle et MétaHeuristiques')==0 )
    {
      $dom='IA';
    }elseif( strmp($domaine,'Développement Web et Mobile')==0 )
    {
      $dom='WEB-MOB';
    }elseif( strcmp($domaine,'Architecture')==0 )
    {
      $dom='ARCHI';
    }elseif( strcmp($domaine,'Vision et Imagerie')==0 )
    {
      $dom='IMG';
    }elseif(strcmp($domaine,'InformatiqueThéorique')==0 )
    {
      $dom='IT';
    }
    elseif( strcmp($domaine,'BioInformatique' )==0)
    {
      $dom='BIO-INFO';
    }

?>

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12" id="date">
                            <label class="col-sm-12" id="date">Date</label>
                            <div class="col-md-4">
                                <input id="date2" type="text" disabled value=<?php echo $data_pfe2['date'] ; ?> placeholder="La date"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-sm-12">Spécialité</label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_pfe2['specialité'] ; ?> placeholder="Spécialité"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        
                        <div class="form-group col-md-4">
                            <label class="col-sm-12">Faculté</label>
                            <div class="col-sm-12">
                                <input id="fac" type="text" placeholder="Faculté" disabled value=<?php echo $data_pfe2['faculté'] ; ?>
                                    class="form-control form-control-line">
                            </div>
                        </div><div class="form-group col-md-4">
                            <label class="col-sm-12">Domaine</label>
                            <div class="col-sm-12">
                                <input id="domaine" type="text" disabled value=<?php echo $dom ?> placeholder="Domaine"
                                    class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <label class="col-sm-12"> Coordonnées Etudiant 1 :</label>

                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Nom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_etu1['nom'] ; ?> placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Prénom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_etu1['prenom'] ; ?> placeholder="Prénom"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Email </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text"  disabled value=<?php echo $data_etu1['email'] ; ?> placeholder="Email" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">N de téléphone </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_profileetu1['telephone'] ; ?> placeholder="Tel" class="form-control form-control-line">
                            </div>

                        </div>
                        <br><br><br>
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <label class="col-sm-12">Coordonnées Etudiant 2 :</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Nom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_etu2['nom'] ; ?> placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Prénom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_etu2['prenom'] ; ?> placeholder="Prénom"
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Email </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_etu2['email'] ; ?> placeholder="Email" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">N de téléphone </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_profileetu2['telephone'] ; ?> placeholder="Tel" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <label class="col-sm-12">Coordonnées Encadreur :</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Nom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_profile['nom'] ; ?> placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Prénom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_profile['prenom'] ; ?> placeholder="Prénom" 
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Grade </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $data_profile['Grade'] ; ?> placeholder="Grade" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Profession </label>
                            <div class="col-sm-12">
                                <input id="prof" type="text" placeholder="Profession" disabled value=<?php echo $data_profile['profession'] ; ?>
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Email </label>
                            <div class="col-sm-12">
                                <input id="email" type="text" placeholder="Email" disabled value=<?php echo $data_profile['email'] ; ?>
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">N de téléphone </label>
                            <div class="col-sm-12">
                                <input id="tel" type="text" disabled value=<?php echo $data_profile['numerotel'] ; ?> placeholder="Tel" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <hr class="my-4">
                            <label class="col-sm-12">Coordonnées Co-Encadreur :</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Nom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $nom ; ?> placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Prénom </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $prenom ; ?> placeholder="Nom" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Grade </label>
                            <div class="col-sm-12">
                                <input id="spec" type="text" disabled value=<?php echo $grade ; ?> placeholder="Grade" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Profession </label>
                            <div class="col-sm-12">
                                <input id="prof" type="text" placeholder="Profession" disabled value=<?php echo $profession ; ?>
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">Email </label>
                            <div class="col-sm-12">
                                <input id="email" type="text" placeholder="Email" disabled value=<?php echo $em ; ?>
                                    class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12">N de téléphone </label>
                            <div class="col-sm-12">
                                <input id="tel" type="text" placeholder="Tel" disabled value=<?php echo $numtel ; ?>
                                    class="form-control form-control-line">
                            </div>
                        </div>
                     
                    </div>
                    <br><br><br>


                </div>
            </div>
            <br>
            <div class="card mb-3" id="FichePFE">
                <div class="card-body">
                    <h3>Fiche PFE</h3>
                    <hr class="my-4">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-12">Intitulé</label>
                            <div class="col-md-12">
                                <textarea disabled value="" class="form-control form-control-line"><?php echo $data_pfe2['intitule'] ; ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label class="col-md-12">Résumé</label>
                            <div class="col-md-12">
                                <textarea rows="5" disabled value="" class="form-control form-control-line"> <?php echo $data_pfe2['resume'] ; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-12"><u> Description complète du sujet :</u></label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-12">1- Description complète du sujet – travail attendu</label>
                            <div class="col-md-12">
                                <textarea rows="5" disabled value="" class="form-control form-control-line"> <?php echo $data_pfe2['description'] ; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-12">2-Résultats attendus </label>
                            <div class="col-md-12">
                                <textarea rows="5" disabled value="" class="form-control form-control-line"><?php echo $data_pfe2['objectif'] ; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-12">Plan de travail avec échéancier </label>
                            <div class="col-md-12">
                                <textarea rows="5" disabled value="" class="form-control form-control-line"> <?php echo $data_pfe2['taches'] ; ?> </textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-12">3-Références bibliographiques</label>
                            <div class="col-md-12">
                                <textarea rows="5" disabled value="" class="form-control form-control-line"> <?php echo $data_pfe2['reference'] ; ?></textarea>
                            </div>
                        </div>

                        <div class="group col-md-4">
                            <div class="col-sm-4">
                                <div class="valider">
                                <form method ="POST" action="valider.php?id_pfe3=<?=$id?>">
                                <a href="valider.php?id_pfe3=<?=$id?>"><button class="btn btn-success" id="val"> Valider </button></a>         
                                </form>
                            </div>
                            </div>
                        </div>
                        <div class="group col-md-4">
                            <div class="col-sm-12">
                                <div class="sr">
                                <button class="btn btn-outline-dark" id="sr" data-toggle="modal"
                                 data-target="#srpopup">Valider sous réserve</button>
                                </div>
                            </div>
                        </div>
                        <div class="group col-md-4">
                            <div class="col-sm-12" >
                                <div class="supp">
                                    <button class="btn btn-success" id="supp"data-toggle="modal"
                                 data-target="#refpopup">Refuser</button>
                                </div>
                            </div>
                        </div>
<?php  } ?>


                    </div>
                </div>
            </div>


        </div>
        <div class="modal fade" id="srpopup">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class=" popup-title">
                            <h4 class="modal-title" >Motif de validation S/R</h4>
                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="close" id="closeBtn">
                            <span aria-hidden="true"></span>x
                        </button>
                    </div>
                    <form method="POST" action="validersr.php?id_pfe3=<?=$id?>">
                    <div class="modal-body">
                        <div class="blog-info">
                            <h5>Entrez le motif de la validation sous reserve</h5>
                            <textarea name="motif" cols="6" rows="4" class="form-control form-control-line" id="motif"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btn-info">Envoyer</button>
                    </div>
                    </form>
                </div>
    </div>
    </div>
                
<!------------------------------------popup2-->
<div class="modal fade" id="refpopup">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class=" popup-title">
                            <h4 class="modal-title" >Motif de refus</h4>
                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="close" id="closeBtn">
                            <span aria-hidden="true"></span>x
                        </button>


                    </div>
                    <form method="POST" action="refuserpfe.php?id_pfe3=<?=$id?>">
                    <div class="modal-body">
                        <div class="blog-info">
                            <h5>Entrez le motif d'invalidation</h5>
                            <textarea name="motif2" cols="6" rows="4" class="form-control form-control-line" id="motif"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="btn-info">Envoyer</button>
                    </div>
                    </form>
                </div>
    </div>
    </div>

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