<?php 
	require('conexion.php');
	$year=$_POST['year'];
	$query="DELETE FROM presupuesto WHERE year='$year'";
	$resultado=$mysqli->query($query);
?>
<?php header( "refresh:1;url=presupuesto.php" ); ?>	
<html>
	<head>
		<title>Eliminar Presupuesto</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado Presupuesto</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Presupuesto</h1>
				
			<?php	} ?>
			<p></p>
		</center>
	</body>
</html>