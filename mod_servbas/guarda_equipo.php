<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_guarda_equipo.php'); ?>
<?php require('phpscripts/create_folder_guarda_equipo.php'); ?>
<?php header( "refresh:1;url=mdsb.php" ); ?>


<html>
	<head>

		<title>Guardar Artefacto</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Artefacto Guardado</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Artefacto</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			
			
		</center>
	</body>
	</html>	