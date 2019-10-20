<?php


//$conexion = new mysqli('mysql8.000webhost.com','a4541051_fact"','factura01','a4541051_factura');
$conexion = new mysqli('localhost','root','','recursos');


$rut= $_GET['term'];
$consulta = "SELECT `marca` FROM `cel_teb` WHERE `marca` LIKE '%$rut%' limit 1";

$result = $conexion->query($consulta);

if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$matriculas[] = $fila['marca'];		
	}
	echo json_encode($matriculas);
} 

?>