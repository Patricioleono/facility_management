<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargar Modelo Principal</title>
    <style type="text/css">
        @import "../css/jquery.dataTables.min.css";
    </style>
    <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/css_mdi.css">
</head>
<body>
    <center>
        <h1>Carga de Modulos Principales</h1>
    </center>
    <form  method="POST" action="nuevaCaja.php" enctype="multipart/form-data">
        <table width="30%" style="margin: 0 auto;">
            <tr>
                <td colspan="2"><b>Cargar Modelo:</b></td>
                <td colspan="2"><input style="width:100%" id="input" type="file" name="caja"/></td>
            </tr>

        </table>
        <br>
        <center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Agregar Modelo" /></center>
    </form>
</body>
</html>