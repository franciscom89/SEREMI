<?php

 include("cabesera.php");

 
 ?>
  <div id="trabajo" align="center">
  <h1>Seleccionar Nombre Funcionario</h1>
  <br />  
<form method="post" action="cargartematica.php" ENCTYPE="multipart/form-data">
<?php
$seccion=$_POST["seccion"];
?>
 <select name="nombre" id="nombre"  class="input"  >
<option>Seleccione un Nombre</option>
<?php

$consulta="SELECT * FROM usuario where codigoseccion='$seccion' ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[1]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select>
<input type="submit"  id="boton"  name="boton" value="Siguiente">
</form>
<br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>