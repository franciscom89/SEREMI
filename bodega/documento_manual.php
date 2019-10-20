<?php
require('pdf/fpdf.php');
include("conexion.php");
session_start();

$labodega='9';
$ultimo='1099';
$funcionario='EDITH CLOTILDE RIQUELME MUNOZ';
$seccion='S-ACCION SANITARIA';
@$programa='0415 / ACCION SANITARIA / OTRAS ENFERMEDADES EMERGENTES ';
$departamento=$_GET['departamento'];
$tipo='Salida';


$usuario_bodega='';

$nombre_variable="pdf_originales/".$ultimo.".pdf";

//$upda=mysql_query("update archivo set original='".$nombre_variable."' where id='".$ultimo."'");
$result=mysql_query("SELECT cantidad as Price, salidaproductos.codigoproducto as Code , descripcion as Name ,precio_salida FROM `salidaproductos` join productos on salidaproductos.codigoproducto=productos.codigoproducto  WHERE `id_archivo`='$ultimo' and bodega='$labodega'");

class PDF extends FPDF
{
   //Cabecera de pÃ¡gina
   function Header()
   {

     global $pisos,$oficinas,$tipo,$ultimo,$funcionario,$bodega,$programa,$seccion;
    // Logo
    $this->Image('logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,$tipo.' de Productos N� '.$ultimo.'/'.date('Y'),0,0,'C');
	$this->Ln();
	$this->Ln();
	
	 $this->SetFont('Arial','',8);
	
	////////////------------------------
	if($tipo=='Merma'){


 $this->SetFont('Arial','',10);
	  $this->Cell(40);
	$this->Cell(70,10,'Funcionario: '.$funcionario,0,0,'L');
	$this->Cell(70,10,'Encargado Bodega',0,0,'L');




}elseif($tipo=='Transferencia'){
	


	  $this->Cell(40);
	$this->Cell(70,10,'Funcionario: '.$funcionario,0,0,'L');

}else{

 $this->SetFont('Arial','',8);
	  $this->Cell(40);
	$this->Cell(70,10,'Funcionario: '.$funcionario,0,0,'L');
	 
	$this->Ln();	
	 $this->Cell(40);
	$this->Cell(105,10,'Seccion: '.$seccion.'     Pagina '.$this->PageNo().'/{nb}   Fecha: '.date('d-m-Y'),0,0,'L');
		
}

if($programa!=''){

//$pdf->Cell(100,10,'Departamento: '.$departamento,0,1,'L');
$this->Ln();	
$this->Cell(40);
$this->Cell(0,10,'Programa: '.$programa,0,0,'L');

}elseif($bodega!=''){
	

 $this->Ln();
$this->Cell(40);
	$this->Cell(0,10,'Bodega: '.$bodega,1,0,'L');
    // Salto de línea
    $this->Ln();	
	//---------------------------------------

   }
  
   }
   function Footer()
{
 global $entrega,$nombre_seccion_entrega,$nombre_seciones,$usuario_bodega,$funcionario,$seccion;
    // Posición: a 1,5 cm del final
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
	
	
   //Fields Name position
$Y_Fields_Name_position = -15;
//Table position, under Fields Name
$Y_Table_Position =-9;

//First create each Field Name
//Gray color filling each Field Name box
$this->SetFillColor(255,255,255);
//Bold Font for Field Name
$this->SetFont('Arial','B',10);
$this->SetY($Y_Fields_Name_position);
$this->SetX(15);
$this->Cell(70,6,'ELIZABETH TERESA PINILLA DELGADO ',0,0,'C',1);
$this->SetX(85);
$this->Cell(65,6, '',0,0,'C',1); 
$this->SetX(130);
 if($tipo!='Merma'){

 $this->Cell(65,6,$funcionario,0,0,'C',1);
 }

$this->SetX(125);


$this->SetFont('Arial','B',10);
$this->SetY($Y_Table_Position);
$this->SetX(15);
$this->Cell(55,6,'ENCARGADO BODEGA',0,0,'C',1);
$this->SetX(65);
$this->Cell(65,6,'',0,0,'C',1); 
$this->SetX(130);

 if($tipo=='Transferencia'){
	  $seccion='ENCARGADO BODEGA PERIFERICA';
	 
  }
  if($tipo!='Merma'){

 $this->Cell(65,6,$seccion,0,0,'C',1);
  }


$this->SetX(125);

}
}

$pdf = new PDF('P','mm','Legal');
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(1,55);//margen inferior con paginacion
$pdf->AddPage();


$pdf->SetFont('Arial','B',15);
$pdf->Cell(-190,22,'Datos de Productos',0,1,'C');


//Fields Name position
$Y_Fields_Name_position = 70;
//Table position, under Fields Name
$Y_Table_Position =76;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(25);
$pdf->Cell(30,6,'Codigo',1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(120,6,'Descripcion',1,0,'L',1);
$pdf->SetX(125);
$pdf->Cell(25,6,'Cantidad',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,'Precio',1,0,'C',1);

$pdf->SetY($Y_Table_Position);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',7);

while($row = mysql_fetch_array($result))
{
	
	
	
    $code = $row["Code"];
    $name = substr($row["Name"],0,20);
    $real_price = $row["Price"];
	$precio_salida=round($row["precio_salida"]);
	
	$total_global=$precio_salida * $real_price;
$total2=0;


$pdf->SetX(25);
$pdf->Cell(30,6,$code,1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(120,6,$name,1,0,'L',1);
$pdf->SetX(125);
$pdf->Cell(25,6,$real_price,1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,$total_global,1,0,'C',1);

  $pdf->Ln(); 
	}
$pdf->Output();
//$nombre_variable,"F"


?>

