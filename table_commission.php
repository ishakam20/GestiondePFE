<?php 
    session_start();    
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
    $emailusthb = ($_SESSION['user']);
    
    
    $commi3 = $bdd->prepare('SELECT * FROM `commission` WHERE mail_ens = ? ');
    $commi3->execute(array($emailusthb));
    $data_commi = $commi3->fetch();
    $row = $commi3->rowCount();         // rowCount retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()

    if($row == 1)
    { 
    $dom=$data_commi['id_domaine'];
    $commi = $bdd->prepare("SELECT * FROM `domaine` WHERE id_domaine = '$dom'");
    $commi->execute();
    $data_iddom = $commi->fetch();

    $nom_dom = $data_iddom['nom_domaine'];
    $comm = $bdd->prepare("SELECT * FROM `pfe`WHERE domaine = '$nom_dom' AND enseignant != '$emailusthb' AND etatdupfe ='prit' AND etatdevalidation ='Pas encore traité' ");
    $comm->execute();
    $data_comipfe = $comm->fetchAll();

    $commi5 = $bdd->prepare("SELECT * FROM `resultat_commission` WHERE  resultat ='Validé S/R' AND membre = ? ");
    $commi5->execute(array($emailusthb));
    $data_comipfe2 = $commi5->fetchAll();

    $_SESSION['valid']=true;
    $_SESSION['validsr']=true;
   

    }else{
        header('Location: error.php');
    }

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
                <h4 class="text">Commission de validation</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="#"></a>Les projets à evaluer </li>
               
                
                </ol><?php 
            if( !empty($_GET['valid']) && $_GET['valid']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\"> Le PFE a bien été validé <div>";
            }elseif( !empty($_GET['valid']) && $_GET['valid']==='non') {
            echo "<div class=\"alert alert-danger\" role=\"alert\"> Le PFE n'a pas été validé <div>";
            }

            if( !empty($_GET['validsr']) && $_GET['validsr']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\"> Le PFE a bien été validé sous reserve <div>";
            }elseif( !empty($_GET['validsr']) && $_GET['validsr']==='non') {
            echo "<div class=\"alert alert-danger\" role=\"alert\"> Le PFE n'a pas été validé sous reserve  <div>";
            }

            if( !empty($_GET['invalid']) && $_GET['invalid']==='oui')
            {
            echo "<div class=\"alert alert-success\" role=\"alert\"> Le PFE a bien été invalidé <div>";
            }elseif( !empty($_GET['invalid']) && $_GET['invalid']==='non') {
            echo "<div class=\"alert alert-danger\" role=\"alert\"> Le PFE n'a pas été invalidé <div>";
            } ?>
            </div>
            
      </div>
              
       
        <div class="row">
            <div class="col-sm-12">
                <br>
                <br><br><br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr id="header">
                                <th>N</th>
                                <th>Titre</th>
                                <th>Domaine</th>
                                <th>Date de publication</th>
                                <th>Action</th>
                            </tr>
                        </thead>
<?php $cpt=1;
foreach($data_comipfe as $d3)
{   
    $r= $d3['id'] ;
    $commi15 = $bdd->prepare("SELECT * FROM promoteur WHERE id_projet = '$r'");
    $commi15->execute();
    $data_comipfe5 = $commi15->fetch();
    if($data_comipfe5['co_promoteur1'] != $emailusthb )
    {
?>
                        <tbody>
                            <tr>
                                <td><?php echo $cpt; $cpt++; ?> </td>
                                <td><?php echo $d3['intitule']?> </td>
                                <td><?php echo $d3['domaine'] ?> </td>
                                <td><?php echo $d3['date'] ?> </td>
                                <td>
                                    <div class="modif">
                                        <form method ="POST" action="commission.php?id_pfe2=<?=$r?>">
                                        <a href="commission.php?id_pfe2=<?=$r?>"><button class="btn btn-outline-dark" id="mod">Evaluer</button></a>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
<?php 
} }
?>
<?php 
foreach($data_comipfe2 as $d4)
{   
    $r= $d4['idpfe'] ;
    $commi7 = $bdd->prepare("SELECT * FROM `pfe`WHERE id = '$r'");
    $commi7->execute();
    $data_comipfe3 = $commi7->fetch();
if ($data_comipfe3['etatdevalidation']!='Valider S/R'){
?>
                        <tbody>
                            <tr>
                                <td><?php echo $cpt=$cpt+1;?> </td>
                                <td><?php echo $data_comipfe3['intitule']?> </td>
                                <td><?php echo $data_comipfe3['domaine'] ?> </td>
                                <td><?php echo $data_comipfe3['date'] ?> </td>
                                <td>
                                    <div class="modif">
                                        <form method ="POST" action="commission.php?id_pfe2=<?=$r?>">
                                        <a href="commission.php?id_pfe2=<?=$r?>"><button class="btn btn-outline-dark" id="mod">Evaluer</button></a>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
<?php 
} }
?>
                    </table>
                </div>
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