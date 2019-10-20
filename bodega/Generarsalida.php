<?php

	
 include("cabesera.php");

 
 ?>
 <div id="trabajo" align="center">
  <h1>Seleccionar Seccion</h1>
  <br /> 
<form method="post" action="selecionarnombre.php" ENCTYPE="multipart/form-data">
<select name="seccion" id="seccion"  class="input"  >
<option>Seleccione una Seccion</option>
<?php

$consulta="SELECT * FROM seccion ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select>
<input type="submit"  id="boton" name="boton" value="Siguiente">
 </form>

<br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>