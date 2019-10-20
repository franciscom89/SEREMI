<?php

 include("cabesera.php");

 ?>
 <div id="trabajo" align="center">


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" ENCTYPE="multipart/form-data">
 <div align="center">
  <h1>Agregar Stock Productos</h1> 
  <br />
        <TABLE > 
<TR> 
   <TH>Codigo Producto</TH> 
    
 
   
</TR> 
<TR> 
   <TD><input type="text" name="codigo" class="input" required="required"></TD>

   
</TR> 
<TR> 
  
<TD><input type="submit" name="boton" value="Buscar" id="boton"></TD> 
   
</TR>

</TABLE> 
</div>
</form>

 <?php
 
if(isset($_POST['boton']))
 
{
$hoy = date("Y-m-d H:i:s");   

$codigo=$_POST["codigo"];

$select=mysql_query("Select * , SUM( stock ) as total from productos where codigoproducto='$codigo' GROUP BY  `codigoproducto` ");
$num=mysql_num_rows($select);
if($num!=""){
while($row=mysql_fetch_array($select))
{
//$stock=$row["total"];
$descripcion=$row["descripcion"];

$catego=$row["subcategoria"];
$subcatego=$row[""];
}

//CORRECION STOCK
$selectproveedor = mysql_query("SELECT * FROM proveedor WHERE codigo='$codigo' ");

  while($row = mysql_fetch_array($selectproveedor))
    {
      $totalproveedor = $totalproveedor + $row['cantidad']; 
    }

  $selectsalidaproducto=mysql_query("SELECT * FROM salidaproductos WHERE codigoproducto='$codigo' ");
  while($row = mysql_fetch_array($selectsalidaproducto))
    {
      $totalsalidaproducto = $totalsalidaproducto + $row['cantidad']; 
    }

    $valor1=$totalproveedor;
    $valor2=$totalsalidaproducto;
    $stock=$valor1-$valor2;

//CORRECCION STOCK

?>
 
		<form method="post" action="Agregarstock.php" ENCTYPE="multipart/form-data">
        <div align="center">
        <h1>Agregar stock a Producto</h1>
        <TABLE> 
<TR> 
   <TH>Codigo De barra</TH> 
<TD><input type="text" name="codigo" value="<?php echo $codigo;?>" class="input"readonly="readonly"></TD> 
   
</TR> 
<TR> 
   <TH>Descripcion</TH> 
<TD><input type="text" name="descripcion" value="<?php echo $descripcion;?>" class="input"readonly="readonly"></TD> 
   
</TR> 
<TR> 
   <TH>Stock Actual</TH> 
<TD><input type="text" name="stock"value="<?php echo $stock;?>"class="input" readonly="readonly"></TD> 
   
</TR> 
 
<TR> 
   <TH>Cantidad Agregar</TH> 
<TD><input type="number" name="nuevo"value=""onkeyup='validar2(this);' class="input" required="required" min="0" max="9999999999999"></TD> 
   
</TR> 
<TR>
  <TH>Proveedor (RUT)</TH>
  <TD><input type="text" name="proveedor" id="proveedor"required="required" class="input"/></TD>
</TR>
<TR>
  <TH>N Factura</TH>
  <TD><input type="number" name="n_factura" id="n_factura" required="required" class="input" min="0" max="9999999999999"/></TD>
</TR>
<TR>
  <TH>Precio $</TH>
  <TD><input type="number" name="precio" id="precio" required="required" class="input" min="0" max="9999999999999"/></TD>
</TR> 
<TR> 
   <TH></TH> 
<TD><input type="submit" name="boton" value="Guardar" id="boton"></TD> 
   
</TR>

</TABLE>
</div>
<?php 
}else{
?>
 <h1>Producto no registrado</h1>
 <br>
 <a href="ingresoproductos.php" >Agregar Producto</a>
<?php
}



?>
 
 </form>
 <?php
 

}

?>
      <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html