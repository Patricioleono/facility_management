<?php
	require('../conexion.php');
	
	$query="SELECT *
	 FROM instalaciones";
	
	$resultado=$mysqli->query($query);
?>