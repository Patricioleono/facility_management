<?php require('../phpscript/logigin.php'); ?>
<?php
$idelemento=$_POST['id'];
?>
<html>
	<head>
		<title>Nuevo Revestimiento</title>
<link rel="stylesheet" href="css/css_mdi.css">
		<script>function formulario(f) {
if (f.nombrerevestimiento.value   == '') { alert ('Nombre del Revestimiento esta vacio');  
f.nombrerevestimiento.focus(); return false; } 
</script> 
	</head>
	<body>
		
		<center><h1>Nuevo Revestimiento</h1></center>
		
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_revestimiento.php?id=<?php echo $idelemento ?>">
			<center><table width="50%">
				<tr>
					<td width="20"><b>Nombre Revestimiento</b></td>
					<td width="30"><input type="text" name="nombrerevestimiento" size="25" /></td>
				</tr>
				
					<td colspan="2"><center><input type="submit" class="button2" name="enviar" value="Registrar" /></center></td>
 
				</tr>
				
			</table></center>
		</form>
	</body>
</html>						