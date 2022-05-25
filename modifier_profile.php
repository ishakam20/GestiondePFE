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
    <title> Usthb Grad</title>
      <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_profil.css">
    <link rel="stylesheet" href="css/style.css">
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
                <h4 class="text">Modification de Profil</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="prof_ens.php"></a>Mes Infos </li>
                 
                </ol>
            </div>
        
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="profil-pic-div">
                                <div class="mt-3">
                                        <h5><?php echo $data_profile['nom'] ; ?>  <?php echo $data_profile['prenom'] ; ?></h5>

                                    </div>
                                    <form method="POST" action="" enctype="multipart/form-data">
                            <img src="img/team3.png" alt="Admin"  id="photo" class="rounded-circle" width="150">
                            <input type="file" id="pic_file" name="fileimg" class="input-file">
                            <label for="pic_file" class="label-file" id="upload-btn">choisir une photo</label>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card mt-3">
    <form action='insert.php' method='POST' class="form-horizontal form-material">
                            <h3>Social Media</h3>
                            <div class="group ">
                                <label class="col-md-12"><i class="fab fa-github "></i>GitHub</label>
                                <div class="col-md-12">
                                    <input type="text" style="background : #F7F6F3; "  class="form-control form-control-line" name="github" value="<?php echo $data_profile['GitHub']; ?>">
                                </div>
                            </div>
                            <div class="group">
                                <label class="col-md-12"><i class="fab fa-linkedin-in"></i>LinkedIn</label>
                                <div class="col-md-12">
                                    <input type="text" style="background : #F7F6F3; "  class="form-control form-control-line" name="linkedin" value="<?php echo $data_profile['linkedin']; ?>">
                                </div>
                            </div>
                            <div class="group ">
                                <label class="col-md-12"><i class="fas fa-blog"></i>personal website</label>
                                <div class="col-md-12">
                                    <input type="text" style="background : #F7F6F3; "  class="form-control form-control-line" name="website" value="<?php echo $data_profile['website']; ?>">
                                </div>
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
                                    <input type="email" style="background : #F7F6F3; "  value=<?php echo $data_profile['email'] ; ?> class="form-control form-control-line" name="gmail" id="example-email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card mb-3">
                        <div class="card-body" id="extra-info">
                            <div class="row ">
                                <div class="group col-md-6">
                                    <label for="email" class="col-md-12"> Adresse supplmentaire</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Entrez votre adresse"  style="background : #F7F6F3; "  class="form-control form-control-line" name="nv_email" value="<?php echo $data_profile['email2']; ?>">
                                    </div>
                                </div>
                                <div class="group col-md-6">

                                    <label class="col-md-12"> Numero de telephone </label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Entrez votre numero" style="background : #F7F6F3; " class="form-control form-control-line" name="nv_telephone" value="<?php echo $data_profile['numerotel']; ?>">
                                    </div>
                                </div>
                                <div class="group col-md-12">
                                    <label class="col-md-12"> Bio </label>
                                    <div class="col-md-12">
                                        <textarea class="form-control form-control-line " placeholder= "Entrez une bio" rows="5" name="nv_about" ><?php echo $data_profile['Description']; ?></textarea>

                                    </div>
                                </div>

                                <div class="group col-md-12">
                                    <div class="col-sm-12">
                                    <a href="insert.php"><button type="submit" class="btn btn-success" id="btn-info">sauvegarder les modifications</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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