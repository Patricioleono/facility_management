<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_eliminar.php'); ?>
<?php require('phpscripts/create_folder_eliminar.php'); ?>
<?php header( "refresh:3;url=mdins.php" ); ?>
<html>
	<head>
   		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Eliminar Instalación</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado una Instalación</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar una Instalación</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>