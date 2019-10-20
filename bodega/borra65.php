<?php

 include("cabesera.php");


 ?>
 <div id="trabajo" align="center">
	  <?php
if (count($_POST['delete']))
{

//Establece una conexión con la BD y lanza un mensaje de error en el caso de que ésta no se haya realizado con éxito.

foreach ($_POST['delete'] as $v)

{



$sql=mysql_query("Update programa set activo='2' where id = '$v'");

}

}else{ }
if (count($_POST['volver']))
{

//Establece una conexión con la BD y lanza un mensaje de error en el caso de que ésta no se haya realizado con éxito.

foreach ($_POST['volver'] as $v)

{



$sql=mysql_query("Update programa set activo='1' where id = '$v'");

}

}else{ }
?> 
  <h1>Actualizacion de estado Se realizo de forma Correcta</h1>
   <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html
 
