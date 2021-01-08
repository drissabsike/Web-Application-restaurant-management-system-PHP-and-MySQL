<?php 
require_once("connection.php");
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
	header("Location: Login.html");
}else{
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
}
?>
	<!DOCTYPE html>
	<html lang="fr" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/caf.ico">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Merla Coffee</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<style type="text/css">
			.button5 {
			  background-color: white;
			  color: black;
			  border: 2px solid #555555;
			  height: 30px;
			  width: 180px;
			  font-size: 16px;
			}

			.button5:hover {
			  background-color: #555555;
			  color: white;
			}
			</style>
			<!--
			Css
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home" style="padding: 0px 0;">
				<div class="header-top">
		  			<div class="container">
				  		<div class="row justify-content-end">
				  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  				<ul><a href="tel:(+212) 06 53 27 89 03">(+212) 06 53 27 89 03</a></ul>
				  			    <ul><a href="deconnexion.php">Déconnexion</a></ul>
				  			</div>
				  		</div>			  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/mer.PNG"/></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php" style="font-size:20px">Home</a></li>
				          <li><a href="menu0.php" style="font-size:20px">Menu</a></li>
				          <li><a href="panierPage.php" style="font-size:20px">Panier</a></li>
				          <li><a href="reservation.php" style="font-size:20px">Reservation</a></li>
				          <li><a href="Profile.php" style="font-size:20px">Profile</a></li>
				          <li style="color:lightblue;font-size:20px">User : <?php echo $nom; ?> <?php echo $prenom; ?></li>
				      </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-7"><br><br><br>
							<h6 class="text-white text-uppercase">Le Café est ma Langue D'amour</h6>
							<h1>
								Commencez votre journée avec
								un Café Noir				
							</h1>
							<button id="btnhaut" class="primary-btn text-uppercase">Scroll Down</button>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start video-sec Area -->
			<!-- Start video-sec Area -->
			<section class="video-sec-area pb-100 pt-40" id="about" style="padding-top: 0px;">
				<div class="container">
					<div class="row justify-content-start align-items-center">
						<div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
							<div class="overlay overlay-bg"></div>
							<a class="play-btn" href="https://www.youtube.com/watch?v=sFSAxzLA4sk"><img class="img-fluid" src="img/play-icon.png" alt=""></a>
						</div>						
						<div class="col-lg-6 video-left">
							<h6>Le Café est ma Langue D'amour</h6>
							<p><span>Acheter nos Produit ou Réserver maintenant</span></p>
						<img class="img-fluid" src="img/signature.png" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End video-sec Area -->
			
			<!-- Start menu Area -->
			<section class="menu-area section-gap" id="coffee">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h2 class="mb-10">Quel genre de café nous servons pour vous</h2>
							</div>
						</div>
					</div>
					<form action='panier.php' method="POST">
					<?php 
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "systeme_restaurant";
						//connection.php
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						$res = mysqli_query($conn,"SELECT * FROM produit");
						while ($row =mysqli_fetch_array($res)) {
						?>
					<div class="row">
						<div class="col-lg-12">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4><?php echo $row["nomp"]; ?></h4> 
								<img src="<?php echo $row["photo"]; ?>" alt="Smiley face" height="75" width="80">
								</div>
								<p>
									<h3>Prix : <?php echo $row["price"]; ?>dh</h3>
									<?php echo $row["description"]; ?>
								</p><br>
	<a href="panier.php?id=<?php echo $row["id_p"]; ?>" class="button button5" type="submit" name="Ajouter1">
		<CENTER>Ajouter au panier</CENTER></a>
								</div>
						</div>												
					</div>
				<?php } ?>
				
				</form>	
				</div>	
			</section>
		
			<section id="review">
				
					<center><h2 class="mb-2">Notre place : </h2></center><br>
								<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.8349968144394!2d-6.8928415807286!3d33.91964604745632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda712f70be7a37b%3A0x6aae141e1d164caa!2sCaf%C3%A9%20Adonis!5e0!3m2!1sfr!2sma!4v1587665391313!5m2!1sfr!2sma" width="100%" height="500" frameborder="1" style="border:1;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>
				
			</section>
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Address :  Témara Rue Milano</h6>
								<h6>Établissement ouvert :  07:00–00:00</h6>
								<h6>Établissement fermeture :  12:00–00:00</h6>
								<h6>W495+MV Témara</h6>	
								<button onclick="scrollToTop()" class="primary-btn text-uppercase">Scroll UP</button>	
							</div>
						</div>
					</div>
				</div>
			</footer>					
			<script> 
      		  function scrollToTop() { 
            $(window).scrollTop(0); 
     		   } 
    		</script> 
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
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>
			<script src="js/plugin.js"></script>	
		</body>
	</html>