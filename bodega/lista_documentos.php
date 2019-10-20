<?php
 include("cabesera.php");
 ?>
  <div id="trabajo" align="center">
  <h1>Lista de documentoss</h1>
 <table width="200" border="1">
  <tr>
    <td>Codigo</td>
    <td>Archivo</td>
  </tr>
 
 <?php
 $consulta="SELECT * FROM  archivo order by id desc";
$result = mysql_query($consulta);
while ($row2 = mysql_fetch_row($result))
{
$id=$row2[0];
$nombre_archivo=$row2[1];
?>
<tr>
    <td><?php echo $id;?></td>
    <td><?php echo $nombre_archivo;?></td>
  </tr>

<?php
}

?>


</table>
