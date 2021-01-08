<?php
require_once("cnx.php");
$id=$_GET['id'];
	$req1=mysqli_query($conn,"DELETE FROM produit WHERE id_p='$id'; ");
			header("Location: /coffee/coffee/GesionProduit.php");	
 ?>