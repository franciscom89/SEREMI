<?php
require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
	
 include("cabesera.php");
 include("conecta_bd.php");

 ?>
 <div id="site_content">
      
      <div class="content">
        <h1>Borrar Departamento</h1>
		<form method="post" action="borradepa.php" ENCTYPE="multipart/form-data">
        <TABLE BORDER="1"> 


<TR> 
   <TH>Departamento</TH> 
<TD><select name="cod" id="cod" >
<option>Seleccione un Departamento</option>
<?php

$consulta="SELECT * FROM departamento ORDER BY nombre";
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
<TD><input type="submit" name="boton" value="Borrar"></TD> 
   
</TR>

</TABLE> 
</form>
      </div>
    </div>
	 <?php


}
?>