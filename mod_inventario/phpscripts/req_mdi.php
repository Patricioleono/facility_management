<?php
	require('../conexion.php');
	
	$query="SELECT * FROM equipos";
	
	$resultado=$mysqli->query($query);
?>