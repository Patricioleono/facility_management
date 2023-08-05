<?php
$directorio = "equipos";
$gestor_dir = opendir($directorio);
while (false !== ($nombre_fichero = readdir($gestor_dir))) {
    $nombre_fichero=substr($nombre_fichero, 0, -4);
if($nombre_fichero !== false)
{
    $files[] = $nombre_fichero;
}
}

echo json_encode($files);

?>