<?php 
    session_start();             
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }

    if(isset($_FILES['avatar']) && !empty($_FILES['fileimg']['name']))
    {
        $tailleMax = 2097152 ;
        $extensionsValides = array('jpg','jpeg','gif','png') ;

    }
    $emailusthb = ($_SESSION['user']);
    $profile = $bdd->prepare('SELECT * FROM enseignant WHERE emailusthb = ? ');
    $profile->execute(array($emailusthb));
    $data_profile = $profile->fetch();
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Profil</title>
      <!-- Favicon icon -->

 <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_profil.css">
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
                <h4 class="text">Profil</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="prof_ens.php"></a>Mes Infos  </li>
                
                        
                </ol>
            </div>
        </div>
        <?php 
        if(isset( $_GET['modif']) && $_GET['modif']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\">  Les modifications ont bien été effectuées !</div>";
            }elseif(isset( $_GET['modif']) && $_GET['modif']==='non') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  Erreur de modification!</div>";

            }elseif(isset( $_GET['modif']) && $_GET['modif']==='wrongformatnumber') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">  Erreur dans le format du numéro de tel!</div>";}

        ?>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="profil-pic-div">
                                <div class="mt-3">
                                    <h5>
                                    <?php echo $data_profile['nom']."\n" ;
                                          echo $data_profile['prenom'] ; ?></h5>
                                </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                            <img src="img/team3.png" alt="Admin" id="photo" class="rounded-circle" width="150">
                                <input type="file" id="pic_file" name="file" class="input-file">
                                <label for="pic_file" class="label-file" id="upload-btn">choisir une photo</label>

                            </form>

                            
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-3">

                        <h3>Social Media</h3>
                        <div class="group ">
                            <label class="col-md-12"><i class ="fab fa-github "></i>GitHub</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="<?php echo $data_profile['GitHub'] ; ?>" placeholder="link" class="form-control form-control-line">  </div>
                        </div>
                        <div class="group">
                            <label class="col-md-12"><i class ="fab fa-linkedin-in"></i>LinkedIn</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="<?php echo $data_profile['linkedin'] ; ?>" placeholder="link" class="form-control form-control-line"> </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-blog"></i>personal website</label>
                            <div class="col-md-12">
                                <input type="text" disabled value="<?php echo $data_profile['website'] ; ?>" placeholder="link" class="form-control form-control-line">  </div>
                        </div>
                        
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3"id="personal_info">
                    <div class="card-body">
                        <h3>Personal Informations</h3>
                        <div class="row">                    
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['nom'] ; ?> class="form-control form-control-line"> 
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Prénom</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['prenom'] ; ?> class="form-control form-control-line"> 
                                    
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Identificateur</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['idens'] ; ?> class="form-control form-control-line"> </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-12">Grade</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value=<?php echo $data_profile['Grade'] ; ?> class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Faculté</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value=<?php echo $data_profile['faculté'] ; ?> class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Département</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value=<?php echo $data_profile['departement'] ; ?> class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Adresse usthb</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value=<?php echo $data_profile['emailusthb'] ; ?> class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Adresse Gmail</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value=<?php echo $data_profile['email'] ; ?> class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" >
                    <div class="card-body" id="extra-info">
                        <div class="row ">
                            <div class="group col-md-6">
                                <label for="email" class="col-md-12"> Adresse supplmentaire</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value="<?php echo $data_profile['email2'] ; ?>" placeholder="Entrez votre adresse" value= <?php echo $data_profile['email2'] ; ?> class="form-control form-control-line"> </div>
                            </div>
                            <div class="group col-md-6">

                                <label class="col-md-12"> Numero de telephone </label>
                                <div class="col-md-12">
                                    <input type="text"  disabled value=" <?php echo $data_profile['numerotel'] ; ?>" placeholder="Entrez votre numero" value= <?php echo $data_profile['numerotel'] ; ?> class="form-control form-control-line"> </div>
                            </div>
                            <div class="group col-md-12">
                                <label class="col-md-12"> Bio </label>
                                <div class="col-md-12">
                                    <textarea rows="6" disabled value="" class="form-control form-control-line "> <?php echo $data_profile['Description'] ; ?> </textarea>
                                </div>
                            </div>
                           
                            <div class="group col-md-12">
                                <div class="col-sm-12">
                                <a href="modifier_profile.php"><button type="submit" class="btn btn-success" id="btn-info" >Modifier</button></a>
                                </div>
                            </div>
                        </div>
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


    <script>
        const realFileBtn = document.getElementById("real_file");
        const customBtn = document.getElementById("custom-button");
        const customTxt = document.getElementById("custom-text");

        customBtn.addEventListener("click", function() {
            realFileBtn.click();
        });

        realFileBtn.addEventListener("change", function() {
            if (realFileBtn.value) {
                customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            } else {
                customTxt.innerHTML = "Aucun Fichier";
            }
        })
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/profil.js"></script>
</body>

</html>