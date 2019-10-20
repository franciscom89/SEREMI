<?php

	
 include("cabesera.php");


 ?>
 <div id="trabajo" align="center">
        <h1>Registro De Seccion</h1>
        <br />
		<form method="post" action="guardadepa.php" ENCTYPE="multipart/form-data">
        <TABLE > 
<TR> 
   <TH>Departamentos Actuales</TH> 
<TD><select name="cod" id="cod" class="input">
<option>Seleccione un Departamento</option>
<?php

$consulta="SELECT * FROM departamento ORDER BY nombre";
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
   <TH>Nombre Nuevo Departamento</TH> 
<TD><input type="text" name="nombre"  class="input" required="required"></TD> 
   
</TR> 



<TR> 
   <TH></TH> 
<TD><input type="submit" name="boton" value="Guardar" id="boton"></TD> 
   
</TR>

</TABLE> 
</form>
     <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>