<?php 
	
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from repuestos WHERE id='$id'";
	
	$idequipoperteneciente=$_POST['idequipoperteneciente'];
	$nombrerepuesto=$_POST['nombrerepuesto'];
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
	$gastototal=$_POST['gastototal'];

	$query="UPDATE repuestos SET idrepuesto='$idequipoperteneciente', nombrerepuesto='$nombrerepuesto', tiporepuesto='$tiporepuesto', nombrefabricante='$nombrefabricante'
	, numeromodelo='$numeromodelo', numeroserie='$numeroserie'
	, nombreproveedor='$nombreproveedor', codigoproveedor='$codigoproveedor', preciocompra='$preciocompra', fechainstalacion='$fechainstalacion', fechacaducidadgarantia='$fechacaducidadgarantia', responsablerepuesto='$responsablerepuesto', cantidad='$cantidad', gastototal='$gastototal'
	  WHERE id='$id'";
	  //No nombrar 2 veces la tabla en una sola consulta
	
	$resultado=$mysqli->query($query);
	
?>