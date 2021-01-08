<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systeme_restaurant";
//connection.php
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){

$mail=mysqli_real_escape_string($conn,$_POST['email']); 

}

$sql ="SELECT * FROM client WHERE email='$mail' ";
$res=mysqli_query($conn,$sql);

	if(mysqli_num_rows($res)>0){
		while ($row = mysqli_fetch_assoc($res)) {
				$email=$row["email"];
				session_start();
				$_SESSION['email']=$email;
				header("Location: Forgot3.php");
		}
				
			}
			else {
			echo "<h1>L'email n'existe pas<h1>";
			//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
	
?>