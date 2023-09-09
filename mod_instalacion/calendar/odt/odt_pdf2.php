<?php  
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	require('../../../fpdf/fpdf.php');
	require('../../../conexion2.php');
	setlocale(LC_CTYPE, 'es');
	$idelemento=$_POST['idelemento'];
	$idevento=$_POST['idevento'];
	$detalle=$_POST['detalle']; 
	$nombreusuario=$_POST['nombreusuario']; 
	$fecha_actual = date("d-m-Y");
	$ano_actual = date("Y");
	$fechax=$_POST['fechaxx'];
	$costo =$_POST['costox'];
	$detalle=$_POST['detalle'];
	$nombreequipo=$_POST['equipo'];
	$nombrefabricante=$_POST['nombrefabricante'];
	$mantenimiento=$_POST['mantenimiento'];
	$tipo_mantenimiento=$_POST['tipo_mantenimiento'];
	$responsablemantenimiento=$_POST['responsablemantenimiento'];
	$valor2="Orden_de_Trabajo".$idevento."-id_de_equipo".$idelemento.".pdf";
	$dir0="../../Documentos/";
	$dir="../../Documentos/".$idelemento."/".$valor2;
	$dir2="Documentos/".$idelemento."/".$valor2;
	$ext=".pdf";

	if($_POST['volver'] == 'Volver Atrás'){
		header("refresh:1;url=../../../logeado.php");
	}elseif ($_POST['volver'] == 'Crear y Descargar Orden de Trabajo'){

		$query1234="UPDATE instalaciones SET estadoequipo='EN MANTENCION' WHERE idunica='$idelemento'";
		$resultado1234=$con->query($query1234);


		//$query2="INSERT INTO archivos_equipos (idelem, nombre, ext, ruta) VALUES ('$idelemento','$valor2','$ext','$dir2')";
		//$resultado3=$mysqli->query($query2);
		if (file_exists($dir0."/".$idelemento)){

		}else {

			mkdir($dir0."/".$idelemento, 0777);
		}

		$query1="SELECT * FROM archivos_instalaciones WHERE nombre='$valor2'";
		$resultado1=$con->query($query1);
		$row1=$resultado1->fetch_assoc();
		$comprobacion=$row1['nombre'];
		if($comprobacion == NULL)
		{
			$query2="INSERT INTO archivos_instalaciones (idelem, nombre, ext, ruta) VALUES ('$idelemento','$valor2','$ext','$dir2')";
			$resultado3=$con->query($query2);
		}
		else {

		}


		$query="SELECT * FROM instalaciones WHERE idunica='$idelemento'";

		$resultado=$con->query($query);
		$row=$resultado->fetch_assoc();
		$modelo=$row['modelo'];
		$serie=$row['marca'];

		$ubicacion="Piso:".utf8_decode($row['piso'])."-Unidad:".utf8_encode($row['unidad']);
		$querydatosedificio="SELECT * FROM datosbasicos";
		$resultadoedificio=$con->query($querydatosedificio);
		$rowedificio=$resultadoedificio->fetch_assoc();
		$direccionedificio=$rowedificio['direccion'];
		$telefonoedificio=$rowedificio['telefono'];
		$nombreedificio=$rowedificio['nombre'];

        $queryMail = "SELECT correo FROM usuarios WHERE tipousuario = 3";
        $select = $con->query($queryMail);
        $allMail = '';
        $destiny = '';
        $message = '';

        while($result = $select->fetch_assoc()){
            $allMail .= $result['correo'].',';
        }
        $destiny = $allMail .= "soporte@bim.cl, fernandopalma@bim.cl";
        $from = "From:". "notificacionesBIM@bim.cl";
        $subjectMail = "NOTIFICACION ORDEN DE TRABAJO CREADA";
        $message .= "Orden creada por $nombreusuario ";
        $message .= "/n"." Se procede a trabajar en el equipo $nombreequipo";
        $message .= "/n"." Orden creda con fecha de $fecha_actual";
        $message .= "/n"." Saludos";

        mail($destiny, $subjectMail, $message, $from);

		$pdf = new FPDF('P','mm','Letter');
		$pdf -> AddPage();
		$pdf -> SetFont('Arial','B','24');
		$pdf->Image('logo1.png',10,10,35,10);
		$pdf -> Cell(195,10,'Orden de Trabajo',0,0,'C');

		$pdf ->Ln(15);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,utf8_decode('ORDEN Nº'),1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(80,5,$idevento,1);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(20,5,'HOSPITAL:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(65,5,$nombreedificio,1);
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,'DIRECCION:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(80,5,$direccionedificio,1);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(20,5,'TELEFONO:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(65,5,$telefonoedificio,1);
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,'DESCRIPCION:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(165,5,utf8_decode($detalle),1);
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,'EQUIPO:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(80,5,utf8_decode($nombreequipo),1);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(20,5,'ID EQUIPO:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(65,5,utf8_decode($serie),1);
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,'FABRICANTE:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(80,5,utf8_decode($nombrefabricante),1);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(20,5,'SERIE:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(65,5,utf8_decode($idelemento),1);
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,'MODELO:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(80,5,utf8_decode($modelo),1);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(20,5,'UBICACION:',1);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(65,5,utf8_decode($ubicacion),1);
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(97,5,'TIPO DE MANTENIMIENTO',1,0,'C');
		$pdf -> Cell(98,5,'MANTENIMIENTO',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(97,5,$tipo_mantenimiento,1,0,'C');
		$pdf -> Cell(98,5,$mantenimiento,1,0,'C');
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(97,5,'AUTORIZADA',1,0,'C');
		$pdf -> Cell(98,5,'SUPERVISOR DE EJECUCION',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(97,5,$nombreusuario,1,0,'C');
		$pdf -> Cell(98,5,$nombreusuario,1,0,'C');
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(97,5,'ENCARGADO DE MANTENIMIENTO',1,0,'C');
		$pdf -> Cell(98,5,'FECHA EMISION',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(97,5,$responsablemantenimiento,1,0,'C');
		$pdf -> Cell(98,5,$fecha_actual,1,0,'C');
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(97,5,'COSTO APROXIMADO',1,0,'C');
		$pdf -> Cell(98,5,'FECHA PROGRAMADA',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(97,5,$costo,1,0,'C');
		$pdf -> Cell(98,5,$fechax,1,0,'C');
		$pdf ->Ln(5);

		$pdf -> Cell(195,5,'',0,0,'C');
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(97,5,'FALLAS O AVERIAS PRESENTADAS',1,0,'C');
		$pdf -> Cell(98,5,'TRABAJOS SOLICITADOS',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> SetFont('Arial','','8');
		$pdf -> Cell(97,50,'',1,0,'C');
		$pdf -> Cell(98,50,'',1,0,'C');
		$pdf ->Ln(50);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(195,5,'REPUESTOS REQUERIDOS',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> Cell(49,5,utf8_decode('CODIGO'),1);
		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(49,5,'DESCRIPCION DEL REPUESTO',1);
		$pdf -> Cell(49,5,'CANT. PLANIF',1);
		$pdf -> Cell(48,5,'CANT. UTILIZADA',1);
		$pdf ->Ln(5);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(48,5,'',1);
		$pdf ->Ln(5);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(48,5,'',1);
		$pdf ->Ln(5);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(48,5,'',1);
		$pdf ->Ln(5);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(49,5,'',1);
		$pdf -> Cell(48,5,'',1);
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(195,5,'OBSERVACIONES',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> Cell(195,50,'',1,0,'C');
		$pdf ->Ln(50);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(30,5,'COSTO:',1);
		$pdf -> Cell(165,5,'',1);
		$pdf ->Ln(5);

		$pdf -> SetFont('Arial','B','8');
		$pdf -> Cell(195,5,'FINALIZACION DE TRABAJOS',1,0,'C');
		$pdf ->Ln(5);
		$pdf -> Cell(39,10,'REVISADO',1);
		$pdf -> Cell(39,10,'FECHA',1);
		$pdf -> Cell(39,10,'FIRMA ENCARGADO',1);
		$pdf -> Cell(39,10,'APROBADO',1);
		$pdf -> Cell(39,10,'FIRMA ENCARGADO',1);
		$pdf ->Ln(5);
		$pdf -> Cell(39,5,'',0);
		$pdf -> Cell(39,5,'',0);
		$pdf -> Cell(39,5,'HOSPITAL',0);
		$pdf -> Cell(39,5,'',0);
		$pdf -> Cell(39,5,'MANTENIMIENTO',0);
		$pdf ->Ln(5);
		$pdf -> Cell(39,8,'',1);
		$pdf -> Cell(39,8,'',1);
		$pdf -> Cell(39,8,'',1);
		$pdf -> Cell(39,8,'',1);
		$pdf -> Cell(39,8,'',1);

		$pdf ->Output($dir);
		$pdf ->Output($valor2,'D');
        /*
		$email = 'fernandopalma@bim.cl';//The email address the cron job will reach when successful.
		$subject = 'Aviso de Orden de Trabajo';
		$body = 'Estimado,';
		$body .= "\r\n".utf8_decode('Se le notifica que se a generado una Orden de Trabajo con número ');
		$body .=$idevento;
		$body .=' a cargo de ';
		$body .=$nombreusuario.'.';
		$body .="\r\n".'Para descargar la Orden de Trabajo, hacer click aca'."\r\n".'http://localhost/ACHS_LA/mod_instalacion/'.$dir2;
		$body .="\r\n"."\r\n".'Saludos cordiales';
		$body .="\r\n".'Administrador de Bim';
		$body .="\r\n".'http://www.bim.cl';
		$domain = explode('www.',$_SERVER['SERVER_NAME']);
		$headers = 'From: Servicio Automático de Bim.cl <fernandopalma@bim.cl>' . $rn;


		mail($email,$subject,utf8_encode($body),$headers,"fernandopalma@bim.cl");
        */
}

 echo "<h1>REDIRECCIONANDO NAVEGADOR</h1>";

