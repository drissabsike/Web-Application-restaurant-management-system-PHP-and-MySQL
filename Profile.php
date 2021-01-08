<?php 
require_once("connection.php");
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
	header("Location: Login.html");
}else{
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
}
if(isset($_POST['Modifier'])){
	 $nom=mysqli_real_escape_string($conn,$_POST['nom']); 
	 $prenom=mysqli_real_escape_string($conn,$_POST['prenom']); 
	 $ville=mysqli_real_escape_string($conn,$_POST['ville']); 
	 $address=mysqli_real_escape_string($conn,$_POST['address']);
	 $CodeP=mysqli_real_escape_string($conn,$_POST['CodeP']);
	 $email=mysqli_real_escape_string($conn,$_POST['email']); 
	 if (strlen($nom)<5 || strlen($prenom)<5) {  
				header("Location: 403.html");		
		}else{
		$req="UPDATE client SET nom='$nom' , prenom='$prenom' , ville='$ville' , address='$address' , codepostale='$CodeP' , email='$email' WHERE nom='$nom' AND prenom='$prenom' ";
			$res=mysqli_query($conn, $req);
			header("Location: Profile.php");
				}
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
		<body style="background-image: url('img/header-bg.jpg');">
			<header id="header" id="home">
				<div class="header-top">
		  			<div class="container">
				  				  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/mer.png" style="margin-left:-50px;" /></a>
				      </div>
				      <nav id="nav-menu-container" style="margin: -220px;">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php" style="font-size:20px">Home</a></li>
				          <li><a href="menu0.php" style="font-size:20px">Menu</a></li>
				          <li><a href="panierPage.php" style="font-size:20px">Panier</a></li>
				          <li><a href="reservation.php" style="font-size:20px">Reservation</a></li>
				          <li><a href="Profile.php" style="font-size:20px">Profile</a></li>
				          <li style="color:lightblue;font-size:20px">User : <?php echo $nom; ?> <?php echo $prenom; ?></li>
				        </ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->	
 				
			<section>	
				<section class="row justify-content-center">
					<section class="col-10 col-sm-6 col-md-4"> 
						<br><br><br><br><br><br>	
				<form class="form-container" action='Profile.php' method="POST">
					<?php
$res=mysqli_query($conn,"SELECT * from client WHERE nom='$nom' AND prenom='$prenom';"); 
				  while($row=mysqli_fetch_array($res)){?> 
				  <div class="form-group">
				  	<h3>Nom:</h3>
				    <input type="text" class="form-control" name="nom" value="<?php echo $row['nom']; ?>" required="required">
				  </div>
				    <div class="form-group">
				  	<h3>Prenom:</h3>
				    <input  required="required" type="text" name="prenom" value="<?php echo $row['prenom']; ?>" class="form-control">
				  </div>
				   <div class="form-group">
				  	<h3>Ville:</h3>
				    <input type="text" class="form-control" name="ville" value="<?php echo $row['ville']; ?>" required="required">
				  </div>
				    <div class="form-group">
				  	<h3>Address:</h3>
				    <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required="required">
				  </div>
				  <div class="form-group">
				  	<h3>Code Postale:</h3>
				    <input type="text" class="form-control" name="CodeP" value="<?php echo $row['codepostale']; ?>" required="required">
				  </div>
				    <div class="form-group">
				  	<h3>Email:</h3>
				  	<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required="required">
				  </div>
				<?php }?>
	<button type="submit" name="Modifier" value="Modifier" class="btn btn-primary">Modifier</button>
				  <a href="index.php" type="button" class="btn btn-primary">Home</a>
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