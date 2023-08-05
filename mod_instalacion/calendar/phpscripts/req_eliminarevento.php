<?php 
	
	require('../../conexion.php');
	$id=$_GET['id'];
    $day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];
	$fecha = $year."-".$month."-".$day;
	$query1="DELETE FROM eventcalenderinstalaciones WHERE idequipo='$id' AND eventDate='$fecha'";
    $resultado=$mysqli->query($query1);
	
?>