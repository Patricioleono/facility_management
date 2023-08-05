<?php 
	
	require('../conexion.php');
	
	$nombreequipo=$_POST['nombreequipo'];
	$idunica=$_POST['idunica'];
	$tipoequipo=$_POST['tipoequipo'];
	$nombrefabricante=$_POST['nombrefabricante'];
	$numeromodelo=$_POST['numeromodelo'];
	$numeroserie=$_POST['numeroserie'];

	$nombreproveedor=$_POST['nombreproveedor'];
	$codigoproveedor=$_POST['codigoproveedor'];
	$preciocompra=$_POST['preciocompra'];
	$fechainstalacion=$_POST['fechainstalacion'];
	$fechacaducidadgarantia=$_POST['fechacaducidadgarantia'];
	$responsablemantenimiento=$_POST['responsablemantenimiento'];
	$estadoequipo=$_POST['estadoequipo'];
	$piso=$_POST['piso'];
	$sector=$_POST['recinto'];
	$acreditacion=$_POST['acreditacion'];
	$enlace = 'http://www.bim.cl/BIM/hospital_calvo_mackenna/fichas/ficha_artefactos.php?id='.$idunica;
	
	$query="INSERT INTO servbas (nombreequipo, idunica, tipoequipo, nombrefabricante, numeromodelo, numeroserie, nombreproveedor, codigoproveedor,
		piso, recinto, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablemantenimiento, estadoequipo, acreditacion,enlace) 
	VALUES ('$nombreequipo','$idunica','$tipoequipo','$nombrefabricante','$numeromodelo','$numeroserie','$nombreproveedor',
		'$codigoproveedor','$piso','$sector','$preciocompra','$fechainstalacion','$fechacaducidadgarantia',
		'$responsablemantenimiento','$estadoequipo','$acreditacion','$enlace')";
    $query1="INSERT INTO eventcalender2(idequipo) VALUES ('$idunica');";

	
	$resultado2=$mysqli->query($query1);
	$resultado=$mysqli->query($query);
	
?>