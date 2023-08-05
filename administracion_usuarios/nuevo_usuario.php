<?php
require_once "../conexion2.php";
if(isset($_POST['correo'])){
    
    $nombreUser = $_POST['nombreuser'];
    $newPass = $_POST['passsuser'];
    $rol = $_POST['rolusu'];
    $nombre = $_POST['nombrepersonal'];
    $cargo = $_POST['cargopersonal'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO usuarios(usuario, password, tipousuario, nombre, cargo, personal, telefono, correo) VALUES (?,?,?,?,?,?,?,?)";

    $update = $con->prepare($sql);
    $update->bind_param('ssisssis', $nombreUser, $newPass, $rol, $nombre, $cargo, $cargo, $telefono, $correo);
    $update->execute();
    if($con->affected_rows){
        echo "<h1>Usuario Creado con Exito</h1>";
        header("refresh:1; url = ../administrar_usuarios.php");

    }else{
        echo "<h1>Error al Crear Usuario</h1>";
        header("refresh:1; url = ../administrar_usuarios.php");

    }
}else{
    echo "<h1>Correo no puede estar Vacio</h1>";
    header("refresh:1; url = ../administrar_usuarios.php");
}

?>

