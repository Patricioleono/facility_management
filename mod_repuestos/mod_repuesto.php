<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_mod_repuestos.php'); ?>
<?php require('phpscripts/create_folder_validar_imagen.php'); ?>
<?php header( "refresh:3;url=mdr.php" ); ?>

<html>
	<head>
		<title>Modificar Repuestos</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Repuesto modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Repuesto</h1>
				
			<?php	} ?>
			
			<p></p>	
			
		
			
		</center>
	</body>
</html>
				
				