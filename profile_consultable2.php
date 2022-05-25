<?php
session_start();              //ouverture de la session.
require_once 'db.php';


if (!isset($_SESSION['user'])) {
  header('Location:index3.php');
  die();
}

$email = ($_SESSION['user']);
$nom =  htmlspecialchars($_GET['n']);
$prénom =  htmlspecialchars($_GET['p']);
$type =  htmlspecialchars($_GET['t']);

if (isset($nom) && isset($prénom) && isset($type)) {
  $email = ($_SESSION['user']);
  $profile = $bdd->prepare("SELECT * FROM etudiant  WHERE email = '$prénom.$nom@etu.usthb.dz'");
  $profile->execute();
  $data_profile = $profile->fetch();

  $statement = $bdd->prepare("SELECT * FROM `profile` WHERE email = '$prénom.$nom@etu.usthb.dz'");
  $statement->execute();
  $data_statement = $statement->fetch();
}

$query = "SELECT * FROM binome where email_etudiant1 = '$prénom.$nom@etu.usthb.dz' OR email_etudiant2 = '$prénom.$nom@etu.usthb.dz'";
$data_binome = $bdd->query($query);
$data_statement_binome = $data_binome->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>Profil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">


  <style type="text/css">
    body {
      margin-top: 20px;
      color: #1a202c;
      text-align: left;
      background-color: #e2e8f0;
    }

    .main-body {
      padding: 15px;
    }

    .card {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
    }

    .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
    }

    .mb-3,
    .my-3 {
      margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
      background-color: #e2e8f0;
    }

    .h-100 {
      height: 100% !important;
    }

    .shadow-none {
      box-shadow: none !important;
    }

    .form-control {

      height: 200px;
      width: 100%;

    }
  </style>
</head>

<body>
  <div class="container">
    <div class="main-body">
      <?php if (count($data_statement_binome) != 0) {
        echo "<div class='alert alert-info' role='alert'> Cette personne a déjà un binôme.</div>";
      }           ?>
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page"><?php echo $data_profile['nom'] . "&nbsp" . $data_profile['prenom']; ?> profil</li>
         <a href="cursus.php"> <li class="breadcrumb-item active" aria-current="page"><?php echo $data_profile['nom'] . "&nbsp" . $data_profile['prenom']; ?> Cursus</li></a>
        </ol>
      </nav>

      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <div class="mt-3">
                  <h4><?php echo $data_profile['nom'] . "&nbsp" . $data_profile['prenom'] ?></h4>
                  <p class="text-secondary mb-1"><?php echo $data_profile['specialite'] ?></p>
                  <p class="text-muted font-size-sm"><?php echo $data_profile['annescholaire'] ?></p>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <div class="form-group">
                <label>About</label>
                <text class="form-control" rows="5" placeholder="My Bio" name="about"><?php echo $data_statement['about'] ?></text>
              </div>
            </div>
          </div>
          <div class="card mt-3">

            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">adresse email @usthb.dz</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $data_profile['email']; ?>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Autre adresse email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $data_statement['autre_email'] ?>

                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">numéro de téléphone:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $data_statement['telephone'] ?>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <?php echo "<a href='" . $data_statement['Website'] . "'>site web</a>" ?></br>
          <?php echo "<a href='" . $data_statement['Github'] . "'>Github</a>" ?></br>
          <?php echo "<a href='" . $data_statement['Linkedin'] . "'>Linkedin</a>" ?></br>

        </div>


      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>