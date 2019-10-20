<?php

	
 include("cabesera.php");
 
 ?>
<script  type="text/javascript">
$(window).load(function() {

	$("#seccion").jCombo({url: "getStates.php" });
	$("#funcionario").jCombo({
		url: "getCities.php", 
		input_param: "id", 
		parent: "#seccion", 
		onChange: function(newvalue) {
			$("#message").text("parent has changed to value " + newvalue)
			.fadeIn("fast",function() {
				$(this).fadeOut(3500);
			});
		}
	});
	});
	
$(document).ready(function(){

		//agrego los id por fila de la tabla que necesito ocultar
	   $("#fila1,#fila11,#fila22").css("display","none");

		// Add onclick handler to checkbox w/id checkme
	   $("#mostrarempleador").click(function(){

		// If checked
		if ($("#mostrarempleador").is(":checked"))
		{
			//show the hidden div
			$("#fila1,#fila11,#fila22").show("slow");
			$("#rut_empleador").prop('disabled', false);
			$("#rut_empleador").prop('required', true);
			$("#nombre_empleador").prop('disabled', false);
			$("#nombre_empleador").prop('required', true);
			$("#direccion_empleador").prop('disabled', false);
			$("#direccion_empleador").prop('required', true);
			$("#comuna_empleador").prop('disabled', false);
			$("#comuna_empleador").prop('required', true);
			$("#email_empleador").prop('disabled', false);
			//$("#email_empleador").prop('required', true);
		}
		else
		{
			//otherwise, hide it
			$("#fila1,#fila11,#fila22").hide("slow");
			$("#rut_empleador").prop('disabled', true);
			$("#rut_empleador").prop('required', false);
			$("#rut_empleador").val('');
			$("#nombre_empleador").prop('disabled', true);
			$("#nombre_empleador").prop('required', false);
			$("#nombre_empleador").val('');
			$("#direccion_empleador").prop('disabled', true);
			$("#direccion_empleador").prop('required', false);
			$("#direccion_empleador").val('');
			$("#comuna_empleador").prop('disabled', true);
			$("#comuna_empleador").prop('required', false);
			$("#comuna_empleador").val('');
			$("#email_empleador").prop('disabled', true);
			$("#email_empleador").prop('required', false);
			$("#email_empleador").val('');
		}
	  });

	});
	$(document).ready(function(){

		//agrego los id por fila de la tabla que necesito ocultar
	   $("#fila8").css("display","none");

		// Add onclick handler to checkbox w/id checkme
	   $("#mostrarmedico").click(function(){

		// If checked
		if ($("#mostrarmedico").is(":checked"))
		{
			//show the hidden div
			$("#fila8").show("slow");
			$("#bodegas").prop('disabled', false);
			$("#bodegas").prop('required', true);			
			
			//$("#email_profesional").prop('required', true);
		}
		else
		{
			//otherwise, hide it
			$(" #fila8").hide("slow");
			$("#bodegas").prop('disabled', true);
			$("#bodegas").prop('required', false);
			$("#bodegas").val('');
			
		}
	  });

	});
</script>	
<div id="trabajo" align="center">
<br />
<h1> Productos salientes </h1>
<br />

<table width="420" >
  <tr>
    <td>Codigo</td>
    <td>Cantidad</td>
    <td>Stock</td>
    <td>Descripcion</td>
  </tr>
  

<?php


$cont=0;
$totalproveedor=0;
$totalsalidaproducto=0;
$codigo=$_POST['codigo'];
$codigo[]=$_POST['codigo'];
$cantidad[]=$_POST['cantidad'];
$total=count($codigo)-1;
while($cont<$total){

	$selectproveedor = mysql_query("SELECT * FROM proveedor WHERE codigo='$codigo[$cont]' ");

	while($row = mysql_fetch_array($selectproveedor))
    {
      $totalproveedor = $totalproveedor + $row['cantidad']; 
  	}

	$selectsalidaproducto=mysql_query("SELECT * FROM salidaproductos WHERE codigoproducto='$codigo[$cont]' ");
	while($row = mysql_fetch_array($selectsalidaproducto))
    {
      $totalsalidaproducto = $totalsalidaproducto + $row['cantidad']; 
    }

 
    $valor1=$totalproveedor;
    $valor2=$totalsalidaproducto;
    $stock=$valor1-$valor2;
    
    
    $total = 0; // total declarado antes del bucle

$select=mysql_query("SELECT descripcion FROM productos WHERE codigoproducto='$codigo[$cont]'");

	
while($row=mysql_fetch_array($select))
{
$descripcion=$row["descripcion"];
}
    
?>
<form action="sacar_productos.php" method="post" ENCTYPE="multipart/form-data">

<tr>
<td><input type="text" class="input"   name="codigo[]" value="<?php echo $codigo[$cont] ?>" readonly="readonly"></td>
<td><input type="text" class="input"   name="cantidad[]" value="<?php echo $cantidad[$cont] ?>" readonly="readonly"></td>
<td><input type="text" class="input"   name="stock[]" value="<?php echo $stock ?>" readonly="readonly"></td>
<td><input type="text" class="input"   name="descripcion[]" value="<?php echo $descripcion ?>" size="50" readonly="readonly"></td>

<br>
<?php	

	$cont++;
}
?>  </tr>
</table>
<br>

<br>




<table width="468" >
  <tr>
    <td colspan="2" align="center"><h2> Datos anexos</h2></td>
    </tr >
  
  <tr>
    <td></td>
    <td> </td>
    <td> </td>
  </tr>
  <tr>
    <td align="right">Salida:</td>
    <td align="left"> <input name="mostrarempleador"  type="checkbox" id="mostrarempleador"></td>
    <td>&nbsp;</td>
  </tr>
  <tr id="fila11">
    <td width="233">Seccion</td>
    
    <td></td>
    <td width="223"><select name="seccion" class="input" id="seccion"></select></td>
  </tr>
  <tr id="fila22">
    <td>Funcionario</td>
    <td> </td>
    <td><select name="funcionario" class="input" id="funcionario"></select></td>
  </tr>
  <tr id="fila1">
    <td>Programa</td>
    <td> </td>
    <td><select name="linea" id="linea"  class="input"   >
<option  value="">Seleccione un Programa</option>
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
</select></td>
  </tr>
 
  <tr>
    <td align="right">Transferencia:</td>
    <td align="left"><input type="checkbox" name="checkbox" id="mostrarmedico"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr id="fila8">
    <td>Bodega</td>
    <td> </td>
    <td><select name="bodegas" id="bodegas"  class="input"   >
<option  value="">Seleccione un Programa</option>
<?php

$consulta="SELECT * FROM bodega_periferica  where estado='activa' ORDER BY id";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select></td>
  </tr>
  <tr>
    <td align="right">Merma:</td>
    <td align="left"><input type="checkbox" name="merma" id="merma"> </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> </td>
    <td><input type="submit" id="boton"  name="boton" value="Concretar salida"></td>
  </tr>
</table>

</form>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>