<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	$query="DELETE FROM edificio_sec WHERE idsector='$id'";


	$resultado=$mysqli->query($query);


?>
<?php header( "refresh:1;url=piso.php" ); ?>
<html>
	<head>
		<title>Eliminar equipo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado un sector</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar un sector</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>