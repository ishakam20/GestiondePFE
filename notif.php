<?php
session_start();              //ouverture de la session.
require_once 'db.php';
if (!isset($_SESSION['user'])) {          //si user non connecté alors renvoyer à la page d'accueil.
    header('Location:index3.php');
    die();
}
$email = $_SESSION['user'];
$query_notif = "SELECT * FROM `notification` WHERE email_rec = '$email'";
$data_notif = $bdd->query($query_notif);

if(isset($_GET['delete'])){
if ($_GET['delete'] === 'yes')
{
    $query = "DELETE FROM `notification` WHERE email_rec = '$email'";
    $bdd->query($query);
}
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Usthb Grad : Notifications</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="css/style_profil.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_table.css">
    <link rel="stylesheet" href="bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php include('sidebar.php');?>
    <div class="home_content">
        <div class="col-md-12">
            <div aria-label="breadcrumb" class=" main-breadcrumb">
                <h4 class="text">Mes Notifications</h4>
                <ol class="breadcrumb">
                    <li class="active"><a href="notif.php"> </a>Mes Notifications </li>
                </ol>
            </div>
        </div>

        <!------------------->

        <!-- row -->
 
        <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr id="header">
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Notif</th>
                            

                            </tr>
                            <tbody>
                            <?php foreach ($data_notif as $i) {
                                    $date = date('Y-m-d', strtotime($i["date_notification"]));
                                    $time = date('H:i:s',strtotime($i["date_notification"])); ?>
                                    <tr>
                                        <td>
                                            <p><i class="fas fa-calendar-day"></i> <?php echo $date; ?></p>
                                        </td>
                                        <td>
                                            <p><i class="far fa-clock"></i> <?php echo $time; ?></p>
                                        </td>
                                        <td>
                                            <p><i class="fas fa-envelope-open" aria-hidden="true"></i>
                                                <?php echo $i['message']; ?></p>

                                        </td>


                                    </tr>
                                <?php } ?>
                            </tbody>
                        </thead>
                    </table>
                    
                </div>
            </div>


        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/profil.js"></script>

</body>

</html>