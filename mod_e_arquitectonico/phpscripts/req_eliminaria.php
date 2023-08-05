<?php 	
	require('../conexion.php');
	
	$idunica=$_GET['id'];
	$query="DELETE FROM infraestructura WHERE idunica='$idunica'";
	$query1="DELETE FROM eventcalender2 WHERE idinfraestructura='$idunica'";

	$resultado=$mysqli->query($query);
    $resultado1=$mysqli->query($query1);
?>
