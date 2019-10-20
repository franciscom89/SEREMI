<?php



 include("cabesera.php");

 ?>
 
 <div id="trabajo" align="center">
 <?php
$nbrow=0;
$cont = 0; //Para el checkbox
print "<form action ='borra65.php' method='post'>";
$sql=mysql_query("select * from programa"); 
echo "<div align=\"center\"><h1>Selecciones programa para modificar su vigencia</h1></div><p><br><p>\n";
echo "<table CELLSPACING=1 CELLPADDING=1 width='80%' border='1' align='center'> \n";
echo "<tr><th>Activar</th><th>Desactivar</th><th>Descripcion</th><th>Activo</th></tr> \n";

while($row=mysql_fetch_array($sql))
{
$nbrow++;
$cont++;
$folio=$row["id"];
  $codigo=$row["descripcion"];
  $activo=$row["activo"];
  if($activo=='1'){
  $activo="Si";
  }else{
   $activo="No";
  }


print "<tr bgcolor='#FBF3E4'> ";

print "<td><div align=\"center\"><font color=\"#000000\"><font face=\"Verdana\"><input type=\"checkbox\" name=\"volver[]\" value=\"".$folio."\"></font></font></div></td>";
print "<td><div align=\"center\"><font color=\"#000000\"><font face=\"Verdana\"><input type=\"checkbox\" name=\"delete[]\" value=\"".$folio."\"></font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$codigo</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\"> $activo</font></font></div></td>";


print "</tr>";


}
echo "</table> \n <p><br><p>";
print "<div align=\"center\"><input type='submit' name='borrar' value='Actualizar'></div>";

print "</form> \n";

//imprime número de registros
print "<b><font size=\"1\"><font face=\"Verdana\">Registros $nbrow </font></b>";
 ?>
   <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html