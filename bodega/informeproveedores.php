<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Informesalidas.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("conexion.php");
?>  

<body>

<div class="wrapper">
		<div id="main">
			
<h1> Informe de Proveedores</h1>

<br>
<?php

$fini=$_POST["fecha_ini"];
$fterm=$_POST["fecha_term"];


$result = mysql_query("SELECT * FROM proveedor where fecha BETWEEN '$fini' and '$fterm'");
?>
<TABLE BORDER="1">
 <TR> 
 <TH>Cod</TH> 
   <TH>Proveedor</TH> 
   <Th>Factura</Th>
    <Th>Cantidad</Th>
 
   <Th>Precio</Th> 
    <Th>Descripcion</Th>
    <Th>Fecha</Th>
    <Th>Usuario</Th>
    <Th>Ip</Th>
    <Th>En stock</Th>
    <Th>Cod Producto</Th>
 </TR>
<?php
while($row=mysql_fetch_array($result))
{

?>

<TR> 
<Td><?php echo $row[0];?></Td>
 <Td><?php echo $row[1];?></Td>
 <Td><?php echo $row[2];?></Td>

 <Td><?php echo $row[3];?></Td>
 <Td><?php echo $row[4];?></Td>
 <Td><?php echo $row[5];?></Td>
 <Td><?php echo $row[6];?></Td>
 <Td><?php echo $row[7];?></Td>
 <Td><?php echo $row[8];?></Td>
 <Td><?php echo $row[9];?></Td>
 <Td><?php echo $row[10];?></Td>

  
</tr>

	

<?php }

?>
</table>
</body>