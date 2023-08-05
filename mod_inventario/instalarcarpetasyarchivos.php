<?php require_once('../conexion.php'); ?>
<?php 
$query="SELECT * 
FROM equipos";
$resultado=$mysqli->query($query);
$dir= 'elementos';
$dir2 = 'Documentos';

?>
<?php require('../phpscript/logigin.php'); ?>

<html>


<head>
	<title></title>

</head>
<body>
<center><h1>Creando Carpetas y Calendarios</h1></center>

 <?php while($row=$resultado->fetch_assoc()){ 
  $idunica=$row['idunica'];


opendir($dir); 
opendir($dir2);
      if ((file_exists($dir."/".$idunica))&&(file_exists($dir2."/".$idunica))){
         
        }else { 
        $agregarcalendario="INSERT INTO eventcalender(idequipo) VALUES ($idunica);";
        $resultadoagregarcalendario=$mysqli->query($agregarcalendario);
        mkdir($dir."/".$idunica, 0777);
        mkdir($dir2."/".$idunica, 0777);
     }
     
  }?>



</body>
</html>