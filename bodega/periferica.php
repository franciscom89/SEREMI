<?php

	
 include("cabesera.php");

 
 ?>
<div id="trabajo" align="center">
  <h1>Seleccionar Bodega Periferica Para Transferir Productos</h1> 
  <br />
<form method="post" action="agregar_stock_periferica.php" ENCTYPE="multipart/form-data">
<select name="bodega" id="bodega"  class="input" required="required">
<option value="" >Seleccione una Bodega</option>
<?php

$consulta="SELECT * FROM bodega_periferica ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select>
<input type="submit" name="boton" value="Siguiente" id="boton">
 </form>

	 <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html