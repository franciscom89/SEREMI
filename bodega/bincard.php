<?php
//bincard.php
 include("cabesera.php");
 $codigo_abuscar=$_POST['codigo'];
 $select_name=mysql_query("SELECT  descripcion FROM proveedor where codigo='$codigo_abuscar'");
while ($row_name = mysql_fetch_row($select_name))
{
$descp=$row_name[0];
}
 
  $select=mysql_query("(SELECT  null , cantidad,fecha,descripcion,factura,null,proveedor,null FROM proveedor where codigo=  '$codigo_abuscar' )
UNION
(SELECT cantidad,null ,fecha,null,null,id_archivo,null,codtematica FROM salidaproductos where codigoproducto =  '$codigo_abuscar' ) order by fecha asc");

$mi_estocl=0;
?>
<div id="trabajo" align="center">
  <h1>Tarjeta Bincard para bodega</h1> 
   <h2>Articulo: <?php echo $descp; ?></h2> 
  <br />
 
   <TABLE border='2' cellpadding='0' cellspacing='2' width='1200' bgcolor='#F6F6F6' bordercolor='#666666'> 
   <TR> 
   <TH>FECHA</TH> 
   <TH>N� ING.</TH> 
   <TH>N� EGR.</TH> 
   <TH>PROVEEDOR</TH>
   <TH>PROGRAMA</TH> 
   <TH>ENTRADA</TH> 
 <TH>SALIDA</TH> 
  <TH>SALDO</TH> 
   
</TR> 

 <?php 
while ($row = mysql_fetch_row($select))
{
$entrada_p=$entrada_p+$row[1];
$salida_p=$salida_p+$row[0];
$tematica=$row[7];
$select_tematica=mysql_query("SELECT  descripcion FROM programa where id='$tematica'");
while ($row_tema = mysql_fetch_row($select_tematica))
{
$tema=$row_tema[0];
}
$fechacorte=$row[2];
$tal=explode("-",$fechacorte);
  ?>
 
<TR> 
   <TH><?php echo $tal[2].'-'.$tal[1].'-'.$tal[0]; ?></TH> 
  <TH><?php echo $row[4]; ?></TH>
<TH><?php echo $row[5]; ?></TH>  
<TH><?php echo $row[6]; ?></TH> 
<TH><?php echo $tema; ?></TH>   
   <TH><?php echo $row[1]; ?></TH> 
 <TH><?php echo $row[0]; ?></TH> 

<?php 
if($row[1]!=''){


$mi_estocl =$mi_estocl + $row[1];

}

if($row[0]!=''){

$mi_estocl =$mi_estocl - $row[0];

}

?>

   <TH> <?php echo $mi_estocl; ?> </TH>
   
</TR> 
 
<?php  
  }
  ?>
     <TR> 
   <TH></TH> 
   <TH></TH> 
   <TH></TH>
   <TH></TH>
   <TH></TH>
   <TH><?php echo $entrada_p; ?></TH> 
 <TH><?php echo $salida_p; ?></TH> 

 <TH><?php echo $entrada_p - $salida_p; ?> </TH>
   
</TR> 
  </TABLE >

<form method="post" action="excel_bindcard.php" ENCTYPE="multipart/form-data">
    <input type="hidden" name="barra_cod" value="<?php echo  $codigo_abuscar ?>" id="barra_cod">
	<input type="submit" name="boton" value="Exporta a Excel" id="boton">
</form>
      <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>