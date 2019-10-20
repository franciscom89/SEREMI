<?php

	
 include("cabesera.php");
 $hoy=date('Y-m-d');
 $codigo[]=$_POST['codigo'];
$cantidad[]=$_POST['cantidad'];
@$seccion=$_POST['seccion'];
@$funcionario=$_POST['funcionario'];
@$programa=$_POST['linea'];
@$mostrarempleador=$_POST['mostrarempleador'];//salida
@$checkbox=$_POST['checkbox'];//transpaso
@$merma=$_POST["merma"];//merma
$bodega_preriferica=$_POST['bodegas'];
$total=count($codigo)-1;
$cont=0;
$bodegita=$_SESSION['boega_session'];
$cantidad[$cont];
 $nombre_funcionario=mysql_query("SELECT * FROM  `usuario` where id='$funcionario'") or mysql_error();
		
		while($row4=mysql_fetch_row($nombre_funcionario))
			{
				$name_funcionario=$row4[1];
				
		}
$sacar_id_registro=mysql_query("insert into archivo (id) values (null)");
$ultimo_id=mysql_insert_id();


if($mostrarempleador!=''){//salida

$tipo="Salida";
	while($cont<$total){
	$codigito= $codigo[$cont];
	
	$valor=mysql_query("SELECT * FROM `proveedor` WHERE `codigo`='$codigito'");
 $nConfig = mysql_num_rows ($valor);
 if ($nConfig > 0){
	  for ($i=0; $i<$nConfig; $i++)  
            {  
                $verConfig = mysql_fetch_array($valor);  
                $cantidades[$i] = $verConfig["en_stock"];  
               $precio[$i] = $verConfig["precio"];  
				$arriba=  $cantidades[$i] * $precio[$i] + $arriba;
				$abajo = $cantidades[$i] + $abajo;
            }  
	 
 }
 
 if($abajo!=0){
 $total2= ($arriba / $abajo );
 }else{
	$total2=0; 
 }
	
	
	
	
	
	
	
		$nuevo_valor=mysql_query("select * from productos where `codigoproducto`='$codigito'  and bodega='$bodegita'") or mysql_error();
		
		while($row=mysql_fetch_row($nuevo_valor))
			{
				 $cantidad_sinarray= $cantidad[$cont];
						$nuevo_stock= ($row[3] - $cantidad_sinarray);
		}
$r2=mysql_query("update productos set stock='$nuevo_stock' WHERE codigoproducto='$codigo[$cont]' and bodega='".$_SESSION['boega_session']."'");
		
		
		
$insertar_registro_salida=mysql_query("INSERT INTO  `salidaproductos` (`cantidad` ,`fecha` ,`codusuario` ,`codtematica` ,`codigoproducto` ,`id_archivo`,`tipo`,`precio_salida`)VALUES (  '$cantidad[$cont]',  '$hoy',  '$name_funcionario',  '$programa',  '$codigo[$cont]',  '$ultimo_id','$tipo','$total2')");		
		$cont++;	
	}//contador
	
}elseif($checkbox!=''){
$tipo="Transferencia";
while($cont<$total){
	echo	$codigito= $codigo[$cont];
	
		$nuevo_valor=mysql_query("select * from productos where `codigoproducto`='$codigito'  and bodega='$bodegita'") or mysql_error();
		
		while($row=mysql_fetch_row($nuevo_valor))
			{
				 $cantidad_sinarray= $cantidad[$cont];
				
				$descripcion=$row[2];
				$estock_tabla=$row[3];
				$estock_critico_tabla=$row[4];
				$categoria_tabla=$row[6];
				$subcategoria=$row[7];
		$nuevo_stock= ($row[3] - $cantidad_sinarray);
		}
		$r2=mysql_query("update productos set stock='$nuevo_stock' WHERE codigoproducto='$codigo[$cont]' and bodega='".$_SESSION['boega_session']."'");
				$nuevo_valor2=mysql_query("select * from productos where `codigoproducto`='$codigito'  and bodega='$bodega_preriferica'") or mysql_error();
		while($row2=mysql_fetch_row($nuevo_valor2))
			{
				 $cantidad_sinarray2= $cantidad[$cont];
				 
		$nuevo_stock2= ($row2[3] + $cantidad_sinarray2);
		}
		if(mysql_num_rows($nuevo_valor2)>0){
			
			$r2=mysql_query("update productos set stock='$nuevo_stock2' WHERE codigoproducto='$codigo[$cont]' and bodega='$bodega_preriferica'");
			
		}// if de consult
		
		
		
		else{
			$inserta_con_nueva_bodega=mysql_query("INSERT INTO  `productos` (`codigoproducto` ,`descripcion` ,`stock` ,`stockcritico` ,`fechaingreso` ,`categoria` ,`subcategoria` ,`bodega`)VALUES ('$codigito',  '$descripcion',  '$cantidad[$cont]',  '$estock_critico_tabla',  '$hoy',  '$categoria_tabla',  '$subcategoria',  '$bodega_preriferica')");
			
		}
		
		//-------------------
		
		
		$datos_bodegar=mysql_query("select * from bodega_periferica where id='$bodega_preriferica'") or mysql_error();
		while($row=mysql_fetch_row($datos_bodegar))
			{
				$encargado_bodeha=$row[2];
		}
		
		
		$datos_funcionario_bodega=mysql_query("select * from usuario where rut='$encargado_bodeha'") or mysql_error();
		while($row=mysql_fetch_row($datos_funcionario_bodega))
			{
				$name_funcionario=$row[1];
		}
		
		
		//-------------------
			
			
		$insertar_registro_salida=mysql_query("INSERT INTO  `salidaproductos` (`cantidad` ,`fecha` ,`codusuario`  ,`codigoproducto` ,`id_archivo`,`tipo`,`precio_salida`)VALUES (  '$cantidad[$cont]',  '$hoy',  '$name_funcionario',    '$codigo[$cont]',  '$ultimo_id','$tipo','$total2')");	
		$cont++;	
	}//contador
	
}elseif($merma!=''){
		$tipo="Merma";
		 $name_funcionario=$_SESSION['nombre_sessionc'];
		$codigito= $codigo[$cont];
	
	$valor=mysql_query("SELECT * FROM `proveedor` WHERE `codigo`='$codigito'");
 $nConfig = mysql_num_rows ($valor);
 if ($nConfig > 0){
	  for ($i=0; $i<$nConfig; $i++)  
            {  
                $verConfig = mysql_fetch_array($valor);  
                $cantidades[$i] = $verConfig["en_stock"];  
               $precio[$i] = $verConfig["precio"];  
				$arriba=  $cantidades[$i] * $precio[$i] + $arriba;
				$abajo = $cantidades[$i] + $abajo;
            }  
	 
 }
 
 if($abajo!=0){
 $total2= ($arriba / $abajo );
 }else{
	$total2=0; 
 }
	while($cont<$total){
	$codigito= $codigo[$cont];
	
		$nuevo_valor=mysql_query("select * from productos where `codigoproducto`='$codigito'  and bodega='$bodegita'") or mysql_error();
		
		while($row=mysql_fetch_row($nuevo_valor))
			{
				 $cantidad_sinarray= $cantidad[$cont];
						$nuevo_stock= ($row[3] - $cantidad_sinarray);
		}
$r2=mysql_query("update productos set stock='$nuevo_stock' WHERE codigoproducto='$codigo[$cont]' and bodega='".$_SESSION['boega_session']."'");
		
		
$insertar_registro_salida=mysql_query("INSERT INTO  `salidaproductos` (`cantidad` ,`fecha` ,`codusuario`  ,`codigoproducto` ,`id_archivo`,`tipo`,`precio_salida`)VALUES (  '$cantidad[$cont]',  '$hoy',  '$name_funcionario',  '$codigo[$cont]',  '$ultimo_id','$tipo','$total2')");		
		$cont++;	
	}//contador
	
}
 
  $nombre_seccion=mysql_query("SELECT * FROM  `seccion` where id='$seccion'") or mysql_error();
		
		while($row5=mysql_fetch_row($nombre_seccion))
			{
				 $seccion_name=$row5[1];
				
		} 
		$programa_seccion=mysql_query("SELECT * FROM  `programa` where id='$programa'") or mysql_error();
		
		while($row6=mysql_fetch_row($programa_seccion))
			{
				 $programa_name=$row6[1];
				$id_depa=$row6[3];
				
		}
		$programa_depa=mysql_query("SELECT * FROM  `departamento` where id='$id_depa'") or mysql_error();
		
		while($row7=mysql_fetch_row($programa_depa))
			{
				 $Depart=$row7[1];
				
		} 
		
	$nombre_bodegas=mysql_query("SELECT * FROM  `bodega_periferica` where id='$bodega_preriferica'");
	while($row9 = mysql_fetch_row($nombre_bodegas))
{
	$nombre_bodega=$row9[1];
}

$validadores='1';

if($validadores=='1'){

//echo "documento.php?ultimo=".$ultimo_id."&funcionario=".$name_funcionario."&seccion=".$seccion_name."&elbodega=".$_SESSION['boega_session']."&programa=".$programa_name."&departamento=".$Depart."&tipo=".$tipo."&bodega=".$nombre_bodega."";	


?>
 
<meta http-equiv="Refresh" content="0;url=<?php echo "documento.php?ultimo=".$ultimo_id."&funcionario=".$name_funcionario."&seccion=".$seccion_name."&elbodega=".$_SESSION['boega_session']."&programa=".$programa_name."&departamento=".$Depart."&tipo=".$tipo."&bodega=".$nombre_bodega; ?>">
<?php
}

?>

</body>
 <div id="trabajo" align="center">
  <h1>Datos Funcionario</h1>


   <!--Comiensa documento--> 
   
   
   
  <!--Termino documento-->
    
    
    
</div>
<div id="copyright">Copyright &copy; 2014 - Abastecimiento<a href="http://apycom.com/"></a></div>

</body>
</html>