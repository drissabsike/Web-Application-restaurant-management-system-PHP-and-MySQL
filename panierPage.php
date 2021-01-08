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
		<body style="background-image: url('img/header-bg.jpg');">
			<header id="header" id="home">
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
				        <a href="index.php"><img src="img/mer.png"/></a>
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
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->	
 				<br><br>
			<section>	
				<section class="row justify-content-center">
					<section class="col-10 col-sm-5 col-md-7"> 
						<br><br><br><br><br><br><br>
				<form class="form-container" action="#" method="POST">
				  	<h3>Votre panier commande:</h3><br>
					<table>
				  		<thead>
					  <tr>
					    <th><STRONG>Produit</STRONG></th>
					    <th><STRONG>Price</STRONG></th>
					  	<th><STRONG>Quantité</STRONG></th>
					  </tr>
					  </thead>
						<?php
$res=mysqli_query($conn,"SELECT * from panier WHERE id_client=(SELECT id from client WHERE nom='$nom' AND prenom='$prenom');"); 
				  while($row=mysqli_fetch_array($res)){?> 
					  <tr>
					    <td id="pr"><?php echo $row['nom_produit']; ?></td>
					    <td><?php echo $row['price'];echo("dh"); ?></td>
					    <td><?php echo $row['qte'];?></td>
                  		<td><a name="Modifier" href="update.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Plus Quantité</a></td>
                  	<td><a name="Modifier" href="update2.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Moin Quantité</a></td>
					    <td><a name="Supprimer" href="crud.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Supprimer</a></td>
					  </tr>
					<?php }?>
				  </table><br>
				  <?php
$res1=mysqli_query($conn,"SELECT SUM(price*qte) as prix_total,nom_produit from panier WHERE id_client=(SELECT id from client WHERE nom='$nom' AND prenom='$prenom');"); 
				  while($row=mysqli_fetch_array($res1)){?>
				        <p style="color: black"><STRONG>prix HT : </STRONG><?php echo $row['prix_total'];?>dh</p>
				        <?php } ?>
				        <?php
$res2=mysqli_query($conn,"SELECT tva FROM tva"); 
				  while($rows=mysqli_fetch_array($res2)){?>
				        <p style="color: black"><STRONG>TVA (20%) : </STRONG><?php echo $rows['tva'];?></p>
				        <?php } ?>
				        <?php
$res3=mysqli_query($conn,"SELECT CAST(ROUND(SUM(price*qte)*tva) AS DECIMAL(10,2)) as ptt FROM panier,tva 
	WHERE id_client=(SELECT id from client WHERE nom='$nom' AND prenom='$prenom');"); 
				  while($rows=mysqli_fetch_array($res3)){?>
				        <p style="color: black"><STRONG>Prix Total : </STRONG><?php echo $rows['ptt'];?>dh</p>
		<a name="Valide" type="submit" href="payement.php?pttc=<?php echo $rows['ptt'];?>" class="btn btn-primary">Validé la commande</a>
		<?php } ?> 
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
			<script src="js/main.js">
			</script>	
		</body>
		</html>