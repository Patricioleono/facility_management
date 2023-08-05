<?php
	
	require('../conexion.php');

	$id=$_GET['id'];
	$query="SELECT nombreinfraestructura, tipoinfraestructura, nombrefabricante, numeromodelo, numeroserie, versionsoftware, nombreproveedor, codigoproveedor, 
	descripcionubicacion, codigoubicacion, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablemantenimiento, estadoinfraestructura
	 FROM infraestructura WHERE idunica='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();

	
?>