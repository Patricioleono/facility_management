<?php require('req_mod_repuestos.php'); ?>


<?php
$dir= 'C:/xampp/htdocs/sistemaarreglado/mod_repuestos/modelo';
if(isset($_POST['Guardar'])){ 
opendir($dir); 
     
 }

 if(isset($_POST['Guardar'])){
			$nom = $_POST['id'];
			$ext = substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.'));
			$valor = $nom.$ext;
			if($ext=='.jpg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$nom."/".$valor);
			echo "<script>alert('El archivo ha sido cargado correctamente')</script>";
			$imagena = $nom."/".$valor;
			$query2="UPDATE repuestos SET imagen='$imagena' WHERE idunica='$nom'";
            $resultado3=$mysqli->query($query2);
			}
      else
      {
       echo "<script>alert('El archivo debe tener un formato .jpg')</script>";
      }
		}	
?>

<html>
	<head>
		<title>Modificar Repuestos</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Repuesto modificado exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Repuesto</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="mdr.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				