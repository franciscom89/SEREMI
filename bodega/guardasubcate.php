<?php

 include("cabesera.php");

$categoria=$_POST["categoria"];

$insert=mysql_query("INSERT INTO  subcategoria(nombre)VALUES ('$categoria')");
?>
 <div id="trabajo" align="center">
  <h1>Registro de Subcategoria Se realizo de forma Correcta</h1>
      <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html

