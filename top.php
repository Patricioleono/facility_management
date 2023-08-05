<?php
session_start();
//include_once "conexion1.php";
include_once "conexion2.php";
if(isset($_SESSION['userid']))
{
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
	<style>
body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #ffffff 
	}
</style>
	
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/fontello.css">

<body>
<header class="cabecera">
	<div class="cuerpo">
		<div class="mmenu">
		<div class="logo">
			<img src="images/oms3.png" align="left"></div></div>
		<div class="bim">
			<img src="images/bim.png" align="right"></div>
		<div class="headline">
		<nav class="menu">
			<ul>
<?php
				echo '<li><a href="index.php" target="_top"><i class="icon-off"> Cerrar Sesion </i></a></li>';
        }
else
{
  echo 'Sin conexion';
  header('location: logout.php'); 
}

?>
			</ul>
		</nav>
	</div>


</body>
</html>

