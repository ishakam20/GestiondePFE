<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
    
    $emailusthb=$_SESSION['user'];
    $message=$_POST['message'];
    if(isset($_GET['ii'])){
    $id = $_GET['ii'] ;
    $query = "INSERT INTO candidature (`email_candidat`,`id_sujet`,`type`,`message_candidature`,`status_candidature`, `date`) VALUES ('$emailusthb','$id','pfe',' $message','en_attente', now() )";
    $stmt = $bdd->query($query);
    }

if($stmt)
{ 
  header('Location:accueil_ens.php?candi=oui');
}else
{
  header('Location:accueil_ens.php?candi=non');
} 
