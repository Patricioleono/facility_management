<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_guarda_infraestructura.php'); ?>
<?php require('phpscripts/create_folder_guarda_infraestructura.php') ?>

<html>
	<head>

		<title>Guardar infraestructura</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Infraestructura Guardada</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar infraestructura</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			<a href="mdia.php">Regresar</a>
			
		</center>
	</body>
	</html>	