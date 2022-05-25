<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }

    $email = ($_SESSION['user']);
    
 if(!empty($_POST['motif']))
      {$commentaire = $_POST['motif'];
        header('Location:table_commission.php?validsr=non');
      
    if(isset($_GET['id_pfe3'])){
     
        $id=$_GET['id_pfe3'];
        $sql = "UPDATE pfe SET `etatdevalidation`='validé S/R' WHERE id ='".$id."'";
        $exec = $bdd->query($sql) ;

        $result = $bdd->prepare("INSERT  INTO resultat_commission (`idpfe`,`membre`,`resultat`,`commentaire`) VALUES ('$id','$email','Validé S/R','$commentaire')");
        $result->execute();
        $data_result = $result->fetch();
        
    }else{  header('Location:table_commission.php?validsr=non');}
      }
      
      if($exec)
      { 
        header('Location:table_commission.php?validsr=oui');
      }else
      { 
        header('Location:table_commission.php?validsr=non');
      }
      ?>