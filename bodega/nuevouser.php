<?php

	 include("cabesera.php");
 

 ?>
 <script  language="javascript">
 $(document).ready(function()
{
// Validador de RUT
$('#rut').Rut({
  on_error: function(){ 
  alert('INGRESE UN RUN ');
  $("#rut").val('');
  $("#rut").focus();
  },  format_on: 'keyup' 
});
});
</script>
 <div id="trabajo" align="center">
        <h1>Registro De Usuarios</h1>
        <br />
		<form method="post" action="guardarusuario.php" ENCTYPE="multipart/form-data">
        <TABLE > 
<TR> 
   <TH>Rut Usuario</TH> 
<TD><input type="text" name="rut" id="rut" onBlur="validar1(this.form)" class="input" required="required" maxlength="12"></TD> 
   
</TR> 
<TR> 
   <TH>Nombre</TH> 
<TD><input type="text" name="nombre" class="input" required="required"></TD> 
   
</TR> 
<TR> 
   <TH>Password</TH> 
<TD><input type="password" name="clave" class="input" required="required"></TD> 
   
</TR> 
<TR> 
   <TH>Perfil</TH> 
<TD><select name="perfil" id="perfil" class="input" required="required">

<option value="Admingeneral" > Administrador</option>
<option value="usuario" > Usuario</option>
<option value="usuarioBodega" > Usuario Bodega</option>
<!--<option value="periferica" > admin periferica</option> -->
<option value="inactivo" > Inactivo</option>

</select></TD> 
   
</TR> 
 
<TR> 
   <TH>Seccion</TH> 
<TD><select name="categoria" id="categoria"  class="input" required="required">
<option value="" >Seleccione una Categoria</option>
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
</select></TD> 
   
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
 