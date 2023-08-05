<?php
session_start();
include_once "conexion2.php";

$destino = array();

$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$unidad=$_POST['unidad'];
$area=$_POST['area'];
$recinto=$_POST['recinto'];
$destino = $_POST['destino'];

if(!isset($_SESSION['userid'])){
  header('location: logout.php');
}

$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);
$correo=$row123['correo'];
$nombre =$row123['nombre'];
$destino .=", patricio.lyono@gmail.com, fernandopalma@bim.cl";

debug($destino);
$ult='<'.$correo.'>';

 		$body = 'Servicios generales,';
 		$body .= "\r\n".utf8_decode('Se le notifica el siguiente requerimiento de:');
 		$body .= "\r\n". $mensaje;
 		$body .=', en la unidad: ';
 		$body .=$unidad;
 		$body .=', dentro del area: ';
 		$body .=$area;
 		$body .=', en el recinto: ';
 		$body .=$recinto;
 		
 		$body .="\r\n"."\r\n".'Saludos cordiales,';
 		$body .= "\r\n";
 		$body .=$nombre;
 		
 		$domain = explode('www.',$_SERVER['SERVER_NAME']);
 		
$headers = 'From: '.$nombre.$ult;
mail($destino, $asunto,utf8_encode($body), $headers,'hola');
print_r($destino);
?>
<?php header( "refresh:2;url=correo_servicios.php" ); ?>
<html>
	<body>
	<h1>Notificación enviada a: <?=$destino;?></h1>
	</body>	
</html>