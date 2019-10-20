<?php


$mysql_host = "localhost";
$mysql_database = "bodega";
$mysql_user = "root";
$mysql_password = "";


/*$mysql_host = "mysql8.000webhost.com";
$mysql_database = "a4541051_factura";
$mysql_user = "a4541051_fact";
$mysql_password = "factura01";*/

$conex = mysql_connect($mysql_host,$mysql_user,$mysql_password)
		or die("<h1>Atención: </h1>No se pudo realizar la conexion");
	mysql_select_db($mysql_database,$conex)
		or die("<h1>Atención: </h1>Error con la base de datos");
?>
