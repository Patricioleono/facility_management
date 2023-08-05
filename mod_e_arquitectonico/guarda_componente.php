<?php require('../phpscript/logigin.php'); ?>
<?php 
	$idelemento=$_GET['id'];
	require('phpscripts/req_mdia.php');
	$nombrecomponente=$_POST['nombrecomponente'];
	
	$query="INSERT INTO componentes_arquitectonicos (nombrecomponente, idunicacomponente) 
	VALUES ('$nombrecomponente','$idelemento')";
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>

		<title>Guardar Componente</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Componente Guardado Correctamente</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Componente</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			<a href="e_arquitectonicos.php">Regresar</a>
			
		</center>
	</body>
	</html>	