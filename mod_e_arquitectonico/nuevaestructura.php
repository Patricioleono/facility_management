<?php require('../phpscript/logigin.php'); ?>
<html>
	<head>
		<title>Nuevo Elemento Arquitectonico</title>
		<script src="scripts/validarnuevo.js"></script> 
<style>
body {
    font-family: "Arial", Times, serif;
    background-color: #D2F8FF;
	}
	    #inputs{
      background-color: #D7F9F5;
    }
</style>
		<script>function formulario(f) {
if (f.nombreelemento.value   == '') { alert ('Nombre del Elemento esta vacio');  
f.nombreelemento.focus(); return false; } 
if (f.tipoelemento.value  == '') { alert ('Tipo de Elemento esta vacio'); 
f.tipoelemento.focus(); return false; }
</script> 
  <link rel="stylesheet" href="css/css_mdi.css">
	</head>
	<body>
		
		<center><h1>Nuevo Elemento Arquitectonico</h1></center>
		
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_estructura.php?id=<?php echo $idelemento ?>">
			<table style="width:80%;  margin:auto;" cellspacing="10px">
				<tr>
					<td id="tit" colspan="2" width="33.3%">ID Unica</td>
  					<td id="tit" colspan="2" width="33.3%">Nombre Elemento</td>
  					<td id="tit" colspan="2" width="33.3%">Tipo Elemento</td>
				</tr>
				<tr>
					<td  colspan="2" width="33.3%"><input type="text" id="inputs" style="width:100%;" name="idunicaelemento"/></td>
    				<td  colspan="2" width="33.3%"><input type="text" id="inputs" style="width:100%;" name="nombreelemento"/></td>
    				<td  colspan="2" width="33.3%"><input type="text" id="inputs" style="width:100%;" name="tipoelemento"/></td>
				</tr>
				<tr>
					<td id="tit" colspan="2" width="33.3%">Largo</td>
   					<td id="tit" colspan="2" width="33.3%">Alto</td>
    				<td id="tit" colspan="2" width="33.3%">Ancho</td>
				</tr>
				<tr>
					<td  colspan="2" width="33.3%" ><input type="text" style="width:100%;" id="inputs" name="largo"/></td>
   				 	<td  colspan="2" width="33.3%" ><input type="text" style="width:100%;" id="inputs" name="alto"/></td>
    				<td  colspan="2" width="33.3%" ><input type="text" style="width:100%;" id="inputs" name="ancho"/></td>
				</tr>
				<tr>
					 <td colspan="2">Imagen</td>
   					 <td colspan="4" ><input type="file" id="inputs" id="archivo" style="width:100%;" name="archivo"></td>
  				</tr>
			</table>
<br>
			<center><input type="submit" class="button2" style="width:auto;" name="enviar" value="Registrar" />  <input type="button" class="button2" style="width:auto;" value="Regresar" name="Regresar" onclick="history.back()" /></center>

		</form>
	</body>
</html>						