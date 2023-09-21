<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	$id=$_GET['id'];
	$select1= "SELECT * from instalaciones WHERE id='$id'";
	
	$estadoequipo=$_POST['estadoequipo'];

	$query="UPDATE instalaciones SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	  //No nombrar 2 veces la tabla en una sola consulta
	
	$resultado=$mysqli->query($query);
	
?>
<?php header( "refresh:1;url=http://desarrollo.bim.cl/fichas/ficha_equipos_instalaciones.php?id=$id" ); ?>

<html>
	<head>

		<title>Modificar instalacion</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Instalcion modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Instalacion</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			
			
		</center>
	</body>
</html>
				
				