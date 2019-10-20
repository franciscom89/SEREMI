<?php
$cod=$_GET['codigo'];
$descripcion=$_GET['descripcion'];


require('ean13.php');
$pdf=new PDF_EAN13('L','mm',array(90,29));
//
//$pdf->AddPage();
//$pdf->Text(2,3,$descripcion);
//$pdf->EAN13(18,3,$cod);
//
//

//$pdf->Open();
//$pdf->AddPage();
//
$pdf->AddPage();
if(strlen($cod)==12){
	$pdf->EAN12(12,10,$cod);
	
}elseif(strlen($cod)==13){
$pdf->EAN13(12,10,$cod);
}
$pdf->SetFont('Arial','',10);
$pdf->Text(2,5,$descripcion);
$pdf->SetFont('Arial','',7);
$pdf->Output();
//
//
//$pdf->Output();*/
//$pdf=new PDF_Codabar('L','mm',array(90,29));
//$pdf->AddPage();
//$pdf->Codabar(5,8,$cod,2,9);
//$pdf->SetFont('Arial','',10);
//$pdf->Text(2,5,utf8_decode($descripcion));
//$pdf->Output();

?>