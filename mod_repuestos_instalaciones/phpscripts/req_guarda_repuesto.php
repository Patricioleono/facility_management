<?php 
	
	require('../conexion.php');
	
	$nombrerepuesto=$_POST['nombrerepuesto'];
	$id=$_POST['id'];
	$tiporepuesto=$_POST['tiporepuesto'];
	$nombrefabricante=$_POST['nombrefabricante'];
	$numeromodelo=$_POST['numeromodelo'];
	$numeroserie=$_POST['numeroserie'];
	$nombreproveedor=$_POST['nombreproveedor'];
	$codigoproveedor=$_POST['codigoproveedor'];
	$descripcionubicacion=$_POST['descripcionubicacion'];
	$codigoubicacion=$_POST['codigoubicacion'];
	$preciocompra=$_POST['preciocompra'];
	$fechainstalacion=$_POST['fechainstalacion'];
	$fechacaducidadgarantia=$_POST['fechacaducidadgarantia'];
	$responsablerepuesto=$_POST['responsablerepuesto'];
	$cantidad=$_POST['cantidad'];
	$modeloequipo=$_POST['modeloequipo'];
    $gasto = ( ((int)$preciocompra)*((int)$cantidad) );
	$query="INSERT INTO repuestos_instalaciones (nombrerepuesto, tiporepuesto, nombrefabricante, numeromodelo, numeroserie, nombreproveedor, codigoproveedor, descripcionubicacion, codigoubicacion, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablerepuesto,cantidad, gastototal, modeloequipo)
	VALUES ('$nombrerepuesto','$tiporepuesto','$nombrefabricante','$numeromodelo','$numeroserie','$nombreproveedor','$codigoproveedor','$descripcionubicacion','$codigoubicacion','$preciocompra','$fechainstalacion','$fechacaducidadgarantia','responsablerepuesto','$cantidad','$gasto','$modeloequipo');";
echo $query;
    $query1="INSERT INTO eventcalender(idequipo) VALUES ($id);";

	
	$resultado2=$mysqli->query($query1);
	echo $resultado2;
	$resultado=$mysqli->query($query);
	echo $resultado;

?>