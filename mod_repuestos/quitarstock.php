<?php 
require('../conexion.php'); 
require('../phpscript/logigin.php');
$id=$_POST['id'];
$stock1=$_POST['stock'];
$query="SELECT * FROM repuestos WHERE id='$id'";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
$cantidad=$row['cantidad']-$stock1;
$query1="UPDATE repuestos SET cantidad='$cantidad' WHERE id='$id'";
$resultado1=$mysqli->query($query1);
?>
<?php header( "refresh:1;url=mdr.php" ); ?>

<html>
	<head>

		<title>Actualizando repuesto...</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado1>0){
				?>
				
				<h1>Modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Ha ocurrido un error al Modificar</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			
			
		</center>
	</body>
</html>
