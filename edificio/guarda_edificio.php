<?php 
	
	require('../conexion.php');
	
	$piso=$_POST['piso'];
	
	
	$query="INSERT INTO edificio (piso) 
	VALUES ('$piso')";


	

	$resultado=$mysqli->query($query);
	
?>
<?php header( "refresh:1;url='piso.php'" ); ?>
<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Piso Guardado</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Piso</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			
		</center>
	</body>
	</html>	