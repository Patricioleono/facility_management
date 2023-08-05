<?php
	require('../conexion.php');
	$id=$_REQUEST['id'];
	$query="SELECT id, nombreinfraestructura, idunica, tipoinfraestructura, nombrefabricante, numeromodelo, numeroserie, versionsoftware, nombreproveedor, codigoproveedor, 
	descripcionubicacion, codigoubicacion, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablemantenimiento, estadoinfraestructura, imagen
	 FROM infraestructura WHERE idunica='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>