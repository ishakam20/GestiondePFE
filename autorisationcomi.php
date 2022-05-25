<?php
session_start();              //ouverture de la session.
require_once 'db.php';

if(!isset($_SESSION['user']))
{
    header('Location:index3.php'); 
    die();
}

$email = $_SESSION['user'];
$id=$_SESSION['iddd'];

$pfe9= $bdd->prepare("SELECT * FROM `enseignant` WHERE emailusthb = '$email' ");
$pfe9->execute();
$data_ens2 = $pfe9->fetch();

$membre1= $data_ens2['nom']." ".$data_ens2['prenom'];

if(isset($_POST['membre2']))
{
$membre2  = $_POST['membre2'];
}else {
$membre2 = 'aucun' ;
}

if(isset($_POST['commentairecomi']))
{
$aviscomi='favorable';
$commentairecomi  = $_POST['commentairecomi'];
}else {
$aviscomi='défavorable';
$commentairecomi = 'aucun' ;
}
if(isset($_POST['motifcomi']))
{
$motifcomi  = $_POST['motifcomi'];
}else {
$motifcomi = 'aucun' ;
}


$sql = "UPDATE `autorisation` SET `aviscomi`= '".$aviscomi."',`membrecomi1`= '".$membre1."',`membrecomi2`= '".$membre2."',
`commentairecomi`='".$commentairecomi."' WHERE idpfe ='".$id."'";
$exec = $bdd->query($sql) ;

if($exec)
{ 
  header('Location:commissionsuivi.php?auto2=oui');
}else
{
  header('Location:commissionsuivi.php?auto2=non');
} 

