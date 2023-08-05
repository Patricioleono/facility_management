<?php require('phpscripts/req_checkevento.php'); ?>
<html>
<head>
	<style>
body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #ffffff 
	}
</style>
	<title>Estado evento</title>
</head>
<body>
	<center>
		<?php 
		if($resultado>0){
			?>
			<h1>Estado Modificado exitosamente</h1>
			<?php 	}else{ ?>
			<h1>Error al Modificar estado</h1>
			<?php	} ?>
			<p></p>	
			<input name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" />
		</center>
	</body>
	</html>