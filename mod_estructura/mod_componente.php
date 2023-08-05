<?php require('../phpscript/logigin.php'); ?>
<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from componente WHERE idunicacomponente='$id'";
	$nombrecomponente=$_POST['nombrecomponente'];
	$query="UPDATE componentes SET nombrecomponente='$nombrecomponente' WHERE idunicacomponente='$id'";
	$resultado=$mysqli->query($query);
?>
<html>
	<head>
		<title>Modificar Componente</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Componente modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Componente</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="estructura.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				