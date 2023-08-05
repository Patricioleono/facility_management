<?php 
	
	require('../../conexion.php');
	$id=$_GET['id'];
    $day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];
	$fecha = $year.'-'.$month.'-'.$day;
	$fechacambiada=$_POST['fechacambiada'];
	$query1="UPDATE eventcalender2 SET eventDate='$fechacambiada' WHERE idequipo='$id' and eventDate='".$year."-".$month."-".$day."'";
    $resultado=$mysqli->query($query1);
	
?>