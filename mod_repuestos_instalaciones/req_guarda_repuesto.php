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
	$preciocompra=$_POST['preciocompra'];
	$fechainstalacion=$_POST['fechainstalacion'];
	$fechacaducidadgarantia=$_POST['fechacaducidadgarantia'];
	$responsablerepuesto=$_POST['responsablerepuesto'];
	$cantidad=$_POST['cantidad'];
	$gastototal=$cantidad*$preciocompra;
	
	$query="INSERT INTO repuestos_instalaciones (nombrerepuesto, idrepuesto, tiporepuesto, nombrefabricante, numeromodelo, numeroserie, nombreproveedor, codigoproveedor, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablerepuesto, cantidad, gastototal) 
	VALUES ('$nombrerepuesto','$id','$tiporepuesto','$nombrefabricante','$numeromodelo','$numeroserie','$nombreproveedor',
		'$codigoproveedor','$preciocompra','$fechainstalacion','$fechacaducidadgarantia',
		'$responsablerepuesto','$cantidad','$gastototal')";
    $query1="INSERT INTO eventcalender(idequipo) VALUES ($id);";

	
	$resultado2=$mysqli->query($query1);
	$resultado=$mysqli->query($query);
	

?>