<?php require('../phpscript/logigin.php'); ?>
<?php 
require('../conexion.php');
$id=$_GET['id'];
$query="SELECT * FROM componentes_arquitectonicos WHERE idunicacomponente='$id'";
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>

<html>
	<head>

		<title>Modificar Componente</title>
		<script src="scripts/validar.js"></script> 
		<script>
function formulario(f) {
if (f.nombrecomponente.value   == '') { alert ('Nombre del componente esta vacio');  
f.nombrecomponente.focus(); return false; } 

</script>


	</head>
	<body>
		
		<center><h1>Modificar Componente</h1></center>
		
		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_componente.php?id=<?php echo $id ;?>">
			
			<center><table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $idelemento; ?>">
					<td width="20"><b>Nombre de Componente</b></td>
					<td width="30"><input type="text" name="nombrecomponente" size="25" value='<?php echo $row['nombrecomponente'];?>' /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				<td colspan="2"><center><input type="button" class="button2" onclick=" location.href='estructura.php' " value="Regresar" name="boton" /> </center></td>
				</tr>
			</table>
			<center>
		</form>
	</body>
</html>	
