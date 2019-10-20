<?php

	
 include("cabesera.php");


 ?>
 <div id="trabajo" align="center">
        <h1>Informe Celulares y Tablet</h1>
        <br />
		<form action="fecha_informe.php" name="form" enctype="multipart/form-data" method="post">
 <table width="590" border="0">
 <tr>
       <td><div align="left">Fecha inicio</div></td>
     <td> <span class="Estilo2">
       <input name="fecha_ini" type="date" id="dateArrival" class="input">
     </span></td>
     <td><div align="left"><span class="Estilo2">Ej. 2013-04-05 </span></div></td>
     </tr>
     <tr>
       <td><div align="left">Fecha termino</div></td>
       <td> <span class="Estilo2">
       <input name="fecha_term" type="date" id="dateArrival" class="input">
     </span></td>
     <td><div align="left"><span class="Estilo2">Ej. 2013-05-05</span></div></td>
     </tr>
     
     <tr>
       <td ></td>
       <td>&nbsp;</td>
     <td class="submit"><input class="button" name="submit" type="submit" value="Generar Informe" id="boton" /></td>
     </tr>
  </table>
</form>
<?php
    if(isset($_POST['submit']))
{
	
$fini=$_POST["fecha_ini"];
$fterm=$_POST["fecha_term"];


$result = mysql_query("SELECT * FROM cel_teb where fecha_creacion BETWEEN '$fini' and '$fterm'");
?>
<form action="informe_cel_tab.php" method="post">
<input name="fecha_ini" type="hidden" id="dateArrival" class="input" value="<?php echo $fini?>">
 <input name="fecha_term" type="hidden" id="dateArrival" class="input" value="<?php echo $fterm?>">
 <input class="button" name="submit" type="submit" value="Exprotar a Excel" id="boton" />
</form>
<div style="height:500px;width:1200px;overflow:scroll;">
<TABLE BORDER="1" >
 <TR> 
 <TH>Id</TH> 
  <TH>Marca</TH> 
   <TH>Descripcion</TH> 
   <Th>Modelo</Th>
    <TH>Cod.Productos</TH> 
     <TH>Nro MInsal</TH>
     <TH>oficina</TH>
     <TH>Direccion</TH>
     <TH>item Contable</TH>
     <TH>Imei</TH>
     <TH>Sincard</TH>
     <TH>Nro Celular</TH>
     <TH>Pin</TH>
     <TH>Puk</TH>
     <TH>Codigo Externo</TH>
     <TH>Plan Asociado</TH>
     <TH>Sistema Operativo</TH>
     <TH>Criticidad</TH>
     <TH>Accesorios</TH>
     <TH>User Creacion</TH>
     <TH>Ip Creacion</TH> 
     <TH>Fecha Creacion</TH>
    <TH>User Actualizacion</TH>
    <TH>Ip_actualizacion</TH>
    <TH>Fecha actualizacion</TH>
    <TH>Responsable</TH>
  <Th>Archivo</Th> 
 <Th>Estado</Th>
     
 </TR>
<?php
while($row=mysql_fetch_array($result))
{




?>

<TR> 
<Td><?php echo $row[0];?></Td>
<Td><?php echo $row[1];?></Td>
<Td><?php echo $row[2];?></Td>
<Td><?php echo $row[3];?></Td>
<Td><?php echo $row[4];?></Td>
<Td><?php echo $row[5];?></Td>
<Td><?php echo $row[6];?></Td>
<Td><?php echo $row[7];?></Td>
<Td><?php echo $row[8];?></Td>
<Td><?php echo $row[9];?></Td>
<Td><?php echo $row[10];?></Td>
<Td><?php echo $row[11];?></Td>
<Td><?php echo $row[12];?></Td>
<Td><?php echo $row[13];?></Td>
<Td><?php echo $row[14];?></Td>
<Td><?php echo $row[15];?></Td>
<Td><?php echo $row[16];?></Td>
<Td><?php echo $row[17];?></Td>
<Td><?php echo $row[18];?></Td>
<Td><?php echo $row[19];?></Td>
<Td><?php echo $row[20];?></Td>
<Td><?php echo $row[21];?></Td>
<Td><?php echo $row[22];?></Td>
<Td><?php echo $row[23];?></Td>
<Td><?php echo $row[24];?></Td>
<Td><?php echo $row[25];?></Td>
<Td><?php echo $row[26];?></Td>
<Td><?php echo $row['estado'];?></Td>

  
</tr>

	

<?php 
}

?>
</table>
</div>
<?php
}
?>
  <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Recursos Fisicos y TI<a href="http://apycom.com/"></a></div>

</body>
</html