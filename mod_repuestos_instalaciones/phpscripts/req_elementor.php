<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$query="SELECT * FROM repuestos WHERE id='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();
        $iddelequipo=row['idrepuesto'];
	$query1="SELECT * FROM equipos WHERE idunica='$iddelequipo'";

	$resultado1=$mysqli->query($query1);
	$row1=$resultado1->fetch_assoc();

?>