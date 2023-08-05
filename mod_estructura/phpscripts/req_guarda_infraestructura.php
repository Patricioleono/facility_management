<?php 
	
	require('../conexion.php');
	
	$nombreinfraestructura=$_POST['nombreinfraestructura'];
	$idunica=$_POST['idunica'];
	$tipoinfraestructura=$_POST['tipoinfraestructura'];
	$nombrefabricante=$_POST['nombrefabricante'];
	$numeromodelo=$_POST['numeromodelo'];
	$numeroserie=$_POST['numeroserie'];
	$versionsoftware=$_POST['versionsoftware'];
	$nombreproveedor=$_POST['nombreproveedor'];
	$codigoproveedor=$_POST['codigoproveedor'];
	$descripcionubicacion=$_POST['descripcionubicacion'];
	$codigoubicacion=$_POST['codigoubicacion'];
	$preciocompra=$_POST['preciocompra'];
	$fechainstalacion=$_POST['fechainstalacion'];
	$fechacaducidadgarantia=$_POST['fechacaducidadgarantia'];
	$responsablemantenimiento=$_POST['responsablemantenimiento'];
	$estadoinfraestructura=$_POST['estadoinfraestructura'];
	
	$query="INSERT INTO infraestructura (nombreinfraestructura, idunica, tipoinfraestructura, nombrefabricante, numeromodelo, numeroserie, versionsoftware, nombreproveedor, codigoproveedor,
		descripcionubicacion, codigoubicacion, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablemantenimiento, estadoinfraestructura) 
	VALUES ('$nombreinfraestructura','$idunica','$tipoinfraestructura','$nombrefabricante','$numeromodelo','$numeroserie','$versionsoftware','$nombreproveedor',
		'$codigoproveedor','$descripcionubicacion','$codigoubicacion','$preciocompra','$fechainstalacion','$fechacaducidadgarantia',
		'$responsablemantenimiento','$estadoinfraestructura')";
    $query1="INSERT INTO eventcalender2(idinfraestructura) VALUES ($idunica);";

	
	$resultado2=$mysqli->query($query1);
	$resultado=$mysqli->query($query);
	
?>