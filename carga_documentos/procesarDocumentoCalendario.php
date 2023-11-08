<?php
require "../conexion2.php";
require "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\Date;

$rutaArchivoCargado = $_FILES['calendario']['tmp_name'];
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($rutaArchivoCargado);
$dataFichaMasiva = $spreadsheet->getSheet(1);

$datosAinsertar = array();
$result;

$highestRow = $dataFichaMasiva->getHighestDataRow();
    for ($row = 2; $row <= $highestRow; $row++) {
        if($dataFichaMasiva->getCell("A$row")->getValue() != null){
            array_push($datosAinsertar,
                [
                     $dataFichaMasiva->getCell("A1")->getValue() => $dataFichaMasiva->getCell("A$row")->getValue()
                    ,$dataFichaMasiva->getCell("B1")->getValue() => $dataFichaMasiva->getCell("B$row")->getValue()
                    ,$dataFichaMasiva->getCell("C1")->getValue() => $dataFichaMasiva->getCell("C$row")->getValue()
                    ,$dataFichaMasiva->getCell("D1")->getValue() => date( "Y-m-d", Date::excelToTimestamp($dataFichaMasiva->getCell("D$row")->getValue()))
                    ,$dataFichaMasiva->getCell("E1")->getValue() => $dataFichaMasiva->getCell("E$row")->getValue()
                ] );
        }else{
            break;
        }
    }

    $fechaAnualSegmetos;
    foreach($datosAinsertar as $data) {
        $tag = $data['Tag'];
        $descripcion = $data['Descripcion Operacion General'];
        $temporalidad = strtolower($data['Temporalidad']);
        $fecha = $data['Fecha Inicio Mantencion'];
        $duracion = $data['Duracion Equipo'];

        if($temporalidad == 'anual'){
            $arrayFecha = explode("-", $fecha);
            $newFecha = $arrayFecha[0];

            for($i = 0; $i <= $duracion; $i++) {
                $newFecha = ($newFecha + 1);
                $juntarArray = implode('', $arrayFecha);
                $fechaSinAnio = substr($juntarArray, 4, 4);
                $fechaFinal = new DateTime($newFecha.$fechaSinAnio);
                $fechaCompuesta = $fechaFinal->format('Y-m-d');
                $fechaSubidaExcel = date('Y-m-d');


             $sql ="INSERT INTO eventcalenderinstalaciones(idequipo, Title, Detail, eventDate, dateAdded, temporalidad) VALUES('$tag', '$descripcion', '$descripcion', '$fechaCompuesta', '$fechaSubidaExcel', '$temporalidad')";
             $result = $con->query($sql);
            }

            $sql ="SELECT eventDate FROM eventcalenderinstalaciones WHERE temporalidad = 'anual' ORDER BY ID DESC LIMIT 1";
            $queryFechaUnica = $con->query($sql);
            $fechaFinalAnual = $queryFechaUnica->fetch_assoc();
            $fechaAnualSegmetos = explode("-", $fechaFinalAnual['eventDate']);

        }elseif ($temporalidad == 'semestral'){
            $arrayFecha = explode("-", $fecha);
            $newDia = $arrayFecha[2];
            $newMes = $arrayFecha[1];
            $newYear = $arrayFecha[0];

            for($i = 0; $newYear < $fechaAnualSegmetos[0]; $i++) {
                $newMes = ($newMes + 6);
                $fechaSubidaExcel = date('Y-m-d');

                if ($newMes > 12) {
                    $newMes = ($newMes - 12);
                    $newYear = ($newYear + 1);
                }

                $fechaFinal = (count($newMes) < 2 ? '0'.$newMes : $newMes);
                $fechaPartes = $newDia.'-'.$newMes.'-'.$newYear;
                $fechaCompuesta = new DateTime($fechaPartes);
                $fechaFormato = $fechaCompuesta->format('Y-m-d');


                $sql = "INSERT INTO eventcalenderinstalaciones(idequipo, Title, Detail, eventDate, dateAdded, temporalidad) VALUES('$tag', '$descripcion', '$descripcion', '$fechaFormato', '$fechaSubidaExcel', '$temporalidad')";
                $result = $con->query($sql);
            }

        }elseif ($temporalidad == 'trimestral'){
            $arrayFecha = explode("-", $fecha);
            $newDia = $arrayFecha[2];
            $newMes = $arrayFecha[1];
            $newYear = $arrayFecha[0];

            for($i = 0; $newYear < $fechaAnualSegmetos[0]; $i++){
                $newMes = ($newMes + 3);
                $fechaSubidaExcel = date('Y-m-d');

                if ($newMes > 12){
                    $newMes = ($newMes - 12);
                    $newYear = ($newYear + 1);
                }

                $fechaFinal = (count($newMes) < 2 ? '0'.$newMes: $newMes);
                $fechaPartes = $newDia.'-'.$newMes.'-'.$newYear;
                $fechaCompuesta = new DateTime($fechaPartes);
                $fechaFormato = $fechaCompuesta->format('Y-m-d');


                $sql = "INSERT INTO eventcalenderinstalaciones(idequipo, Title, Detail, eventDate, dateAdded, temporalidad) VALUES('$tag', '$descripcion', '$descripcion', '$fechaFormato', '$fechaSubidaExcel', '$temporalidad')";
                $result = $con->query($sql);
            }
        }
    }
    ?>
   <?php //header( "refresh:3;url='../cargarArchivos.php'" ); ?>
<html>
	<head>

		<title>Carga Masiva</title>
	</head>

	<body>
		<center>
			<?php
				if($result){
				?>

				<h1>Se Ingresaron las fichas del excel</h1>

				<?php 	}else{ ?>

				<h1>Error al ingresar fichas, revise documento</h1>

			<?php 	} ?>
			<p></p>



		</center>
	</body>
</html>

