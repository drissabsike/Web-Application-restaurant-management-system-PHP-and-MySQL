<?php
//include_once "PHPMailer/PHPMailer.php";
//include_once "PHPMailer/Exception.php";
//include_once "PHPMailer/SMTP.php";
//connection.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systeme_restaurant";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['Enregistrer'])){ 
	//mysqli_real_escape_string pour la securite contre les attaques SQLInjection
	 $nom=mysqli_real_escape_string($conn,$_POST['nom']); 
	 $prenom=mysqli_real_escape_string($conn,$_POST['prenom']); 
	 $ville=mysqli_real_escape_string($conn,$_POST['ville']); 
	 $address=mysqli_real_escape_string($conn,$_POST['address']);
	 $CodeP=mysqli_real_escape_string($conn,$_POST['CodeP']);
	 $email=mysqli_real_escape_string($conn,$_POST['email']); 
	 $password=mysqli_real_escape_string($conn,$_POST['password']);
	
		//si le nom et le prenom inferieur de 5 string
		if (strlen($nom)<5 || strlen($prenom)<5) {  
				echo"<script>alert('Your name or lastname do not match')</script>";		
			}
			$maile = $_POST['email'];
			$res = mysqli_query($conn,"SELECT * FROM client WHERE email='$maile' OR nom='$nom' and prenom='$prenom';");
			if($row =mysqli_fetch_array($res)){	
				echo "<h2>Email ou Client déjà existé !!!</h2>";
			}else{
				//echo "vkey =",$vkey;
			$pwd = md5($password);
			/*token : le cle utiliser pour tranfererle mail pour l'activatio (GET)
			$token ='qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM0123456789!?/()*';
			$token = str_shuffle($token);
			$tok = substr($token,0,10);*/

			$req="INSERT INTO client(nom,prenom,ville,address,codepostale,email,password,token) 
			VALUES ('$nom','$prenom','$ville','$address','$CodeP','$email','$pwd','$tok')";
			$res=mysqli_query($conn, $req);
			if ($res) {
					/*$mail = new PHPMailer();
					$mail = new PHPMailer\PHPMailer\PHPMailer();
					$mail->setFrom('absike30@gmail.com');
					$mail->addAddress($email,$nom);
					$mail->Subject = "please verify email !";
					$mail->isHTML(true);
					$Subject = "Confirmation de compte !";
					$header="MIME-Version: 1.0\r\n";
					$header.='From: Absike Idriss <absike30@gmail.com>'."\n";
					$header.='Content-Type:text/html; charset="utf-8"'."\n";
					$header.='Content-Transfer-Encoding: 8bit';
					$message = "
					Plea se click on the link below:<br><br>
		 	<a href='http://localhost/coffee/coffee/confirmationMail.php?email=$email&token=$tok'>Click here !</a>
					";
					$ma =mail($email,$Subject,$message,$header);
					if($ma){*/
						header("Location: thankyou.php");
					}else {
					//echo "error";
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
					}	
					
	}
			
?>