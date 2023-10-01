<?php
require "../conexion2.php";
require "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$rutaArchivoCargado = $_FILES['archivo']['tmp_name'];
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($rutaArchivoCargado);
$dataFichaMasiva = $spreadsheet->getActiveSheet("fichaMasiva");
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
                    ,$dataFichaMasiva->getCell("D1")->getValue() => $dataFichaMasiva->getCell("D$row")->getValue()
                    ,$dataFichaMasiva->getCell("E1")->getValue() => $dataFichaMasiva->getCell("E$row")->getValue()
                    ,$dataFichaMasiva->getCell("F1")->getValue() => $dataFichaMasiva->getCell("F$row")->getValue()
                    ,$dataFichaMasiva->getCell("G1")->getValue() => $dataFichaMasiva->getCell("G$row")->getValue()
                    ,$dataFichaMasiva->getCell("H1")->getValue() => $dataFichaMasiva->getCell("H$row")->getValue()
                    ,$dataFichaMasiva->getCell("I1")->getValue() => $dataFichaMasiva->getCell("I$row")->getValue()
                    ,$dataFichaMasiva->getCell("J1")->getValue() => $dataFichaMasiva->getCell("J$row")->getValue()
                    ,$dataFichaMasiva->getCell("K1")->getValue() => $dataFichaMasiva->getCell("K$row")->getValue()
                    ,$dataFichaMasiva->getCell("L1")->getValue() => $dataFichaMasiva->getCell("L$row")->getValue()
                    ,$dataFichaMasiva->getCell("M1")->getValue() => $dataFichaMasiva->getCell("M$row")->getValue()
                    ,$dataFichaMasiva->getCell("N1")->getValue() => $dataFichaMasiva->getCell("N$row")->getValue()
                    ,$dataFichaMasiva->getCell("O1")->getValue() => $dataFichaMasiva->getCell("O$row")->getValue()
                    ,$dataFichaMasiva->getCell("P1")->getValue() => $dataFichaMasiva->getCell("P$row")->getValue()
                    ,$dataFichaMasiva->getCell("Q1")->getValue() => $dataFichaMasiva->getCell("Q$row")->getValue()
                    ,$dataFichaMasiva->getCell("R1")->getValue() => $dataFichaMasiva->getCell("R$row")->getValue()
                    ,$dataFichaMasiva->getCell("S1")->getValue() => $dataFichaMasiva->getCell("S$row")->getValue()
                    ,$dataFichaMasiva->getCell("T1")->getValue() => $dataFichaMasiva->getCell("T$row")->getValue()
                    ,$dataFichaMasiva->getCell("U1")->getValue() => $dataFichaMasiva->getCell("U$row")->getValue()
                    ,$dataFichaMasiva->getCell("V1")->getValue() => $dataFichaMasiva->getCell("V$row")->getValue()
                    ,$dataFichaMasiva->getCell("W1")->getValue() => $dataFichaMasiva->getCell("W$row")->getValue()
                    ,$dataFichaMasiva->getCell("X1")->getValue() => $dataFichaMasiva->getCell("X$row")->getValue()
                    ,$dataFichaMasiva->getCell("Y1")->getValue() => $dataFichaMasiva->getCell("Y$row")->getValue()
                    ,$dataFichaMasiva->getCell("Z1")->getValue() => $dataFichaMasiva->getCell("Z$row")->getValue()
                    ,$dataFichaMasiva->getCell("AA1")->getValue() => $dataFichaMasiva->getCell("AA$row")->getValue()
                    ,$dataFichaMasiva->getCell("AB1")->getValue() => $dataFichaMasiva->getCell("AB$row")->getValue()
                ]

            );
        }else{
            break;
        }
    }
    foreach($datosAinsertar as $data) {
        $idUnica = $data['Nombre Instalacion'];
        $nombreInstalacion = $data['ID Instalacion'];
        $sistema = $data['Sistema'];
        $equipo = $data['Equipo'];
        $marca = $data['Marca'];
        $modelo = $data['Modelo'];
        $codigo = $data['Codigo'];
        $potencia = $data['Potencia'];
        $unidadDePotencia = $data['Unidad de Potencia'];
        $nombreFabricante = $data['Nombre Fabricante'];
        $versionSoftware = $data['Version Software'];
        $nombreProveedor = $data['Nombre Proveedor'];
        $codigoProveedor = $data['Codigo Proveedor'];
        $unidad = $data['Unidad'];
        $area = $data['Area'];
        $recinto = $data['Recinto'];
        $piso = $data['Piso'];
        $precioCompra = $data['Precio Compra'];
        $fechaInstalacion = $data['Fecha Instalacion'];
        $fechaCaducidad = $data['Fecha Caducidad'];
        $responsableMantenimiento = $data['Responsable Mantenimiento'];
        $estadoEquipo = strtoupper($data['Estado del Equipo']);
        $acreditacion = $data['Acreditacion'];
        $alto = $data['Alto'];
        $largo = $data['Largo'];
        $ancho = $data['Ancho'];
        $distanciaAlPiso = $data['Distancia al Piso'];
        $peso = $data['Peso'];

        $sql = "INSERT INTO instalaciones(idunica, nombreinstalacion, sistema
                                               , equipo, marca, modelo
                                               , codigo, potencia, unidadpotencia
                                               , nombrefabricante, versionsoftware, nombreproveedor
                                               , codigoproveedor, unidad, area
                                               , recinto, piso, preciocompra
                                               , fechainstalacion, fechacaducidadgarantia, responsablemantenimiento
                                               , estadoequipo, acreditacion, alto
                                               , largo, ancho, distanciaalpiso
                                               , peso)
                                        VALUES('$idUnica', '$nombreInstalacion', '$sistema'
                                               , '$equipo', '$marca', '$modelo', '$codigo'
                                               , '$potencia', '$unidadDePotencia', '$nombreFabricante'
                                               , '$versionSoftware', '$nombreProveedor', '$codigoProveedor'
                                               , $unidad, '$area', '$recinto', '$piso'
                                               , '$precioCompra', '$fechaInstalacion', '$fechaCaducidad'
                                               , '$responsableMantenimiento', '$estadoEquipo', '$acreditacion'
                                               , '$alto', '$largo', '$ancho'
                                               , '$distanciaAlPiso', '$peso')";
        $result = $con->query($sql);

    }
    ?>
   <?php header( "refresh:1;url='cargaMasivaFicha.php'" ); ?>
<html>
	<head>

		<title>Carga Masiva</title>
	</head>

	<body>
		<center>
			<?php
				if($result>0){
				?>

				<h1>Se Ingresaron las fichas del excel</h1>

				<?php 	}else{ ?>

				<h1>Error al ingresar fichas, revise documento</h1>

			<?php	} ?>
			<p></p>



		</center>
	</body>
</html>

