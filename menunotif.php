<?php

require_once 'db.php';
if (!isset($_SESSION['user'])) {          //si user non connecté alors renvoyer à la page d'accueil.
  header('Location:index3.php');
  die();
}

$email = $_SESSION['user'];
require_once 'functions.php';

$stmt = $bdd->query("SELECT * FROM enseignant");
$data_ens = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>USTHB GRAD
    </title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_profil.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
    
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

                    
                    <?php $notification = getNotification($bdd, $email); ?>
                        <div class="box">
                            <div class="notification">
                                <i class="fas fa-bell"></i>
                            
                                <ul>
                                <?php
              foreach ($notification as $i) {
                if ($i['status'] === 'non_lu') {
              ?>
                                    <li><a href="<?php echo $i['link'] . "?id=" . $i['id']; ?>">
                                        <span class="icon"><i class="fas fa-envelope"></i></span>
                                        <span class="text-hour"> <?php echo "<b>" .$i['date_notification']."</b>" ?></span><span class="text"> <?php echo  "<b>" .$i['message']."</b>";?></a></span>

                                    </li>
                                    <?php } else{ ?><li><a href="<?php echo $i['link'] . "?id=" . $i['id']; ?>">
                                        <span class="icon"><i class="fas fa-envelope"></i></span>
                                        <span class="text-hour"> <?php echo $i['date_notification'] ?></span><span class="text"> <?php echo $i['message'];?></a></span>
                                        <?php }}  ?>
                                    <li>
                                        <span class="toutesNotif"><a href="http://localhost/lyd/notif.php">Toutes les Notifications</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                   
               
</body>
</html>