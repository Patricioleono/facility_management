<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	
	$idelemento=$_POST['id'];
	$query="DELETE FROM elemento_arquitectonico WHERE idunicaelemento='$idelemento'";
	$query2="DELETE FROM componentes_arquitectonicos WHERE idunicacomponente='$idelemento'";
	$query3="DELETE FROM revestimientos_arquitectonicos WHERE idunicarevestimiento='$idelemento'";
	$query1="DELETE FROM eventcalenderelementoarquitectonico WHERE idequipo='$idelemento'";

	$resultado=$mysqli->query($query);
	$resultado2=$mysqli->query($query2);
	$resultado3=$mysqli->query($query3);
    $resultado1=$mysqli->query($query1);






	$dir='estructuras';
    $files=glob($dir."/".$idelemento."\*");
	if (file_exists("$idelemento")){
        foreach($files as $file){
           if(is_file($file))
           unlink($file);
}
rmdir($dir."/".$idelemento);
}
?>
<?php header( "refresh:1;url=e_arquitectonicos.php" ); ?>
<html>
	<head>

		<title>Eliminar Elemento</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Elemento Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Elemento</h1>
				
			<?php	} ?>
			<p></p>		
			

			
		</center>
	</body>
</html>