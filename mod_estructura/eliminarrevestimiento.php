<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	
	$idelemento=$_POST['id'];
	$query3="DELETE FROM revestimientos WHERE idrevestimiento='$idelemento'";
	$resultado=$mysqli->query($query3);

?>

<html>
	<head>
		<title>Eliminar Revestimiento</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Revestimiento Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Revestimiento</h1>
				
			<?php	} ?>
			<p></p>		
			
			<a href="e_arquitectonicos.php">Regresar</a>
			
		</center>
	</body>
</html>