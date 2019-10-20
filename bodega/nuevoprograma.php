<?php

	
 include("cabesera.php");

 $usuarios=$_POST["nombre"];
 $q=mysql_query("update temporal set usuario='$usuarios' ");
 ?>
 <div id="trabajo" align="center">
  <h1>Programas Actuales</h1> 
  <br />
<form method="post" action="agregarprograma.php" ENCTYPE="multipart/form-data">
<?php

?>
 <select name="linea" id="linea" class="input" >

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
<br />
<h1>Agregar Programa</h1> 
<br />
 <TABLE > 
<TR> 
   <TH>Codigo</TH> 
   <TH>Region</TH> 
 <TH>Departamento</TH> 
   <TH>Tematica</TH> 
   
</TR> 
<TR> 
   <TD><input type="text" name="codigo" class="input"required="required"></TD>
<TD><input type="text" name="region"value="ARAUCANIA" class="input"required="required"></TD> 

<TD><select name="cod" id="cod"  class="input" required="required">
<option value="" >Seleccione un Departamento</option>
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

<TD><input type="text" name="tematica"  class="input" required="required"></TD> 
   
</TR> 
<TR> 
   <Td></Td> 
     <Td></Td> 
	   <Td></Td> 
<TD><input type="submit" name="boton" value="Agregar" id="boton"></TD> 
   
</TR>


</TABLE> 
<!--<input type="submit" name="boton" value="Siguiente">-->
</form>
    <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html