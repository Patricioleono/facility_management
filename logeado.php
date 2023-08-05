<?php
session_start(); 
include_once "conexion1.php";
if(!isset($_SESSION['userid']))
{
	header('location: logout.php'); 
}
$idusuario=$_SESSION["userid"];
$rol = $_SESSION["rolusuario"];
$sql = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql);
$row1 = mysql_fetch_array($rec1);
$tipousuario=$row1['tipousuario'];
?>
<style type="text/css">
  body {
    font-family: Arial, Helvetica,
          Times, serif;
    color: purple;
    background-color: #E7FBFF; }
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
  <title>Sistema Hospital</title>
<frameset rows="153,*" framespacing=0 frameborder=no border=0>
<frame name="top" src="top.php" noresize scrolling="no" frameborder="0">
<frameset cols="250,*" framespacing=0 frameborder=no border=0> 
<frame name="menu" src="menu.php" noresize scrolling="auto" frameborder="0">
<frame name="centro" src="previa.php" scrolling="auto" frameborder="0">
</frameset> 
</frameset>