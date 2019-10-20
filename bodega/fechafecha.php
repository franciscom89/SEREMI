<?php
	
 include("cabesera.php");


 ?>
 <div id="trabajo" align="center">
        <h1>Informe Por fecha Salida Productos</h1>
        <br />
		<form action="infofecha.php" name="form" enctype="multipart/form-data" method="post">
 <table width="590" border="0">
    
     <tr>
       <td><div align="left">Fecha inicio</div></td>
     <td> <span class="Estilo2">
       <input name="fecha_ini" type="date"id="dateArrival"class="input"  >
     </span></td>
     <td><div align="left"><span class="Estilo2">Ej. 2013-04-05 </span></div></td>
     </tr>
     <tr>
       <td><div align="left">Fecha termino</div></td>
       <td> <span class="Estilo2">
       <input name="fecha_term" type="date" id="dateArrival" class="input" >
     </span></td>
     <td><div align="left"><span class="Estilo2">Ej. 2013-05-05</span></div></td>
     </tr>
     
     <tr>
       <td ></td>
       <td>&nbsp;</td>
     <td class="submit"><input class="button" name="submit" type="submit" id="boton"  value="Generar Informe" /></td>
     </tr>
  </table>
</form>
    <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>
