

<?php
session_start();
// if (isset($_SESSION["user"])){
// header('Location:Accueil/accueil.php');
// }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USTHB Grad</title>
	
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style1.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--<link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">-->
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
<!---home section---->
<div id="home">

<!-- Navigation -->
<nav class ="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbar-brand" href="index.html"><img src="img/LOGO_SITE.png"></a>
	<button class ="navbar-toggler" type="button" data-toggle="collapse"
	 data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item ">
				<a class="nav-link active" href="index.html">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#welcome">A propos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="Etudiant.html">Etudiant</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#secondTwo">Enseignat</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#secondThree">Entreprise</a>
			</li>
			<li class="nav-item">
				<a href="login5.php"class="btn btn-primary">Login</a>
			</li>
		</ul>

	</div>
</div>
</nav>

<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target = "#slides" data-slide-to="0" class="active"></li>
		<li data-target = "#slides" data-slide-to="1"></li>
		<li data-target = "#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/cap2.jpg">
			<div class ="carousel-caption">
				<h1 class ="display-2">USTHB Grad</h1>
				<h3>votre projet de fin d'etude entre vos mains</h3>
			<a href="login5.php">	<button type="button" class="btn btn-outline-light btn-lg"  >Connectez-vous</button></a>

			</div>
		</div>
		<div class="carousel-item ">
			<img src="img/usthb2.jpg">
		</div>
		<div class="carousel-item ">
			<img src="img/usthb.jpg">
		</div>
	</div>
</div>

<!---end home section-->
<!--- Welcome Section -->
<div id ="welcome" class="offset"> 
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class = "col-12">
			<h1 class ="display-4">A Propos De USHTB GRAD.</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class = "lead">Ce site Web est une platforme d??di??e aux ??tudiants et enseignants de l'universit?? des sciences et de la technologie Houari Boumediene. Dans le but de faciliter la gestion et  permettre la planification et le bon suivi des projets de fin d'??tude des deux sycles License et Master.  </p>
		</div>
	</div>
</div>

<!--- Three Column Section -->

<div class ="container-fluid padding">
	<div class ="row text-center padding">
		<div class ="col-xs-12 col-sm-6 col-md-4">
			<i class="fas fa-graduation-cap fa-5x"></i>
			<h3>Fiabilit??</h3>
			<p>Une platforme qui facilite la Recherche Des PFE aux Etudiants.</p>

		</div>
		<div class ="col-xs-12 col-sm-6 col-md-4">
			<i class="fas fa-calendar-check fa-5x"></i>
			<h3>Coordination et Suivi</h3>
			<p>Garantir le suivi des Projets pour le promoteur et permettre une bonne coordination entre etudiants et enseignant.</p>

		</div>
		<div class =" col-sm-12 col-md-4">
			<i class="fas fa-university fa-5x"></i>
			<h3>Gestion Sure</h3>
			<p>Une gestion facile et fluide des projets de fin d'??tudes et des soutenances pour l'administration.</p>

		</div>

	</div>
	<hr class="my-4"> 
</div>
</div>

<!--- Footer -->
 <footer>
        <div class="container-fluid padding">
            <div class="row text-center">

                <div class="col-md-4">
                    <hr class="light">
                    <h5>R??alisation</h5>
                    <hr class="light">
                    <p>Bourouais lydia</p>
                    <p>Saci Alicia</p>
                    <p>Hassaim Sabrina</p>
                    <p>Amine ishak</p>
                    <p>Sanaa Afrah</p>
                    <p>Lalmas Sonia</p>
                </div>

                <div class="col-md-4">
                    <img src="img/LOGO_SITE.png">
                    <hr class="light">
                    <p>+213 21 24 79 04</p>
                    <p>postGrad@gmail.com</p>
                    <p>BP 32 Bab Ezzouar</p>
                    <p>16111,Alger,Algerie</p>
                </div>

                <div class="col-md-4">
                    <hr class="light">
                    <h5>Contactez Nous </h5>
                    <hr class="light">
                    <p><a href="#"><i class="fas fa-phone"></i>  +213 21 24 79 04</a></p>
                    <p><a href="#"><i class ="fab fa-facebook"></i>  Facebook</a> </p> 
                    <p><a href="#"><i class ="fab fa-twitter"></i>     Twitter</a></p>
                    <p><a href="#"><i class ="fab fa-google-plus-g"></i>   Google+</a></p>
                   <p><a href="#"><i class="fab fa-linkedin"></i>   LinkedIn</a></p> 
                  <p> <a href="#"><i class ="fab fa-youtube"></i>    Youtube</a></p> 
                </div>

                <div class="col-12">
                    <hr class="light-100">
                    <h5>&copy;usthbGrad.com</h5>
                </div>
            </div>
        </div>
    </footer>
    <!---end Footer -->
<!---Login form -->





