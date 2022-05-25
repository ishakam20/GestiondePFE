<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Modifier PFE</title>
      <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

  
      <link rel="stylesheet" href="css/style_modele.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img src="img/icon.png" alt="" class="image-logo">
                <div class="logo_name"> USTHB Grad</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>

        </div>

        <ul class="nav_list">

            <li>
                <a href="accueil_ens.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Accueil</span>
                </a>
                <span class="tooltip">Accueil</span>
            </li>
            <li>
                <a href="prof_ens.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profil</span>
                </a>
                <span class="tooltip">Profil</span>
            </li>
            <li>
                <a href="proposer.php">
                    <i class='bx bx-upload'></i>
                    <span class="links_name">Proposer un PFE</span>
                </a>
                <span class="tooltip">Proposer un PFE</span>
            </li>
            <li>
                <a href="mes_candidaturespfe.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Candidats</span>
                </a>
                <span class="tooltip">Candidats</span>
            </li>
            <li>
                <a href="encadrement.php">
                    <i class='bx bx-file-blank'></i>
                    <span class="links_name">Encadrement</span>
                </a>
                <span class="tooltip">Encadrement</span>
            </li>
            <li>
                <a href="co_encadrement.php">
                    <i class='bx bx-library'></i>
                    <span class="links_name">Co-encadrement</span>
                </a>
                <span class="tooltip">Co-encadrement</span>
            </li>
        
           
            <li>
                <a href="jury.php">
                    <i class='bx bxs-graduation'></i>
                    <span class="links_name">Jury</span>
                </a>
                <span class="tooltip">Jury</span>
            </li>
            <li>
                <a href="table_commission.php">
                    <i class='bx bx-check'></i>
                    <span class="links_name">Commission validation</span>
                </a>
                <span class="tooltip">Commission de validation</span>
            </li>
            <li>
                <a href="commissionsuivi.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name">Commission de suivi</span>
                </a>
                <span class="tooltip">Commission de suivi</span>
            </li>
            <li>
                <a href="annonces_admin.php">
                    <i class='bx bxs-megaphone'></i>
                    <span class="links_name">Annonces</span>
                </a>
                <span class="tooltip">Annonces</span>
            </li>
            <li>
                <a href="notif.php">
                    <i class='bx bxs-bell-plus'></i>
                    <span class="links_name">Notifications</span>
                </a>
                <span class="tooltip">Notifications</span>
            </li>


        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="deconnexion.php"><i class='bx bx-log-out' id="log_out"></i></a>


            </div>
        </div>
    </div>
</div>
<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
        if (btn.classList.contains("bx-menu")) {
            btn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            btn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
    }
</script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/profil.js"></script>
</body>