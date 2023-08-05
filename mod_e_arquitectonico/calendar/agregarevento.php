<?php require('phpscripts/req_agregarevento.php'); ?>
<?php
session_start(); 
include_once "../../conexion1.php";
if(!isset($_SESSION['userid']))
{
  header('location: logout.php'); 
}
$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);
$tipousuario=$row123['tipousuario'];
$nombre=$row123['nombre'];
$personal=$row123['personal'];
$cargo=$row123['cargo'];
?>

<html>
<head>
	<link rel="stylesheet" href="css/css_calendar.css">
	<style>
body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #ffffff 
	}
</style>
	<script>function formulario(f) {
if (f.txttiltle.value   == '') { alert ('Titulo esta vacio');  
f.txttiltle.focus(); return false; } 
if (f.txtdetail.value   == '') { alert ('Descripción esta vacio');  
f.txtdetail.focus(); return false; } 
</script> 
</head>
<body>
	 <center><h1>Agregar Evento</h1></center>
	<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>&month=<?php echo $month; ?>&day=<?php echo $day; ?>&year=<?php echo $year; ?>&v=true&j=true">
		<?php  if(isset($_GET['j'])){ echo '<center><input name="button" class="button2" type="button"'; ?> onclick="opener.location.reload(); 
window.close();" <?php echo 'value="Cerrar esta ventana" /></center> ';}
else{ ?>
		<center><table width="400px">
			<input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
			<tr>
				<td width="150px"><b>Titulo</b></td>
				<td width="250px"><input type="text" id="inputs" name="txttiltle" ></td>
			</tr>

			<tr>
				<td width="150px"><b>Descripcion</b></td>
				<td width="250px"><textarea name="txtdetail" id="inputs"></textarea></td>
			</tr>
<tr>
				<td width="150px"><b>Observaciones</b></td>
				<td width="250px"><textarea name="observaciones" id="inputs"></textarea></td>
			</tr>
<tr>
				<td width="150px"><b>Costo</b></td>
<td width="250px"><input type="number" name="costo" min="0" id="inputs"></td>
</tr>
<tr>
				<td width="150px"><b>Nombre:</b></td>
                                <td width="250px"><?php echo $nombre; ?></td>
</tr>
<tr>
				<td width="150px"><b>Personal:</b></td>
				<td width="250px"><?php echo $personal; ?></td>
</tr>
<tr>
				<td width="150px"><b>Cargo: </b></td>
				<td width="250px"><?php echo $cargo; ?></td>
</tr>
			</table></center>

			
				<br><center><input type="submit" class="button2" name="btnadd" value="Aceptar"  ></center>
				
				
	<?php	} ?>
	</form>
</body>
</html>