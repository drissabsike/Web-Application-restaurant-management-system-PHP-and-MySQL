<?php
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
	header("Location: Home.php");
}else{
	header("Location: index.php");
}
?>