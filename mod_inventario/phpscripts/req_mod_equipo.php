<?php 
	
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from equipos WHERE id='$id'";
	
	
	$nombreequipo=utf8_decode($_POST['nombreequipo']);
	$tipoequipo=utf8_decode($_POST['tipoequipo']);
	$nombrefabricante=utf8_decode($_POST['nombrefabricante']);
	$numeromodelo=utf8_decode($_POST['numeromodelo']);
	$numeroserie=utf8_decode($_POST['numeroserie']);
	$versionsoftware=utf8_decode($_POST['versionsoftware']);
	$nombreproveedor=utf8_decode($_POST['nombreproveedor']);
	$codigoproveedor=utf8_decode($_POST['codigoproveedor']);
	$preciocompra=utf8_decode($_POST['preciocompra']);
	$fechainstalacion=utf8_decode($_POST['fechainstalacion']);
	$fechacaducidadgarantia=utf8_decode($_POST['fechacaducidadgarantia']);
	$responsablemantenimiento=utf8_decode($_POST['responsablemantenimiento']);
	$estadoequipo=utf8_decode($_POST['estadoequipo']);
	$piso=utf8_decode($_POST['piso']);
	$recinto=utf8_decode($_POST['recinto']);
	$acreditacion=utf8_decode($_POST['acreditacion']);
	$alto=utf8_decode($_POST['alto']);
	$largo=utf8_decode($_POST['largo']);
	$ancho=utf8_decode($_POST['ancho']);
	$distanciaalpiso=utf8_decode($_POST['distanciaalpiso']);

	$query="UPDATE equipos SET nombreequipo='$nombreequipo', tipoequipo='$tipoequipo', nombrefabricante='$nombrefabricante'
	, numeromodelo='$numeromodelo', numeroserie='$numeroserie', versionsoftware='$versionsoftware'
	, nombreproveedor='$nombreproveedor', codigoproveedor='$codigoproveedor', preciocompra='$preciocompra', fechainstalacion='$fechainstalacion', 
	fechacaducidadgarantia='$fechacaducidadgarantia', responsablemantenimiento='$responsablemantenimiento', acreditacion='$acreditacion', estadoequipo='$estadoequipo',piso='$piso',recinto='$recinto',
	alto='$alto', largo='$largo', ancho='$ancho', distanciaalpiso='$distanciaalpiso'
	  WHERE idunica='$id'";
	  //No nombrar 2 veces la tabla en una sola consulta
	
	$resultado=$mysqli->query($query);
	
?>