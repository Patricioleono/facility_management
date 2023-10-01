<?php
//SELECTOR TIPO DE EQUIPO EI ETC.
//SELECTOR DE ID STL - CONSULTA BDO PARA OBTENER IDENTIFICADORES
//SELECTOR CAJA O EQUIPO
//SUBIR N CANTIDAD DE STL
//SUBIR EXCEL E INSERTAR DATOS EN BDO LOS DATOS TIENEN QUE TENER COMO IDENTIFICADOR AL EQUIPO QUE CORRESPONDEN
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <link rel="stylesheet" href="css/css_mdi.css">
    <style type="text/css">
        @import "css/fondo.css";
        @import "css/jquery.dataTables.min.css";
    </style>
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/css_mdi.css">
    <title>Sistema Hospital</title>
</head>
<body>
<center>
    <h2>Carga Archivos Sistema</h2>
</center>

<form style="margin-top: 30px" action="carga_documentos/cargaMasivaStl.php" method="POST" enctype="multipart/form-data">
    <center style="margin: 12px">Carga Estructuras Bases</center>
    <center><input type="file" name="archivo[]" multiple></center>
    <center><input style="width:auto; margin-top: 10px" type="submit" class="button2" name="Confirmar" value="Subir Documento" /></center>

</form>

</body>
</html>
