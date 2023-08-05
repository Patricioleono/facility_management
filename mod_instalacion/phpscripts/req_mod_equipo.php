<?php 
	
	require('../conexion.php');
	$id=$_GET['id'];
	
	$nombreinstalacion=$_POST['nombreinstalacion'];
	$sistema=$_POST['sistema'];
	$equipo=$_POST['equipo'];

	$marca=$_POST['marca'];
	$modelo=$_POST['modelo'];
	$codigo=$_POST['codigo'];

	$potencia=$_POST['potencia'];
	$unidadpotencia=$_POST['unidadpotencia'];
	$nombrefabricante=$_POST['nombrefabricante'];

	$versionsoftware=$_POST['versionsoftware'];
	$nombreproveedor=$_POST['nombreproveedor'];
	$codigoproveedor=$_POST['codigoproveedor'];

	$unidad=$_POST['unidad'];
	$area=$_POST['area'];
	$recinto=$_POST['recinto'];
	$piso=$_POST['piso'];

	$preciocompra=$_POST['preciocompra'];
	$fechainstalacion=$_POST['fechainstalacion'];
	$fechacaducidadgarantia=$_POST['fechacaducidadgarantia'];

	$responsablemantenimiento=$_POST['responsablemantenimiento'];
	$estadoequipo=$_POST['estadoequipo'];
	$acreditacion=$_POST['acreditacion'];

	$alto=$_POST['alto'];
	$largo=$_POST['largo'];
	$ancho=$_POST['ancho'];
	$distanciapiso=$_POST['distanciaalpiso'];
	$peso=$_POST['peso'];

	//echo $id,$nombreinstalacion,$sistema,$sistema,$equipo,$marca,$modelo,$codigo,$potencia,$unidadpotencia,$nombrefabricante,$versionsoftware,$nombreproveedor,$codigoproveedor,$unidad,$area,$recinto,$piso,$preciocompra,$fechainstalacion,$fechacaducidadgarantia,$responsablemantenimiento,$estadoequipo,$acreditacion,$alto,$largo,$ancho,$distanciapiso,$peso;

	$query="UPDATE instalaciones SET nombreinstalacion='$nombreinstalacion',sistema='$sistema',equipo='$equipo',marca='$marca',modelo='$modelo',codigo='$codigo',potencia='$potencia',unidadpotencia='$unidadpotencia',nombrefabricante='$nombrefabricante',versionsoftware='$versionsoftware',nombreproveedor='$nombreproveedor',codigoproveedor='$codigoproveedor',unidad='$unidad',area='$area',recinto='$recinto',piso='$piso',preciocompra='$preciocompra',fechainstalacion='$fechainstalacion',fechacaducidadgarantia='$fechacaducidadgarantia',responsablemantenimiento='$responsablemantenimiento',estadoequipo='$estadoequipo',acreditacion='$acreditacion',alto='$alto',largo='$largo',ancho='$ancho',distanciaalpiso='$distanciapiso',peso='$peso' WHERE idunica='$id'";
	  //No nombrar 2 veces la tabla en una sola consulta
	//echo $query;
	$resultado=$mysqli->query($query);
	echo $resultado;
?>