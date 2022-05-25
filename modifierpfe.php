<?php 
    session_start();             
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
    
if(isset($_GET['idpf']))
{
$id=$_GET['idpf'];
$pfe7= $bdd->prepare("SELECT * FROM `pfe` WHERE id = '$id' ");
$pfe7->execute();
$data_pfe = $pfe7->fetch();

$pfe8= $bdd->prepare("SELECT * FROM promoteur WHERE id_projet = '$id' ");
$pfe8->execute();
$data_pfe2 = $pfe8->fetch();
}

if($data_pfe['specialité']!='ACAD' && $data_pfe['specialité']!='ISIL'&& $data_pfe['specialité']!='GTR'&& $data_pfe['specialité']!='ACAD-ISIL'&&
 $data_pfe['specialité']!='ACAD-ISIL-GTR' && $data_pfe['specialité']!='ACAD-GTR-ISIL'
 && $data_pfe['specialité']!='ISIL-ACAD-GTR' && $data_pfe['specialité']!='ISIL-GTR-ACAD'
 && $data_pfe['specialité']!='GTR-ISIL-ACAD' && $data_pfe['specialité']!='GTR-ACAD-ISIL'
&&$data_pfe['specialité']!='ISIL-GTR' && $data_pfe['specialité']!='GTR-ISIL'&& $data_pfe['specialité']!='ISIL-ACAD' && $data_pfe['specialité']!='ACAD-GTR' && $data_pfe['specialité']!='GTR-ACAD')
{
    header('Location:modifierpfe_master.php?idpf='.$id.' ');
}
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Modifier PFE</title>
      <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

    <link rel="stylesheet" href="css/styleFiche.css">  
      <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php include('sidebar.php')?>
    <?php
        $spec=$data_pfe['specialité'];
        $s=explode("-",$spec);
        ?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Modifier</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="proposer.php"></a>Modifier la fiche PFE | </li>
                    <li><a href="encadrement.php">Mes projets | </a></li>

                </ol>
            </div>
        </div>
        <div class="col-md-8 justify-content-center" >
        <div class="card mb-3" id="FichePFE">
            <div class="row justify-content-center">
                    <div class="photo">
                        <img src="img/logo_50.png" alt="">

                    </div>
                </div><span id="tit">Fiche de proposition de PFE Licence </span>
                <hr class="my-4">
                   
        <form method="POST" action="updatepfe.php?idpfee=<?=$id?>">
        <div class="form-group col-md-12" style="text-align: center; margin-top: 0px;">
                <span id="desc">Informations </span>
                </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-sm-12" id="info">Faculté</label>
                            <div class="col-sm-12">
                                <select name="nfaculte" class="form-control form-control-line">
                                <option selected="selected" value="<?=$data_pfe['faculté']?>"><?=$data_pfe['faculté']?></option>
                                    <option>FEI</option>
                                    <option>Mathématique</option>
                                    <option>Génie Civil</option>
                                    <option>GM-GP</option>
                                    <option>Physique</option>
                                    <option>Biologie</option>
                                    <option>Géologie</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12" id="info">Domaine</label>
                            <div class="col-sm-12">
                                <select name="ndomaine"  class="form-control form-control-line">
                                <?php
                                      $pfe7= $bdd->prepare("SELECT * FROM domaine ");
                                      $pfe7->execute();
                                      $data_dom= $pfe7->fetchAll();
                                      foreach($data_dom as $d){
                                          if($data_pfe['Domaine']==$d){    ?>
                                            <option selected="selected" value="<?=$d['id_domaine']?>"><?=$d['nom_domaine']?></option>
                                          <?php  }else{ ?>
                                            <option value="<?=$d['id_domaine']?>"><?=$d['nom_domaine']?></option>
                                          <?php }  ?>
                                          
                                    <?php  }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label name="spec" class="col-md-12" id="info">Spécialités</label>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <?php
                                        if(in_array("ACAD",$s)){    ?>
                                            <input class="form-check-input" type="checkbox" value="ACAD" id="flexCheckDefault" name="spec[]" checked>
                                     <?php   }else{ ?>
                                            <input class="form-check-input" type="checkbox" value="ACAD" id="flexCheckDefault" name="spec[]">
                                    <?php  }
                                    ?>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        ACAD
                                    </label>
                                </div>
                                <div class="form-check">
                                <?php
                                        if(in_array("ISIL",$s)){    ?>
                                            <input class="form-check-input" type="checkbox" value="ISIL" id="flexCheckDefault" name="spec[]" checked>
                                     <?php   }else{ ?>
                                        <input class="form-check-input" type="checkbox" value="ISIL" id="flexCheckDefault" name="spec[]">
                                   <?php  }
                                    ?>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        ISIL
                                    </label>
                                </div>
                                <div class="form-check">
                                <?php
                                        if(in_array("GTR",$s)){    ?>
                                            <input class="form-check-input" type="checkbox" value="GTR" id="flexCheckDefault" name="spec[]" checked>
                                     <?php   }else{ ?>
                                        <input class="form-check-input" type="checkbox" value="GTR" id="flexCheckDefault" name="spec[]">
                                   <?php  }
                                    ?>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        GTR
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12" id="info">Email du co-promoteur </label>
                            <div class="col-sm-12">
                                <input name="email_co"   type="text"  placeholder="Email usthb du co-promoteur" value="<?php if(!empty($data_pfe2))
                                {
                                     echo $data_pfe2['co_promoteur1'];
                                 }else{
                              echo '';
                                }?>" class="form-control form-control-line">
                            </div>  
                        </div>
                  
                        <br>
                        <div class="form-group col-md-12"><hr class="my-4">
                            <label class="col-md-12" id="info">Intitulé</label>
                            <div class="col-md-12">
                                <textarea values=" " name="nintitule" class="form-control form-control-line"> <?php echo $data_pfe['intitule'] ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">Résumé</label>
                            <div class="col-md-12">
                                <textarea name="nresume" rows="5" class="form-control form-control-line"><?php echo $data_pfe['resume'] ?></textarea>
                            </div> 
                        </div>
                       
                        <div class="form-group col-md-12" style="text-align: center;"><hr >
                        <span id="desc">Description complète du sujet </span>
                        </div><br>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">1- Description complète du sujet – travail attendu</label>
                            <div class="col-md-12">
                                <textarea name="ndescription" rows="5" class="form-control form-control-line"><?php echo $data_pfe['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">2-Résultats attendus </label>
                            <div class="col-md-12">
                                <textarea name="nobjectifs" rows="5" class="form-control form-control-line"><?php echo $data_pfe['objectif'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">3-Plan de travail avec échéancier </label>
                            <div class="col-md-12">
                                <textarea name="ntaches" rows="5" class="form-control form-control-line"><?php echo $data_pfe['taches'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">4-Outils Utilisés</label>
                            <div class="col-md-12">
                                <textarea name="noutils" rows="5" class="form-control form-control-line"><?php echo $data_pfe['outils'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12" id="info">
                            <label  class="col-md-12">5-Références bibliographiques</label>
                            <div class="col-md-12">
                                <textarea name="nref" rows="5" class="form-control form-control-line"><?php echo $data_pfe['reference'] ?></textarea>
                            </div>
                        </div>

                        <div class="group col-md-12">
                            <div class="col-sm-12">
                                <div class="sub">
                                <a href="updatepfe.php?idpfee=<?=$id?>"><button class="btn btn-success" id="btn-info" style="float : right; margin-bottom: 5px">Valider la modification</button></a>
                                </div>
                            </div>
                        </div>

                      

                    </div>
                </div>
            </div>
        </div>
    </form>

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