<?php 
$id_archivo=$_GET['id_producto'];

?>


     

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input name="archivo" type="file" size="35" />
  <input name="enviar" type="submit" value="Upload File" />
  <input name="action" type="hidden" value="upload" /> 
    <input name="ids" type="hidden" value="<?php echo $id_archivo; ?>" />    
</form>

