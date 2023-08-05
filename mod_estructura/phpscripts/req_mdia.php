<?php
	require('../conexion.php');
	
	$query="SELECT * FROM elemento";
	
	$resultado=$mysqli->query($query);
	
?>