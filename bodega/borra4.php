<?php

	
include("conexion.php");
if (count($_POST['delete']))
{

//Establece una conexión con la BD y lanza un mensaje de error en el caso de que ésta no se haya realizado con éxito.

foreach ($_POST['delete'] as $v)

{

echo 'Se ha quitado correctamente el producto de la lista';

$sql=mysql_query("DELETE FROM temporal WHERE id='$v'");

}

}else{ echo ('No has seleccionado ningún registro...');}


 
?> <br><a href="javascript:window.close();">Cerrar ventana</a>