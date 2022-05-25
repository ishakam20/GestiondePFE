  <!DOCTYPE html>
  <!-- Created By CodingLab - www.codinglabweb.com -->
  <html lang="en" dir="ltr">
  
  <head>
      <meta charset="UTF-8">
      <title> Usthb Grad</title>
        <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

      <link rel="stylesheet" href="css/style_error.css">
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
                    <span class="links_name">profil</span>
                </a>
                <span class="tooltip">profil</span>
            </li>
            <li>
                <a href="proposer.php">
                    <i class='bx bx-upload'></i>
                    <span class="links_name">Proposer un PFE</span>
                </a>
                <span class="tooltip">Proposer un PFE</span>
            </li>
            <li>
                <a href="consultationpfe.php">
                    <i class='bx bx-file-blank'></i>
                    <span class="links_name">Mes projets</span>
                </a>
                <span class="tooltip">Mes projets</span>
            </li>
            <li>
                <a href="espace_de_travail.php">
                    <i class='bx bx-library'></i>
                    <span class="links_name">Espace de travail</span>
                </a>
                <span class="tooltip">Espace de travail</span>
            </li>

            <li>
                <a href="mes_candidaturespfe.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Candidatures</span>
                </a>
                <span class="tooltip">Candidatures</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-graduation'></i>
                    <span class="links_name">Jury</span>
                </a>
                <span class="tooltip">Jury</span>
            </li>
            <li>
                <a href="table_commission.php">
                    <i class='bx bx-group'></i>
                    <span class="links_name">Commission</span>
                </a>
                <span class="tooltip">Commission</span>
            </li>
            <li>
                <a href="commissionsuivi.php">
                    <i class='bx bx-group'></i>
                    <span class="links_name">Commission de suivi</span>
                </a>
                <span class="tooltip">Commission de suivi</span>
            </li>
            <li>
                <a href="Annonces_ent.html">
                    <i class='bx bxs-user-plus'></i>
                    <span class="links_name">Annonces</span>
                </a>
                <span class="tooltip">Annonces</span>
            </li>


        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="deconnexion.php"><i class='bx bx-log-out' id="log_out"></i></a>


            </div>
        </div>
    </div>

  
      <div class="home_content">
         
          <div class="container">
            <h2>Oops! Page introuvable</h2>
            <h1>404</h1>
            <p>La page que vous cherchez est introuvable. Vous ne faites pas partie de la commission</p>
            <a href="accueil_ens.php">Retournez à l'accueil</a>
     
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
  
  </html>