<?php 
	
	require('../conexion.php');
	
	$idunica=$_POST['id'];
	$query="DELETE FROM servbas WHERE idunica='$idunica'";
	$query1="DELETE FROM eventcalender2 WHERE idequipo='$idunica'";

	$resultado=$mysqli->query($query);
    $resultado1=$mysqli->query($query1);

?>