<?php 
    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }


    $idcand=$_GET['id_candidature'] ;
    $emailetu=$_GET['email_candidat'];
    $emailbin=$_GET['email_binome'];

    if(isset($idcand)){
      $sql = "UPDATE candidature SET `status_candidature`='Refusé' WHERE `id_candidature`='".$idcand."'";
      $exec = $bdd->query($sql) ;
      $sql = "DELETE FROM `candidature` WHERE email_candidat ='$emailetu' OR email_candidat ='$emailbin' AND id_candidature !='$idcand'  " ;
      $exec = $bdd->query($sql) ;
      if($exec)
      {  echo 'Candidature refusé' ;
      } else
      {echo 'Erreur de modification';} 
    }
