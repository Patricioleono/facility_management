<?php
if (isset($_FILES['caja'])){
    $nombreArchivo = $_FILES['caja']['name'];
    $moverA = "../modelo3D/edificiostl/".$nombreArchivo;
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    $file = $_FILES['caja']['tmp_name'];

    if($extension != 'stl'){
        echo "<h1>solo puede cargar archivos con extension STL</h1>";
        header("refresh:3;url=index.php");

    }elseif (file_exists($moverA)){
        echo "<h1>Ya existe un archivo con ese nombre cargado</h1>";
        header("refresh:3;url=index.php");

    }else{
        move_uploaded_file($file, $moverA);
        echo "<h1>Archivo Cargado Con Exito</h1>";
        header("refresh:3;url=index.php");

    }
}