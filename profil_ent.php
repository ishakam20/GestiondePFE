<?php
  session_start();
  include 'includes/autoloader.inc.php';
  if(!isset($_SESSION['user']))
    {
      header('Location: index.php'); 
      die(); //idprof
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
    <link rel="stylesheet" href="css/style_profil.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img src="img/icon.png" alt="" class="image-logo">
                <div class="logo_name"> USTHB Grad</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>

        </div>

        <ul class="nav_list">

            <li>
                <a href="accueil_entreprise.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Accueil</span>
                </a>
                <span class="tooltip">Accueil</span>
            </li>
            <li>
                <a href="profil_ent.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">profil</span>
                </a>
                <span class="tooltip">profil</span>
            </li>
            <li>
                <a href="proposer.php">
                    <i class='bx bx-upload'></i>
                    <span class="links_name">Proposer un PFE</span>
                </a>
                <span class="tooltip">Proposer un PFE</span>
            </li>
            <li>
                <a href="Mes_projets.php">
                    <i class='bx bx-file-blank'></i>
                    <span class="links_name">Mes projets</span>
                </a>
                <span class="tooltip">Mes projets</span>
            </li>
            <li>
                <a href="espace_de_travail.php">
                    <i class='bx bx-library'></i>
                    <span class="links_name">Espace de travail</span>
                </a>
                <span class="tooltip">Espace de travail</span>
            </li>

            <li>
                <a href="mes_candidatures.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Candidatures</span>
                </a>
                <span class="tooltip">Candidatures</span>
            </li>
            <li>
                <a href="Annonces_ent.php">
                    <i class='bx bxs-news'></i>
                    <span class="links_name">Annonces</span>
                </a>
                <span class="tooltip">Annonces</span>
            </li>
            <?php
                $obj= new soutenance();
                $inv=$obj->getInvitation($_SESSION['user']);
                if(!$inv || empty($inv)){   ?>
                     <li>
                        <a href="error2.php">
                            <i class='bx bxs-envelope'></i>
                            <span class="links_name">Invitation</span>
                        </a>
                        <span class="tooltip">Invitation</span>
                    </li>
               <?php }else{ ?>
                    <li>
                        <a href="invitation.php">
                            <i class='bx bxs-envelope'></i>
                            <span class="links_name">Invitation</span>
                        </a>
                        <span class="tooltip">Invitation</span>
                    </li>
                <?php }
            ?>
            
        <div class="profile_content">
            <div class="profile">
            <form action="includes/logout.inc.php" method="post">
                <a href="includes/logout.inc.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </form>
            </div>
        </div>
    </div>

    <?php   
        
        $obj= new entreprise();
        $user=$obj->getUserEnc($_SESSION['user']);
        $pdp=$obj->getPdp($user['mail']);
        $ent=$obj->getEntreprise($user['id_ent']);
        $profil=$obj->getProfil($_SESSION['user']);
        if(isset($_GET['modif']) || isset($_GET['modif2'])){ //----------------------------Modifier-----------------------------    ?>
          <form action="upload/upload.php?idprof=<?=$pdp?>" method="POST" enctype="multipart/form-data">
            <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Profile</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="profil_ent.php">Profil </a> | </li>
                    <li>Informations</li>

                </ol>
            </div>
        </div>
        <?php
        if(isset($_GET['uploadedsuccesS'])){
            echo "<div class=\"alert alert-success \" role=\"alert\">Les données ont bien été modifié</div>";
      }
      if(isset($_GET['error'])){
        if($_GET['error']=="size"){
            //alert accepte
            echo "<div class=\"alert alert-success \" role=\"alert\">Votre photo est trés volumineux</div>";
        }
      }
        ?>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3"> 
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="profil-pic-div">
                                <div class="mt-3">
                                    <h5><?=$user['nom_enc']?> <?=$user['pre_enc']?></h5>
                                </div>
                                
                                    <?php
                                        if(!$pdp){
                                             ?>
                                            <img src="img/img4.png" alt="Admin" id="photo" class="rounded-circle" width="150">  <?php
                                            }else{  
                                                if($pdp['status']==0)  {   ?>
                                                    <img src="uploads/profile<?=$pdp['id']?>.jpg?".mt_rand() alt="Admin" id="photo" class="rounded-circle" width="150">
                                         <?php   }else{   ?>
                                            <img src="img/img4.png" alt="Admin" id="photo" class="rounded-circle" width="150">
                                      <?php }  ?>
                                    <?php    }
                                            ?>
                                    
                                    <input type="file" id="pic_file" name="file" class="input-file">
                                    <label for="pic_file" class="label-file" id="upload-btn">choisir une photo</label>
                                    <div class="group">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success" name="submit" id="btn-form" value="Modifier">
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 

                                            <!--AAAAAAAAA-->
               
                <div class="card mt-3">
                
                        <h3>Social Media</h3>
                        <div class="group ">
                            <label class="col-md-12"><i class ="fab fa-github "></i>GitHub</label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['Github']==NULL){   ?>
                                        <input type="text" name="git" value="" class="form-control form-control-line"> </div>
                                   <?php }else{ ?>
                                    <input type="text" name="git" value="<?=$profil['Github']?>" class="form-control form-control-line"> </div>
                                   <?php }
                                ?>
                                
                        </div> 
                        <div class="group">
                            <label class="col-md-12"><i class ="fab fa-linkedin-in"></i>LinkedIn</label>
                            <div class="col-md-12">
                                 <?php
                                    if(!$profil || $profil['Linkedin']==NULL){   ?>
                                        <input type="text" name="linked" value="" class="form-control form-control-line"> </div>
                                   <?php }else{ ?>
                                          <input type="text" name="linked" value="<?=$profil['Linkedin']?>" class="form-control form-control-line"> </div>
                                   <?php }
                                ?>
                                
                        </div>     <!--HADAAAAAA-->
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-blog"></i>personal website</label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['Website']){   ?>
                                    <input type="text" name="site" value="" class="form-control form-control-line">
                                   <?php }else{ ?>
                                    <input type="text" name="site" value="<?=$profil['Website']?>" class="form-control form-control-line">
                                   <?php }
                                ?>
                                
                             </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-phone"></i>Phone number</label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['telephone']){   ?>
                                        <input type="text" name="phone" value="" class="form-control form-control-line">
                                   <?php }else{ ?>
                                    <input type="text" name="phone" value="<?=$profil['telephone']?>" class="form-control form-control-line">
                                   <?php }
                                ?>
                                
                             </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-fax"></i>Fax </label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['fax']){   ?>
                                        <input type="text" name="fax" value="" class="form-control form-control-line"> </div>
                                   <?php }else{ ?>
                                    <input type="text" name="fax" value="<?=$profil['fax']?>" class="form-control form-control-line"> </div>
                                   <?php }
                                ?>
                               <div class="group">
                            <div class="col-sm-12">
                                   <a href=""><button class="btn btn-success" name="modifier" id="btn-form">Modifier</button></a>
                            </div>
                        </div>  
                        </div>
                        
                       
        
       
                </div> <!--first mor form-->
          
            </div>
            <div class="col-md-8">

                <div class="card mb-3" id="personal_info">
                    <div class="card-body">
                        <h3> Encadreur</h3>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom </label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$user['nom_enc']?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Prenom </label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$user['pre_enc']?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Direction</label>
                                <div class="col-md-12">
                                    <?php   
                                        if($user['nom_enc']!=NULL){ ?>
                                            <input type="text" disabled value="<?=$user['direction']?>" class="form-control form-control-line"> </div>
                                       <?php }else{  ?>
                                            <input type="text" disabled value="--" class="form-control form-control-line"> </div>
                                       <?php }
                                    ?>
                                    
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Departement</label>
                                <div class="col-md-12">
                                <?php   
                                        if($user['nom_enc']!=NULL){ ?>
                                            <input type="text" disabled value="<?=$user['departement']?>" class="form-control form-control-line"> </div>
                                       <?php }else{  ?>
                                            <input type="text" disabled value="--" class="form-control form-control-line"> </div>
                                       <?php }
                                    ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Adresse usthb</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value="<?=$user['mail']?>" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                

                <div class="card mb-3" id="personal_info">
                    <div class="card-body">
                        <h3> Entreprise</h3>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom Entreprise</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$ent['nom_ent']?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Domaine d'activité</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$ent['Domaine_act']?>" class="form-control form-control-line"> </div>
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
                                    <?php
                                        if($user['autre_mail']==NULL){   ?>
                                            <input type="email" name="adr_supp" value="" class="form-control form-control-line"> </div>
                                    <?php }else{ ?>
                                        <input type="email" name="adr_supp" value="<?=$user['autre_mail']?>" class="form-control form-control-line"> </div>
                                    <?php }
                                    ?>
                            </div>
                            <div class="group col-md-6">

                                <label class="col-md-12"> Numero de telephone </label>
                                <div class="col-md-12">
                                <?php
                                    if($user['num_tel']==NULL){   ?>
                                            <input type="text" name="num_tel"  value="" class="form-control form-control-line"> </div>
                                    <?php }else{ ?>
                                        <input type="text" name="num_tel" value="<?=$user['num_tel']?>" class="form-control form-control-line"> </div>
                                    <?php }
                                    ?>
                            </div>
                            <div class="group col-md-12">
                                <label class="col-md-12"> Bio </label>
                                <div class="col-md-12">
                                <?php 
                                        if(!$profil || $profil['about']==NULL){   ?>
                                            <textarea rows="6" name="bio" class="form-control form-control-line "></textarea>
                                    <?php }else{ ?>
                                             <textarea rows="6" name="bio" class="form-control form-control-line "><?=$profil['about']?></textarea>
                                    <?php }
                                    ?>
                                    
                                </div>
                            </div>
                          <!--  <div class="group col-md-6">
                                <div class="choose_file col-md-12">
                                    <label for="choose_file" class="label-file"> + Ajouter un document</label>
                                    <input type="file" id="choose_file" class="input-file">

                                </div>

                            </div> -->
                            <div class="group col-md-12">
                                <div class="col-sm-12">
                                <a href=""> <button name="modifier2" class="btn btn-success" id="btn-info">Modifier</button></a>
                                </div>
                            </div>
                        </div>
                        
            </form>
            

     <?php  
     
     }elseif(!isset($POST['modif']) && !isset($POST['modif2'])){ //SANS MODIFFICATION   ?>
             <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Profile</h4>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="prof.php">Profil </a> | </li>
                    <li>Informations</li>

                </ol>
            </div>
        </div>
     <?php   if(isset($_GET['uploadedsuccesS'])){
      echo "<div class=\"alert alert-success \" role=\"alert\">Les données ont bien été modifié</div>";
}
if(isset($_GET['error'])){
  if($_GET['error']=="size"){
      //alert accepte
      echo "<div class=\"alert alert-success \" role=\"alert\">Votre phiti est trés volumineux</div>";
  }
}   ?>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="profil-pic-div">
                                <div class="mt-3">
                                    <h5><?=$user['nom_enc']?> <?=$user['pre_enc']?></h5>
                                </div>
                                <form action="upload/upload.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                        if(!$pdp){
                                             ?>
                                            <img src="img/img4.png" alt="Admin" id="photo" class="rounded-circle" width="150">  <?php
                                            }else{  
                                                $_SESSION['idprof']=$pdp['id'];
                                                if($pdp['status']==0)  {   ?>
                                                    <img src="uploads/profile<?=$pdp['id']?>.jpg?".mt_rand() alt="Admin" id="photo" class="rounded-circle" width="150">
                                         <?php   }else{   ?>
                                            <img src="img/img4.png" alt="Admin" id="photo" class="rounded-circle" width="150">
                                      <?php }  ?>
                                    <?php    }
                                            ?>
                                    
                                    <input type="file" id="pic_file" name="file" class="input-file">
                                    <label for="pic_file" class="label-file" id="upload-btn">choisir une photo</label>
                                    <div class="group">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success" name="submit" id="btn-form" value="Modifier">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                                            <!--AAAAAAAAA-->
                <div class="card mt-3">
                    <form class="form-horizontal form-material">
                        <h3>Social Media</h3>
                        <div class="group ">
                            <label class="col-md-12"><i class ="fab fa-github "></i>GitHub</label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['Github']==NULL){   ?>
                                        <input type="text" disabled value="" class="form-control form-control-line"> </div>
                                   <?php }else{ ?>
                                    <input type="text" disabled value="<?=$profil['Github']?>" class="form-control form-control-line"> </div>
                                   <?php }
                                ?>
                                
                        </div>
                        <div class="group">
                            <label class="col-md-12"><i class ="fab fa-linkedin-in"></i>LinkedIn</label>
                            <div class="col-md-12">
                                 <?php
                                    if(!$profil || $profil['Linkedin']==NULL){   ?>
                                        <input type="text" disabled value="" class="form-control form-control-line"> </div>
                                   <?php }else{ ?>
                                          <input type="text" disabled value="<?=$profil['Linkedin']?>" class="form-control form-control-line"> </div>
                                   <?php }
                                ?>
                                
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-blog"></i>personal website</label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['Website']){   ?>
                                    <input type="text" disabled value="" class="form-control form-control-line">
                                   <?php }else{ ?>
                                    <input type="text" disabled value="<?=$profil['Website']?>" class="form-control form-control-line">
                                   <?php }
                                ?>
                                
                             </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-phone"></i>Phone number</label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['telephone']){   ?>
                                        <input type="text" disabled value="" class="form-control form-control-line">
                                   <?php }else{ ?>
                                    <input type="text" disabled value="<?=$profil['telephone']?>" class="form-control form-control-line">
                                   <?php }
                                ?>
                                
                             </div>
                        </div>
                        <div class="group ">
                            <label class="col-md-12"><i class="fas fa-fax"></i>Fax </label>
                            <div class="col-md-12">
                                <?php
                                    if(!$profil || $profil['fax']){   ?>
                                        <input type="text" disabled value="" class="form-control form-control-line"> </div>
                                   <?php }else{ ?>
                                    <input type="text" disabled value="<?=$profil['fax']?>" class="form-control form-control-line"> </div>
                                   <?php }
                                ?>
                                
                        </div>
                        <div class="group">
                            <div class="col-sm-12">
                                   <a href="profil_ent.php?modif=on"><button class="btn btn-success" name="modif" id="btn-form">Modifier</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">

                <div class="card mb-3" id="personal_info">
                    <div class="card-body">
                        <h3> Encadreur</h3>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom </label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$user['nom_enc']?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Prenom </label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$user['pre_enc']?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Direction</label>
                                <div class="col-md-12">
                                    <?php   
                                        if($user['nom_enc']!=NULL){ ?>
                                            <input type="text" disabled value="<?=$user['direction']?>" class="form-control form-control-line"> </div>
                                       <?php }else{  ?>
                                            <input type="text" disabled value="--" class="form-control form-control-line"> </div>
                                       <?php }
                                    ?>
                                    
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Departement</label>
                                <div class="col-md-12">
                                <?php   
                                        if($user['nom_enc']!=NULL){ ?>
                                            <input type="text" disabled value="<?=$user['departement']?>" class="form-control form-control-line"> </div>
                                       <?php }else{  ?>
                                            <input type="text" disabled value="--" class="form-control form-control-line"> </div>
                                       <?php }
                                    ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-email" class="col-md-12">Adresse usthb</label>
                                <div class="col-md-12">
                                    <input type="email" disabled value="<?=$user['mail']?>" class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                

                <div class="card mb-3" id="personal_info">
                    <div class="card-body">
                        <h3> Entreprise</h3>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Nom Entreprise</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$ent['nom_ent']?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-12">Domaine d'activité</label>
                                <div class="col-md-12">
                                    <input type="text" disabled value="<?=$ent['Domaine_act']?>" class="form-control form-control-line"> </div>
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
                                    <?php
                                        if($user['autre_mail']==NULL){   ?>
                                            <input type="email" disabled value="" class="form-control form-control-line"> </div>
                                    <?php }else{ ?>
                                        <input type="email" disabled value="<?=$user['autre_mail']?>" class="form-control form-control-line"> </div>
                                    <?php }
                                    ?>
                            </div>
                            <div class="group col-md-6">

                                <label class="col-md-12"> Numero de telephone </label>
                                <div class="col-md-12">
                                <?php
                                    if($user['num_tel']==NULL){   ?>
                                            <input type="text" disabled value="" class="form-control form-control-line"> </div>
                                    <?php }else{ ?>
                                        <input type="text" disabled value="<?=$user['num_tel']?>" class="form-control form-control-line"> </div>
                                    <?php }
                                    ?>
                            </div>
                            <div class="group col-md-12">
                                <label class="col-md-12"> Bio </label>
                                <div class="col-md-12">
                                <?php 
                                        if(!$profil || $profil['about']==NULL){   ?>
                                            <textarea rows="6" disabled class="form-control form-control-line "></textarea>
                                    <?php }else{ ?>
                                             <textarea rows="6" class="form-control form-control-line "><?=$profil['about']?></textarea>
                                    <?php }
                                    ?>
                                    
                                </div>
                            </div>
                          <!--  <div class="group col-md-6">
                                <div class="choose_file col-md-12">
                                    <label for="choose_file" class="label-file"> + Ajouter un document</label>
                                    <input type="file" id="choose_file" class="input-file">

                                </div>

                            </div> -->
                            <div class="group col-md-12">
                                <div class="col-sm-12">
                                <a href="profil_ent.php?modif2=on"> <button class="btn btn-success" id="btn-info">Modifier</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
       
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