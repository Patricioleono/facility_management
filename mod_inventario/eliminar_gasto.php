<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	
	$id=$_POST['id'];
	$idd=$_POST['idd'];
	$query="DELETE FROM gastos_equipos WHERE id='$id'";


	$resultado=$mysqli->query($query);


?>
<?php header( "refresh:1;url='gastos.php?id=$idd'" ); ?>
<html>
	<head>

		<title>Eliminar equipo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado un Gasto</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar un Gasto</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>