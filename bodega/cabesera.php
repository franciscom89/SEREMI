<?php
include("conexion.php");
session_start();
/*$usuario=$_SESSION['id_usuario_session'];
$consulta="SELECT * FROM  usuario where rut='$usuario'";
$result = mysql_query($consulta);


while ($row2 = mysql_fetch_row($result))
{
$perfil=$row2[4];
$nombre_para_bodega=$row2[1];

}
	$consulta2="SELECT * FROM  bodega_periferica where rut='$usuario'";
$result4 = mysql_query($consulta2);
while ($row4 = mysql_fetch_row($result4))
{
$bodegas=$row4[4];


}*/
if (!$_SESSION){
echo '<script language = javascript>
alert("Usuario no identificado.")
self.location = "../index.html"
</script>';
}
?>
<html>
<head>


    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Sistema de Abastecimiento</title>
    <link rel="shortcut icon" href="imagenes_proyectos/favicon.ico" type="image/x-icon" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <meta name="author" content="Gobierno de Chile" />
    <script type="text/javascript" src="jquery.js"></script>
     <script type="text/javascript" src="js/validarut.js"></script> 
       <script type="text/javascript" src="js/rut.js"></script>
    <script type="text/javascript" src="menu.js"></script>
       <script type="text/javascript" src="js/jquery.jCombo.js"></script>
       <script type="text/javascript" src="js/jquery-ui.min.js"></script>
          <script type="text/javascript" src="js/jquery.jCombo.min.js"></script>
          <link rel="stylesheet" type="text/css" href="css/jqueryui.css" />
    <link rel="stylesheet" type="text/css" href="css/css_plantilla.css"> 
    <link rel="stylesheet" type="text/css" href="css/estilo_formularios.css"> 
</head>
<body>

<div id="cabecera">




</div>
 <div id="logo"><img src="imagenes_proyectos/logo.jpg" width="170" height="155"></div>
 <div id="titulo">SEREMI</div>
 <div id="subtitulo">Abastecimiento</div>


<div id="menu">
    <ul class="menu">
       <li>
                			<a href="index.php"><span class="l"></span><span class="r"></span><span class="t">Inicio</span></a>
                		</li>


                         <?php if($_SESSION['perfil_session']=='Admingeneral' or $_SESSION['perfil_session']=='usuario'or $_SESSION['perfil_session']=='usuarioBodega'){   ?>
						
 
					<li>
                			<a href="Salidaproductos.php"><span class="l"></span><span class="r"></span><span class="t">Salida Productos</span></a>
                		</li>
                         <?php }?>
                        
					<li>
                			<a href="tabla_recursos.php"><span class="l"></span><span class="r"></span><span class="t">Listar Productos</span></a>
                		</li>
                        <li>
                			<a href="tabla_documentos.php"><span class="l"></span><span class="r"></span><span class="t">Documentos</span></a>
                		</li>
						<!--<li>
                			<a href="porcategoria.php"><span class="l"></span><span class="r"></span><span class="t">Buscar por Categoria</span></a>
                		</li>-->
						<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Informes</span></a>
                			<ul>
                			
                			<!--	<li><a href='fechafecha.php'>Informe salidas</a></li>-->
                            
                				<li><a href='informeporfecha.php'>Informe Salidas excel</a></li>
								<li><a href='informeprove.php'>Informe Proveedores</a></li>
								<li><a href='infoproductos.php'>Informe Stock Excel</a></li>
								<li><a href='b_bincard.php'>Bincard</a></li>
								<li><a href='bincard_global.php'>Bincard Global</a></li>
                			</ul>
                			</li><li>           			

					<a href="#"><span class="l"></span><span class="r"></span><span class="t">Agregar</span></a>
                			<ul> 
				
					<li><a href="Agregarstock.php"> Stock</a></li>
				
  <?php if($_SESSION['perfil_session']=='Admingeneral'or $_SESSION['perfil_session']=='usuario'){   ?>
				
				<li><a href="ingresoproductos.php"> Productos</a></li>
				<li><a href="ingresocategorias.php">Categoria</a></li>
				<li><a href="ingresosubcate.php">Subcategoria</a></li>
				

				<?php }?>


  <?php if($_SESSION['perfil_session']=='Admingeneral'){   ?>


				<!-- <li><a href="nuevodepa.php">Departamento</a></li>-->

			   <li><a href="seccionesnueva.php">Seccion</a></li>
                           <li><a href="nuevoprograma.php"> Programa</a></li>
			 <!--  <li><a href="nuevo_bodega.php"> Bodega</a></li> -->

<?php }?>

</ul>
                		</li>	

  <?php if($_SESSION['perfil_session']=='Admingeneral'){   ?>
						                        
						<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Modificacion</span></a>
                			<ul>
                			
                			<li><a href="programaincativo.php">Programa</a></li>
			   <!--<li><a href="eliminardepa.php">Borrar Departamento</a></li>
                			<li><a href="borrarseccion.php">Borrar Seccion</a></li>
             				<li><a href="eliminacate.php">Borrar Categoria</a></li>
			  		<li><a href="eliminasubcate.php">Borrar SubCategoria</a></li>-->
								
							
                			</ul>
                		</li>	
						<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Usuarios</span></a>
                			<ul>
                			
                		  		<li><a href="nuevouser.php">Agregar Usuario</a></li>
						<li><a href="buscaruser.php">Editar Usuario</a></li>
              					<li><a href="listausuarios.php">Lista de Usuarios</a></li>
								
							
                			</ul>
                		</li>
                       <!-- <li>
                			<a href="periferica.php"><span class="l"></span><span class="r"></span><span class="t">Traspaso a bodegas</span></a>
                		</li>	-->
                        <?php }?>
						<li>
                			<a href="sesiones/desconectar_usuario.php"><span class="l"></span><span class="r"></span><span class="t">Cerrar Sesion</span></a>
                		</li>
                	</ul>
					
</div>
