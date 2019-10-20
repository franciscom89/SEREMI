<?php


 include("cabesera.php");
 
$s=mysql_query("Select * from temporal where bodegero='$usuario'");
 while($row=mysql_fetch_array($s))
{
	
$fecha=date("Y-m-d");
$codigoproducto=$row["codigoproducto"];
$cantidad=$row["cantidad"];
$tematica=$row["tematica"];
$usuarios=$row["usuario"];
$dirigida=$row["dirigida"];
$bodega=$row["bodega"];
$insert=mysql_query("insert into salidaproductos (cantidad,fecha,codusuario,codtematica,codigoproducto)values('$cantidad','$fecha','$usuarios','$tematica','$codigoproducto')");


$select=mysql_query("Select * from productos where codigoproducto='$codigoproducto'");



while($roww=mysql_fetch_array($select))
{
$stock=$roww["stock"];
$descripcion=$roww["descripcion"];
$categoria=$roww["categoria"];
$subcategoria=$roww["subcategoria"];
}
$stock;

$final=$stock-$cantidad;

/*if($dirigida=='bodega'){
	
$bodega_periferica=mysql_query("INSERT INTO  `bodega_periferica_stock` (`codigo_producto` ,`stock` ,`fecha` ,`tematica` ,`bodega`,`categoria` ,`subcategoria` ,`descripcion` )VALUES ('$codigoproducto', '$cantidad',  '$fecha', '$tematica',  '$bodega','$categoria','$subcategoria','$descripcion')") or mysql_error();

}*/

 
 
 $update=mysql_query("update productos set stock='$final' where codigoproducto='$codigoproducto' ");
	}
do{
	
$valor=mysql_query("SELECT * FROM `proveedor` WHERE `codigo`='$codigoproducto' and en_stock > 0 limit 1");
 $nConfig = mysql_num_rows ($valor);
 $verConfig = mysql_fetch_array($valor); 
 if ($nConfig > 0){
	  for ($i=0; $i<$nConfig; $i++)  
            {  
                 
                $quedan = $verConfig["en_stock"];  
               $id=$verConfig["id"]; 
			  if($cantidad==0){
				  $i=$nConfig;
				  
			  }
				   elseif ($cantidad>$quedan){
					   
					   $update=mysql_query("update proveedor set en_stock='0' where id='$id'");
					   $cantidad=($cantidad - $quedan);
				
					      
				   }elseif ($cantidad<$quedan){
					   
					    $cantidad1=($quedan-$cantidad);
						$cantidad=0;
					   $update=mysql_query("update proveedor set en_stock='$cantidad1' where id='$id'");
				
				   }elseif ($cantidad==$quedan){
					   
					    $cantidad=($quedan-$cantidad);
					   $update=mysql_query("update proveedor set en_stock='0' where id='$id'");
				
				   }
			
			   
			   } 

			
 }
			
			
}while($cantidad>0);


$mys=mysql_query("delete from temporal where bodegero='".$usuario."'");

?>
 <div id="trabajo" align="center">
  <h1>Se registro Correctamente la salida de Productos</h1> 
  <br>
  <a href="Salidaproductos.php" >Nueva Salida de Productos</a>
<br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>