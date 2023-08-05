<?php
$dir= 'modelo';
if(isset($_POST['enviar'])){ 
opendir($dir); 
      if (file_exists($dir."/".$id)){
         echo "<script>alert('El directorio ya Existe')</script>";
        }else { 

       	mkdir($dir."/".$id, 0777);
     }
 }

 if(isset($_POST['enviar'])){
			$nom = $_POST['id'];
			$ext = substr($_FILES['archivo']['name'], strrpos($_FILES['archivo']['name'], '.'));
			$valor = $nom.$ext;
			if($ext=='.jpg'){
			move_uploaded_file($_FILES['archivo']['tmp_name'], $dir."/".$nom."/".$valor);

	
			$dira='modelo';
			$imagena = $nom."/".$valor;
			$query2="UPDATE repuestos SET imagen='$imagena' WHERE id='$id'";
            $resultado3=$mysqli->query($query2);
        
      }
      else
      {
       echo "<script>alert('El archivo debe tener un formato .jpg')</script>";
      }
	}
			
?>