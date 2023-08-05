<?php
	require('../conexion.php');

	$query="SELECT id, nombrerepuesto, tiporepuesto, nombrefabricante, numeromodelo, numeroserie, nombreproveedor, codigoproveedor, 
	descripcionubicacion, codigoubicacion, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablerepuesto, cantidad, modeloequipo
	 FROM repuestos";
	$resultado=$mysqli->query($query);

?>