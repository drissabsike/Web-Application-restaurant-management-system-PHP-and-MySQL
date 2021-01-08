<?php
require_once("connection.php");
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
	header("Location: Login.html");
}else{
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$page=$_GET['id'];
	
$res = mysqli_query($conn,"INSERT INTO  panier(id_client,nom_produit,price) values((select id from client where nom='$nom' and prenom='$prenom'),(SELECT nomm FROM menu WHERE id_m ='$page'),(select price from menu where id_m='$page'))");
						if ($res) {
							header("Location: panierPage.php");
						}
			
}
?>