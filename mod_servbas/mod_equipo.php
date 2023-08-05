<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_mod_equipo.php'); ?>
<?php require('phpscripts/create_validar_imagen.php'); ?>
<?php header( "refresh:1;url=mdsb.php" ); ?>

<html>
	<head>

		<title>Modificar Artefacto</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Artefacto modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Artefacto</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			
			
		</center>
	</body>
</html>
				
				