<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }

    $email = ($_SESSION['user']);
    $avancement1 = $_POST['etatav1'];
    $avancement2 = $_POST['etatav2'];
    $remarque1 = $_POST['remarque1'];
    $remarque2 = $_POST['remarque2'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $heure1 = $_POST['heure1'];
    $heure2 = $_POST['heure2'];
   
   

    if(isset($_GET['id_pfeee'])){
 $id=$_GET['id_pfeee'];
    $pfe = $bdd->prepare("SELECT * FROM pfe WHERE id = '$id'");
    $pfe->execute();
    $data_pfe = $pfe->fetch();
    $etu1 = $data_pfe['etudiant1'];
    $etu2 = $data_pfe['etudiant2'];

    $exec = $bdd->prepare("INSERT  INTO etatdav (`etudiant1`,`etudiant2`,`pfe`,`enseignant`,`etatav1`,`remarque1`,`etatav2`,`remarque2`,`date`,`date2`,`heure1`,`heure2`) 
    VALUES ('$etu1','$etu2','$id','$email','$avancement1','$remarque1','$avancement2','$remarque2','$date1','$date2','$heure1','$heure2')");
    $exec->execute();
    }

    if($exec)
    { 
      header('Location:commissionsuivi.php?etat=oui');
    }else
    {
      header('Location:commissionsuivi.php?etat=non');
    } 

    
    