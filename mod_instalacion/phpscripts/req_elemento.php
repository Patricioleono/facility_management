<?php
	require('../conexion.php');
	$id=$_POST['id'];
	$query="SELECT *
	 FROM instalaciones WHERE idunica='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>