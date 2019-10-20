<?php
 include("cabesera.php");


 ?>
<div id="trabajo" align="center">
<br>
        <h1>Registro De Bodega periferica</h1>
        <br />
		<form method="post" action="guarda_bodega.php" ENCTYPE="multipart/form-data">
        <TABLE > 
<TR> 
   <TH>Bodegas perifericas Actuales</TH> 
<TD><select name="cod" id="cod" class="input" >
<option>Bodegas Actuales</option>
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
</select></TD> 
   
</TR> 
<TR> 
   <TH>Nombre Nuevo Bodega</TH> 
<TD><input type="text" name="nombre" required="required" class="input"></TD> 
   
</TR> 




<TR> 
   <TH>Encagado Bodega</TH> 
<TD><select name="funcionario" id="funcionario"  required="required" class="input">
<option>Funcionarios</option>
<?php

$consulta2="SELECT * FROM usuario ORDER BY nombre";
$result2 = mysql_query($consulta2);
while ($row2 = mysql_fetch_row($result2))
{
?>
<option value="<?php echo $row2[0]?>" > <?php echo $row2[1]?> </option>
<?php 
}

?>
</select></TD> 
   
</TR><TR> 
   <TH>Estado Bodega</TH> 
<TD><select name="estado" id="estado"  required="required" class="input">

<option value="activa" > Activa </option>
<option value="inactiva" > Inactiva </option>
</select></TD> 
   
</TR>
<TR> 
   <TH></TH> 
<TD><input type="submit" name="boton" id="boton" value="Guardar"></TD> 
   
</TR>
</TABLE> 
</form>
</div>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>