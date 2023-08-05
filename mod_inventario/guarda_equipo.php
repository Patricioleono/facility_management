<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_guarda_equipo.php'); ?>
<?php require('phpscripts/create_folder_guarda_equipo.php'); ?>
<?php header( "refresh:1;url=mdi.php" ); ?>


<html>
	<head>

		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Equipo Guardado</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Usuario</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			
			
		</center>
	</body>
	</html>	