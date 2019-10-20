<?php

	
 include("cabesera.php");
 
$tematica=$_POST["linea"];
 $q=mysql_query("update temporal set tematica='$tematica' where bodegero='$usuario' and bodega='0'");
 

$r=mysql_query("SELECT seccion.nombre AS nseccion, usuario,temporal.bodega,temporal.dirigida, programa.descripcion AS ntematica, departamento.nombre AS depa, usuario.codigoseccion AS numeseccion FROM temporal
JOIN programa ON temporal.tematica = programa.id
JOIN usuario ON temporal.usuario = usuario.nombre
JOIN seccion ON usuario.codigoseccion = seccion.id
JOIN departamento ON seccion.coddepa = departamento.id
LIMIT 1");
while($row=mysql_fetch_array($r))
{
$usuarios=$row["usuario"];
$tematica=$row["ntematica"];
$linea=$row["linea"];
$seccion=$row["nseccion"];
$departa=$row["depa"];
$bodega=$row['bodega'];
$dirigida=$row['dirigida'];
}

 ?>
 <script language="Javascript">

  function imprSelec(nombre)

  {

  var ficha = document.getElementById(nombre);

  var ventimp = window.open(' ', 'popimpr');

  ventimp.document.write( ficha.innerHTML );

  ventimp.document.close();

  ventimp.print( );

  ventimp.close();

  } 

</script>
 <div id="trabajo" align="center">
 <h1>Datos:</h1> 
  <br />
  <div style="background:#FFF";>
<TABLE > 
<TR> 
   <TH>Funcionario</TH> 
   <TD><?php echo $usuarios?></TD> 
   
</TR> 
<TR> 
   <TH>Departamento</TH> 
   <TD><?php echo $departa?></TD> 
   
</TR> 
<TR> 
   <TH>Seccion</TH> 
   <TD><?php echo $seccion?></TD> 
   
</TR> 

<TR> 
   <TH>Programa</TH> 
   <TD><?php echo $tematica?></TD> 
   
</TR> 

<?php
if($dirigida=='bodega'){
	$r2=mysql_query("SELECT * FROM `bodega_periferica` WHERE id='$bodega' ");
	while($row2=mysql_fetch_array($r2))
{
$nombre_bodega=$row2['nombre'];	
}
	?>
	<TR> 
   <TH>Bodega periferica</TH> 
   <TD><?php echo $nombre_bodega ?></TD> 
   
</TR> 
<?php
}

?>

</TABLE>
</div>
 <h1>Productos</h1> 
 <div style="background:#FFF";>
 <TABLE> 
<TR> 
   <TH width="144">Productos</TH> 
   <TH width="144">Cantidad</TH> 
   <TH width="144">Precio</TH> 
 <TH width="398">Descripcion</TH> 
   
</TR>
<?php

$s=mysql_query("Select * from temporal where bodegero='$usuario'");
 while($row=mysql_fetch_array($s))
{
$codigo=$row["codigoproducto"];
$cantidades=$row["cantidad"];
$ss=mysql_query("Select descripcion from productos where codigoproducto='$codigo'");
 while($rows=mysql_fetch_array($ss))
{
$descrip=$rows["descripcion"];
}
$valor=mysql_query("SELECT * FROM `proveedor` WHERE `codigo`='$codigo'");
 $nConfig = mysql_num_rows ($valor);
 if ($nConfig > 0){
	  for ($i=0; $i<$nConfig; $i++)  
            {  
                $verConfig = mysql_fetch_array($valor);  
                $cantidad[$i] = $verConfig["en_stock"];  
                $precio[$i] = $verConfig["precio"];  
				$arriba=  $cantidad[$i] * $precio[$i] + $arriba;
				$abajo = $cantidad[$i] + $abajo;
            }  
	 
 }
if($abajo==0){ $abajo=1;}
 $total= ($arriba / $abajo );

   ?>
</TR> 
<TR> 
   <TD><input type="text" name="codigo"value="<?php echo $descrip ?>" readonly="readonly"></TD>
<TD><input type="text" name="cantidad"value="<?php echo $cantidades?>" readonly="readonly"></TD> 
<TD><input type="text" name="cantidad"value="<?php echo $total?>" readonly="readonly"></TD> 
  <TD><input name="descripcion" type="text"value="<?php echo $descrip?>" size="70" readonly="readonly"></TD>  
</TR> 


<?php
$total=0;
$arriba=0;
$abajo=0;
 }
 ?>

 </TABLE> 
 </div>
 </form>
 <?php
?>

<DIV ID="seleccion" style="display: none; " >
<IMG SRC="logo.jpg">
 <p>Seremi Salud Los Rios
  <p>
 <?php
 if($dirigida=='bodega'){
	 echo" <h2>Comprobante de Tranferencia de Productos:</h2> ";
 }else{
	 echo " <h2>Comprobante de Salida de Productos:</h2> ";
	 
 }
 
 ?>

<TABLE BORDER="1"> 
<TR> 
   <TH>Funcionario</TH> 
   <TD><?php echo $usuarios?></TD> 
   
</TR> 
<TR> 
   <TH>Departamento</TH> 
   <TD><?php echo $departa?></TD> 
   
</TR> 
<TR> 
   <TH>Seccion</TH> 
   <TD><?php echo $seccion?></TD> 
   
</TR> 
<TR> 
   <TH>Programa</TH> 
   <TD><?php echo $tematica?></TD> 
   
</TR> 
<?php
if($dirigida=='bodega'){
	$r2=mysql_query("SELECT * FROM `bodega_periferica` WHERE id='$bodega' ");
	while($row2=mysql_fetch_array($r2))
{
$nombre_bodega=$row2['nombre'];	
}
	?>
	<TR> 
   <TH>Bodega periferica</TH> 
   <TD><?php echo $nombre_bodega ?></TD> 
   
</TR> 
<?php
}

?>
</TABLE>
<br>
 <h2>Productos</h2> 
 <TABLE BORDER="1"> 
<TR> 
     <TH width="144">Productos</TH> 
   <TH width="144">Cantidad</TH> 
     <TH width="144">Precio</TH>
 <TH width="398">Descripcion</TH> 
   
</TR>
<?php

$s=mysql_query("Select * from temporal where bodegero='$usuario'");
 while($row=mysql_fetch_array($s))
{
$codigo=$row["codigoproducto"];
$cantidad=$row["cantidad"];
$ss=mysql_query("Select descripcion from productos where codigoproducto='$codigo'");
 while($rows=mysql_fetch_array($ss))
{
$descrip=$rows["descripcion"];
}
$valor=mysql_query("SELECT * FROM `proveedor` WHERE `codigo`='$codigo'");
 $nConfig = mysql_num_rows ($valor);
 if ($nConfig > 0){
	  for ($i=0; $i<$nConfig; $i++)  
            {  
                $verConfig = mysql_fetch_array($valor);  
                $cantidad[$i] = $verConfig["en_stock"];  
                $precio[$i] = $verConfig["precio"];  
				$arriba=  $cantidad[$i] * $precio[$i] + $arriba;
				$abajo = $cantidad[$i] + $abajo;
            }  
	 
 }

 $total= ($arriba / $abajo );
   ?>
</TR> 
<TR> 
   <TD><input type="text" name="codigo"value="<?php echo $descrip ?>"></TD>
   <TD><input type="text" name="cantidad"value="<?php echo $cantidades?>"></TD> 
<TD><input type="text" name="cantidad"value="<?php echo $total?>"></TD> 
     <TD><input type="text" name="descripcion"value="<?php echo $descrip?>"></TD>  
</TR> 


<?php
$total=0;
$arriba=0;
$abajo=0;
 }
 ?>

 </TABLE> 
 </form>
</DIV>
			<a href="javascript:imprSelec('seleccion')" >Imprimir Comprobante</a> ||
			<a href="salidafinal.php" >Concretar Salida De Productos</a>
<br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>