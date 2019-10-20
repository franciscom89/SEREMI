<?php

 include("cabesera.php");


 ?>
 <script language="javascript">
 
 $(document).ready(function(){

		//agrego los id por fila de la tabla que necesito ocultar
	  

		// Add onclick handler to checkbox w/id checkme
	   $("#genera_codigo").click(function(){

		// If checked
		if ($("#genera_codigo").is(":checked"))
		{
				
			//show the hidden div
		$("#codigo").prop('readonly', true);
			$("#codigo").prop('required', false);
		
			
				
		}
		else
		{
			
			//otherwise, hide it
		$("#codigo").prop('readonly', false);
			$("#codigo").prop('required', true);
			
			
		}
	  });

	});
 </script>
 <script>
$(document).ready(function()
{
//Para escribir solo letras o numeros junto a al validCampoFred.js
$(function(){
                //Para escribir solo letras
        
				$('#precio').validCampoFranz('1234567890');
				$('#stock').validCampoFranz('1234567890');
				$('#stockcritico').validCampoFranz('1234567890');

                //Para escribir solo numeros    
                $('#miCampo2').validCampoFranz('0123456789');    
            });
});
</script>
 <div id="trabajo" align="center">
        <h1>Registro De Productos</h1>
        <br />
		<form method="post" action="guardarproducto.php" ENCTYPE="multipart/form-data" name="form1"  id="form1">
        <TABLE > 

<TR> 
   <TH width="123">Descripcion</TH> 
<TD width="233"><input type="text" name="descripcion" class="input" required="required"></TD> 
   
</TR> 
<TR> 
   <TH>Stock</TH> 
<TD><input type="number" name="stock" id="stock" onkeyup='validar2(this);' class="input" required="required" min="0" max="9999999999999"></TD> 
   
</TR> 
<TR> 
   <TH>Stock Critico</TH> 
<TD><input type="number" name="stockcritico" id="stockcritico" onkeyup='validar2(this);' class="input" required="required" min="0" max="9999999999999"></TD> 
   
</TR>

<TR> 
   <TH>Categoria</TH> 
<TD><select name="categoria" id="categoria" class="input" >
 <option value="" >Seleccione una Categoria</option>
<?php

$consulta="SELECT * FROM categoria ORDER BY nombre";
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
<tr>
  <th>SubCategoria</th>
  <td><select name="subcategoria" id="subcategoria"  class="input" required="required">
    <option value="" >Seleccione una Subcategoria</option>
    <?php

$consulta="SELECT * FROM subcategoria ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
    <option value="<?php echo $row[0]?>" > <?php echo $row[1]?></option>
    <?php 
}

?>
  </select></td>
</tr> 
<TR>
  <TH>Proveedor (RUT)</TH>
  <TD><input type="text" name="proveedor" id="proveedor"required="required" class="input" /></TD>
</TR>
<TR>
  <TH>N Factura</TH>
  <TD><input type="number" name="n_factura" id="n_factura" required="required" class="input" min="0" max="9999999999999"/></TD>
</TR>
<TR>
  <TH>Precio unitario $</TH>
  <TD><input type="number" name="precio" id="precio" required="required" class="input" min="0" max="9999999999999"/></TD>
</TR> 
<TR>
  <TH>Generar codigo</TH>
  <TD> <input name="genera_codigo"  type="checkbox" id="genera_codigo" > Generar</TD>
</TR> 

<TR id="filacodigo"> 
  <TH >Codigo De barra</TH> 
  <TD><input type="number" name="codigo" id="codigo" class="input" min="0" max="9999999999999"></TD> 
  
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