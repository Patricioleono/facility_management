<?php
	require('../conexion.php');
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }else{
        $id=$_GET['id'];
    }
	$query="SELECT * FROM equipos WHERE idunica='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>