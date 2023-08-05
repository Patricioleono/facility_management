<?php 	
	require('../conexion.php');
	$id=$_GET['id'];
	$query="DELETE FROM repuestos_instalaciones WHERE id='$id'";
	$resultado=$mysqli->query($query);
?>