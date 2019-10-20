<?php

	
 include("cabesera.php");
 
 ?>
  <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
 <script type="text/javascript">

$(document).ready(function(){
                         
      var consulta;
         // alert ("hola");   
      //hacemos focus
      $("#codigo").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#codigo").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#codigo").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobar.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});

</script>
<?php /*?> <script language="javascript">
Agrego un parametro a la funcion, ventana un string que de un nombre a la ventana //
function ventanaSecundaria (URL, ventana){

Uso el nombre que viene por ventana//
window.open(URL,ventana,"width=900,height=450,scrollbars=YES")


}

</script>
<div id="trabajo" align="center">

<form method="post" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" ENCTYPE="multipart/form-data">
  <h1>Registro de Salida de Productos</h1> 
  <br>
        <TABLE > 
<TR> 
   <TH>Codigo De barra</TH> 
   <TH>Cantidad</TH> 
 
   
</TR> 
<TR> 
   <TD><input type="text" name="codigo" class="input" id="codigo" required><div id="resultado"></div></TD>
<TD><input type="number" min="1" class="input" name="cantidad" value="1" onkeyup='validar2(this);' required></TD> 
   
</TR> 
<TR> 
   <TH></TH> 
<TD><input type="submit" id="boton"  name="boton" value="Agregar"></TD> 
   
</TR>

</TABLE> 
</form>

 <?php
 
if(isset($_POST['boton']))
 
{
$hoy = date("Y-m-d H:i:s");   

$codigo=$_POST["codigo"];
$cantidad=$_POST["cantidad"];
$select=mysql_query("Select stock from productos where codigoproducto='$codigo'");
while($row=mysql_fetch_array($select))
{
$stock=$row["stock"];
}

if($stock >= $cantidad){
$permitido=1;

}else{
echo "En stock hay disponible: ".$stock;
}
?>
 <h1>Productos en Lista de Salida</h1> 
 <form method="post" action="Generarsalida.php" ENCTYPE="multipart/form-data">
<TABLE > 
<TR> 
   <TH>Codigo</TH> 
   <TH>Descripcion</TH> 
   <TH>Cantidad</TH> 
 
   
</TR>
<?php
if($permitido ==1){
	$usuario=$_SESSION['id_usuario_session'] ;
$q = mysql_query("insert into temporal (codigoproducto,cantidad,bodegero)values ('$codigo','$cantidad','$usuario')");
}
$s=mysql_query("Select * from temporal where bodega='0'");
 while($row=mysql_fetch_array($s))
{
$codigo=$row["codigoproducto"];
$w=mysql_query("Select * from productos where codigoproducto='$codigo' ");
 while($rowe=mysql_fetch_array($w))
{
$descripcion=$rowe["descripcion"];
}

   ?>
</TR> 
<TR> 
   <TD><input type="text" class="input" name="codigo"value="<?php echo $row["codigoproducto"]?>" readonly></TD>
   <TD><input type="text" class="input" name="descripcion"value="<?php echo $descripcion?>" readonly></TD>
<TD><input type="text" class="input"  name="cantidad"value="<?php echo $row["cantidad"]?>" readonly></TD> 
   
</TR> 


<?php
 }
 ?>
 
 <TR> 
  <TD></TD> 
   <TD></TD> 
<TD><input type="submit" id="boton"  name="boton" value="Confirmar"></TD> 
   
</TR>
 </TABLE> 
 </form>
 
 <?php
 echo "<a href='#' onClick=javascript:ventanaSecundaria('sacardelista.php?id_v=$id','_blank','venatana$row->id')>Sacar Producto de lista</a>";

}

?><?php */?>

<script type="text/javascript">
var nextinput = 0;
function AgregarCampos(){
nextinput++;
campo = '<li id="rut'+nextinput+'">Codigo de barra:<input type="text"  size="20" class="input" id="codigo"&nbsp; name="codigo[]" required/> Cantidad: <input type="number" size="20" min="0" class="input" id="cantidad"&nbsp; name="cantidad[]"&nbsp; required/>';
;
$("#campos").append(campo);

}
</script>
<script type="text/javascript">
document.onkeypress = KeyPressed;
function KeyPressed(e)
{ return ((window.event) ? event.keyCode : e.keyCode) != 13; }
</script>
</head>
<body onload="AgregarCampos();">
<div id="trabajo" align="center">

 <form id="form" name="form" method="post" action="mirar.php" onKeyPress="return event.keyCode!=13" onSubmit="$(document).ready(function()">
 <h1> Lista Salida</h1>
   <br>
 <div id="campos">
 </div> 

 
  </br>
  <input type="submit" id="boton"  name="boton" value="Siguiente">  



  <br>
 
</form>

<br>
</div>
<div id="copyright">Copyright &copy; 2016 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>
  