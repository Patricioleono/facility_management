<?php require('phpscripts/req_eliminarevento.php'); ?>

<html>
	<head>
		<style>
body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #ffffff 
	}
</style>
  <link rel="stylesheet" href="css/css_calendar.css">
		<title>Eliminar equipo</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Evento Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Evento</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input name="button" type="button" class="button2" onclick="opener.location.reload();window.close();" value="Cerrar esta ventana" />
			
		</center>
	</body>
</html>