<?php
require_once("connection.php");
session_start();
if($_SESSION['nom']=='' AND $_SESSION['prenom']==''){
  header("Location: Login.html");
}else{
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
}
$pttc=$_GET['pttc'];
$res=mysqli_query($conn,"SELECT * from client WHERE nom='$nom' AND prenom='$prenom'");
while($row=mysqli_fetch_array($res)){
?>

  <form method="POST" action="facture.php">
    <div class="form-container">
      <div class="personal-information">
        <h1>Information de Payment</h1>
      </div> 
          <input id="column-left" type="text"  name="nom" value="<?php echo $nom; ?>" />
          <input id="column-right" type="text"  name="prenom" value="<?php echo $prenom; ?>"/>
          <input id="input-field" type="text" name="cardnumber" required="" placeholder="Card Number"/>
          <input id="column-left" type="text" name="expiry" placeholder="MM / YY" required=""/>
          <input id="column-right" type="text" name="cvc" placeholder="CCV" required=""/>
      
          <input id="input-field" type="text" name="address"  autocomplete="on" maxlength="45" value="<?php echo $row['address']; ?>" />
          <input id="column-left" type="text" name="ville"  autocomplete="on" maxlength="20" value="<?php echo $row['ville']; ?>" />
          <input id="column-right" type="text" name="zipcode"  autocomplete="on" pattern="[0-9]*" maxlength="5" value="<?php echo $row['codepostale']; ?>" />
          <input id="input-field" type="email" name="email"  autocomplete="on" maxlength="40" value="<?php echo $row['email']; ?>" />
          <center>
          <table>
            <tr>
              <th>Produit&nbsp;</th>
              <th>&nbsp;Price&nbsp;</th>
              <th>&nbsp;&nbsp;Quantité</th>
            </tr>
            <?php
$res=mysqli_query($conn,"SELECT * from panier WHERE id_client=(SELECT id from client WHERE nom='$nom' AND prenom='$prenom');"); 
          while($row=mysqli_fetch_array($res)){?> 
            <tr>
              <td><center><?php echo $row['nom_produit'];?></center></td>
              <td><center>&nbsp;<?php echo $row['price'];echo("dh");?></center></td>
              <td><center>&nbsp;<?php echo $row['qte'];?></center></td>
              </tr>
          <?php }?>
          </table>
        </center>
        Prix Total :<input id="input-field" type="text" name="prixttc" value="<?php echo $pttc;?>"/>
        <center>
          <p>La livraison express avec 30DH leur durée 1h maximum</p>
          <p>La livraison gratuite avec 0DH leur durée 18h maximum</p>
          Type Livraison :
            <select class="monstyle"  required="required" name="Livraison">
              <option value="gratuit">gratuit</option>
              <option value="express">express</option>
         </select>
          </center>
        <?php }?>
      <input  id="input-button" name="submit" type="submit" value="Validé"/>
       
    </div>
    </form>

<script type="text/javascript">
    $('form').card({
    container: '.card-wrapper',
});


  </script>

<!--CCS CODE -->
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,900,700,500);
.monstyle{
  padding: 8px;
  margin: 10px;
  font: 20px Arial, sans-serif;
  font-size: 17px;
}
body {
  padding: 60px 0;
  background-color: rgba(178,209,229,0.7);
  margin: 0 auto;
  width: 600px;
}
.body-text {
  padding: 0 20px 30px 20px;
  font-family: "Roboto";
  font-size: 1em;
  color: #333;
  text-align: center;
  line-height: 1.2em;
}
.form-container {
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.card-wrapper {
  background-color: #6FB7E9;
  width: 100%;
  height: 40px;
  display: flex;

}
.personal-information {
  background-color: #3C8DC5;
  color: #fff;
  padding: 1px 0;
  text-align: center;
}
h1 {
  font-size: 1.3em;
  font-family: "Roboto"
}
input {
  margin: 1px 0;
  padding-left: 3%;
  font-size: 14px;
}
input[type="text"]{
  display: block;
  height: 50px;
  width: 97%;
  border: none;
}
input[type="email"]{
  display: block;
  height: 50px;
  width: 97%;
  border: none;
}
input[type="submit"]{
  display: block;
  height: 60px;
  width: 100%;
  border: none;
  background-color: #3C8DC5;
  color: #fff;
  margin-top: 2px;
  curson: pointer;
  font-size: 0.9em;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
}
input[type="submit"]:hover{
  background-color: #6FB7E9;
  transition: 0.3s ease;
}
#column-left {
  width: 46.8%;
  float: left;
  margin-bottom: 2px;
}
#column-right {
  width: 46.8%;
  float: right;
}

@media only screen and (max-width: 480px){
  body {
    width: 100%;
    margin: 0 auto;
  }
  .form-container {
    margin: 0 2%;
  }
  input {
    font-size: 1em;
  }
  #input-button {
    width: 100%;
  }
  #input-field {
    width: 96.5%;
  }
  h1 {
    font-size: 1.2em;
  }
  input {
    margin: 2px 0;
  }
  input[type="submit"]{
    height: 50px;
  }
  #column-left {
    width: 96.5%;
    display: block;
    float: none;
  }
  #column-right {
    width: 96.5%;
    display: block;
    float: none;
  }
}
  </style>
