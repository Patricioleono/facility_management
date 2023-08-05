 <?php
	
	require('../conexion.php');

	$id=$_POST['id'];
	$query="SELECT * FROM equipos WHERE idunica='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();

	
?>