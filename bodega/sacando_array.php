<?php

include("conexion.php");

?>

<form method="post" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" ENCTYPE="multipart/form-data">
  <h1>Registro de Salida de Productos</h1> 
  <br>
        <TABLE > 
<TR> 
   <TH>Codigo De barra</TH> 
   <TH>Cantidad</TH> 
 
   
</TR> 
<TR> 
   <TD><input type="text" name="codigo" class="input" id="codigo" required><div id="resultado"></div></TD>
<TD><input type="number" min="1" class="input" name="cantidad" value="1" onkeyup='validar2(this);' required></TD> 
   
</TR> 
<TR> 
   <TH></TH> 
<TD><input type="submit" id="boton"  name="boton" value="Agregar"></TD> 
   
</TR>

</TABLE> 
</form>
<?php

if(isset($_POST['boton']))
 
{
$array= array();

array_push($_POST['codigo']);
}
print_r($array);

?>