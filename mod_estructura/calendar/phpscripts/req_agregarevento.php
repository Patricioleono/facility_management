<?php
	require('../../conexion.php');
	$id=$_GET['id'];
	$day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];

	if(isset($_GET['v'])){
	
		$title = $_POST['txttiltle'];
		$detail = $_POST['txtdetail'];
		$costo = $_POST['costo'];
		$idusuario = $_POST['idusuario'];
		$eventdate = $year."-".$month."-".$day;
		$observaciones=$_POST['observaciones'];	
		$sqlinsert = "insert into eventcalenderestructura (Title,Detail,eventDate,dateAdded,idequipo,creacion,costo,usuario,observaciones) values ('".$title."','".$detail."','".$eventdate."',now(),'".$id."','1','".$costo."','".$idusuario."','".$observaciones."')";
		$resultado=$mysqli->query($sqlinsert);
		if($resultado){
			echo"Evento fue agregado satisfactoriamente";	
		}else{
			echo"Problemas con agregar evento";
		}
	} 

?>
