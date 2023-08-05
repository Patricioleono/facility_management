<?php
require_once "../conexion2.php";
$id = $_POST['id'];

$sql = "SELECT * FROM usuarios WHERE idusuario = $id ";
$result = $con->query($sql);

$data = $result->fetch_assoc();

?>


<html>
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
    </head>

    <body>
        <center>
            <h2>Editar Usuario</h2>
        </center>
        <form  method="POST" action="actualizar_usuario.php">
            <table width="30%" style="margin: 0 auto;">
                <tr>
                    <td colspan="1"><b>Nombre de Usuario:</b></td>
                    <td colspan="2"><input style="width:100%" id="inputs" type="text" name="nombreuser" size="25" placeholder="Ingresar Usuario" value="<?php echo $data['usuario']?>"/></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Contraseña:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="passsuser" placeholder="Ingresar Contraseña" value="<?php echo $data['password']?>"></td>
                </tr>
                <tr>
                    <td colspan="1"><b><label for="rol">Seleccionar Rol:</label></b></td>
                    <td colspan="1">
                        <select name="rolusu" id="rol">
                            <?php if ($data['tipousuario'] == 1){ ?>
                                <option value="1">Jefe Mantenimiento</option>
                            <?php }elseif($data['tipousuario'] == 1 && substr(strtolower($data['cargo']),0, 1) == 'j'){ ?>
                                <option value="2">Jefe de Piso</option>
                            <?php }else{ ?>
                                <option value="2">Personal General</option>
                            <?php }?>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Nombre:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="nombrepersonal" placeholder="Ingresar Nombre" value="<?php echo $data['nombre']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Cargo:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="cargopersonal" placeholder="Ingresar Cargo" value="<?php echo $data['personal']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Telefono:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="telefono" placeholder="Ingresar Telefono" value="<?php echo $data['telefono']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Correo:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="email" name="correo" placeholder="Ingresar Correo" value="<?php echo $data['correo']; ?>"></td>
                </tr>
                <input type="hidden" name="id" value="<?php echo $id;?>" />
            </table>
            <br>
            <center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Actualizar Datos" onclick="form.submit()"/></center>
        </form>
    </body>
</html>