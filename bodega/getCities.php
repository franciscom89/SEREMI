<?php

    // Conectar la base de datos 
include("conexion.php");

    
  // Tomamos los parametros de Array
    $cityid = !empty($_GET['id'])
              ?intval($_GET['id']):0;
    
    // Si no es seleccionada ninguna ciudad, tomamos data por defecto    
    $query = "SELECT * FROM usuario WHERE codigoseccion	 = '$cityid'"; 
    
    //  Obtenemos los resultados
    $result = mysql_query($query);
    $items = array();
    if($result && mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $option = array("id" => $row[5], "value" => htmlentities($row[1]));
            $items[] = $option; 
        }        
    } 
    mysql_close();
    $data = json_encode($items); 
    $response = isset($_GET['callback'])?$_GET['callback']."(".$data.")":$data; 
    echo($response);  
?>