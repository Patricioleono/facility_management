<?php
require('../conexion.php');
ini_set('post_max_size','100M');
ini_set('upload_max_filesize','100M');
ini_set('max_execution_time','1000');
ini_set('max_input_time','1000');

$nombreArchivo='';

$id=$_GET['id'];
$dir= 'Documentos';
opendir($dir); 
if (file_exists($dir."/".$id)){
         
        }else { 
         
       	mkdir($dir."/".$id, 0777);
     }

if(!empty($_FILES['archivo_fls'])){
    foreach($_FILES["archivo_fls"] as $clave => $valor)
    {
        if ($clave=="name"){ $nombreArchivo=$valor; }

    }
    $archivo = $_FILES["archivo_fls"]["tmp_name"];
    $destino = 'Documentos/'.$id.'/'.$_FILES["archivo_fls"]["name"];
    $ext = substr($_FILES['archivo_fls']['name'], strrpos($_FILES['archivo_fls']['name'], '.'));
    $ruta='Documentos/'.$id."/".$nombreArchivo;
    move_uploaded_file($archivo, $destino);

    $query2="INSERT INTO archivos_instalaciones (idelem, nombre, ext, ruta) VALUES ('$id','$nombreArchivo','$ext','$ruta')";
    $mysqli->query($query2);

    $resultado3 = true;

}else{
    $resultado3 = false;
}

?>