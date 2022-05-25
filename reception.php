<?php 
    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
    $email = $_SESSION['user'];
    include('functions.php');
    if(isset($_GET['idreu']))
    {
    $id=$_GET['idreu'];
    $reunion = $bdd->prepare("SELECT * FROM reunion_etudiant WHERE id_reunion_etu= '$id' ");
    $reunion->execute();
    $data_reunion = $reunion->fetch();
    $etu1=$data_reunion['email_etu'];
    
    $pfe1= $bdd->prepare('SELECT * FROM `enseignant` WHERE emailusthb = ? ');
    $pfe1->execute(array($email));
    $data_ens = $pfe1->fetch();

    $link = 'http://localhost/pfe_update/src/reunion/reunion.php';
    $message=$data_ens['nom']." ".$data_ens['prenom']." ";
    $message2='vous accuse reception';
    $message3=$message.$message2;
    addNotification($bdd,$email,$etu1,$message3,$link) ;
    $reunion2 = $bdd->prepare("DELETE  FROM reunion_etudiant WHERE id_reunion_etu= '$id' ");
    $reunion2->execute();
    }

   

  header('Location:mes_demandes_reunions.php?accusé=oui');
