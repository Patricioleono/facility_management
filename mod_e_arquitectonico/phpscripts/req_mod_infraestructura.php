<?php 
	
	require('../conexion.php');
	$id=$_POST['id'];
	$select1= "SELECT * from infraestructura WHERE id='$id'";
	
	
	$nombreinfraestructura=$_POST['nombreinfraestructura'];
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

	$query="UPDATE infraestructura SET nombreinfraestructura='$nombreinfraestructura', tipoinfraestructura='$tipoinfraestructura', nombrefabricante='$nombrefabricante'
	, numeromodelo='$numeromodelo', numeroserie='$numeroserie', versionsoftware='$versionsoftware'
	, nombreproveedor='$nombreproveedor', codigoproveedor='$codigoproveedor', descripcionubicacion='$descripcionubicacion'
	, codigoubicacion='$codigoubicacion', preciocompra='$preciocompra', fechainstalacion='$fechainstalacion', 
	fechacaducidadgarantia='$fechacaducidadgarantia', responsablemantenimiento='$responsablemantenimiento', estadoinfraestructura='$estadoinfraestructura'
	  WHERE idunica='$id'";
	  //No nombrar 2 veces la tabla en una sola consulta
	
	$resultado=$mysqli->query($query);
	
?>