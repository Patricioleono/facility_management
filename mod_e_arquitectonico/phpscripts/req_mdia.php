<?php
	require('../conexion.php');
	
	$query="SELECT * FROM elemento_arquitectonico";
	
	$resultado=$mysqli->query($query);
	
?>