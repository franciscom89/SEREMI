<?php
$im = imagecreatefrompng("clsCodigoBarras.php?width=170&height=40&barcode=123123");

header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
?>