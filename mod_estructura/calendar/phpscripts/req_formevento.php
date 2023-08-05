<?php
require('../../conexion.php');
	$id=$_GET['id'];
	$day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];
	$query="select checkbox FROM eventcalenderestructura where eventDate='".$year."-".$month."-".$day."' and idequipo='".$id."'";
	$ids="SELECT idequipo FROM eventcalenderestructura WHERE idequipo='$id'";
	$resultado=$mysqli->query($query);
	$resultada=$mysqli->query($ids);
	$row=$resultado->fetch_assoc();
	$raw=$resultada->fetch_assoc();
	$sqlEvent = "select * from eventcalenderestructura where eventDate='".$year."-".$month."-".$day."' and idequipo='".$id."'";
	$resultEvents = $mysqli->query($sqlEvent);
	$riw=$resultEvents->fetch_assoc();
?>