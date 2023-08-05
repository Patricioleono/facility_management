<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	
	$idelemento=$_POST['id'];
	$query2="DELETE FROM componentes WHERE idcomponente='$idelemento'";
	$resultado=$mysqli->query($query2);
?>

<html>
	<head>

		<title>Eliminar Componente</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Componente Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Componente</h1>
				
			<?php	} ?>
			<p></p>		
			
			<a href="e_arquitectonicos.php">Regresar</a>
			
		</center>
	</body>
</html>