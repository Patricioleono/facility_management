<?php
	require('../../conexion.php');
	$id=$_GET['id'];
	$day=$_GET['day'];
	$month=$_GET['month'];
	$year=$_GET['year'];

	$dateToCompare=$year."-".$month."-".$day;
	$test="select * from eventcalender where eventDate = '".$dateToCompare."' and creacion !='0' and idequipo='".$id."'";
	$test1 = $mysqli-> query($test);
	$row=$test1->fetch_assoc();

	if($dateToCompare==$row["eventDate"]){
		header('Location: formevento.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'');
	
	}else{
		header('Location: agregarevento.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'');

	}
?>