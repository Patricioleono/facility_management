<?php 
	
	require('../../conexion.php');
	$id=$_GET['id'];
    $day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];
	$fecha = $year.'-'.$month.'-'.$day;
	$query1="SELECT * FROM eventcalender2 WHERE idequipo='$id' and eventDate='$fecha'";
    $resultado=$mysqli->query($query1);
	
?>