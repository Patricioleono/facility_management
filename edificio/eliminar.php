<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	$query="DELETE FROM edificio WHERE id='$id'";


	$resultado=$mysqli->query($query);


?>
<?php header( "refresh:3;url=piso.php" ); ?>
<html>
	<head>
		<title>Eliminar equipo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado un piso</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar un piso</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>

