<?php 
    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }


    $emailetu=$_GET['email_candidat'];
    $idpf=$_GET['id_sujet'] ;
    $idcand=$_GET['id_candidature'] ;
    $emailbin=$_GET['email_binome'];
    

    if(isset($idpf)){
      $sql = "UPDATE pfe SET `etudiant1`='$emailetu',`etudiant2`='$emailbin',`etatdupfe`='pris' WHERE `id`='$idpf'";
      $exec = $bdd->query($sql) ;
      $sql = "UPDATE candidature SET `status_candidature`='Confirmé' WHERE `id_candidature`='".$idcand."'";
      $exec = $bdd->query($sql) ;
      $sql = "DELETE FROM `candidature` WHERE email_candidat ='$emailetu' OR email_candidat ='$emailbin' AND id_candidature !='$idcand'  " ;
      $exec = $bdd->query($sql) ;
      if($exec)
      {  echo 'Vos modification ont bien été efféctués' ;
      } else
      {echo 'Erreur de modification';} 
    }



