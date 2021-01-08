<?php
session_start();
	if($_SESSION['email']==''){
			header("Location: Forgot.php");
	}else{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "systeme_restaurant";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$email=$_SESSION['email'];
	if(isset($_POST['submit'])){
	$password1=mysqli_real_escape_string($conn,$_POST['password1']); 
	$password2=mysqli_real_escape_string($conn,$_POST['password2']); 
		if($password1==$password2){
	$pwd = md5($password1);	
	$sql ="UPDATE client set password='$pwd' WHERE email='$email'";
	$res=mysqli_query($conn,$sql);
		header("Location: Home.php");
}else{
	echo "Verifier Votre Mote de pass !";
 }}
		}
	?>
	<!DOCTYPE html>
	<html lang="fr" class="no-js" >
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Coffee</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		 	<link rel="stylesheet" type="text/css" href="css/cssfrom.css">
		<body style="background-image: url('img/header-bg.jpg');">
			<header id="header" id="home">
				<div class="header-top">
		  			<div class="container">
				  				  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="home.php"><img src="img/mer.png"/></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="home.php">Home</a></li>
				          <li><a href="menu.php">Menu</a></li>
				          <li><a href="#">Panier</a></li>
				          <li><a href="#">Nos Services</a></li>
				         </li>
				        </ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->	
 				
			<section>	
				<section class="row justify-content-center">
					<section class="col-12 col-sm-6 col-md-4"> 
						<br><br><br><br><br><br><br>
				<form class="form-container" action='Forgot3.php' method="POST">
				  <div class="form-group">
				  	<h3>Saisir le nouveau mot de passe</h3>
				  	<input type="password" class="form-control" name="password1" required="required">
				  </div>
				  <h3>Verification mot de passe</h3>
				  	<input type="password" class="form-control" name="password2" required="required">
				  </div><br>
			<button type="submit" name="submit" class="btn btn-primary">Récupération Mot de pass</button>
				</form>
					</section>
					</section>
				</div>
			</section>		
			</div>

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/mail-script.js"></script>				
			<script src="js/main.js"></script>	
		</body>
			</html>
