<?php
require('../../conexion.php');
$id=$_GET['id'];
$day=$_GET['day'];
$month=$_GET['month'];
$year=$_GET['year'];
$checkbox=$_POST['checkbox'];
$query="UPDATE eventcalender SET checkbox='$checkbox'
WHERE idequipo='$id' and eventDate='".$year."-".$month."-".$day."'";
$resultado=$mysqli->query($query);
?>