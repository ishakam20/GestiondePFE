<?php

function fetchAll($bdd,$query){
    require_once '../../db/db.php';  
    $stmt = $bdd->query($query);
    return $stmt->fetchAll();
}

function executQuery($bdd,$query){
    require_once '../../db/db.php';  
    $stmt = $bdd->prepare($query);
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
} 

 function addNotification($bdd,$email_exp,$email_rec,$message,$link)
 {
    $stmt = "INSERT INTO `notification`(`email_exp`, `email_rec`, `message`, `status`, `date_notification`, `link`) VALUES ('".$email_exp."','".$email_rec."','".$message."','non_lu',now(),'".$link."')";
    $bdd->query($stmt);
    
 }

 function getNotification($bdd,$email_rec)
 {
     $stmt = $bdd->prepare("SELECT * FROM `notification` WHERE email_rec = '$email_rec' order by date_notification DESC");  
     $stmt->execute();              
     $data = $stmt->fetchAll();    
     return $data ; 
 } 

 function addCandidature($bdd,$email_candidat,$id_sujet,$type,$message_candidature)
 {
    $stmt = "INSERT INTO `candidature`(`email_candidat`, `id_sujet`, `type`, `message_candidature`,status_candidature) VALUES ('".$email_candidat."','".$id_sujet."','".$type."','".$message_candidature."','en_attente')";
    $bdd->query($stmt);
    
 }

 function alreadyCandidatBinome($bdd,$email_candidat,$email_auteur){
    $stmt =("SELECT * FROM `candidature`,publication WHERE email_candidat = '$email_candidat' AND `type`='binome' AND id_publication = id_sujet 
     AND email = '$email_auteur'");              
    $data = $bdd->query($stmt);
    $data_statement = $data->fetchAll();    
    return (count($data_statement)>0);                     
 }

 function addBinome($bdd,$email_etu1,$email_etu2){
    $stmt = "INSERT INTO `binome`(`email_etudiant1`, `email_etudiant2`) VALUES ('".$email_etu1."','".$email_etu2."')";
    $bdd->query($stmt);
 }

 function alreadyHasPfe($bdd,$email_etu)
 {
     $query = "SELECT * from pfe where etatdupfe= 'prit' AND (etudiant1 = '$email_etu' OR etudiant2 = '$email_etu')";
     $data = $bdd->query($query);
     $data_statement = $data->fetchAll();
     return count($data_statement)>0;
   
 }

 
 function alreadyCandidatPfe($bdd,$email_candidat,$id_pfe){
    $stmt =("SELECT * FROM `candidature`,pfe WHERE email_candidat = '$email_candidat' AND `type`='pfe' AND id = id_sujet
    AND id = $id_pfe");                                     //si l'étudiant a déjà candidaté à ce pfe.
    $data = $bdd->query($stmt);
    $data_statement = $data->fetchAll();    
    return (count($data_statement)>0);      
 }

 function attributepfe($bdd,$id_pfe,$email_etu1,$email_etu2=NULL)
 {
     if($email_etu2 == NULL){
     $query = "UPDATE pfe SET `etatdupfe`='prit', etudiant1 ='$email_etu1' WHERE id = $id_pfe";
     $bdd->query($query);
    }else{
        $query = "UPDATE pfe SET `etatdupfe`='prit', etudiant1 ='$email_etu1', etudiant2 = '$email_etu2' WHERE id = $id_pfe";
        $bdd->query($query);
     }

 }

 function getbinome($bdd,$email_etu1){
     $query = "SELECT * FROM binome WHERE email_etudiant1 = '$email_etu1' OR email_etudiant2 = '$email_etu1'";
     $data_query = $bdd->query($query);
     $data_query_fetched = $data_query->fetch();
     if(isset($data_query_fetched['email_etudiant1'],$data_query_fetched['email_etudiant2'])){
        if ($data_query_fetched['email_etudiant1'] === $email_etu1){ return $data_query_fetched['email_etudiant2'];
        }else{ return $data_query_fetched['email_etudiant1'];}
     }else return NULL;
 }

 function addtopfe($bdd,$email,$id_pfe){   //add le binôme au pfe dans le cas ou le binôme est attribué après attribution de pfe. 
     $query = "UPDATE pfe SET etudiant2 = '$email' WHERE id=$id_pfe";
     $bdd->query($query);
 }

 function getid_pfe($bdd,$email){     //get le id du pfe dans le cas ou on connait l'un des étudiant qui lui sont attribué
    $query = "SELECT id FROM pfe WHERE etudiant1='$email' OR etudiant2='$email'";
    $data = $bdd->query($query);
    $id_pfe = $data->fetch()['id'];
    return $id_pfe;
 }

