<?php
require_once("connection.php");
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
	header("Location: Login.html");
}
//echo $_SESSION['nom'];
//echo $_SESSION['prenom'];
$id=$_GET['id'];
echo $id;
	$req=mysqli_query($conn,"DELETE FROM panier WHERE id='$id'");
	if ($req) {
		header("Location: panierPage.php");
		}
		else {echo "erreur";}
			
 ?>
 		
