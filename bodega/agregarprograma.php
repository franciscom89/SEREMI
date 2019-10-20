<?php

 include("cabesera.php");
print_r($_POST);
$codigo=$_POST["codigo"];
$region=$_POST["region"];
$depa=$_POST["cod"];
$programa=$_POST["tematica"];

$result = mysql_query("SELECT * FROM departamento where id='$depa'");
while ($row = mysql_fetch_row($result))
{
$nombredepa=$row[1];

}
$agregar=$codigo." / ".$region." / ".$nombredepa." / ".$programa;

$insert=mysql_query("INSERT INTO  programa (descripcion,activo,id_departamento)VALUES ('$agregar','1','$depa')");
?>
 <div id="trabajo" align="center">
  <h1>Registro de Seccion Se realizo de forma Correcta</h1>
   <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html