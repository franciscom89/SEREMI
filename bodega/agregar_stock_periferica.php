<?php

	
 include("cabesera.php");

 $bodega_periferica=$_POST['bodega'];
 $usuario=$_SESSION['id_usuario_session'];
 ?>
 <div id="trabajo" align="center">
 <form method="post" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" ENCTYPE="multipart/form-data">
  <h1>Registro de Transpaso de Productos a bodega Periferica</h1> 
  <br>
        <TABLE > 
<TR> 
   <TH>Codigo De barra</TH> 
   <TH>Cantidad</TH> 
 
   
</TR> 
<TR> 
   <TD><input type="text" name="codigo" class="input" id="codigo" required><div id="resultado"></div></TD>
<TD><input type="number" min="1" class="input" name="cantidad" value="1"  required></TD> 
   
</TR> 
<TR> 
   <TH></TH> 
<TD><input type="submit" id="boton"  name="boton" value="Agregar"></TD> 
   
</TR>

</TABLE> 
 <input type="hidden" class="input" name="bodega"value="<?php echo $bodega_periferica?>" readonly>
</form>

 <?php
 
if(isset($_POST['boton']))
 
{
$hoy = date("Y-m-d H:i:s");   

$codigo=$_POST["codigo"];
$cantidad=$_POST["cantidad"];
$bodega_periferica=$_POST['bodega'];
$select=mysql_query("Select stock from productos where codigoproducto='$codigo'");
while($row=mysql_fetch_array($select))
{
$stock=$row["stock"];
}

if($stock >= $cantidad){
$permitido=1;

}else{
echo "En stock hay disponible: ".$stock;
}
?>
 <h1>Productos en Lista de Salida</h1> 
 <form method="post" action="Generarsalida.php" ENCTYPE="multipart/form-data">
<TABLE > 
<TR> 
   <TH>Codigo</TH> 
   <TH>Descripcion</TH> 
   <TH>Cantidad</TH> 
 
   
</TR>
<?php
if($permitido ==1){
	$usuario=$_SESSION['id_usuario_session'] ;
$q = mysql_query("insert into temporal (codigoproducto,cantidad,bodegero, bodega)values ('$codigo','$cantidad','$usuario','$bodega_periferica')");
}
$s=mysql_query("Select * from temporal where bodega='$bodega_periferica'");
 while($row=mysql_fetch_array($s))
{
$codigo=$row["codigoproducto"];
$w=mysql_query("Select * from productos where codigoproducto='$codigo' ");
 while($rowe=mysql_fetch_array($w))
{
$descripcion=$rowe["descripcion"];
}

   ?>
</TR> 
<TR> 
   <TD><input type="text" class="input" name="codigo"value="<?php echo $row["codigoproducto"]?>" readonly></TD>
   <TD><input type="text" class="input" name="descripcion"value="<?php echo $descripcion?>" readonly></TD>
<TD><input type="text" class="input"  name="cantidad"value="<?php echo $row["cantidad"]?>" readonly></TD> 
   
</TR> 


<?php
 }
 ?>
 
 <TR> 
  <TD></TD> 
   <TD></TD> 
<TD><input type="submit" id="boton"  name="boton" value="Confirmar"></TD> 
   
</TR>
 </TABLE> 
<input type="hidden" class="input" name="bodega"value="<?php echo $bodega_periferica?>" readonly>
 </form>
 
 <?php
 echo "<a href='#' onClick=javascript:ventanaSecundaria('sacardelista.php?id_v=$id','_blank','venatana$row->id')>Sacar Producto de lista</a>";

}

?>
 	 <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html