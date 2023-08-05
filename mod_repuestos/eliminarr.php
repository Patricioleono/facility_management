<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_eliminarr.php'); ?>
<?php require('phpscripts/create_folder_eliminar_repuesto.php'); ?>
<?php header( "refresh:3;url=mdr.php" ); ?>

<html>
	<head>

		<title>Eliminar Repuesto</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Repuesto Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Repuesto</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>