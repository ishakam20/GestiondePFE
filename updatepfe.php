<?php 
// ATTENTION !!! ne pass toucher à ce bout de code //
    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }

    if(isset($_GET['idpfee']))
    {
    $idpfee=$_GET['idpfee'];
    $email = ($_SESSION['user']);
    $faculté = ($_POST['nfaculte']);

    $domaine = ($_POST['ndomaine']);
    $resume = ($_POST['nresume']);
    $intitule = ($_POST['nintitule']);
    $description = ($_POST['ndescription']);
    $reference = ($_POST['nref']);
    $objectifs = ($_POST['nobjectifs']);
    $outils = ($_POST['noutils']);$emailco=($_POST['email_co']);

    $sql2 = "UPDATE  promoteur SET `co_promoteur1`='".$emailco."' WHERE id_projet ='".$idpfee."'";
    $exec2 = $bdd->query($sql2) ;
    $taches = ($_POST['ntaches']);
    
    $spec=$_POST['spec'][0];
    foreach($_POST['spec'] as $p){
     if($p!=$_POST['spec'][0]){
      $spec=$spec."-".$p;
    }
}

    $sql = "UPDATE `pfe` SET `date`= now() ,`faculté`='".$faculté."',`specialité`='". $spec."',`domaine`='".$domaine."',`resume`='".$resume."',`outils`='".$outils."',`description`='".$description."',`objectif`='".$objectifs."',`intitule`='".$intitule."',`taches`='".$taches."',`reference`='".$reference."' WHERE enseignant ='$email' AND id ='$idpfee'";
    $exec = $bdd->query($sql) ;
}

if($exec)
    { 
      header('Location:encadrement.php?modif=oui');
    }else
    {
      header('Location:encadrement.php?modif=non');
    } 


?>

