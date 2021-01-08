<?php
require_once("connection.php");
if(isset($_POST['submit'])){
	$nom=mysqli_real_escape_string($conn,$_POST['nom']);
	$prenom=mysqli_real_escape_string($conn,$_POST['prenom']);
	$tel=mysqli_real_escape_string($conn,$_POST['tel']);
	$nbrp=mysqli_real_escape_string($conn,$_POST['nbrp']);
	$desc=mysqli_real_escape_string($conn,$_POST['desc']);
	$dater=mysqli_real_escape_string($conn,$_POST['dater']);
	$heur=mysqli_real_escape_string($conn,$_POST['heur']);
	if(strlen($nom)<5 || strlen($prenom)<5 || strlen($tel)>10){
		header("Location: 403.html");
	}else{
	$req="INSERT INTO reservation (nom,prenom,tele,nbr_personne,date_res,heur_res,description) 
			VALUES('$nom','$prenom','$tel','$nbrp','$dater','$heur','$desc')";
			$res=mysqli_query($conn, $req);
				header("Location: res.php");
		}}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reservation Restaurant </title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/styleR.css" />
</head>
<style type="text/css">
	#meth { 
   display: none; 
	}
</style>
<body style="background-image: url('img/cafe.jpg');">
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Reserver maintenant</h1>
							<h2>Payer plus tard</h2>
						</div>
						
						<form action="reservation.php" method="POST">
							<div id="meth">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Nom:</span>
										<input class="form-control" type="text" name="nom" placeholder="Enter your name">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Prenom:</span>
										<input name="prenom" class="form-control" type="text" placeholder="Enter your Lastname">
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Phone</span>
								<input class="form-control" type="te" name="tel" placeholder="Enter your phone number">
							</div>
							<div class="form-group">
								<span class="form-label">Nombre des personnes</span>
								<input class="form-control" type="text" name="nbrp" placeholder="nombre des personnes">
							</div>
							<div class="form-group">
								<span class="form-label">Description:</span>
								<input class="form-control" type="text" name="desc" placeholder="Avez vous besoin d'autre chose">
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<span class="form-label">Date du Reservation: yyyy/mm/dd</span>
										<input class="form-control" type="text" name="dater" required placeholder="Date de reservation">
									</div>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<span class="form-label">Hour</span>
												<input class="form-control" type="text" name="heur" required placeholder="Heure">
												<span class="select-arrow"></span>
											</div>
										</div>
										</div>
								</div>
							</div>
							<div class="form-btn">
								<button type="submit" name="submit" class="submit-btn">Reserver maintenant</button><br>
								<CENTER><a href="session.php" class="btn btn-primary" style="width: 50%;">Home</a></CENTER>
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/plugin.js"></script>
</html>