<?php 
	require('../conexion.php');

	$estadoequipo=$_GET['estado'];
	$id=$_GET['id'];
	$id2 = substr($id, 0,2);

if ($id2=='EM'){
	$query="UPDATE equipos SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
}
	if($id2=='CL'){
	$query="UPDATE instalaciones SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
}
	if($id2=='AS'){
	$query="UPDATE instalaciones SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
}
if($id2=='AR'){
	$query="UPDATE servbas SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
}
if($id2=='AL'){
	$query="UPDATE instalaciones SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
}
if($id2=='EI'){
	$query="UPDATE instalaciones SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
}

?>
