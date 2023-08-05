<?php require('phpscripts/req_modcheck.php'); ?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
<script>function formulario(f) {
if (f.Title.value   == '') { alert ('Titulo esta vacio');  
f.Title.focus(); return false; } 
if (f.Detail.value   == '') { alert ('Descripción esta vacio');  
f.Detail.focus(); return false; } 
</script> 
	<link rel="stylesheet" href="css/css_calendar.css">
	<style>
body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #ffffff 
	}

			#inputs{
			width: '100%';
			background-color: #D7F9F5;
		}
</style>
</head>
<body>
	<center><h1>Modificar Mantenimiento</h1></center>
	<?php  if(isset($_GET['v'])){ echo '<center><input class="button2" name="button" type="button" onclick="opener.location.reload();window.close();" value="Cerrar esta ventana" /></center>';}
	else{ ?>
		<form onsubmit="return formulario(this)" name="checkevento" method="POST" <?php echo 'action="'.$_SERVER['PHP_SELF'].'?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'&v=true"' ?> >
			<table width="90%" style="margin: 0 auto;">
				<tr>
					<td colspan="1" width="30%"><b>Titulo</b></td>
					<td colspan="2" width="70%"><input id="inputs" type="text" name="Title" value='<?php echo $riw['Title'];?>' style="width:100%;"/></td>
				</tr>	

				<tr>
		
					<td colspan="1" width="30%"><b>Descripcion: </b></td>
					<td colspan="2" width="70%"><textarea id="inputs" name="Detail" style="width:100%; height:100px;"/><?php echo $riw['Detail'];?></textarea></td>
				</tr>
<tr>
		
					<td colspan="1" width="30%"><b>Observaciones: </b></td>
					<td colspan="2" width="70%"><textarea id="inputs" name="observaciones" style="width:100%; height:100px;"/><?php echo $riw['observaciones'];?></textarea></td>
				</tr>

<tr>
		
					<td colspan="1" width="30%"><b>Costo: </b></td>
					<td colspan="2" width="70%"><input id="inputs" type="number" name="costo" value='<?php echo $riw['costo'];?>' style="width:100%;"/></td>
				</tr>

				<tr>
		
					<input type="hidden" name="checkbox" value="0" />
					<td colspan="1" width="30%"><b>Mantenimiento realizado: </b></td>
					<td colspan="2" width="70%">
						<input type="checkbox" name="checkbox" 
						<?php if ($riw['checkbox']!='1'){?>
						value="1" /> 
						<?php } else { ?>

						value="1" checked/> 
						<?php } ?>
					</td>
				</tr>
</table><br><center><input type="submit" value="Guardar" class="button2" name="Guardar"/></center>
					
			
		</form>'
	<?php }	?>
</body>
</html>