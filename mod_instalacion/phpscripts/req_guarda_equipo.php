<?php 
	
	require('../conexion.php');
	
	$nombreinstalacion=$_POST['nombreinstalacion'];
	$idunica=$_POST['idunica'];
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
	$distanciapiso=$_POST['distanciapiso'];
	$peso=$_POST['peso'];

	$enlace='http://www.bim.cl/BIM/hospital_calvo_mackenna/fichas/ficha_equipos_instalaciones.php?id='.$idunica;

	
	$query="INSERT INTO instalaciones(`idunica`, `nombreinstalacion`, `sistema`, `equipo`, `marca`, `modelo`, `codigo`, `potencia`, `unidadpotencia`, `nombrefabricante`, `versionsoftware`, `nombreproveedor`, `codigoproveedor`, `unidad`, `area`, `recinto`, `piso`, `preciocompra`, `fechainstalacion`, `fechacaducidadgarantia`, `responsablemantenimiento`, `estadoequipo`, `acreditacion`, `alto`, `largo`, `ancho`, `distanciaalpiso`, `peso`, `enlace`)  VALUES ('$idunica','$nombreinstalacion','$sistema','$equipo','$marca','$modelo','$codigo','$potencia','$unidadpotencia','$nombrefabricante','$versionsoftware','$nombreproveedor','$codigoproveedor','$unidad','$area','$recinto','$piso','$preciocompra','$fechainstalacion','$fechacaducidadgarantia','$responsablemantenimiento','$estadoequipo','$acreditacion','$alto','$largo','$ancho','$distanciapiso','$peso','$enlace');";
    $query1="INSERT INTO eventcalenderinstalaciones(idequipo) VALUES ('$idunica');";

	
	$resultado2=$mysqli->query($query1);
	$resultado=$mysqli->query($query);
?>