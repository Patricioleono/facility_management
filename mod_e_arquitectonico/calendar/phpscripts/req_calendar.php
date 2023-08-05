<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname="bimdcl_hospitalprueba";
	$error = "Error de Conexion";
	if(isset($_GET["id"])){
		$ids=$_GET['id'];
	}else{
	$ids=$_POST['id'];
	}

	date_default_timezone_set('America/Santiago');
	$mysqli=mysql_connect($hostname,$username,$password) or die ($error);
	mysql_select_db($dbname) or die ($error);
	$idss= "SELECT idequipo FROM eventcalenderelementoarquitectonico WHERE idequipo=".$ids;
	$peticion = mysql_query ($idss,$mysqli);
	$row = mysql_fetch_array($peticion);
	

?>