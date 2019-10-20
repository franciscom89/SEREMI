<?php

	include("cabesera.php");

 $rut=$_POST["rut"];
 $nombre=$_POST["nombre"];
 $pass=$_POST["clave"];
 $perfil=$_POST["perfil"];
 $seccion=$_POST["categoria"];
 $u=mysql_query("UPDATE  usuario SET rut ='$rut',nombre='$nombre',pass='$pass',perfil='$perfil',codigoseccion='$seccion' WHERE nombre ='$nombre'");
 
 
 
 ?>
<div id="trabajo" align="center">
	  <h1> Datos Actualizados Correctamente</h1>
	 <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html