<?php
session_start();
require_once "../conexion1.php";

if(!isset($_SESSION['userid']))
{
echo"<script type='text/javascript'>
top.window.location = '../logout.php';
</script>";

}
$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);
$tipousuario=$row123['tipousuario'];

?>