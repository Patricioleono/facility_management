<?php
session_start(); 
include_once "conexion1.php";
//include_once "conexion2.php";
if(!isset($_SESSION['userid']))
{
  header('location: logout.php'); 
}
$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);

$tipousuario=$row123['tipousuario'];
$nombre=$row123['nombre'];
$personal=$row123['personal'];
$cargo=$row123['cargo'];
$correo=$row123['correo'];

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">


</head>
<body>
<br>
<br>
<center><h1>Bienvenido</h1></center>
<br>
<br>
<table style="width:50%;  margin:auto;" cellspacing="10px">
  <tr>
    <td>Nombre:</td>
    <td><?php echo utf8_encode(ucfirst($nombre)) ?></td>
  </tr>
  <tr>
    <td>Personal:</td>
    <td><?php echo utf8_encode(ucfirst($personal)) ?></td>
  </tr>
  <tr>
    <td>Cargo:</td>
    <td><?php echo utf8_encode(ucfirst($cargo)) ?></td>
  </tr>
  <tr>
    <td>Recinto:</td>
    <td>Hospital</td>
  </tr>
  <tr>
      <td>Correo:</td>
      <td><?php echo $correo;?></td>
  </tr>
</table>

</body>
</html>