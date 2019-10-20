<?php

include("conexion.php");
$nbrow=0;
$cont = 0; //Para el checkbox
print "<form action ='borra4.php' method='post'>";
$sql=mysql_query("select * from temporal"); 
echo "<div align=\"center\">Seleccionar Producto Para Quitar de la Lista</div><p><br><p>\n";
echo "<table CELLSPACING=1 CELLPADDING=1 width='80%' border='1' align='center'> \n";
echo "<tr><td>Seleccionar</td><td>Codigo</td><td>Descripcion</td><td>Cantidad</td></tr> \n";

while($row=mysql_fetch_array($sql))
{
$nbrow++;
$cont++;
$folio=$row["id"];
  $codigo=$row["codigoproducto"];
  $w=mysql_query("Select * from productos where codigoproducto='$codigo' ");
 while($rowe=mysql_fetch_array($w))
{
$descripcion=$rowe["descripcion"];
}
$cantidad=$row["cantidad"];


print "<tr bgcolor='#FBF3E4'> ";
print "<td><div align=\"center\"><font color=\"#000000\"><font face=\"Verdana\"><input type=\"checkbox\" name=\"delete[]\" value=\"".$folio."\"></font></font></div></td>";

print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$codigo</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$descripcion</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$cantidad</font></font></div></td>";

print "</tr>";


}
echo "</table> \n <p><br><p>";
print "<div align=\"center\"><input type='submit' name='borrar' value='Borrar'></div>";

print "</form> \n";

//imprime número de registros
print "<b><font size=\"1\"><font face=\"Verdana\">Registros $nbrow </font></b>";

?>
