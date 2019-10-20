<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
 <link rel="shortcut icon" href="imagenes_proyectos/favicon.ico" type="image/x-icon" />
    <link type="text/css" href="menu.css" rel="stylesheet" />
    <meta name="author" content="Gobierno de Chile" />
     <script type="text/javascript" src="js/validarut.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    
    <!--ayuda al autocomplete de busqueda-->
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/css_plantilla.css"> 
    <link rel="stylesheet" type="text/css" href="css/estilo_formularios.css">
    <link rel="stylesheet" type="text/css" href="css/jqueryui.css" />
<body>

<?php
include("conexion.php");
$id_producto=$_GET['id_producto'];
$stock_maximo=$_GET['stock'];
$codigo_barra=$_GET['cod_barra'];
$descripcion=$_GET['descripcion'];
$categoria=$_GET['categoria'];
$sub_categoria=$_GET['subcategoria'];



?>

<div id="trabajo" align="center">
<h1> Transpaso a bodega teriferica</h1>
<br />
<form action="transpaso_guarda.php" method="post">
<input type="hidden" class="input" name="categoria" value="<?php echo $categoria?>">
<input type="hidden" class="input" name="subcategoria" value="<?php echo $sub_categoria?>">
<table width="358">
  <tr>
    <th width="190" scope="row">Codigo barra</th>
    <td width="145"><input type="text" class="input" name="codigo" value="<?php echo $codigo_barra?>"></td>
    <td width="7">&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Descripcion</th>
    <td><input type="text" class="input" name="descripcion" value="<?php echo $descripcion?>" size="30"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Stock a transpasar</th>
    <td><input type="number" max="<?php echo $stock_maximo?>" min="1" class="input" name="stock" value=""></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Bodega Periferica</th>
    <td><select name="bodega" id="bodega"  class="input" required="required">
<option value="" >Seleccione una Bodega</option>
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
</select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><input type="submit" name="boton" value="Siguiente" id="boton"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


</div>