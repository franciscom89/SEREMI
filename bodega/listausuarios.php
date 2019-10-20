<?php


	
	include("cabesera.php");

$nbrow=0;
$cont = 0; //Para el checkbox
print "<form action ='editarporlista.php' method='post'>";
?>
   <div id="trabajo" align="center">
<?php
$sql=mysql_query("Select * from usuario "); 
echo "<div align=\"center\">Seleccione Usuario para su edicion</div><p><br><p>\n";
echo "<table CELLSPACING=1 CELLPADDING=1 width='100%' border='1' align='center'> \n";
echo "<tr><th>Seleccionar</th><th>Rut</th><th>Nombre</th><th>Seccion</th></tr> \n";

while($row=mysql_fetch_array($sql))
{
$nbrow++;
$cont++;

$rut=$row["rut"];
$nombres=$row["nombre"];
$seccion=$row["codigoseccion"];
  $w=mysql_query("Select * from seccion where id='$seccion' ");
 while($rowe=mysql_fetch_array($w))
{
$nameseccion=$rowe["nombre"];
}



print "<tr bgcolor='#FBF3E4'> ";
print "<td><div align=\"center\"><font color=\"#000000\"><font face=\"Verdana\"><input type=\"radio\" name=\"rut\" value=\"".$nombres."\"></font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$rut</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$nombres</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"1\"><font face=\"Verdana\">$nameseccion</font></font></div></td>";


print "</tr>";


}
echo "</table> \n <p><br><p>";
print "<div align=\"center\"><input type='submit' name='Editar' value='Editar'></div>";

print "</form> \n";

//imprime número de registros
print "<b><font size=\"1\"><font face=\"Verdana\">Registros $nbrow </font></b>";
?>
 <br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html
