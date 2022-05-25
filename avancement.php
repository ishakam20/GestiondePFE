<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
    
    $id = $_GET['id'];

    if(isset($id)){
        $sql = "UPDATE pfe SET `etatd'avancement`='50' WHERE id ='".$id."'";
        $exec = $bdd->query($sql) ;
        if($exec)
      {  echo 'Vos modification ont bien été efféctués' ;
      } else
      {echo 'Erreur de modification';} 
    }

    