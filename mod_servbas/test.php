<?php require('../phpscript/logigin.php'); ?>
<?php require_once('../conexion.php'); ?>
<?php
$id=$_GET['id'];
$query="SELECT * 
FROM archivos_servbas
WHERE idelem='$id'";
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

	<script type="text/javascript">
		

$(document).ready(function() {
    $('#example').DataTable();
} );

	</script>
</head>
<body>
<center><h1>Documentos de Inventario</h1></center>
<table  class="display" id="example" width="90%">
<thead>

  <tr>
    <th><center></center></th>
    <th><center>Nombre</center></th>
    <th><center></center></th>
    <th><center></center></th>
    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    <td><center></center></td>
 	    <td><center><?php echo $row['nombre'];?></center></td>
 
      <td width="25px"><center>
        <a href="<?php echo $row['ruta'];?>" download>
          <img width="20px" height="20px" src="images/folder.png" title="Documentos"/>
        </a>
      </center></td>
 	    <td width="25px"><center> 
        <a href="javascript:;" onclick="aviso('eliminar.php?id=<?php echo $row['idunica'];?>'); return false;">
          <img width="20px" height="20px" src="images/eliminar.png" title="Eliminar"/>
        </a>
      </center></td>

 	  </tr>
  <?php }
   ?>

 </tbody>
</table>
	 <p align="center"><a href="nuevo.php">Insertar nuevo documento</a></p>
   <FORM name="enviar_archivo_frm" method="post" ENCTYPE="multipart/form-data" action="subir.php?id=<?php echo $id ;?>">
          <input type="file" name="archivo_fls" />
          <br>
          <input type="submit" name="subir_btn" value="Subir Archivo">
</FORM>
</body>
</html>