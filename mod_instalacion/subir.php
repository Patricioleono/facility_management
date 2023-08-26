<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_subir_archivo.php'); ?>
<?php header( "refresh:3;url='archivos.php?id=$id'" ); ?>


<html>
	<head>

		<title>Guardar Archivo</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado3){ ?>
                <h1>Archivo Subido</h1>

			<?php }else{ ?>
                <h1>Error al Subir Archivo/Verifique que existe Archivo</h1>

			<?php } ?>

		</center>
	</body>
	</html>	
	