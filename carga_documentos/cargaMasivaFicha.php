

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <link rel="stylesheet" href="css/css_mdi.css">
    <style type="text/css">
        @import "../css/fondo.css";
        @import "../css/jquery.dataTables.min.css";
    </style>
    <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/css_mdi.css">
    <title>Sistema Hospital</title>
</head>
<body>
<center>
    <h2>Carga Masiva de Fichas</h2>
</center>

<form style="margin-top: 30px" action="procesarDocumento.php" method="POST" enctype="multipart/form-data">
    <center style="margin: 12px">Cargar Excel</center>
    <center><input type="file" name="archivo"></center>
    <center><input style="width:auto; margin-top: 10px" type="submit" class="button2" name="Confirmar" value="Subir Documento" /></center>
    <center><a style="width:auto; margin-top: 10px" type="submit" href="../plantillas/planillaBase.xlsx" class="button2" download="planillaBase.xlsx" />Descargar Plantilla para Llenar</a></center>

</form>

</body>
</html>
