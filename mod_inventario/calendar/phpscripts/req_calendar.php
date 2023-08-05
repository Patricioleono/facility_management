<?php 
	$hostname = "localhost:3306";
	$username = "root"; // "bimcl_calvo2017";
	$password = ""; // "bimcalvo2017";
	$dbname = "hospital"; //"bimcl_calvo_mackenna";
	$error = "Error de Conexion";

	if(isset($_GET["id"])){
		$ids=$_GET['id'];
	}else{
	$ids=$_POST['id'];
	}
	date_default_timezone_set('America/Santiago');
	$mysqli=mysql_connect($hostname, $username, $password ) or die ($error);
    //var_dump($mysqli);
	mysql_select_db($dbname) or die ($error);
	$idss="SELECT idunica FROM equipos WHERE id='$ids'";
	$peticion = mysql_query ($idss,$mysqli);
	$row = mysql_fetch_array($peticion);
?>