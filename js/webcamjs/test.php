<?php
$id_foto=date('YmdHis');//extraemos la fecha del servidor
$filename = "fotos/".$id_foto.".jpg";//nombre del archivo
$result = file_put_contents( $filename, file_get_contents('php://input') );//renombramos la fotografia y la subimos
if (!$result) {
 print "No se pudo subir al servidor\n";
 exit();
}
//$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;//generamos la respuesta como la ruta completa
print "$filename\n";//20120214060943.jpg
?>
