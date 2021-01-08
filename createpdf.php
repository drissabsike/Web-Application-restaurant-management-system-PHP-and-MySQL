<?php
require "fpdf.php";
require_once("connection.php");
$id=$_GET['id'];

class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','IB',30);
		
		//dummy cell to put logo
		//$this->Cell(12,0,'',0,0);
		//is equivalent to:
		$this->Cell(12);
		
		//put logo
		$this->Image('img/Capture.png',15,10,70);
		
		$this->Cell(276,50,'Recu de Paiement',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','IB',15);
		$this->Cell(300,10,'Bienvenu a MerlaCoffee Restaurant',0,0,'C');
		//dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(32);
		$this->SetFont('Times','IU',15);
		$this->Cell(25,5,'Informations Personnelles:',0,0);
		$this->Ln(13);
		$this->SetFont('Times','IB',15);

		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);
		$this->Cell(25,5,'Nom',0,0,true);
		$this->Cell(25,5,'Prenom',0,0,true);
		$this->Cell(30,5,'Ville',0,0,true);
		$this->Cell(40,5,'Address',0,0,true);
		$this->Cell(40,5,'Email',0,0,true);
		$this->Cell(60,5,'Code Postale',0,0,true);
		$this->Ln(25);

		$this->SetFont('Times','IU',15);
		$this->Cell(25,5,'Informations Carte Bancaire:',0,0);
		$this->SetFont('Times','IB',15);
		$this->Ln(13);
		$this->Cell(40,5,'Cart Number',0,0,true);
		$this->Cell(50,5,'date Expiration',0,0,true);
		$this->Cell(20,5,'Cvc',0,0,true);
		$this->Ln(30);


		$this->Ln(10);
		$this->SetFont('Times','IB',15,true);
		$this->Cell(40,-20,'Prix',0,0,true);
		$this->Cell(40,-20,'Type Livraison',0,0,true);
		


	}
	function Footer(){
		//add table's bottom line
		//$this->Cell(190,0,'','T',0);
		//Go to 1.5 cm from bottom
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
	}
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF(); //use new class

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage('L','A4',0);

$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(50,50,100);

$query=mysqli_query($conn,"SELECT * FROM facture WHERE id='$id' ");
while($data=mysqli_fetch_array($query)){
		$pdf->Cell(-55,-140,$data['nom'],0,0,true);
		$pdf->Cell(24,-140,$data['prenom'],0,0,true);
		$pdf->Cell(30,-140,$data['ville'],0,0,true);
		$pdf->Cell(40,-140,$data['address'],0,0,true);
		$pdf->Cell(50,-140,$data['email'],0,0,true);
		$pdf->Cell(40,-140,$data['zipcode'],0,0,true);


		$pdf->Cell(-170,-60,$data['cardnumber'],0,0,true);
		$pdf->Cell(30,-60,$data['expiry'],0,0,true);
		$pdf->Cell(40,-60,$data['cvc'],0,0,true);
		
		$pdf->Cell(-72,1,$data['prixttc'],0,0,true);
		$pdf->Cell(5,1,'dh',0,0,true);
		$pdf->Cell(20,1,$data['Livraison'],0,0,true);

		$pdf->SetFont('Times','IBU',15);
		$pdf->Cell(90,-20,'Le Prix a Payer :',0,0,true);
		$pdf->Cell(1,-50,'Date :',0,0,true);
		$pdf->Cell(50,-50,$data['date_facture'],0,0,true);


		$pdf->SetFont('Times','IB',20);
		if($data['Livraison']=='express'){
			$ss=$data['prixttc']+30;
			$pdf->Cell(-35,-20,$ss,0,0,true);
			}else{$pdf->Cell(-35,-20,$data['prixttc'],0,0,true);}
			$pdf->Cell(12,-20,'dh',0,0,true);

}
	//$pdf->Cell(40,5,$data['nom'],'LR',0);
	//$pdf->Cell(40,5,$data['prenom'],'LR',0);
	/*$pdf->Cell(25,5,$data['phone'],'LR',0);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(65,5,$data['email'],'LR',0);
	$pdf->SetFont('Arial','',9);
*/


$pdf->Output();

?>