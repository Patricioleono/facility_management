<?php require('phpscripts/req_agregarevento.php'); ?>


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
			
			<tr>
				<td width="150px"><b>Título</b></td>
				<td width="250px"><input type="text" id="inputs" name="txttiltle" ></td>
			</tr>

			<tr>
				<td width="150px"><b>Descripción</b></td>
				<td width="250px"><textarea name="txtdetail" id="inputs"></textarea></td>
			</tr>
			</table></center>

			
				<br><center><input type="submit" class="button2" name="btnadd" value="Aceptar"  ></center>
				
				
	<?php	} ?>
	</form>
	
</body>
</html>