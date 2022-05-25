<?php
session_start();              //ouverture de la session.
require_once 'db.php';

$email = $_SESSION['user'];
$autre_email = $_POST['nv_email'];
$tel = $_POST['nv_telephone'];
$about = $_POST['nv_about'];
$website = $_POST['website'];
$github = $_POST['github'];
$linkedin =$_POST['linkedin'];
$gmail=$_POST['gmail'];


if(!empty($tel)){
if (is_numeric($tel) && strlen($tel) === 10){
$sql = "UPDATE `enseignant` SET  `email`='" . $gmail . "', `email2`='" . $autre_email . "', `numerotel`='" . $tel . "', `description`=\"" . $about . "\", website=\"" . $website . "\",
 GitHub=\"" . $github . "\",linkedin=\"" . $linkedin . "\" WHERE emailusthb ='" . $email . "'";
$exec = $bdd->query($sql);
//Vérifier si la requête d'insetion a réussi 
 if ($exec) {
    header('location:prof_ens.php?modif=oui');
 
} else {
    header('location:prof_ens.php?modif=non');
  
}
}else{
    header('location:prof_ens.php?modif=wrongformatnumber');

}
}else
{
    $sql = "UPDATE `enseignant` SET  `email`='" . $gmail . "', `email2`='" . $autre_email . "', `numerotel`='" . $tel . "', `description`=\"" . $about . "\", website=\"" . $website . "\",
    GitHub=\"" . $github . "\",linkedin=\"" . $linkedin . "\" WHERE emailusthb ='" . $email . "'";
   $exec = $bdd->query($sql);
        //Vérifier si la requête d'insetion a réussi 
        if ($exec) {
            header('location:prof_ens.php?modif=oui');
          
        } else {
            header('location:prof_ens.php?modif=non');
            
            
        }
}   