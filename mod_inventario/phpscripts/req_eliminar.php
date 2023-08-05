<?php 
	
	require('../conexion.php');
	
	$idunica=$_POST['id'];
	$query="DELETE FROM equipos WHERE idunica='$idunica'";
	$query1="DELETE FROM eventcalender WHERE idequipo='$idunica'";
	$query2="DELETE FROM archivos_equipos WHERE idelemen='$idunica'";
	$query3="DELETE FROM gastos_equipos WHERE id_elemento='$idunica'";

	$resultado=$mysqli->query($query);
    $resultado1=$mysqli->query($query1);
    $resultado2=$mysqli->query($query2);
    $resultado3=$mysqli->query($query3);

?>
<?php
$dir= 'elementos';
    $files=glob($dir."/".$idunica."/".$idunica."/.jpg");
	if (file_exists($dir."/".$idunica."/".$idunica."/.jpg")){
        foreach($files as $file){
           if(is_file($file))
           unlink($file);
}

}
?>