<?php

	 include("cabesera.php");


 ?>
  <script  language="javascript">
 $(document).ready(function()
{
// Validador de RUT
$('#rut').Rut({
  on_error: function(){ 
  alert('INGRESE UN RUN CORRECTO ');
  $("#rut").val('');
  $("#rut").focus();
  },  format_on: 'keyup' 
});
});
</script>
 <div id="trabajo" align="center">
        <h1>Registro De Usuarios</h1>
        <br />
		<form method="post" action="edituser.php" ENCTYPE="multipart/form-data">
        <TABLE > 
<TR> 
   <TH>Rut Usuario</TH> 
<TD><input type="text" name="rut" id="rut" class="input" required="required"></TD> 
   
</TR> 


<TR> 
   <TH></TH> 
<TD><input type="submit" name="boton" value="Buscar" id="boton"></TD> 
   
</TR>

</TABLE> 
</form>
       <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>