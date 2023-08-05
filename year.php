<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

   <link rel="stylesheet" href="css/css_mdi.css">
   
   <script>
function formulario(f)
{
if (f.year.value == '' || f.year.value<'1990' || f.year.value>'2100')
{ alert ('A«Ðo no v«¡lido');
f.year.focus(1); return false;
}
}
</script>
<style type="text/css">
@import "css/fondo.css";
</style>
</head>
<body>
<center><h2>Filtrar historial por Annio</h2></center>
<form onSubmit="return formulario(this)" method="POST" action="balance.php">
<table width="30%" style="margin: 0 auto;">
<tr>
<td colspan="1"><b>Ingresar Annio: </b></td>
<td colspan="2"><input style="width:100%" id="inputs" type="number" name="year" size="25"/></td>
</tr>
</table>
<br>
<center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Confirmar" /></center>
</form>
</body>
</html>