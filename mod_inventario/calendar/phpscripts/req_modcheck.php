<?php
require('../../conexion.php');
$id=$_GET['id'];
$day=$_GET['day'];
$month=$_GET['month'];
$year=$_GET['year'];


$query="SELECT checkbox FROM eventcalender WHERE idequipo='$id'";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
$sqlEvent = "select * from eventcalender where eventDate='".$year."-".$month."-".$day."' and idequipo='".$id."'";
$resultEvents = $mysqli->query($sqlEvent);
$riw=$resultEvents->fetch_assoc();
if(isset($_GET['v'])){
	$checkbox=$_POST['checkbox'];
	$Detail=$_POST['Detail'];
	$Title=$_POST['Title'];
	$observaciones=$_POST['observaciones'];
        $costo=$_POST['costo'];
	$query1="UPDATE eventcalender SET checkbox='$checkbox',Detail='$Detail',Title='$Title',costo='$costo',observaciones='$observaciones' WHERE idequipo='$id' and eventDate='".$year."-".$month."-".$day."'";
	$resultado=$mysqli->query($query1);
	$query2="UPDATE equipos set estadoequipo='BUENO' where idunica='$id'";
	$resultado2=$mysqli->query($query2);

}else{}
?>