<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=bincard.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("conexion.php");
?>  

<body>
<?php
$cod=$_POST['barra_cod'];
 $select_name=mysql_query("SELECT  descripcion FROM proveedor where codigo='$cod'");
while ($row_name = mysql_fetch_row($select_name))
{
$descp=$row_name[0];
}
  $select=mysql_query("(SELECT  null , cantidad,fecha,descripcion,factura,null,proveedor,null FROM proveedor where codigo=  '$cod' )
UNION
(SELECT cantidad,null ,fecha,null,null,id_archivo,null,codtematica FROM salidaproductos where codigoproducto =  '$cod' ) order by fecha asc");


?>
<div id="trabajo" align="center">
  <h1>Tarjeta Bincard para bodega</h1> 
   <h2>Articulo: <?php echo $descp; ?></h2> 
  <br />
  
   <TABLE border='1'> 
   <TR> 
   <TH>FECHA</TH> 
   <TH>Nro ING.</TH> 
   <TH>Nro EGR.</TH> 
   <TH>PROVEEDOR</TH>
   <TH>PROGRAMA</TH> 
   <TH>ENTRADA</TH> 
 <TH>SALIDA</TH> 
  
   
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
 
   
</TR> 
  </TABLE >
</body>