<?php
include('conexion.php');

$status = "";
if ($_POST["action"] == "upload") {
    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   
    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "files/".$prefijo."_".$archivo;
		echo $ids=$_POST['ids'];
		$subida_Archivo=  mysql_query("update archivo set nombre_archivo='$destino' where id='$ids'");
		
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
             $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
        $status = "Error al subir archivo";
    }
}
  
  ?>