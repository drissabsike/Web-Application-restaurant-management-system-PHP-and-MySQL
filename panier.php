<?php
require_once("connection.php");
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
	header("Location: Login.html");
}else{
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$page=$_GET['id'];
	//echo $page;	
 
				$res = mysqli_query($conn,"INSERT INTO  panier(id_client,nom_produit,price) values((select id from client where nom='$nom' and prenom='$prenom'),(select nomp from produit where id_p='$page'),(select price from produit where id_p='$page'))");
						if ($res) {
							header("Location: panierPage.php");
						}
				
				}
?>