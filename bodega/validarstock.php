<?php

function Comprobacioncodigo(){

  $codigoval=$_POST['codigo[]'];
  $cantidadval=$_POST'cantidad[]'];
  $totalproveedor=0;
  $totalsalidaproducto=0;

  $selectproveedor="SELECT * FROM proveedor WHERE codigo='$codigoval' ";

  while ($row=mysql_fetch_array($selectproveedor)) {
    $totalproveedor=$totalproveedor+ $row['cantidad'];
  }

  $selectsalidaproducto="SELECT * FROM salidaproductos WHERE codigoproducto='$codigoval' ";

  while ($row=mysql_fetch_array($selectsalidaproducto)) {

    $totalsalidaproducto=$totalsalidaproducto+$row['cantidad'];
    # code...
  }

  $valor1=$totalproveedor;
  $valor2=$totalsalidaproducto;
  $stock=$valor1-$valor2;

  if ($stock<$cantidadval) {
    
    echo '<script language="javascript">';
    echo 'alert("El stock disponible es de: " .$stock. " unidades")';
    echo '</script>';
  }

  else{

    this.form.submit();
  }
}
?>