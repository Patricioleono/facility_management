<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_eliminar.php'); ?>
<?php require('phpscripts/create_folder_eliminar.php'); ?>
<?php header( "refresh:3;url=mdsb.php" ); ?>
<html>
	<head>

		<title>Eliminar Artefacto</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado un Artefacto</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Artefacto</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>