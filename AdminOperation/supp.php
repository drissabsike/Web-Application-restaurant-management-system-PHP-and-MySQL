<?php
require_once("cnx.php");
$id=$_GET['id'];
	$req1=mysqli_query($conn,"DELETE FROM panier WHERE id_client='$id'; ");
	$req2=mysqli_query($conn,"DELETE FROM client WHERE id='$id'; ");
			header("Location: /coffee/coffee/adminPage.php");	
 ?>