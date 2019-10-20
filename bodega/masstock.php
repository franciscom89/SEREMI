<?php

 include("cabesera.php");

 $hoy=date("Y-m-d H:i:s");
 $ip=$_SERVER['REMOTE_ADDR'];
$codigo=$_POST["codigo"];
$stock=$_POST["stock"];
$nuevo=$_POST["nuevo"];
$proveedor=$_POST['proveedor'];
$factura=$_POST['n_factura'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$suma=$stock +$nuevo;
$usuario=$_SESSION['nombre_sessionc'];
$q=mysql_query("update productos set stock='$suma' where codigoproducto='$codigo'");
$insertar=mysql_query("INSERT INTO  `proveedor` (`proveedor` ,`factura` ,`cantidad` ,`precio` ,`descripcion` ,`fecha` ,`usuario` ,`ip` ,`en_stock`,`codigo`)VALUES ('".$proveedor."',  '".$factura."',  '".$nuevo."',  '".$precio."',  '".$descripcion."',  '".$hoy."',  '".$usuario."',  '".$ip."',  '".$nuevo."','".$codigo."')");


?>
 <div id="trabajo" align="center">
  <h1>Actualizacion de stock Se realizo de forma correcta</h1> 
      <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html