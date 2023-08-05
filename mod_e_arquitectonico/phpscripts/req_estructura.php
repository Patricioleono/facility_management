<?php
	require('../conexion.php');
	$idelemento=$_POST['id'];
	$query="SELECT * FROM elemento_arquitectonico where idunicaelemento='$idelemento'";
	
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();
	
?>