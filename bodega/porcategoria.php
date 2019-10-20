<?php

 include("cabesera.php");

 ?>  

<body>

<div id="trabajo" align="center">
<br>
<h1> Seleccione Categoria</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" ENCTYPE="multipart/form-data">		
<TABLE BORDER="1"> 
<TR> 
   <TH>Categoria Actuales</TH> 
<TD><select name="cate" id="cate" class="input"  >
<option>Seleccione una Categoria</option>
<?php

$consulta="SELECT * FROM categoria ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select></TD> 
</TR>
<TR> 
   <TH></TH> 
<TD><input type="submit"  id="boton"  name="boton" value="Buscar"></TD> 
   
</TR>
</table>
</form>
<br>
<?php

if(isset($_POST['boton']))
 
{
$categoria=$_POST["cate"];

$result = mysql_query("SELECT codigoproducto,descripcion,stock,fechaingreso,subcategoria.nombre as subcate,categoria.nombre as cate  FROM productos join subcategoria on productos.subcategoria=subcategoria.id join categoria on categoria.id=productos.categoria where productos.categoria='$categoria' ");
?>
 
<h1> Productos</h1>
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

$producto=$row["codigoproducto"];

$descripcion=$row["descripcion"];
$stock=$row["stock"];

$fecha=$row["fechaingreso"];
$subcate=$row["subcate"];
$catego=$row["cate"];



?>

<TR> 
<Td><?php echo $producto;?></Td>
 <Td><?php echo $descripcion;?></Td>
 <Td><?php echo $stock;?></Td>

 <Td><?php echo $fecha;?></Td>
 <Td><?php echo $subcate;?></Td>
<Td><?php echo $catego;?></Td>
  
</tr>

	

<?php 
}

?>
</table>
</body>
  
	 <?php
}


?></div>
<div id="copyright">Copyright &copy; 2014 - Recursos Fisicos y TI<a href="http://apycom.com/"></a></div>

</body>
</html>