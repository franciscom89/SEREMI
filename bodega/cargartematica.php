<?php
	include("cabesera.php");
 
 $usuarios=$_POST["nombre"];
 $q=mysql_query("update temporal set usuario='$usuarios' where bodegero='$usuario' and bodega='0'");
 ?>
 <div id="trabajo" align="center">
  <h1>Seleccionar Tematica</h1> 
    <br />
<form method="post" action="agregalatematica.php" ENCTYPE="multipart/form-data">
<?php

?>
 <select name="linea" id="linea"  class="input"   >
<option>Seleccione un Programa</option>
<?php

$consulta="SELECT * FROM programa  where activo='1' ORDER BY descripcion";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select>
<input type="submit" id="boton" name="boton" value="Siguiente">
</form>
<br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>