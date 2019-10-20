<?php

 include("cabesera.php");

?>  

<body>
 <div id="trabajo" align="center">
			
<h1> Informe de Salida de Productos</h1>

<br>
<?php

$fini=$_POST["fecha_ini"];
$fterm=$_POST["fecha_term"];


$result = mysql_query("SELECT * FROM salidaproductos where fecha BETWEEN '$fini' and '$fterm'");
?>
<TABLE BORDER="1">
 <TR> 
 <TH>fecha</TH> 
   <TH>Cantidad</TH> 
   <Th>Producto</Th>
    <Th>Programa</Th>
 
   <Th>Funcionario</Th> 
    
 </TR>
<?php
while($row=mysql_fetch_array($result))
{
$fecha=$row["fecha"];
$producto=$row["codigoproducto"];
$tematica=$row["codtematica"];
$funcionario=$row["codusuario"];
$cantidad=$row["cantidad"];
$result2 = mysql_query("SELECT descripcion  FROM productos where codigoproducto='$producto'");

while($row1=mysql_fetch_array($result2))
{
$nameproducto=$row1["descripcion"];
}
$result3 = mysql_query("SELECT * FROM programa where id='$tematica'");

while($row2=mysql_fetch_array($result3))
{
$nametema=$row2["descripcion"];

}

?>

<TR> 
<Td><?php echo$fecha;?></Td>
 <Td><?php echo$cantidad;?></Td>
 <Td><?php echo$nameproducto;?></Td>

 <Td><?php echo$nametema;?></Td>
 <Td><?php echo$funcionario;?></Td>

  
</tr>

	

<?php }

?>
</table>
</body>
   <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>