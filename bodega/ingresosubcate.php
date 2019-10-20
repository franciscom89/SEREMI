<?php

	
 include("cabesera.php");


 ?>
 <div id="trabajo" align="center">
        <h1>Registro De Subcategorias</h1>
        <br />
		<form method="post" action="guardasubcate.php" ENCTYPE="multipart/form-data">
        <TABLE > 
<TR> 
   <TH>SubCategoria Actuales</TH> 
<TD><select name="categoriaa" id="categoria"  class="input">
<option>Seleccione una Categoria</option>
<?php

$consulta="SELECT * FROM subcategoria ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select></TD> 
   
</TR> 
<TR> 
   <TH>Nombre Nueva SubCategoria</TH> 
<TD><input type="text" name="categoria" class="input" required="required"></TD> 
   
</TR> 
<TR> 
   <TH></TH> 
<TD><input type="submit" name="boton" value="Guardar" id="boton"></TD> 
   
</TR>



</TABLE> 
</form>
      <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html