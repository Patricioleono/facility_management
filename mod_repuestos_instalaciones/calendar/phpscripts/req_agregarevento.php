<?php
	require('../../conexion.php');
	$id=$_GET['id'];
	$day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];

	if(isset($_GET['v'])){
	
		$title = $_POST['txttiltle'];
		$detail = $_POST['txtdetail'];

		$eventdate = $year."-".$month."-".$day;

		$sqlinsert = "insert into eventcalender (Title,Detail,eventDate,dateAdded,idequipo,creacion) values ('".$title."','".$detail."','".$eventdate."',now(),'".$id."','1')";
		$resultado=$mysqli->query($sqlinsert);
		if($resultado){
			echo"Evento fue agregado satisfactoriamente";	
		}else{
			echo"Problemas con agregar evento";
		}
	} 

?>
