<?php require('../phpscript/logigin.php'); ?>
<?php
	require('../conexion.php');
	
	$query="SELECT * FROM elemento_arquitectonico";
	
	$resultado=$mysqli->query($query);

?>

<html>
	<head>

  <script>
  	document.addEventListener('', function(e){
  		e.clipboardData.setData('text/plain','texto');
  		e.preventDefault();
  	});
  </script>
		<title>Elemento Arquitectonico</title>
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
	</head>
	<body>
		
		<center><h1>Elemento Arquitectonico</h1></center>
		
		<table  class="display" id="example" width="90%">
<thead>

  <tr>
    <th><center>ID</center></th>
    <th><center>Nombre</center></th>
   
     <?php if ($tipousuario=='1'){?>
    <th><center></center></th>
    <?php } ?>
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
 	
 	  <tr >
 	    <td><center><?php echo $row['idunicaelemento'] ;?></center></td>
 	    <td><center><?php echo $row['nombreelemento'];?></center></td>
 	    	    
 	    <td width="25px"><center>
 	    	<form method="POST" action="fichaestructura.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
    			<button type="button" class="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>
    	</center></td>
 	    
      	<?php if ($tipousuario=='1'){?>
      	
      	<td width="25px"><center>
 	    	<form method="POST" action="modificarestructura.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Editar" onclick="form.submit()"><img width="20px" height="20px" src="images/editar.png"></button>
    		</form>
    	</center></td>
 	   
 	    <?php } ?>
      	
      	<td width="25px"><center>
 	    	<form method="POST" action="calendar/calendar.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Calendario" onclick="form.submit()"><img width="20px" height="20px" src="images/calendar.png"></button>
    		</form>
    	</center></td>
    	
    	<td width="25px"><center>
 	    	<form method="POST" action="componente.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Gestionar Componentes" onclick="form.submit()"><img width="20px" height="20px" src="images/bricks.png"></button>
    		</form>
    	</center></td>
     	
    	<td width="25px"><center>
 	    	<form method="POST" action="revestimiento.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Gestionar Revestimientos" onclick="form.submit()"><img width="20px" height="20px" src="images/bucket.png"></button>
    		</form>
    	</center></td>

    	<td width="25px"><center>
 	    	<form method="POST" action="pdf.php" target="_blank">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="20px" height="20px" src="images/pdf.png"></button>
    		</form>
    	</center></td>
     	
      	
      <?php if ($tipousuario=='1'){?>
    	<td width="25px"><center>
 	    	<form method="POST" action="eliminarestructura.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunicaelemento'] ;?>" />
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

<form action="nuevaestructura.php">

 <center><button type="button" class="button2" onclick="form.submit()"> Insertar Nuevo </button></center>

</form>

<?php } ?>

		</body>
	</html>	
	
