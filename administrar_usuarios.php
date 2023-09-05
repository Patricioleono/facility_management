<?php
    require_once "conexion2.php";
    $sql = "SELECT nombre, personal, telefono, correo, idusuario FROM usuarios ORDER BY idusuario DESC";
    $result = $con->query($sql);

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
            <h2>Creacion Usuario Nuevo</h2>
        </center>
        <form  method="POST" action="administracion_usuarios/nuevo_usuario.php">
            <table width="30%" style="margin: 0 auto;">
                <tr>
                    <td colspan="1"><b>Nombre de Usuario:</b></td>
                    <td colspan="2"><input style="width:100%" id="input" type="text" name="nombreuser" placeholder="Ingresar Usuario"/></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Contraseña:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="password" name="passsuser" placeholder="Ingresar Contraseña"></td>
                </tr>
                <tr>
                    <td colspan="1"><b><label for="rol">Seleccionar Rol:</label></b></td>
                    <td colspan="1">
                        <select name="rolusu" id="rol">
                            <option value='1'>Administrador</option>
                            <option value='2'>Visita</option>
                            <option value='3'>Usuario General</option>
                            <option value='4'>Entes Fiscalizadores</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="1"><b>Nombre:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="nombrepersonal" placeholder="Ingresar Nombre"></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Cargo:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="cargopersonal" placeholder="Ingresar Cargo"></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Telefono:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="text" name="telefono" placeholder="Ingresar Telefono"></td>
                </tr>
                <tr>
                    <td colspan="1"><b>Correo:</b></td>
                    <td colspan="1"><input style="width:100%" id="input" type="email" name="correo" placeholder="Ingresar Correo"></td>
                </tr>

            </table>
            <br>
            <center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Ingresar Nuevo Usuario" /></center>
        </form>

        <center><h1>Listado Usuarios</h1></center>
        <table  class="display" id="tableUsuarios" width="90%">
            <thead>

            <tr>
                <th><center>Nombre</center></th>
                <th><center>Cargo</center></th>
                <th><center>Telefono</center></th>
                <th><center>Correo</center></th>
                <th><center>Acciones</center></th>
            </tr>

            </thead>
            <tbody>
            <?php
                $row = $result->fetch_all();
                for($i = 0; $i < count($row); $i++){
                    $idAcciones = $row[$i][4];
                    echo '<tr>';
                    echo '<td><center>'.ucfirst($row[$i][0]).'</center></td>';
                    echo '<td><center>'.ucfirst($row[$i][1]).'</center></td>';
                    echo '<td><center>'.$row[$i][2].'</center></td>';
                    echo '<td><center>'.$row[$i][3].'</center></td>';
                    echo "<td width='25px'>
                            <center>
                                <form method='POST' action='administracion_usuarios/editar_usuario.php'>
                                  <input type='hidden' name='id' value='$idAcciones' />
                                  <button type='button' value='Enviar' title='Editar' onclick='form.submit()'><img width='20px' height='20px' src='images/editar.png'></button>
                                </form>
                              </center>
                              <center>
                                <form method='POST' action='administracion_usuarios/eliminar_usuario.php'>
                                  <input type='hidden' name='id' value=' $idAcciones '/>
                                  <button type='button' value='Enviar' title='Eliminar' onclick='form.submit()'><img width='20px' height='20px' src='images/eliminar.png'></button>
                                </form>
                              </center>  
                          </td>";
                    echo '</tr>';

                }
            ?>

            </tbody>

            <script>
                $(document).ready(function(){
                    $('#tableUsuarios').DataTable();
                })
            </script>
    </body>
</html>