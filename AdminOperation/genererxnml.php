<?php
require_once("cnx.php");
$id=$_GET['id'];
//echo $id;

$bd = new PDO("mysql:host=localhost;dbname=systeme_restaurant", "root", "");
// Requête de sélection des enregistrements dans la table livres
    $r = $bd->query("SELECT * FROM commande WHERE nom_client=(SELECT nom FROM client WHERE id='$id') AND prenom_client=(SELECT prenom  FROM client WHERE id='$id')");

     $xmlFile = new DOMDocument('1.0', 'utf-8');

     $xmlFile->appendChild($commande = $xmlFile->createElement('commande'));

     while($rs = $r->fetch(PDO::FETCH_ASSOC)){
    $commande->appendChild($achats = $xmlFile->createElement('achats'));
    $achats->appendChild($xmlFile->createElement('date_achat', $rs['date_achat']));
    $achats->appendChild($xmlFile->createElement('nom_client', $rs['nom_client']));
    $achats->appendChild($xmlFile->createElement('prenom_client', $rs['prenom_client']));
    $achats->appendChild($xmlFile->createElement('price', $rs['price']));

    $xmlFile->formatOutput = true;	

     $xmlFile->save('commande.xml');

    header("Location: commande.xml");

		}
	
 ?>
 		
