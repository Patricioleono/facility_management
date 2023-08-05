<?php require('../phpscript/logigin.php'); ?>
<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from revestimientos WHERE idunicarevestimiento='$id'";
	$nombrerevestimiento=$_POST['nombrerevestimiento'];
	$query="UPDATE revestimientos SET nombrerevestimiento='$nombrerevestimiento' WHERE idunicarevestimiento='$id'";
	$resultado=$mysqli->query($query);
?>
<html>
	<head>

		<title>Modificar Revestimiento</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Revestimiento modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Revestimiento</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="estructura.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				