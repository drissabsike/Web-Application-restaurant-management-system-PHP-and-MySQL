<?php
require_once("cnx.php");
$id=$_GET['id'];
	$req=mysqli_query($conn,"UPDATE client SET activation=1 WHERE id='$id' ");
	if ($req) {
		header("Location: /coffee/coffee/adminPage.php");
		}else {header("Location: /coffee/coffee/405.html");}		
 ?>
 		
