<?php
$dir= 'elementos';
if(isset($_POST['enviar'])){ 
opendir($dir); 
      if (file_exists($dir."/".$idunica)){
         echo "El directorio ".$idunica. " ya Existe";
        }else { 
          echo "Se ha creado el directorio ".$idunica;
       	mkdir($dir."/".$idunica, 0777);
     }
 }

 if(isset($_POST['enviar'])){
			$nom = $_POST['idunica'];
			$ext = substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.'));
			$valor = $nom.$ext;
			if($ext=='.jpg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$nom."/".$valor);


			$dira='elementos';
			$imagena = $nom."/".$valor;
			$query2="UPDATE equipos SET imagen='$imagena' WHERE idunica='$idunica'";
            $resultado3=$mysqli->query($query2);
        
      }
      else
      {
       echo "<script>alert('El archivo debe tener un formato .jpg')</script>";
      }
	}
			
?>