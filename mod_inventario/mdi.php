<?php require_once('../conexion.php'); ?>
<?php 
$query="SELECT * FROM equipos";
$resultado=$mysqli->query($query);
$var1='id="';
$var2='"';

?>
<?php require('../phpscript/logigin.php'); ?>
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
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/css_mdi.css">
	<script type="text/javascript">
		

$(document).ready(function() {
    $('#example').DataTable();
} );

	</script>
	
	<style type="text/css">
		#BUENO{
			background-color: #57A639;
		}
		#MALO{
			background-color: #E72512;
		}
		#FALLANDO{
			background-color: #E4A010;
		}
		#MANTENCION{
			background-color: #DE4C8A;
		}
	</style>


</head>
<body>
<center><h1>Modulo de Inventario</h1></center>
<table  class="display" id="example" width="90%">
<thead>

  <tr>
    <th><center>ID</center></th>
    <th><center>Nombre</center></th>
    <th><center>Ubicacion</center></th>
     <?php if ($tipousuario=='1'){?>
    <th><center></center></th>
    <?php } ?>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
     <?php if ($tipousuario=='1'){?>
    <th><center></center></th>
    <?php } ?>
    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	<?php 
if($row['estadoequipo']=="EN MANTENCION"){
  $estadomantencion="MANTENCION";
}else{
  $estadomantencion=$row['estadoequipo'];
}
  ?>
 	  <tr >
 	    <td><center><?php echo $row['idunica'] ;?></center></td>
 	    <td <?php echo $var1.$estadomantencion.$var2;?> ><center><?php echo utf8_encode($row['nombreequipo']);?></center></td>
 	    <td><center><?php echo utf8_encode($row['recinto']); ?> - <?php echo utf8_encode($row['piso']); ?></center></td>
 	    
 	    <td width="25px"><center>
 	    	<form method="POST" action="elemento.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>
    	</center></td>
 	    
      	<?php if ($tipousuario=='1'){?>
      	
      	<td width="25px"><center>
 	    	<form method="POST" action="modificar.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Editar" onclick="form.submit()"><img width="20px" height="20px" src="images/editar.png"></button>
    		</form>
    	</center></td>
 	   
 	    <?php } ?>
      	
      	<td width="25px"><center>
 	    	<form method="POST" action="calendar/calendar.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['id'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Calendario" onclick="form.submit()"><img width="20px" height="20px" src="images/calendar.png"></button>
    		</form>
    	</center></td>
    	
    	<td width="25px"><center>
 	    	<form method="POST" action="ver_rep.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Repuestos" onclick="form.submit()"><img width="20px" height="20px" src="images/repu.png"></button>
    		</form>
    	</center></td>
     	
    	<td width="25px"><center>
 	    	<form method="POST" action="gastos.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Historial" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button>
    		</form>
    	</center></td>

    	<td width="25px"><center>
 	    	<form target="_blank" method="POST" action="pdf.php" >
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="20px" height="20px" src="images/pdf.png"></button>
    		</form>
    	</center></td>

    	<td width="25px"><center>
 	    	<form method="POST" action="archivos.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Documentos" onclick="form.submit()"><img width="20px" height="20px" src="images/folder.png"></button>
    		</form>
    	</center></td>    	      	
      	
      <?php if ($tipousuario=='1'){?>
    	<td width="25px"><center>
 	    	<form method="POST" action="eliminar.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Eliminar" onclick="form.submit()"><img width="20px" height="20px" src="images/eliminar.png"></button>
    		</form>
    	</center></td> 
 	    
      <?php } ?>

 	  </tr>
  <?php }
   ?>

 </tbody>
</table>
<?php if ($tipousuario=='1'){?>

<form action="nuevo.php">

 <center><button type="button" class="button2" onclick="form.submit()"> Insertar Equipo </button></center>

</form>

<?php } ?>
</body>
</html>