<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systeme_restaurant";
//connection.php
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['login'])){
$email=$password=$pwd='';
$email=mysqli_real_escape_string($conn,$_POST['email']); 
$pwd=mysqli_real_escape_string($conn,$_POST['password']); 

$password = md5($pwd);
}
if($email=="admin@gmail.com" AND $pwd=="123456"){
	session_start();
	$_SESSION['email']=$email;
	header("Location: adminPage.php");
}else{
$sql ="SELECT * FROM client WHERE email='$email' AND password='$password' ";
$res=mysqli_query($conn,$sql);

	if(mysqli_num_rows($res)>0){
		while ($row = mysqli_fetch_assoc($res)) {
				$nom=$row["nom"];
				$prenom=$row["prenom"];
				session_start();
				$_SESSION['nom']=$nom;
				$_SESSION['prenom']=$prenom;
		}
				header("Location: index.php");
		//echo "Connected !!";
			}
			else {
			header("Location: ErreurLogin.html");
			//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}}	
	
?>