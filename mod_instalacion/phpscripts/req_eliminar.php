<?php 
	
	require('../conexion.php');
	
	$idunica=$_POST['id'];
	$query="DELETE FROM instalaciones WHERE idunica='$idunica'";
	$query1="DELETE FROM eventcalenderinstalaciones WHERE idequipo='$idunica'";

	$resultado=$mysqli->query($query);
    $resultado1=$mysqli->query($query1);

?>