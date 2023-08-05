<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_eliminaria.php'); ?>
<?php require('phpscripts/create_folder_eliminaria.php'); ?>

<html>
	<head>
		<title>Eliminar infraestructura</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Infraestructura Eliminada</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Infraestructura</h1>
				
			<?php	} ?>
			<p></p>		
			
			<a href="mdia.php">Regresar</a>
			
		</center>
	</body>
</html>