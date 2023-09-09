<?php
require_once "../conexion2.php";
$id=$_GET['id'];
$destino = "";
$todosLosCorreos = "";
$sql = "SELECT correo FROM usuarios";
$select = $con->query($sql);

while($result = $select->fetch_assoc() ){
    $todosLosCorreos .= $result['correo'].",";
}
$destino = $todosLosCorreos .= "patricio.lyono@gmail.com";
$desde="From:". "bimcl";
$asunto="NOTIFICACION DE FALLO";
$mensaje="Se informa que ha fallado el equipo con ID ='$id'";
mail($destino, $asunto, $mensaje, $desde);

debug($destino);
?>