<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
include('functions.php');
$datereu = $_POST['date'];
$heure = $_POST['heure'];
$lieu = $_POST['lieu'];
$titre = $_POST['titre'];
$description = $_POST['description'];
$email = $_SESSION['user'];

if(isset($_GET['etudiant1']) && isset($_GET['etudiant2']) && isset($_GET['id_pfe3'])){
$pfe = $_GET['id_pfe3'];
$etu1 = $_GET['etudiant1'];
$etu2 = $_GET['etudiant2'];
$query = "INSERT INTO reunion (`organisateur`,`etudiant1`,`etudiant2`,`datereu`,`heurereu`, `lieu`, `titre`, `description`,`id_projet`) VALUES ('" . $email . "','" . $etu1 . "','" . $etu2. "','" . $datereu . "','" . $heure . "','" . $lieu. "','" . $titre . "','" . $description . "','" . $pfe. "'  )";
$stmt = $bdd->query($query);
$link = 'http://localhost/pfe_update/src/reunion/reunion.php';
addNotification($bdd,$email,$etu1,'Vous venez de recevoir une reunion',$link) ;
addNotification($bdd,$email,$etu2,'Vous venez de recevoir une reunion',$link) ;
}
if($stmt)
{ 
  header('Location:commissionsuivi.php?planifs=oui');
}else
{
  header('Location:commissionsuivi.php?planifs=non');
} 
?>