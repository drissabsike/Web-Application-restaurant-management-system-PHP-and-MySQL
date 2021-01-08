<?php
require_once("cnx.php");
$id=$_GET['id'];
	$req1=mysqli_query($conn,"DELETE FROM menu WHERE id_m='$id'; ");
			header("Location: /coffee/coffee/GestionMenu.php");	
 ?>