<?php require_once('../conexion.php'); ?>
<?php require('../phpscript/logigin.php'); ?>
<?php

  if(isset($_GET["id"])){
    $id= substr($_GET['id'], 0, 11);
  }else{
  $id= substr($_POST['id'], 0, 11);
  }
$query="SELECT * FROM archivos_instalaciones WHERE idelem='$id' ORDER BY id DESC";
$resultado=$mysqli->query($query);

?>
<script language="JavaScript">
function aviso(url){
if (!confirm("ESTA SEGURO DE ELIMINAR")) {
return false;
}
else {
document.location = url;
return true;
}
}
</script>
<html>
<head>
	<title></title>
	<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

   <link rel="stylesheet" href="css/css_mdi.css">
	<script type="text/javascript">
		

$(document).ready(function() {
    $('#example').DataTable();
} );

	</script>
</head>
<body>
<center><h1>Documentos de Instalaciones</h1></center>
<table  class="display" id="example" width="90%">
<thead>

  <tr>
    <th><center></center></th>
    <th><center>Nombre</center></th>
    <th><center></center></th>
    <?php if ($tipousuario=='1'){?>
    <th><center></center></th>
    <?php } ?>
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    <td><center></center></td>
 	    <td><center><?php echo $row['nombre'];?></center></td>
 
      <td width="25px"><center>
      <form action="">
        <button type="button"><a href="<?php echo $row['ruta'];?>" download>
          <img width="20px" height="20px" src="images/folder.png" title="Documentos"/>
        </a></button></form>
      </center></td>

                <?php if ($tipousuario=='1'){?>
          <td width="25px"><center>
          <form method="POST" action="eliminar_archivo.php">
            <input type="hidden" name="id1" value="<?php echo $row['nombre'] ;?>" />
            <input type="hidden" name="id2" value="<?php echo $row['idelem'] ;?>" />
            <button type="button" width="20px" height="20px" src="images/eliminar.png" title="Eliminar" value="Enviar" onclick="form.submit()" ><img width="20px" height="20px" src="images/eliminar.png"></button> 
          </form>
        </center></td>


          <?php } ?>


 	  </tr>
  <?php }
   ?>

 </tbody>
 </table>
<?php if ($tipousuario=='1'){?>
<br>
<br>
<center><h1>Subir Nuevo Archivo</h1>
   <FORM name="enviar_archivo_frm" method="post" ENCTYPE="multipart/form-data"  action="subir.php?id=<?php echo $id ;?>">
          <input type="file" name="archivo_fls" />
          <br><br>
          <input type="button" class="button2" name="subir_btn" onclick="form.submit()" value="Subir Archivo">
          <input type="button" class="button2" value="Regresar a la Ficha" name="Regresar" onclick="location.href='../fichas/ficha_equipos_instalaciones.php?id=<?php echo $id ;?>'" />
   </FORM>
<?php } ?>
</center>
</body>
</html>