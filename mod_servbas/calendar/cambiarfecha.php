<?php require('phpscripts/req_cambiarfecha.php'); ?>
<html>
	<head>
<style>
body {
    font-family: "Arial", Times, serif;
    background-color: #ffffff 
	}
</style>
		<title>Modificar Fecha</title>
  <link rel="stylesheet" href="css/css_calendar.css">
	</head>
	<body>
		
		<center><h1>Modificar Fecha</h1></center>
<form onsubmit="return validacion(this)" name="modificar_fecha" method="POST" action="editarfecha.php?id=<?php echo $id; ?>&month=<?php echo $month; ?>&day=<?php echo $day; ?>&year=<?php echo $year; ?>">
	<table width="400px">
		<tr>
		<td><b>Modificar Fecha</b></td>
		<td>
		<input type="date" id="inputs" name="fechacambiada" size="25" value=""/></td>
		</tr>
		</table>
		<br><br><center><input type="submit" class="button2" name="Guardar" value="Guardar" /></center></td>
		<br><center><input name="button" class="button2" type="button" onclick="opener.location.reload();window.close();" value="Cerrar esta ventana" /></td>
		
		</form>
		</body>
</html>	
