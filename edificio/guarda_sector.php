<?php 
	
	require('../conexion.php');
	
	$piso=$_POST['piso'];
	$sector=$_POST['sector'];
	$encargado=$_POST['encargado'];


	$query1="SELECT id,piso FROM edificio
	WHERE piso='$piso'";
	$resultado1=$mysqli->query($query1);

	$row=$resultado1->fetch_assoc();
	$id=$row['id'];	
	
	$query="INSERT INTO edificio_sec (piso,sector,id,encargado) 
	VALUES ('$piso','$sector','$id','$encargado')";


	

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
				<h1>Sector Guardado</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Sector</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
		
			
		</center>
	</body>
	</html>	