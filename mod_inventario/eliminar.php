<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/create_folder_eliminar.php'); ?>
<?php require('phpscripts/req_eliminar.php'); ?>
<?php header( "refresh:3;url=mdi.php" ); ?>
<html>
	<head>

		<title>Eliminar equipo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado un equipo</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Equipo</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>