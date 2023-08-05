<?php
require_once "../conexion2.php";

$id = $_POST['id'];
$nombreUser = $_POST['nombreuser'];
$password = $_POST['passsuser'];
//$rolUser = $_POST['rolusu'];
$nombre = $_POST['nombrepersonal'];
$cargo = $_POST['cargopersonal'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "UPDATE usuarios SET  usuario = ?
                           , password = ?
                           , nombre = ?
                           , personal = ?
                           , cargo = ?
                           , telefono = ?
                           , correo = ?
         WHERE idusuario = ?";
$update = $con->prepare($sql);
$update->bind_param('sssssisi', $nombreUser, $password, $nombre, $cargo, $cargo, $telefono, $correo, $id);
$update->execute();
if($con->affected_rows){
    echo '<h1>Actualizacion de datos Correcta</h1>';
}else{
    echo '<h1>Error al actualizar datos</h1>';
}

header("refresh:1; url = ../administrar_usuarios.php");

