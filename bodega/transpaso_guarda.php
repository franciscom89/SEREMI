<?php
include("conexion.php");

$codigo=$_POST['codigo'];

$bodega=$_POST['bodega'];
$cantidad=$_POST['stock'];
$descripcion=$_POST['descripcion'];
$categoria=$_POST['categoria'];
$sub_categoria=$_POST['subcategoria'];
$hoy = date("Y-m-d H:i:s"); 


$insertar_periferica=mysql_query("insert into bodega_periferica_stock (`codigo_producto` ,`stock`, `descripcion`,`categoria` ,`subcategoria`,`fecha`,`bodega`  ) value ('$codigo','$cantidad','$descripcion','$categoria','$sub_categoria','$hoy','$bodega')");

$select=mysql_query("Select * from productos where codigoproducto='$codigo'");


while($roww=mysql_fetch_array($select))
{
$stock=$roww["stock"];

}
$stock;

$final=$stock-$cantidad;

$update=mysql_query("update productos set stock='$final' where codigoproducto='$codigo' ");
 
 ?>