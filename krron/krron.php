<?php
require('conexion.php');

$calendario_inventariomed = "SELECT * FROM eventcalender WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario2 ="SELECT * FROM eventcalender2 WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario_estructura = "SELECT * FROM eventcalenderestructura WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario_instalaciones = "SELECT * FROM eventcalenderinstalaciones WHERE checkbox='0' AND eventDate != 'NULL'";
$calendario5 = "SELECT * FROM eventcalenderelementoarquitectonico WHERE checkbox='0' AND eventDate != 'NULL'";

$resultado_calendario_inventariomed=$mysqli->query($calendario_inventariomed);
$resultado_calendario2=$mysqli->query($calendario2);
$resultado_calendario_estructura=$mysqli->query($calendario_estructura);
$resultado_calendario_instalaciones=$mysqli->query($calendario_instalaciones);
$resultado_calendario5=$mysqli->query($calendario5);
?>
<?php
$today= date('Y-m-d');
$aviso_days = 5;
$today1= '2016-04-17';
$today2= '2016-04-18';

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
		 $email = 'frncdrt@gmail.com';//The email address the cron job will reach when successful.
		 $subject = 'Aviso de Mantencion';
  
 		$body = 'Estimado,';
 		$body .= "\r\n".'Se le notifica que el equipo médico "';
 		$body .=$raw;
 		$body .='" con ID "';
 		$body .=$id__inventariomed;
 		$body .= '" se le acerca una mantencion el día ';
 		$body .=$riw.'.';
 		$body .="\r\n"."\r\n".'Saludos cordiales';
 		$body .="\r\n".'Administrador de Bim';
 		$body .="\r\n".'http://www.bim.cl';
 		
 		$headers = 'From: Servicio Automático de Bim.cl <admin@bim6d.cl>' . $rn;
		


 mail($email,$subject,$body,$headers,"-femail.admin@bim6d.cl");
	}}
}
?>