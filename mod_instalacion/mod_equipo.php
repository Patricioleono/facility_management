<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_mod_equipo.php'); ?>
<?php require('phpscripts/create_validar_imagen.php'); ?>
<?php header( "refresh:1;url=mdins.php" ); ?>

<html>
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modificar Instalación</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Instalación modificada exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Instalación</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			
			
		</center>
	</body>
</html>
				
				