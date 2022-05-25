<?php 
session_start();              //ouverture de la séance.
require_once 'db.php';

$faculte = ($_POST['faculte']);
$intitule = ($_POST['intitule']);
$domaine = ($_POST['domaine']);
$description = ($_POST['description']);
$resume = ($_POST['resume']);
$objectif = ($_POST['objectif']);
$outils = ($_POST['outils']);
$reference = ($_POST['ref']);
$taches = ($_POST['taches']);
$emailusthb = ($_SESSION['user']);
$email_co=($_POST['email_co']);
$spec=$_POST['spec'][0];
foreach($_POST['spec'] as $p){
    if($p!=$_POST['spec'][0]){
      $spec=$spec."-".$p;
    }
}


$deppfe = $bdd->prepare("INSERT INTO pfe (`type_proj`,`faculté`,`specialité`,`intitule`,`Domaine`,`description`,`resume`,`objectif`,`outils`,`reference`,`etatdevalidation`,`date`,`taches`,`etatdupfe`,`enseignant`) VALUES ('interne','$faculte','$spec','$intitule','$domaine','$description','$resume','$objectif','$outils','$reference','Pas encore traité',now(),'$taches','non prit','$emailusthb') ;");
$res=$deppfe->execute();

$profile = $bdd->prepare("SELECT * FROM pfe WHERE `faculté` = '$faculte' AND `intitule` = '$intitule' AND `description` = '$description' ");
$profile->execute();
$data_profile = $profile->fetch();

$id = $data_profile['id'] ;
$vide1='NON';

$deppfe2 = $bdd->prepare("INSERT INTO promoteur (`id_projet`,`promoteur`,`co_promoteur1`,`co_promoteur2`,`commission_sv`) VALUES ('$id','$emailusthb','$email_co','$vide1','$vide1')");
$deppfe2->execute();
if($res)
{ 
  header('Location:proposer.php?depot=oui');
}else
{
  header('Location:proposer.php?depot=non');
} 

?>