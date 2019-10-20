<?php

 include("cabesera.php");


 $nombre_bodega=$_POST['nombre'];
 $encargado=$_POST['funcionario'];
 $estado=$_POST['estado'];

$insertar=mysql_query("INSERT INTO  `bodega_periferica` (`id` ,`nombre` ,`encargado` ,`estado`,`rut`)VALUES (NULL ,  '$nombre_bodega',  '$encargado',  '$estado','$usuario');");
$id=mysql_insert_id();
$update_bodega_user=mysql_query("update usuario set bodaga_resp='$id' where rut='$encargado'");

?>
<script type="text/javascript">
window.location="nuevo_bodega.php";
</script>