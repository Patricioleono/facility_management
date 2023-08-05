<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

   <link rel="stylesheet" href="css/css_mdi.css">

<style type="text/css">
@import "css/fondo.css";
</style>
</head>
<body>
	<center><h2>Notificacion requerimiento</h2></center>
	<form  method="POST" action="notificacion_correo.php">
	<table width="30%" style="margin: 0 auto;">
		<tr>
		    <td colspan="1"><b>Unidad:</b></td>
		    <td colspan="1"><b>Area:</b></td>
		    <td colspan="1"><b>Recinto:</b></td>
		</tr>
		<tr>
		    <td colspan="1"><input style="width:100%" id="inputs" type="text" name="unidad" /></td>
		    <td colspan="1"><input style="width:100%" id="inputs" type="text" name="area" /></td>
		    <td colspan="1"><input style="width:100%" id="inputs" type="text" name="recinto" /></td>
		</tr>
				<tr>
			<td colspan="1"><b>Ingrese el asunto</b></td>
			<td colspan="2"><input style="width:100%" id="inputs" type="text" name="asunto" size="25"/></td>
		</tr>
        <tr>
            <td colspan="1"><b>Ingrese Destinatario:</b></td>
            <td colspan="1"><input style="width:100%" id="input" type="email" name="destino"></td>
        </tr>
		<tr>
			<td colspan="1"><b>Ingrese el mensaje</b></td>
			<td colspan="2"><textarea id="inputs" name="mensaje" rows="10" cols="50" style="resize: none"></textarea></td>
		</tr>
	</table>
<br>
		<center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="Enviar Notificacion" /></center>
	</form>
</body>
</html>