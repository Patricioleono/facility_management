<?php
require('../conexion.php');
$x = $_POST["x"];
$y = $_POST["y"];
$z = $_POST["z"];
$id = $_POST["id"];
$id2 = substr($id, 0,2);

if($id2=='EM'){
$query="UPDATE equipos SET x='$x',y='$y',z='$z' WHERE idunica='$id'";
$resultado=$mysqli->query($query);
}

if($id2=='CL'){
$query="UPDATE instalaciones SET x='$x',y='$y',z='$z' WHERE idunica='$id'";
$resultado=$mysqli->query($query);
}

if($id2=='AS'){
$query="UPDATE instalaciones SET x='$x',y='$y',z='$z' WHERE idunica='$id'";
$resultado=$mysqli->query($query);
}
if($id2=='AR'){
$query="UPDATE servbas SET x='$x',y='$y',z='$z' WHERE idunica='$id'";
$resultado=$mysqli->query($query);
}
if($id2=='AL'){
$query="UPDATE instalaciones SET x='$x',y='$y',z='$z' WHERE idunica='$id'";
$resultado=$mysqli->query($query);
}
if($id2=='EI'){
    $query="UPDATE instalaciones SET x='$x',y='$y',z='$z' WHERE idunica='$id'";
    $resultado=$mysqli->query($query);
    }

?>