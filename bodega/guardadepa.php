<?php

	
 include("cabesera.php");
 
$nombre=$_POST["nombre"];
$depa=$_POST["cod"];
$insert=mysql_query("INSERT INTO  departamento (Nombre)VALUES ('$nombre')");
?>
 <div id="trabajo" align="center">
 
  <h1>Registro de Departamento Se realizo de forma Correcta</h1>
   <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>