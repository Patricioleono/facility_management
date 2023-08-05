<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_mod_equipo.php'); ?>
<?php require('phpscripts/create_validar_imagen.php'); ?>
<?php header( "refresh:1;url=mdi.php" ); ?>

<html>
	<head>

		<title>Modificar equipo</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Equipo modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Equipo</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			
			
		</center>
	</body>
</html>
				
				