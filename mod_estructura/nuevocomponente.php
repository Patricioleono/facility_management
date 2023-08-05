<?php require('../phpscript/logigin.php'); ?>
<?php
$idelemento=$_POST['id'];
?>
<html>
	<head>
		<title>Nuevo Componente</title>
<style>
body {
    font-family: "Arial", Times, serif;
    
	}
</style>
		<script>function formulario(f) {
if (f.nombrecomponente.value   == '') { alert ('Nombre del Componente esta vacio');  
f.nombrecomponente.focus(); return false; } 
</script> 
<link rel="stylesheet" href="css/css_mdi.css">
	</head>
	<body>
		
		<center><h1>Nuevo Componente</h1></center>
		
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_componente.php?id=<?php echo $idelemento ?>">
			<center><table width="50%">
				<tr>
					<td width="20"><b>Nombre Componente</b></td>
					<td width="30"><input type="text" name="nombrecomponente" size="25" /></td>
				</tr>
				
					<td colspan="2"><center><input type="submit" class="button2" name="enviar" value="Registrar" /></center></td>

				</tr>
			</table></center>
		</form>
	</body>
</html>						