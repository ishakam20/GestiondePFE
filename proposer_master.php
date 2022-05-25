<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Proposer PFE</title>
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
    <?php
include('sidebar.php');?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Proposer</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="#"></a>Proposer pour Master| </li>
                    <li><a href="proposer.php">Poposer pour Licence  </a></li>

                </ol>
            </div>
        </div>
        <?php if( isset($_SESSION['depot']) && $_SESSION['depot']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\"> Le PFE a bien été déposé <div>";
            $_SESSION['depot']='done';
            }elseif( isset($_SESSION['depot']) && $_SESSION['depot']==='non') {
            echo "<div class=\"alert alert-danger\" role=\"alert\"> Le PFE n'a pas été déposé <div>";
            $_SESSION['depot']='done';
            }
        ?>
        <div class="col-md-8 justify-content-center" >
            <div class="card mb-3" id="FichePFE">
            <div class="row justify-content-center">
                    <div class="photo">
                        <img src="img/logo_50.png" alt="">

                    </div>
                </div><span id="tit">Fiche de proposition de PFE Master </span>
                <hr class="my-4">
                <br>
                <div class="card-body">
        <form method="POST" action="Deposer.php">
        <div class="form-group col-md-12" style="text-align: center; margin-top: 0px;">
                <span id="desc">Informations </span>
                </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            
                            <label class="col-sm-12" id="info">Faculté</label>
                            <div class="col-sm-12">
                                <select name="faculte" class="form-control form-control-line">
                                <option style="display: none;"selected>Select</option>
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
                            <label class="col-sm-12" id="info" >Domaine</label>
                            <div class="col-sm-12">
                                <select name="domaine" class="form-control form-control-line">
                                    <option style="display: none;"selected>Select</option>
                                    <option>Dev Web</option>
                                    <option>SIDB</option>
                                    <option>IA</option>
                                    <option>Sécurité</option>
                                    <option>GL</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label name="spec" class="col-md-12" id="info">Spécialités</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SSI" id="flexCheckDefault" name="spec[]" >
                                    <label  class="form-check-label" for="flexCheckDefault">
                                        SSI
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="RSD" id="flexCheckChecked" name="spec[]" >
                                    <label  class="form-check-label" for="flexCheckChecked">
                                        RSD
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="BIG DATAA" id="flexCheckChecked" name="spec[]">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        BIG DATAA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="SII" id="flexCheckChecked" name="spec[]">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        SII
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="MIV" id="flexCheckChecked" name="spec[]">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        MIV
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="BIO INFO" id="flexCheckChecked" name="spec[]">
                                    <label class="form-check-label" for="flexCheckChecked">
                                       BIO INFO
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="IL" id="flexCheckChecked" name="spec[]">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        IL
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <label class="col-sm-12" id="info">Email du co-promoteur </label>
                            <div class="col-sm-12">
                                <input name="email_co"   type="text" placeholder="Email usthb du co-promoteur" class="form-control form-control-line">
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <hr class="my-4"> 
                            <label class="col-md-12" id="info">Intitulé</label>
                            <div class="col-md-12">
                                <textarea name="intitule" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">Résumé</label>
                            <div class="col-md-12">
                                <textarea name="resume" rows="5" class="form-control form-control-line"></textarea>
                            </div> <hr>
                        </div>
                       

                        <div class="form-group col-md-12" style="text-align: center;">
                        <span id="desc">Description complète du sujet </span>
                        </div><br>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">1- Description complète du sujet – travail attendu</label>
                            <div class="col-md-12">
                                <textarea name="description" rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">2-Résultats attendus </label>
                            <div class="col-md-12">
                                <textarea name="objectif" rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">3-Plan de travail avec échéancier </label>
                            <div class="col-md-12">
                                <textarea name="taches" rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">4-Outils Utilisés</label>
                            <div class="col-md-12">
                                <textarea name="outils" rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label  class="col-md-12" id="info">5-Références bibliographiques</label>
                            <div class="col-md-12">
                                <textarea name="ref" rows="5" class="form-control form-control-line"></textarea>
                            </div>
                        </div>

                        <div class="group col-md-12">
                            <div class="col-sm-12">
                                <div class="sub">
                                    <button class="btn btn-success" id="btn-info" style="float : right;">Publier</button>
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