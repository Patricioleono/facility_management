<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	$id=$_GET['id'];
	$hola =substr($id, 0,2);

	if($hola=='EM'){
	$select1= "SELECT * from equipos WHERE id='$id'";
	$estadoequipo=$_POST['estadoequipo'];
	$query="UPDATE equipos SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
	}
	if($hola=='AR'){
	$select1= "SELECT * from servbas WHERE id='$id'";
	$estadoequipo=$_POST['estadoequipo'];
	$query="UPDATE servbas SET estadoequipo='$estadoequipo' WHERE idunica='$id'";
	$resultado=$mysqli->query($query);
	}

?>
<?php header( "refresh:1;url=http://www.bim.cl/BIM/hospital_calvo_mackenna/fichas/ficha_equipos_medicos.php?id=$id" ); ?>

<html>
	<head>

		<title>Modificar equipo</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Equipo modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Equipo</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			
			
		</center>
	</body>
</html>
				
				