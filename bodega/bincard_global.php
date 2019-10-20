<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=bincard_global.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("conexion.php");
?>  
<div id="trabajo" align="center">
  <h1>Tarjeta Bincard Global</h1> 
   <br />
 
   <TABLE border='2' cellpadding='0' cellspacing='2' width='1700' bgcolor='#F6F6F6' bordercolor='#666666'> 

   <TR> 
<TH>CODIGO</TH> 
    <TH>PRODUCTO</TH> 
   <TH>FECHA</TH> 
   <TH>Nº ING.</TH> 
  
   <TH>PROVEEDOR</TH>
    <TH>Nº EGR.</TH> 
   <TH>PROGRAMA</TH> 
   <TH>ENTRADA</TH> 
 <TH>SALIDA</TH> 
    <TH>SALDO</TH> 
   
</TR> 
<?php
 $select_name=mysql_query("SELECT  codigoproducto,descripcion FROM productos group by codigoproducto");
while ($row_name = mysql_fetch_row($select_name))
{
$cod=$row_name[0];
$descp=$row_name[1];
 $mi_estocl =0;
  $select=mysql_query("(SELECT  null , cantidad,fecha,descripcion,factura,null,proveedor,null FROM proveedor where codigo=  '$cod' )
UNION
(SELECT cantidad,null ,fecha,null,null,id_archivo,null,codtematica FROM salidaproductos where codigoproducto =  '$cod' ) order by fecha asc");


?>


 <?php 
while ($row = mysql_fetch_row($select))
{
$entrada_p=$entrada_p+$row[1];
$salida_p=$salida_p+$row[0];
$tematica=$row[7];
$tema='';
$select_tematica=mysql_query("SELECT  descripcion FROM programa where id='$tematica'");
while ($row_tema = mysql_fetch_row($select_tematica))
{
$tema=$row_tema[0];
}
$fechacorte=$row[2];
$tal=explode("-",$fechacorte);
  ?>
 
<TR> 

<TH><?php echo  $cod; ?></TH> 
<TH><?php echo $descp; ?></TH> 
   <TH><?php echo $tal[2].'-'.$tal[1].'-'.$tal[0]; ?></TH> 
  <TH><?php echo $row[4]; ?></TH>
 
<TH><?php echo $row[6]; ?></TH> 
<TH><?php echo $row[5]; ?></TH> 
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
<TH bgcolor="#00FF00"></TH> 
   <TH bgcolor="#00FF00"></TH> 
  <TH bgcolor="#00FF00"> </TH>
 
<TH bgcolor="#00FF00"></TH> 
<TH bgcolor="#00FF00"></TH> 
<TH bgcolor="#00FF00"></TH>   
   <TH bgcolor="#00FF00"></TH> 
 <TH bgcolor="#00FF00"></TH> 
   
   
</TR> 
 
 <?php
  }
  ?>

  </TABLE >

