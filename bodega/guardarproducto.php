<?php
	
 include("cabesera.php");

 $fecha=date("Y-m-d");
 $hoy=date("Y-m-d H:i:s");
 $ip=$_SERVER['REMOTE_ADDR'];
@$codigoproducto=$_POST["codigo"];
$descripcion=$_POST["descripcion"];
$stock=$_POST["stock"];
$critico=$_POST["stockcritico"];
$categoria=$_POST["categoria"];
$subcategoria=$_POST["subcategoria"];

$proveedor=$_POST['proveedor'];
$factura=$_POST['n_factura'];
$precio=$_POST['precio'];
$genera=$_POST['genera_codigo'];
$usuario=$_SESSION['nombre_sessionc'];
if($genera!='' or $codigoproducto==''){
	
	
	$micodigo=date('ymdHis');
//___________________

function ean($cadena)
{
	$cadena = strrev($cadena);
	$i = 0;
	while($i < strlen($cadena))
	{
	 if($i%2 == 0) $impares += $cadena[$i];
	 else $pares += $cadena[$i];
	$i++;
}
$suma = $pares + ($impares*3); 
return 10 -($suma%10);
}

// Prueba

$resultado= ean($micodigo); // devuelve 9

if($resultado==10){
	 $resultado=0;}else{  $resultado;}
$codigoproducto =$micodigo.$resultado;

//___________________
}

$insert=mysql_query("INSERT INTO  productos(codigoproducto,descripcion,stock,fechaingreso,categoria,subcategoria,stockcritico)VALUES ('$codigoproducto',  '$descripcion',  '$stock','$fecha',  '$categoria',  '$subcategoria','$critico')");

$insertar=mysql_query("INSERT INTO  `proveedor` (`proveedor` ,`factura` ,`cantidad` ,`precio` ,`descripcion` ,`fecha` ,`usuario` ,`ip` ,`en_stock`,`codigo`)VALUES ('".$proveedor."',  '".$factura."',  '".$stock."',  '".$precio."',  '".$descripcion."',  '".$hoy."',  '".$usuario."',  '".$ip."',  '".$stock."','".$codigoproducto."')");


?>
 <div id="trabajo" align="center">
  <h1>Registro del Producto Se Realizo de forma Correcta</h1>
      <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html