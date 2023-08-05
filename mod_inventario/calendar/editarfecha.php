<?php require('phpscripts/req_editarfecha.php'); ?>
<html>
	<head>
		<title>Modificar equipo</title>
		<style>
body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #ffffff 
	}
</style>
  <link rel="stylesheet" href="css/css_calendar.css">
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Fecha modificada exitosamente</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Fecha</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<input name="button" type="button" class="button2" onclick="opener.location.reload();window.close();" value="Cerrar esta ventana" />
			
		</center>
	</body>
</html>
