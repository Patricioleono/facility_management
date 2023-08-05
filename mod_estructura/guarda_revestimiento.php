<?php require('../phpscript/logigin.php'); ?>
<?php 
	$idelemento=$_GET['id'];
	require('phpscripts/req_mdia.php');
	$nombrerevestimiento=$_POST['nombrerevestimiento'];
	
	$query="INSERT INTO revestimientos (nombrerevestimiento, idunicarevestimiento) 
	VALUES ('$nombrerevestimiento','$idelemento')";
	$resultado=$mysqli->query($query);
	
?>


<html>
	<head>
		<title>Guardar Revestimiento</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Revestimiento Guardada Correctamente</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Revestimiento</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			<a href="estructura.php">Regresar</a>
			
		</center>
	</body>
	</html>	