<?php 
	
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from servbas WHERE id='$id'";
	
	
	$nombreequipo=$_POST['nombreequipo'];
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
	

	$query="UPDATE servbas SET nombreequipo='$nombreequipo', tipoequipo='$tipoequipo', nombrefabricante='$nombrefabricante'
	, numeromodelo='$numeromodelo', numeroserie='$numeroserie', nombreproveedor='$nombreproveedor', codigoproveedor='$codigoproveedor', piso='$piso'
	, recinto='$sector', preciocompra='$preciocompra', fechainstalacion='$fechainstalacion', 
	fechacaducidadgarantia='$fechacaducidadgarantia', responsablemantenimiento='$responsablemantenimiento', acreditacion='$acreditacion', estadoequipo='$estadoequipo'
	  WHERE idunica='$id'";
	  //No nombrar 2 veces la tabla en una sola consulta
	
	$resultado=$mysqli->query($query);
	
?>