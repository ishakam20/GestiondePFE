<?php 

    session_start();              //ouverture de la séance.
    require_once 'db.php';
    
    if(!isset($_SESSION['user']))
    {
        header('Location:index3.php'); 
        die();
    }
    $email = $_SESSION['user'];
if (!empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['lieu']) && !empty($_POST['titre']) && !empty($_POST['description'])){
$datereu = $_POST['date'];
$heure = $_POST['heure'];
$lieu = $_POST['lieu'];
$titre = $_POST['titre'];
$description = $_POST['description'];
}
$etu1 = $_GET['etu1'];
$etu2 = $_GET['etu2'];
echo $etu1;
echo $etu2;

if (!empty($datereu) && !empty($etu1) && !empty($etu2) && !empty($heure) && !empty($lieu) && !empty($titre) && !empty($description)) 
{ 
    echo $etu1;
    echo $etu2;
$query = "INSERT INTO reunion (`organisateur`,`etudiant1`,`etudiant2`,`datereu`,`heurereu`, `lieu`, `titre`, `description`) VALUES ('" . $email . "','" . $_GET['etu1']. "','" . $_GET['etu2']. "','" . $datereu . "','" . $heure . "','" . $lieu. "','" . $titre . "','" . $description . "'  )";
$stmt = $bdd->query($query);
echo $query;

if($stmt)
{  echo 'Vos modification ont bien été efféctués' ;
}else
{echo 'Erreur de modification';} }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planification de reunion</title>
</head>
<body>
<h1> Planifier une reunion  <h1>
<?php
if(isset($_GET['etu1']) && isset($_GET['etu2'])){
echo $_GET['etu1'];
$et1=$_SESSION['etu1'][$_GET['etu1']];
$et2=$_SESSION['etu2'][$_GET['etu2']];
}
?>
    <form action="reunion.php?etu1=<?=$et1?>&etu2=<?=$et2?>" method ="POST"> 
    <div>
    <?php echo 'sess1=' .$_SESSION['etu1'];  ?>
    <label for="dateinput"> Date de la reunion </label>
    <input class="input100" type="text" name="date" id="dateinput" placeholder="20/06/2030" ></input>
    </div>  
    <div>
    <label for="heureinput"> Heure de la reunion </label>
    <input class="input100" type="text" name="heure" id="heureinput" placeholder="15:00" ></input>
    </div>  
    <div>
    <label for="lieuinput"> Lieu de la reunion </label>
    <input class="input100" type="text" name="lieu" id="lieuinput" placeholder="Salle 126" ></input>
    </div>  
    <div>
    <label for="titreinput"> Titre de la reunion </label>
    <input class="input100" type="text" name="titre" id="titreinput" placeholder="Memoire" ></input>
    </div>  
    <div>
    <label for="descriptioninput"> Description de la reunion </label>
    <input class="input100" type="text" name="description" id="descriptioninput" placeholder="Nous allons parler de comment rediger un mémoire" ></input>
    </div>  
     <button type="submit" name="submit" > Valider</button>

    </form>
</body>
</html>