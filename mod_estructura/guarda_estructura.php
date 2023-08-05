<?php require('../phpscript/logigin.php'); ?>
<?php 
	
	require('../conexion.php');
	$idunicaelemento=$_POST['idunicaelemento'];
	$nombreelemento=$_POST['nombreelemento'];
	$tipoelemento=$_POST['tipoelemento'];
	$largo=$_POST['largo'];
	$alto=$_POST['alto'];
	$ancho=$_POST['ancho'];

	
	$query="INSERT INTO elemento (nombreelemento, tipoelemento, idunicaelemento, largo, alto, ancho) 
	VALUES ('$nombreelemento','$tipoelemento','$idunicaelemento','$largo','$alto','$ancho')";

	$query1="INSERT INTO eventcalenderestructura(idequipo) VALUES ($idunicaelemento);";

	
	$resultado2=$mysqli->query($query1);
	$resultado=$mysqli->query($query);
	
?>
<?php
$dir= 'estructuras';
if(isset($_POST['enviar'])){ 
opendir($dir); 
      if (file_exists($dir."/".$idunicaelemento)){

        }else { 

       	mkdir($dir."/".$idunicaelemento, 0777);
     }
 }

 if(isset($_POST['enviar'])){
			$nom = $_POST['idunicaelemento'];
			$ext = substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.'));
			$valor = $nom.$ext;
			if($ext=='.jpg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$nom."/".$valor);
			$dira='C:/xampp/htdocs/sistema';
			$imagena = $nom."/".$valor;
			$query2="UPDATE elemento SET imagen='$imagena' WHERE idunicaelemento='$idunicaelemento'";
            $resultado3=$mysqli->query($query2);
        
      }
      else
      {

      }
	}
			
?>
<?php header( "refresh:1;url=estructura.php" ); ?>
<html>
	<head>
		<title>Guardar Elemento</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($resultado>0)
				{ 
			?>
				<h1>Elemento Guardado Correctamente</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error al Guardar Elemento</h1>		
			<?php	
		        } 
		    ?>		
			
		</center>
	</body>
	</html>	