<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Informe.xls");
header("Pragma: no-cache");
header("Expires: 0");
include("conexion.php");
?>  

<body>

<div class="wrapper">
		<div id="main">
			
<h1> Informe de Recursos</h1>

<br>
<?php

$fini=$_POST["fecha_ini"];
$fterm=$_POST["fecha_term"];


$result = mysql_query("SELECT * FROM pc_nb where fecha_creacion BETWEEN '$fini' and '$fterm'");
?>
<TABLE BORDER="1">
 <TR> 
 <TH>Id</TH>
 <TH>Proveedor</TH>
  <TH>Factura</TH>  
 <TH>Codigo interno</TH>
  <TH>Marca</TH> 
   <TH>Descripcion</TH> 
   <Th>Modelo</Th>
    
     <TH>Nro MInsal</TH>
     <TH>Direccion</TH>
     <TH>oficina</TH>
     
     <TH>Codigo Externo</TH>
     
<TH>item Contable</TH>
     
     <TH>ip equipo</TH>
      <TH>GW</TH>
      <TH>dns</TH>
      <TH>dns 2</TH>
     <TH>mascara</TH>
     <TH>mac</TH>
    <TH>SO</TH>
     <TH>criticidad</TH>
     <TH>respaldo</TH>
     <TH>ip_creacion</TH>
     
     
     <TH>User Creacion</TH>
   
     <TH>Fecha Creacion</TH>
       <TH>Ip_actualizacion</TH>
    <TH>User Actualizacion</TH>
  
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
<Td><?php echo $row[27];?></Td>
<Td><?php echo $row[29];?></Td>
<Td><?php echo $row['estado'];?></Td>


  
</tr>

	

<?php 
}

?>
</table>
</body>