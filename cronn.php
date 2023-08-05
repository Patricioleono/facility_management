<?php
require('conexion.php');

$calendario_inventariomed = "SELECT * FROM eventcalender WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario2 ="SELECT * FROM eventcalender2 WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario_estructura = "SELECT * FROM eventcalenderestructura WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario_instalaciones = "SELECT * FROM eventcalenderinstalaciones WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario5 = "SELECT * FROM eventcalenderelementoarquitectonico WHERE checkbox='0' AND eventDate != 'NULL'";
$estadoequipo1 = "SELECT idunica, estadoequipo from equipos";

$resultado_calendario_inventariomed=$mysqli->query($calendario_inventariomed);
$resultado_calendario2=$mysqli->query($calendario2);
$resultado_calendario_estructura=$mysqli->query($calendario_estructura);
$resultado_calendario_instalaciones=$mysqli->query($calendario_instalaciones);
$resultado_calendario5=$mysqli->query($calendario5);
$resultado_estadoequipo1=$mysqli->query($estadoequipo1);
?>
<?php
$today= date('Y-m-d');
$aviso_days = 5;
$today1= '2016-04-17';
$today2= '2016-04-18';
function mail_test()
{
 $email = 'organn@gmail.com';//The email address the cron job will reach when successful.
 $subject = 'Aviso de Mantencion';
  
 $body = 'Estimado, Se le notifica que el instrumento medico X se le acerca una mantencion en X dias. Atte http://www.bim.cl';
 $domain = explode('www.',$_SERVER['SERVER_NAME']);
 $headers = 'From: Servicio Automatico de Bim.cl <fernandopalma@bim.cl>' . $rn;
 $headers .= 'Mime-Version: 1.0' . $rn;


 mail($email,$subject,$body,$headers,"-femail.fernandopalma@bim.cl");
}
?>
<?php
while($row=$resultado_calendario_inventariomed->fetch_assoc()){ 
	$riw=$row['eventDate'];
	$id__inventariomed=$row['idequipo'];
	$consulta_id__inventariomed="SELECT * FROM equipos WHERE idunica = '$id__inventariomed'";
	$resultado_consulta_id__inventariomed=$mysqli->query($consulta_id__inventariomed);
	$ruw=$resultado_consulta_id__inventariomed->fetch_assoc();
	$raw=$ruw['nombreequipo'];
	if($riw){
	$avisodate= date('Y-m-d', strtotime( "$today + $aviso_days days" ));
	if($avisodate == $riw){
		 $email = 'fernandopalma@bim.cl,patricio.marx@gmail.com';//The email address the cron job will reach when successful.
		 $subject = 'Aviso de Mantencion';
  
 		$body = 'Estimado,';
 		$body .= "\r\n".utf8_decode('Se le notifica que el equipo médico "');
 		$body .=$raw;
 		$body .=' con ID ';
 		$body .=$id__inventariomed;
 		$body .= '" se le acerca una mantencion el dia ';
 		$body .=$riw.'.';
 		$body .="\r\n"."\r\n".'Saludos cordiales';
 		$body .="\r\n".'Administrador de Bim';
 		$body .="\r\n".'http://www.bim.cl';
 		$domain = explode('www.',$_SERVER['SERVER_NAME']);
 		$headers = 'From: Servicio Automático de Bim.cl <fernandopalma@bim.cl>' . $rn;


 mail($email,$subject,utf8_encode($body),$headers,"-femail.fernandopalma@bim.cl");
	}}
}
?>