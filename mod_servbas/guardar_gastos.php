<?php require('../phpscript/logigin.php'); ?>
<?php	
	require('../conexion.php');
	$id=$_POST['id'];
	$nombre_gasto=$_POST['nombre_gasto'];
	$gastos=$_POST['gastos'];
	$fecha=$_POST['fecha'];
	$descripcion=$_POST['descripcion'];
	$query="INSERT INTO gastos_servbas (id_elemento,nombre_gasto,gastos,fecha,descripcion) 
	VALUES ('$id','$nombre_gasto','$gastos','$fecha','$descripcion')";
	$resultado=$mysqli->query($query);

?>
<?php header( "refresh:1;url=gastos.php?id=$id" ); ?>	
<html>
	<head>
	
		<title>Guardar Gasto</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Gasto Guardado</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error Guardar Gasto</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			
		</center>
	</body>
	</html>	