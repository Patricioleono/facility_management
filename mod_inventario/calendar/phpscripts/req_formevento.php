<?php
require('../../conexion.php');
	$id=$_GET['id'];
	$day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];
	$query="select checkbox FROM eventcalender where eventDate='".$year."-".$month."-".$day."' and idequipo='".$id."'";
	$ids="SELECT idequipo FROM eventcalender WHERE idequipo='$id'";
	$resultado=$mysqli->query($query);
	$resultada=$mysqli->query($ids);
	$row=$resultado->fetch_assoc();
	$raw=$resultada->fetch_assoc();
	$sqlEvent = "select * from eventcalender where eventDate='".$year."-".$month."-".$day."' and idequipo='".$id."'";
	$resultEvents = $mysqli->query($sqlEvent);
	$riw=$resultEvents->fetch_assoc();
?>