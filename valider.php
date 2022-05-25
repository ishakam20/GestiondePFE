<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }

    $email = ($_SESSION['user']);
    if(isset($_GET['id_pfe3'])){
      $id=$_GET['id_pfe3'];
      $sql = "UPDATE pfe SET `etatdevalidation`='Validé' WHERE id ='".$id."'";
      $exec = $bdd->query($sql) ;
    
      $result = $bdd->prepare("INSERT  INTO resultat_commission (`idpfe`,`membre`,`resultat`,`commentaire`) VALUES ('$id','$email','Validé','Pas de commentaire')");
      $result->execute();
      $data_result = $result->fetch();
    
      

    
    }
    if($exec)
      { 
        header('Location:table_commission.php?valid=oui');
      }else
      { 
        header('Location:table_commission.php?valid=non');
      }
?> 