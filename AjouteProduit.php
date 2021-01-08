<?php
require_once("connection.php");
session_start();
if($_SESSION['email']==''){
	header("Location: Login.html");
}else{
$email=$_SESSION['email'];}
if(isset($_POST['submit'])){
$id=mysqli_real_escape_string($conn,$_POST['id']);
$nom=mysqli_real_escape_string($conn,$_POST['nom']); 
$desc=mysqli_real_escape_string($conn,$_POST['Description']); 
$price=mysqli_real_escape_string($conn,$_POST['Price']); 
$photoPath=mysqli_real_escape_string($conn,$_POST['photo']); 
$path="/coffee/coffee/img/";
$t=$path.$photoPath;
$req="INSERT INTO menu(id_m,nomm,description,price,photo) VALUES ('$id','$nom','$desc','$price','$t')";
			$res=mysqli_query($conn, $req);
			if ($res) {header("Location: GestionMenu.php");}
}

?>
<!DOCTYPE html>
<html>
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
		<body style="background-image: url('img/la.jpg');">
			<header id="header" id="home">
				<div class="header-top">
		  			<div class="container">
				  				  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="adminPage.php"><img src="img/mer.png" style="margin-left:-50px;" /></a>
				      </div>
				      <nav id="nav-menu-container" style="margin: -350px;">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="adminPage.php" style="font-size:20px">Gestion des Clients</a></li>
				          <li><a href="GesionProduit.php" style="font-size:20px">Gestion des produits</a></li>
				          <li><a href="GestionMenu.php" style="font-size:20px">Gestion Menu</a></li>
				          <li><a href="GestionReservation.php" style="font-size:20px">Gestion Reservation</a></li>
				          <li style="color:white;font-size:20px">User : <?php echo $email; ?></li>
				          <li><a style="color:lightblue;" href="deconnexion.php">Déconnexion</a></li>
				         </li>
				        </ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->	
 				<br><br><br><br><br><br>
			<section>	
				<section class="row justify-content-center">
					<section class="col-10 col-sm-6 col-md-4"> 
				<form class="form-container" action='AjouteProduit.php' method="POST">
				  <div class="form-group">
				  	<h3>Id Produit:</h3>
				    <input type="number" class="form-control" name="id" required="required">
				  </div>
				  <div class="form-group">
				  	<h3>Nom Produit:</h3>
				    <input type="text" class="form-control" name="nom" required="required">
				  </div>
				    <div class="form-group">
				  	<h3>Description:</h3>
				  <textarea  required="required" name="Description"  id="w3mission" rows="4" cols="50" class="form-control">
					</textarea>
				</div>
				  </div>
				    <div class="form-group">
				  	<h3>Price</h3>
				    <input type="number" class="form-control" name="Price" required="required">
				  </div>
				  <div class="form-group">
				  	<h3>Photo  :</h3>
				    <input type="file" class="form-control" name="photo" required="required">
				</div>
	<button type="submit" name="submit" value="Enregistrer" class="btn btn-primary">Ajouter</button>
				  <a href="adminPage.php" type="button" class="btn btn-primary">Admin Page</a>
				</form>
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