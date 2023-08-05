<?php require('../phpscript/logigin.php'); ?>
<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from revestimientos_arquitectonicos WHERE idunicarevestimiento='$id'";
	$nombrerevestimiento=$_POST['nombrerevestimiento'];
	$query="UPDATE revestimientos_arquitectonicos SET nombrerevestimiento='$nombrerevestimiento' WHERE idunicarevestimiento='$id'";
	$resultado=$mysqli->query($query);
?>
<?php header( "refresh:1;url=e_arquitectonicos.php" ); ?>
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
			

		</center>
	</body>
</html>
				
				