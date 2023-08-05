<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_mod_infraestructura.php'); ?>
<?php require('phpscripts/create_validar_imagen.php'); ?>

<html>
	<head>

		<title>Modificar infraestructura</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Infraestructura modificada exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar infraestructura</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="mdia.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				