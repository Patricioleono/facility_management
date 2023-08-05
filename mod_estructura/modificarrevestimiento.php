<?php require('../phpscript/logigin.php'); ?>
<?php 
require('../conexion.php');
$id=$_GET['id'];
$query="SELECT * FROM revestimientos WHERE idunicarevestimiento='$id'";
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>

<html>
	<head>
		<title>Modificar Revestimiento</title>
		<style>

		<script src="scripts/validar.js"></script> 
		<script>function formulario(f) {
if (f.nombrerevestimiento.value   == '') { alert ('Nombre del Revestimiento esta vacio');  
f.nombrerevestimiento.focus(); return false; } 
</script> 
	</head>
	<body>
		
		<center><h1>Modificar Revestimiento</h1></center>
		
		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_revestimiento.php?id=<?php echo $id ;?>">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $idelemento; ?>">
					<td width="20"><b>Nombre de Revestimiento</b></td>
					<td width="30"><input type="text" name="nombrerevestimiento" size="25" value='<?php echo $row['nombrerevestimiento'];?>' /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				<td colspan="2"><center><input type="button" class="Button2" onclick=" location.href='estructura.php' " value="Regresar" name="boton" /> </center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
