<?php
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	$query="SELECT nombrerepuesto, tiporepuesto, nombrefabricante, numeromodelo, numeroserie, nombreproveedor, codigoproveedor, 
	descripcionubicacion, codigoubicacion, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablerepuesto, cantidad, modeloequipo
	 FROM repuestos WHERE id='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();

?>