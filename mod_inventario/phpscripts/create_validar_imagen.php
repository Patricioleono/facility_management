<?php
$dir= 'elementos';
if(isset($_POST['Guardar'])){ 
opendir($dir); 
     
 }

 if(isset($_POST['Guardar'])){
			$nom = $_POST['id'];
			$ext = strtolower(substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.')));
			$valor = $nom.$ext;
			if($ext=='.jpg' || $ext =='.jpeg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$valor);
			$imagena = $valor;
			$query2="UPDATE equipos SET imagen='$imagena' WHERE idunica='$nom'";
            $resultado3=$mysqli->query($query2);
			}
      else
      {
       echo "<script>alert('El archivo debe tener un formato .jpg')</script>";
      }
		}	
?>