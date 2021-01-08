<?php 
require_once("connection.php");
session_start();
if($_SESSION['email']==''){
	header("Location: Login.html");
}else{
$email=$_SESSION['email'];}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.w3-button {width:150px;}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
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
				<div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="adminPage.php"><img src="img/mer.png"/></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="adminPage.php" style="font-size:20px">Gestion des Clients</a></li>
				          <li><a href="GesionProduit.php" style="font-size:20px">Gestion des produits</a></li>
				          <li><a href="GestionMenu.php" style="font-size:20px">Gestion Menu</a></li>
				          <li><a href="GestionReservation.php" style="font-size:20px">Gestion Reservation</a></li>
				          <li style="color:white;font-size:20px">User : <?php echo $email; ?></li>
				          <li><a style="color:lightblue;" href="deconnexion.php">Déconnexion</a></li>
				        </ul>
				      </nav>	    		
			    	</div>
			    </div>
			  </header>	
 				<br><br><br><br>
			<section>	
				<section class="row justify-content-center">
					<section class="col-10 col-sm-5 col-md-7"> 
						<br><br><br><br><br><br>
				<form class="form-container" action="#" method="POST">
				  	<h3>Liste Des Reservations :</h3><br>
					<table>
				  		<thead>
					  <tr>
					    <th><STRONG>Nom</STRONG></th>
					    <th><STRONG>Prenom</STRONG></th>
					  	<th><STRONG>Numero Telephone</STRONG></th>
					    <th><STRONG>Nombre des personnes</STRONG></th>
					    <th><STRONG>Date Reservation</STRONG></th>
					    <th><STRONG>Heure Reservation</STRONG></th>
					    <th><STRONG>Description</STRONG></th>
					  </tr>
					  </thead>
						<?php
$res=mysqli_query($conn,"SELECT * from reservation"); 
				  while($row=mysqli_fetch_array($res)){?> 
					  <tr>
					    <td><?php echo $row['nom'];?></td>
					    <td><?php echo $row['description'];?></td>
					    <td><?php echo $row['tele'];?>dh</td>
					    <td><?php echo $row['nbr_personne'];?></td>
					    <td><?php echo $row['date_res'];?>dh</td>
					    <td><?php echo $row['heur_res'];?>dh</td>
					    <td><?php echo $row['description'];?>dh</td>
					  </tr>
					<?php }?>
				  </table><br>
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
			<script src="js/main.js">
			</script>	
		</body>
		</html>