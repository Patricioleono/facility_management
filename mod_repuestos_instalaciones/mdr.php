<?php require('../phpscript/logigin.php'); ?>
<?php require_once('../conexion.php'); ?>
<?php 
$query="SELECT * FROM repuestos_instalaciones";
$resultado=$mysqli->query($query);

?>

<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/css_mdi.css">
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
	<script type="text/javascript">
		

$(document).ready(function() {
    $('#example').DataTable();
} );

	</script>
		<style type="text/css">
}
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
    
		<title>Modulo de Repuestos</title>
	</head>
	<body>
		
		<center><h2>Modulo de Repuestos</h2></center>
		
		
		
		
		
		     <table  class="display" id="example" width="90%">
<thead>

  <tr>
    <th><center>ID Repuesto</center></th>
    <th><center>Nombre</center></th>
    <th><center>ID Equipo Perteneciente</center></th>
    <th><center>Cantidad</center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    <td><center><?php echo $row['id'] ;?></center></td>
 	    <td><center><?php echo utf8_encode($row['nombrerepuesto']);?></center></td>
 	    <td><center><?php echo $row['modeloequipo'] ;?></center></td>
 	    <td><center><?php echo $row['cantidad'] ;?></center></td>
 	    <td width="25px"><center><a href="elementorepuesto.php?id=<?php echo $row['id'];?>"><img width="20px" height="20px" src="images/lupa.png" title="Ver"/></a></center></center></td>
 	    <td width="25px"><center><a href="editarrepuesto.php?id=<?php echo $row['id'];?>"><img width="20px" height="20px" src="images/editar.png" title="Editar"/></a></center></td>
 	    
 	    <td width="25px"><center><a href="javascript:;" onclick="aviso('eliminarr.php?id=<?php echo $row['id'];?>'); return false;"><img width="20px" height="20px" src="images/eliminar.png" title="Eliminar"/></a></center></td>

 	  </tr>
  <?php }
   ?>

 </tbody>
</table>
		     <p align="center"><a href="nuevor.php" class="button2">Insertar Repuesto</a></p>
		</body>
	</html>	
	
