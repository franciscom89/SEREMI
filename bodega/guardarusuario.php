<?php

	
 include("cabesera.php");


$rut=$_POST["rut"];
$nombre=$_POST["nombre"];
$perfil=$_POST["perfil"];
$codigoseccion=$_POST["categoria"];
$pass=$_POST["clave"];
$insert=mysql_query("INSERT INTO  usuario(rut,nombre,codigoseccion,pass,perfil)VALUES ('$rut','$nombre','$codigoseccion','$pass','$perfil')");
?>
 <div id="trabajo" align="center">
  <h1>Registro de Usuario Se realizo de forma Correcta</h1>
    <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>