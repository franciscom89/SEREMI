<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Informestock.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("conexion.php");
?>  

<body>

<div class="wrapper">
		<div id="main">
			
<h1> Informe de Stock de Productos</h1>

<br>
<?php




$result = mysql_query("SELECT * FROM productos");

//$selectproveedor=mysql_query("SELECT * FROM proveedor");//AGREGADO TABLA PROVEEDOR

//$selectsalidaproductos=mysql_query("SELECT * FROM salidaproductos");//AGREGADO TABLA SALIDAPRODUCTOS



?>
<TABLE BORDER="1">
 <TR> 
 <TH>Cod.Productos</TH> 
   <TH>Descripcion</TH> 
   <Th>Stock</Th>
    
  <Th>Fecha Ingreso</Th> 
   <Th>Categoria</Th> 
     <Th>SubCategoria</Th> 
 </TR>
<?php


while($row=mysql_fetch_array($result))
{

$subcate=$row["subcategoria"];
$catego=$row["categoria"];
$codigoproductos=$row["codigoproducto"];

$categoria_b=  mysql_query("SELECT * FROM categoria where id='$catego' ",$conex);
 while($reg2=@mysql_fetch_array($categoria_b))
{
$nom_categoria=$reg2['nombre'];
 }
							
$subcategoria_b=  mysql_query("SELECT * FROM subcategoria where id='$subcate' ",$conex);
while($reg3=@mysql_fetch_array($subcategoria_b))
{
$nom_subcategoria=$reg3['nombre'];
}	

$producto=$row["codigoproducto"];
$descripcion=$row["descripcion"];
$fecha=$row["fechaingreso"];

//CORRECCION STOCK

$totalproveedor=0;
$totalsalidaproducto=0;

$selectproveedor = mysql_query("SELECT * FROM proveedor WHERE codigo='$codigoproductos' ",$conex);

while($row = mysql_fetch_array($selectproveedor))
{
 $totalproveedor = $totalproveedor + $row['cantidad']; 
}

$selectsalidaproducto=mysql_query("SELECT * FROM salidaproductos WHERE codigoproducto='$codigoproductos' ",$conex);
while($row = mysql_fetch_array($selectsalidaproducto))
{
 $totalsalidaproducto = $totalsalidaproducto + $row['cantidad']; 
}
  
$valor1=$totalproveedor;
$valor2=$totalsalidaproducto;
$stock=$valor1-$valor2;

//CORRECCION STOCK

?>

<TR> 
<Td><?php echo$producto;?></Td>
 <Td><?php echo$descripcion;?></Td>
 <Td><?php echo$stock;?></Td>

 <Td><?php echo$fecha;?></Td>
 <Td><?php echo $nom_subcategoria;?></Td>
<Td><?php echo $nom_categoria;?></Td>
  
</tr>

	

<?php 
}

?>
</table>
</body>