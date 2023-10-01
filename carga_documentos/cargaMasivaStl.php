<?php
$ruta = "../modelo3D/equipos/";
$archivoMovido = false;
if(isset($_FILES["archivo"])){
    $totalArchivos = count($_FILES["archivo"]["name"]);
    for($i = 0; $i < $totalArchivos; $i++){
        $ext = substr($_FILES['archivo']['name'][$i], strrpos($_FILES['archivo']['name'][$i], '.'));
        if($ext != '.stl'){
            echo "<script>alert('Solo se pueden subir archivos STL')</script>";
            $archivoMovido = false;
        }else{
            move_uploaded_file($_FILES["archivo"]["tmp_name"][$i], $ruta.$_FILES["archivo"]["name"][$i]);
            $archivoMovido = true;
        }
    }
}
?>

   <?php header( "refresh:1;url='../cargaArchivos.php'" ); ?>
<html>
	<head>

		<title>Carga Masiva</title>
	</head>

	<body>
		<center>
			<?php
				if($archivoMovido){
				?>

				<h1>Se Ingresaron con Exito los Archivos al Servidor</h1>

				<?php 	}else{ ?>

				<h1>Error al ingresar Archivos al Servidor</h1>

			<?php	} ?>
			<p></p>



		</center>
	</body>
</html>

