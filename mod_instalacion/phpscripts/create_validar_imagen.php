<?php
$dir= 'elementos';


 if(isset($_POST['Guardar'])){
			$nom = $_POST['id'];
			$ext = substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.'));
			$valor = $nom.$ext;
			if($ext=='.jpg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$valor);
		
			
			$imagena = $valor;
			$query2="UPDATE instalaciones SET imagen='$imagena' WHERE idunica='$nom'";
            $resultado3=$mysqli->query($query2);
			}
      else
      {
    
      }
		}	
?>