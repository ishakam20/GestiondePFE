
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USTHB Grad:Login </title>
	
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="stylelog.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="img/icon.png" width="130px">
					</div>
					<div class="heading mb-3">
						<h4>Login into your account</h4>
					</div>
					<form method="POST" action="login.php">
                    <?php
                    if(isset($_GET['login_err'])){
                        $err = htmlspecialchars($_GET['login_err']);
                        switch($err){
                            case 'password':
                                
                                echo "<div class='alert alert-danger' role='alert'>Le mot de passe ou l'émail est incorrecte.</div>";
                             break;
                
                            case 'emailusthb':
                                echo "<div class='alert alert-danger' role='alert'>Le mot de passe ou l'émail est incorrecte.</div>";
                              break; 
                
                            case 'nonexistant' :
                                echo "<div class='alert alert-danger' role='alert'>Le mot de passe ou l'émail est incorrecte.</div>";
                              break;
                            
                            case 'notyet' :
                                echo "<div class='alert alert-danger' role='alert'>Vous n'avez pas accès à ce compte.</div>";
                        }
                    }
                ?>
                
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="emailusthb" placeholder="Email Address" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<!-- <div class="row mb-3"> -->
							<!-- <div class="col-6 d-flex"> -->
								<!-- <div class="custom-control custom-checkbox"> -->
									<!-- <input type="checkbox" class="custom-control-input" id="cb1"> -->
									<!-- <label class="custom-control-label text-white" for="cb1">Remember me</label> -->
								<!-- </div> -->
							<!-- </div> -->
							<!-- <div class="col-6 text-right"> -->
								<!-- <a href="forget.html" class="forget-link">Forget password</a> -->
							<!-- </div> -->
						<!-- </div> -->
						<div class="text-left mb-3">
							<button type="submit" class="btn btn-primary" id="log" >Login</button>
						</div>
						<!-- <div class="text-white mb-3">or login with</div> -->
						<!-- <div class="row mb-3"> -->
							<!-- <div class="col-4"> -->
								<!-- <a href="" class="btn btn-block btn-social btn-facebook"> -->
									<!-- <i class="fa fa-facebook"></i> -->
								<!-- </a> -->
							<!-- </div> -->
							<!-- <div class="col-4"> -->
								<!-- <a href="" class="btn btn-block btn-social btn-google"> -->
									<!-- <i class="fa fa-google"></i> -->
								<!-- </a> -->
							<!-- </div> -->
							<!-- <div class="col-4"> -->
								<!-- <a href="" class="btn btn-block btn-social btn-twitter"> -->
									<!-- <i class="fa fa-twitter"></i> -->
								<!-- </a> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="text-white">Don't have an account? -->
							<!-- <a href="register.html" class="register-link">Register here</a> -->
						<!-- </div> -->
					</form>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
</body>
</html>