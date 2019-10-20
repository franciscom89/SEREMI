<?php

	include("cabesera.php");

 
 $ruti=$_POST["rut"];
 $result=mysql_query("select * from usuario where nombre='$ruti'");
 while($row=mysql_fetch_array($result))
{
 $ruti=$row["rut"];
$nombre=$row["nombre"];
$Codigose=$row["codigosec"];
$pass=$row["pass"];
$perfil=$row["perfil"];
$seccion=$row["codigoseccion"];
$bodega_resp=$row["bodaga_resp"];
}

 ?>
   <div id="trabajo" align="center">
        <h1>Edicion De Usuarios</h1>
        <br/>
		<form method="post" action="guardarupdateusuariou.php" ENCTYPE="multipart/form-data">
        <TABLE > 
<TR> 
   <TH>Rut Usuario</TH> 
<TD><input type="text" name="rut" id="rut" onBlur="validar1(this.form)"value="<?php echo $ruti?>" class="input" ></TD> 
   
</TR> 
<TR> 
   <TH>Nombre</TH> 
<TD><input type="text" name="nombre"value="<?php echo $nombre?>" class="input"></TD> 
   
</TR> 
<TR> 
   <TH>Password</TH> 
<TD><input type="password" name="clave" value="<?php echo $pass?>" class="input"></TD> 
   
</TR> 
<TR> 
   <TH>Perfil</TH> 
<TD><select name="perfil" id="perfil" class="input">
<option value="<?php echo $perfil?>" selected > <?php echo $perfil?></option>
<option value="Admingeneral" > Administrador</option>
<option value="Supervisor" >Supervisor</option>
<option value="usuario" > usuario</option>
<option value="inactivo" > inactivo</option>

</select></TD> 
   
</TR> 
 
<TR> 
   <TH>Seccion</TH> 
<TD><select name="categoria" id="categoria"  class="input">
<option value="<?php echo $seccion?>" selected > <?php echo $seccion?></option>
<?php

$consulta="SELECT * FROM seccion ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select></TD> 
   
</TR> 
<TR> 
   <TH>Bodega</TH> 
<TD><select name="bodega" id="bodega" class="input" >
<option value="<?php echo $bodega_resp?>" selected > <?php echo $bodega_resp?></option>
<?php

$consulta="SELECT * FROM bodega_periferica ORDER BY nombre";
$result = mysql_query($consulta);
while ($row = mysql_fetch_row($result))
{
?>
<option value="<?php echo $row[0]?>" > <?php echo $row[1]?> </option>
<?php 
}

?>
</select></TD> 
   
</TR> 


<TR> 
   <TH></TH> 
<TD><input type="submit" name="boton" value="Guardar" id="boton"></TD> 
   
</TR>

</TABLE> 

</form>
 <br>
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html