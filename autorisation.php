<?php
session_start();              //ouverture de la session.
require_once 'db.php';

if(!isset($_SESSION['user']))
{
    header('Location:index3.php'); 
    die();
}

$email = $_SESSION['user'];
$Dateautorisation = $_POST['Dateautorisation'];

$id=$_SESSION['idd'];
if(isset($_POST['biblio']))
{
$biblio = 'oui';
$avis='favorable';
}else {
$biblio = 'non' ;
$avis='défavorable';
}
if(isset($_POST['conception']))
{
$conception = 'oui';
}else {
$conception = 'non' ;
}
if(isset($_POST['visibilité']))
{
$visibilité = 'oui';
}else {
$visibilité = 'non' ;
}
if(isset($_POST['document']))
{
$document = 'oui';
}else {
$document = 'non' ;
}
if(isset($_POST['realisation']))
{
$realisation  = $_POST['realisation'];
}else {
$realisation = 0 ;
}
if(isset($_POST['autre']))
{
$autre  = $_POST['autre'];
}else {
$autre = 'aucun' ;
}
if(isset($_POST['motif']))
{
$motif  = $_POST['motif'];
}else {
$motif = 'aucun' ;
}


$result = $bdd->prepare("INSERT  INTO autorisation (`date`,`idpfe`,`Organisme`,`avis`,`biblio`,`conception`,`document`,`realisation`,`autre`,`motif`,`visibilité`) 
VALUES ('$Dateautorisation','$id','USTHB','$avis','$biblio','$conception ','$document','$realisation','$autre','$motif','$visibilité')");
$result->execute();
$data_result = $result->fetch();

if($result)
{ 
  header('Location:espace_de_travail.php?auto=oui');
}else
{
  header('Location:espace_de_travail.php?auto=non');
} 


