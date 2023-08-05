<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	$id=$_POST['id'];
	$select1= "SELECT * from elemento WHERE idunicaelemento='$id'";
	
	
	$nombreelemento=$_POST['nombreelemento'];
	$tipoelemento=$_POST['tipoelemento'];
	$largo=$_POST['largo'];
	$alto=$_POST['alto'];
	$ancho=$_POST['ancho'];
	$query="UPDATE elemento SET nombreelemento='$nombreelemento', tipoelemento='$tipoelemento', largo='$largo', alto='$alto', ancho='$ancho'
	  WHERE idunicaelemento='$id'";
	$resultado=$mysqli->query($query);
	
?>


<?php
$dir= 'estructuras';
if(isset($_POST['Guardar'])){ 
opendir($dir); 
     
 }

 if(isset($_POST['Guardar'])){
			$nom = $_POST['id'];
			$ext = substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.'));
			$valor = $nom.$ext;
			if($ext=='.jpg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$nom."/".$valor);
			
			$imagena = $nom."/".$valor;
			$query2="UPDATE elemento SET imagen='$imagena' WHERE idunicaelemento='$nom'";
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

		<title>Modificar Estructura</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Estructura modificada exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Estructura</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="estructura.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				