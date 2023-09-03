<?php 
	
	require('../conexion.php');
	
	$nombreequipo=$_POST['nombreequipo'];
	$idunica=$_POST['idunica'];
	$tipoequipo=$_POST['tipoequipo'];
	$nombrefabricante=$_POST['nombrefabricante'];
	$numeromodelo=$_POST['numeromodelo'];
	$numeroserie=$_POST['numeroserie'];
	$versionsoftware=$_POST['versionsoftware'];
	$nombreproveedor=$_POST['nombreproveedor'];
	$codigoproveedor=$_POST['codigoproveedor'];
	$preciocompra=$_POST['preciocompra'];
	$fechainstalacion=$_POST['fechainstalacion'];
	$fechacaducidadgarantia=$_POST['fechacaducidadgarantia'];
	$responsablemantenimiento=$_POST['responsablemantenimiento'];
	$estadoequipo=$_POST['estadoequipo'];
	$unidad=$_POST['unidad'];
	$area=$_POST['area'];
	$piso=$_POST['piso'];
	$recinto=$_POST['recinto'];
	$acreditacion=$_POST['acreditacion'];
	$alto=$_POST['alto'];
	$largo=$_POST['largo'];
	$ancho=$_POST['ancho'];
	$distanciaalpiso=$_POST['distanciaalpiso'];
        $enlace='http://www.bim.cl/BIM/QA/fichas/ficha_equipos_medicos.php?id='.$idunica;
	
	$query="INSERT INTO equipos (idunica,nombreequipo, tipoequipo, nombrefabricante, numeromodelo, numeroserie, versionsoftware, nombreproveedor, codigoproveedor, unidad, area, recinto, piso, preciocompra, fechainstalacion, fechacaducidadgarantia, responsablemantenimiento, estadoequipo, acreditacion,alto,largo,
		ancho, distanciaalpiso, enlace) 
	VALUES ('$nombreequipo','$idunica','$tipoequipo','$nombrefabricante','$numeromodelo','$numeroserie','$versionsoftware','$nombreproveedor',
		'$codigoproveedor','$unidad','$area', '$recinto','$piso','$preciocompra','$fechainstalacion','$fechacaducidadgarantia',
		'$responsablemantenimiento','$estadoequipo','$acreditacion','$alto','$largo','$ancho','$distanciaalpiso','$enlace')";
    $query1="INSERT INTO eventcalender(idequipo) VALUES ('$idunica');";

	
	$resultado2=$mysqli->query($query1);
	$resultado=$mysqli->query($query);
	
?>