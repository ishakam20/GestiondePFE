<?php
session_start();              //ouverture de la session.
require_once 'db.php';
if (!isset($_SESSION['user'])) {
    header('Location:index3.php');
    die();
}
include('functions.php');
$reponse = htmlspecialchars($_GET['reponse']);
$id_candidature = htmlspecialchars($_GET['id_candidature']);
$email_candidat1 = htmlspecialchars($_GET['email_candidat']);
$email_candidat2 = htmlspecialchars($_GET['email_binome']);
$email_ens = htmlspecialchars($_SESSION['user']);


//récupere le nom et prénom de l'enseignant afin de les mettre dans la notification.
$query = "SELECT nom,prenom FROM enseignant WHERE emailusthb= '$email_ens'";
$data = $bdd->query($query);
$data_statement = $data->fetch();
$nom_ens = $data_statement['nom'];
$prénom_ens = $data_statement['prenom'];
$mes_candidatures = "http://localhost:8080/pfe_update/src/Mon_pfe/Mes_candidatures.php";


if (isset($reponse, $id_candidature)) {
    if ($reponse === 'accepter') {
        $query = "UPDATE candidature SET `status_candidature`='accepté' WHERE id_candidature = $id_candidature";
        $bdd->query($query);
        addNotification($bdd, $email_ens, $email_candidat1, "$nom_ens $prénom_ens a répondu à une candidature de pfe", $mes_candidatures);
        addNotification($bdd, $email_ens, $email_candidat2, "$nom_ens $prénom_ens a répondu à une candidature de pfe", $mes_candidatures);
    } elseif ($reponse === 'refuser') {
        $query = "UPDATE candidature SET `status_candidature`='refusé' WHERE id_candidature = $id_candidature";
        $bdd->query($query);
        addNotification($bdd, $email_ens, $email_candidat1, "$nom_ens $prénom_ens a répondu à une candidature de pfe", $mes_candidatures);
        addNotification($bdd, $email_ens, $email_candidat2, "$nom_ens $prénom_ens a répondu à une candidature de pfe", $mes_candidatures);
    }
    }
header("location:mes_candidaturespfe.php");
