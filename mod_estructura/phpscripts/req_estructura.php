<?php
	require('../conexion.php');
	$idelemento=$_POST['id'];
	$query="SELECT * FROM elemento where idunicaelemento='$idelemento'";
	
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();
	
?>