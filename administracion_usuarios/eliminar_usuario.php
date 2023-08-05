<?php
require_once "../conexion2.php";
$id = $_POST['id'];
$sql = "DELETE FROM usuarios WHERE idusuario = ?";

$delete = $con->prepare($sql);
$delete->bind_param('i', $id);
$delete->execute();

if($con->affected_rows){
    echo "<h1>Usuario Eliminado</h1>";
}else{
    echo "<h1>Error al eliminar Usuario</h1>";
}

header("refresh:1; url = ../administrar_usuarios.php");

