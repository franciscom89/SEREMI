<?php 
include("conexion.php");
require('pdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'hOLA',1,0,'C');
    // Salto de línea
    $this->Ln(40);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//-----------------------------------------------------------------------------------

$sql=mysql_query("SELECT * FROM  `imprimir_fonasa`",$conex);
while ($row=mysql_fetch_array($sql)) {
	$id_registro_fonasa=$row['codigo'];
	
	$consulta_trabajador1=mysql_query("SELECT resolucion FROM  `registros_fonasa` WHERE  `id` ='".$id_registro_fonasa."'",$conex);
$datos1=mysql_fetch_array($consulta_trabajador1);

//tipo de resolucion que se recibe
$resolucion_recibida=$datos1['resolucion'];
//$id_registro_fonasa=1;
//tipo de resolucion que se recibe
//$resolucion_recibida="Art. 56 Aplica";

//CONSULTAR POR FIRMANTE
$firmante_query=mysql_query("select *from funcionarios where estado='firmante1'",$conex);	 
$firmante=mysql_fetch_array($firmante_query);

//------------------------------------------------------------------------------------

if(($resolucion_recibida=='Licencia Medica Autorizar'))
{
	//consulta por texto de notificacion para el informe
$notificacion=mysql_query("select texto from `texto_notificacion_fonasa` where id=1 ",$conex);
$noty=mysql_fetch_array($notificacion);

//traer datos del trabajador
$consulta_trabajador=mysql_query("SELECT * 
FROM  `registros_fonasa` 
WHERE  `id` ='".$id_registro_fonasa."'",$conex);
$datos=mysql_fetch_array($consulta_trabajador);

$fecha=strtotime($datos['fecha_creacion']);
$anio=@date("Y", $fecha);
$mes=@date("m", $fecha);
$dia=@date("d", $fecha);
$fecha_inicio=strtotime($datos['fecha_inicio']);
$anio_i=@date("Y", $fecha_inicio);
$mes_i=@date("m",$fecha_inicio);
$dia_i=@date("d", $fecha_inicio);
$fecha_inicio_final=$dia_i."/".$mes_i."/".$anio_i;	 
$x=$datos[7];	
$texto=$noty[0];
$dia_iniciales=$datos['dias_iniciales'];



if($datos['adicional']!='')
{
	$observacion=", deber&aacute; incluir ".$datos['adicional'];
}else{
	$observacion="";
	}


$nuevacadena=str_replace('%$licenciamedica%',$x,$texto);
$nuevacadena2=str_replace('%$dias%',$dia_iniciales,$nuevacadena);
$nuevacadena3=str_replace('%$observacion_f%',$observacion,$nuevacadena2);
$nuevacadena4=str_replace('%$fecha_ini%',$fecha_inicio_final,$nuevacadena3);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'ORD: '.$datos[1].'/'.$anio,0,1);

$pdf->multiCell(0,10,$texto);	
}


// Creación del objeto de la clase heredada
//$pdf = new PDF();
//$pdf->AliasNbPages();
//$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//$pdf->Cell(0,10,'ORD: '.$datos[1].'/'.$anio,0,1);
//
//$pdf->multiCell(0,10,$texto);

	
	
	
	
	
	
	
	}
$pdf->Output();

?>