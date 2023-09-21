<?php
include_once "conexion2.php";
$sql = "SELECT id, idunica FROM equipos
        UNION ALL
        SELECT id, idunica FROM instalaciones";
$data = $con->query($sql);
$result = $data->fetch_all();
//SELECTOR TIPO DE EQUIPO EI ETC.
//SELECTOR DE ID STL - CONSULTA BDO PARA OBTENER IDENTIFICADORES
//SELECTOR CAJA O EQUIPO
//SUBIR N CANTIDAD DE STL
//SUBIR EXCEL E INSERTAR DATOS EN BDO LOS DATOS TIENEN QUE TENER COMO IDENTIFICADOR AL EQUIPO QUE CORRESPONDEN


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sistema Hospital</title>
</head>
<body>
<div class="row">
    <div class="col-12">
        <h4>Cargar de Equipos</h4>
    </div>
</div>
<div class="row">
    <div class="col-4 mt-1">
        <select class="form-select" aria-label="Default select example" id="seleccionarTipoCarga">
            <option selected>Elija Tipo de Equipo</option>
            <option value="EA">Elemetos Arquitectonicos</option>
            <option value="EE">Elementos Estructurales</option>
            <option value="EM">Equipos Medicos</option>
            <option value="EI">Equipos Industriales</option>
            <option value="CAJA">Caja Fantasma</option>
        </select>
        <br />
        <br />
        <br />

        <h4>Cargar Calendario para el Equipo:</h4>
        <?php
        $select = '<select class="form-select" aria-label="Default select example"> ';
        $select .= '<option selected>Elija Un Equipo</option>';
        for($i = 0; $i < count($result); $i++){
            $select .= '<option value="'. $result[$i][0].'">'.$result[$i][1].'</option>';
        }
        $select .= '</select>';
        echo $select;
        ?>
        <div class="input-group mb-3 mt-1">
            <span class="input-group-text" id="inputGroup-sizing-default">Ingrese Fecha de Inicio Calendarizacion</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <br />
        <br />


        <h4>Carga Excel Masivo Ficha Equipos</h4>
        <div class="input-group" style="margin-top: 12px">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="cargaExcelFicha">
            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Cargar Excel</button>
        </div>


    </div>
    <div class="col-4 mt-1">
        <form id="cargaMasivaFile" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="file" id="masivaFile" name="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple>
                <button class="btn btn-outline-secondary" type="submit" id="cargaMasivaEquipos"">Cargar Archivos</button>
            </div>
        </form>

        <br />
        <br />
        <br />
        <br />

        <div class="input-group" style="margin-top: 12px">
            <input type="file" class="form-control" id="cargaExcelCalendario" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Cargar Calendario</button>
        </div>
        <br />
        <br />
        <br />
        <br />

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $("form#cargaMasivaFile").submit(function (e) {
            e.preventDefault();
            let tipoCarga = $("#seleccionarTipoCarga").val();
            let archivoCargado = $("masivaFile").prop("files");
            console.log(archivoCargado)
            $.ajax({
                url: "cargarDocumentos/procesarArchivo.php",
                data: {tipoCarga: tipoCarga, archivo: archivoCargado},
                contentType: false,
                type: "POST",
                cache: false,
                processData: false,
                beforeSend: function(){

                },success: function(){

                },error: function(){

                }
            }).done(function (){

            });
        });



    });
























</script>
</body>
</html>
