<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_guarda_repuesto.php'); ?>
<?php require('phpscripts/create_folder_guardar_repuesto.php'); ?>
<?php header( "refresh:3;url=mdr.php" ); ?>

<html>
	<head>

		<title>Guardar Repuesto</title>
	</head>
	<body>
		<center>	
			<?php if($resultado>0){ ?>
				<h1>Repuesto Guardado</h1>
			<?php } else { ?>
				<h1>Error al Guardar Repuesto</h1>		
			<?php } ?>		
			
			<p></p>	
			
		</center>
	</body>
	</html>	