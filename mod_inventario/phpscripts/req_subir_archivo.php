<?php
require('../conexion.php');
ini_set('post_max_size','100M');
ini_set('upload_max_filesize','100M');
ini_set('max_execution_time','1000');
ini_set('max_input_time','1000');
$valor2= '';
$id=$_GET['id'];
$dir= 'Documentos';
opendir($dir); 
if (file_exists($dir."/".$id)){
         
        }else { 
         
       	mkdir($dir."/".$id, 0777);
     }

foreach($_FILES["archivo_fls"] as $clave => $valor)
{
if ($clave=="name")
	{
		$valor2=$valor;
	}
	
}
	$archivo = $_FILES["archivo_fls"]["tmp_name"];
	$destino = 'Documentos/'.$id.'/'.$_FILES["archivo_fls"]["name"];
	$ext = substr($_FILES['archivo_fls']['name'], strrpos($_FILES['archivo_fls']['name'], '.'));
    $ruta='Documentos/'.$id."/".$valor2;
	move_uploaded_file($archivo, $destino);
	
	$query2="INSERT INTO archivos_equipos (idelem, nombre, ext, ruta) VALUES ('$id','$valor2','$ext','$ruta')";
	$resultado3=$mysqli->query($query2);

?>