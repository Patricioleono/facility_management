<?php require('../phpscript/logigin.php'); ?>
<?php
	require('phpscripts/req_estructura.php');
	$idelemento=$_POST['id'];
	
	$query="SELECT * FROM revestimientos_arquitectonicos where idunicarevestimiento='$idelemento'";
	
	$resultado=$mysqli->query($query);

?>

<html>
	<head>
		<style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
  <script>
  	document.addEventListener('', function(e){
  		e.clipboardData.setData('text/plain','texto');
  		e.preventDefault();
  	});
  </script>
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
		<title>Revestimientos</title>
	</head>
	<body>
		
		<center><h1>Revestimientos</h1></center>
		
		<table  class="display" id="example" width="90%">
			<thead>

  				<tr>
   			 		<th><center>ID</center></th>
    				<th><center>Nombre</center></th>
      				<?php if ($tipousuario=='1'){?>
   					<th><center></center></th>
    				<?php } ?>
    
 
  				</tr>

			 </thead>
			<tbody>
 				<?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  			<tr>
 	    			<td><center><?php echo $row['idunicarevestimiento'] ;?></center></td>
 	    			<td><center><?php echo $row['nombrerevestimiento'];?></center></td>
 	    			<?php if ($tipousuario=='1'){?>
 	    			<td width="25px"><center>
         				<form method="POST" action="eliminarrevestimiento.php">
            				
            				<input type="hidden" name="id" value="<?php echo $row['idrevestimiento'] ;?>" />
            				<input type="image" width="20px" height="20px" src="images/eliminar.png" title="Eliminar" value="Enviar"/>
          				</form>
        			</center></td> 
 	    			<?php } ?>
 	    	    </tr>
 	    	    <?php } ?>

 	    	</tbody>
		</table>
    <?php if ($tipousuario=='1'){?>
       <form method="POST" action="nuevorevestimiento.php">
        <input type="hidden" name="id" value="<?php echo $idelemento ?>" />
        <button type="button" class="button2" onclick="form.submit()"> Insertar Nuevo </button>
       </form>
        
		<?php } ?>
		</body>
	</html>	