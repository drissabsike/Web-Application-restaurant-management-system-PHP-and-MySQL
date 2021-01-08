<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systeme_restaurant";
//connection.php
$conn = mysqli_connect($servername, $username, $password, $dbname);
$res = mysqli_query($conn,"SELECT * FROM produit");
if(isset($_POST['submit'])){ 

	//mysqli_real_escape_string pour la securite contre les attaques SQLInjection
	 $nom=mysqli_real_escape_string($conn,$_POST['nom']); 
	 $prenom=mysqli_real_escape_string($conn,$_POST['prenom']); 
	 $cardnumber=mysqli_real_escape_string($conn,$_POST['cardnumber']);
	 $expiry=mysqli_real_escape_string($conn,$_POST['expiry']);
	 $cvc=mysqli_real_escape_string($conn,$_POST['cvc']);
	 $address=mysqli_real_escape_string($conn,$_POST['address']);
	 $ville=mysqli_real_escape_string($conn,$_POST['ville']); 
	 $zipcode=mysqli_real_escape_string($conn,$_POST['zipcode']);
	 $email=mysqli_real_escape_string($conn,$_POST['email']);
	 $prixttc=mysqli_real_escape_string($conn,$_POST['prixttc']); 
	 $Livraison=mysqli_real_escape_string($conn,$_POST['Livraison']);


$req="INSERT INTO facture(nom,prenom,cardnumber,expiry,cvc,address,ville,zipcode,email,prixttc,Livraison) 
VALUES ('$nom','$prenom','$cardnumber','$expiry','$cvc','$address','$ville','$zipcode','$email','$prixttc','$Livraison')";

mysqli_query($conn, "INSERT INTO commande(nom_client,prenom_client,price)
	 values('$nom','$prenom','$prixttc')");

	mysqli_query($conn, $req);
	if ($req) {
			header("Location: merci.php");	
			echo "Success !";
			}else {
			//echo "error";
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}
			
?>