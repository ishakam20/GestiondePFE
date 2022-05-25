<?php 
// ATTENTION !!! ne pass toucher à ce bout de code //
    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }

    $email = ($_SESSION['user']);
    $idpfee=$_GET['id'];
    $sql = "DELETE FROM `pfe` WHERE `pfe`.`id` = '$idpfee' " ;
    $exec = $bdd->query($sql) ;

    if($exec)
    { 
      header('Location:encadrement.php?supp=oui');
    }else
    {
      header('Location:encadrement.php?supp=non');
    } 


?>