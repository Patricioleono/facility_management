<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

   <link rel="stylesheet" href="css/css_mdi.css">
   
   <script>function formulario(f) {
		if (f.year.value   == '') { alert ('Annio esta vacio');  
			f.year.focus(); return false; } 
	</script> 
	<style type="text/css">
		@import "css/fondo.css";
div{
margin: 0 auto;
width: 50%; 
float:left;
}
	</style>

</head>
<body>
<div>
<center><h3>Presupuesto anual</h3></center>
<form method="POST" action="presupuesto_anual.php">
<table width="50%" style="margin: 0 auto;">
<tr>
<td colspan="1"><b>Filtrar por Annio</b></td>
<td colspan="2"><input style="width:100%" id="inputs" type="text" name="year" size="25"/></td>
</tr>
</table>
<br>
<center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Confirmar" /></center>

</form>
</div>
<div>
<center><h3>Ingresar Nuevo Presupuesto</h3></center>
<form method="POST" action="nuevo_presupuesto.php">
<table width="50%" style="margin: 0 auto;">
<tr>
<td colspan="1"><b>Monto</b></td>
<td colspan="2"><input style="width:100%" id="inputs" type="text" name="monto" size="25"/></td>
</tr>
<tr>
<td colspan="1"><b>Annio</b></td>
<td colspan="2"><input style="width:100%" id="inputs" type="text" name="year" size="25"/></td>
</tr>
</table>
<br>
<center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Confirmar" /></center>

</form>
</div>
</body>
</html>