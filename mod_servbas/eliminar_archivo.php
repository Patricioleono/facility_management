<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	
	$id1=$_POST['id1'];
	$id2=$_POST['id2'];
	$query="DELETE FROM archivos_servbas WHERE nombre='$id1' AND idelem='$id2'";


	$resultado=$mysqli->query($query);
  

?>
<?php
	$dir= 'Documentos';
    $files=glob($dir."/".$id2."/".$id1);
	if (file_exists($dir."/".$id2."/".$id1)){
        foreach($files as $file){
           if(is_file($file))
           unlink($file);
}

}
?>
<?php header( "refresh:1;url='archivos.php?id=$id2'" ); ?>
<html>
	<head>

		<title>Eliminar Archivo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Ha eliminado un Archivo</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Archivo</h1>
				
			<?php	} ?>
			<p></p>		
			
			
			
		</center>
	</body>
</html>