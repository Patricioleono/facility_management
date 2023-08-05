<?php require('../phpscript/logigin.php'); ?>
<html>
	<head>
		<title>Nueva infraestructura</title>
<style>
body {
    font-family: "Arial", Times, serif;
    	}
</style>
		<script src="scripts/validar.js"></script>
	</head>
	<body>
		
		<center><h1>Nueva infraestructura</h1></center>
		
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_infraestructura.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Nombre infraestructura</b></td>
					<td width="30"><input type="text" name="nombreinfraestructura" size="25" /></td>
				</tr>
				<tr>
					<td><b>ID Unica infraestructura</b></td>
					<td><input type="text" name="idunica" id="idunica" size="25" /></td>
				</tr>
				<tr>
					<td><b>Tipo infraestructura</b></td>
					<td><input type="text" name="tipoinfraestructura" size="25" /></td>
				</tr>
				<tr>
					<td><b>Nombre del Fabricante</b></td>
					<td><input type="text" name="nombrefabricante" size="25" /></td>
				</tr>
				<tr>
					<td><b>Numero del Modelo</b></td>
					<td><input type="text" name="numeromodelo" size="25" /></td>
				</tr>
				<tr>
					<td><b>Numero de Serie</b></td>
					<td><input type="text" name="numeroserie" size="25" /></td>
				</tr>
				<tr>
					<td><b>Version del Software (Opcional)</b></td>
					<td><input type="text" name="versionsoftware" size="25" /></td>
				</tr>
				<tr>
					<td><b>Nombre del Proveedor</b></td>
					<td><input type="text" name="nombreproveedor" size="25" /></td>
				</tr>
				<tr>
					<td><b>Codigo del Proveedor</b></td>
					<td><input type="text" name="codigoproveedor" size="25" /></td>
				</tr>
				<tr>
					<td><b>Descripcion de Ubicacion </b></td>
					<td><input type="text" name="descripcionubicacion" size="25" /></td>
				</tr>
				<tr>
					<td><b>Codigo de Ubicacion</b></td>
					<td><input type="text" name="codigoubicacion" size="25" /></td>
				</tr>
				<tr>
					<td><b>Precio de Compra</b></td>
					<td><input type="text" name="preciocompra" size="25" /></td>
				</tr>
				<tr>
					<td><b>Fecha de Instalacion</b></td>
					<td><input type="text" name="fechainstalacion" size="25" /></td>
				</tr>
				<tr>
					<td><b>Fecha de Caducidad de la Garantia</b></td>
					<td><input type="text" name="fechacaducidadgarantia" size="25" /></td>
				</tr>
				<tr>
					<td><b>Entidad responsable del Mantenimiento</b></td>
					<td><input type="text" name="responsablemantenimiento" size="25" /></td>
				</tr>
				<tr>
					<td><b>Estado de infraestructura</b></td>
					<td><input type="text" name="estadoinfraestructura" size="25" /></td>
				</tr>
		        <tr>
					<td><b>Imagen</b></td>
		        <td><input type="file" id="archivo" name="archivo"></td>
		         </tr>
					<td colspan="2"><center><input type="submit" name="enviar" value="Registrar" /></center></td>
                    <td colspan="2"><center><input type="button" onclick=" location.href='mdia.php' " value="Regresar" name="boton" /> </center></td>
					<!-- <td colspan="2"><a href="mdia.php">Regresar</a></td> -->
				</tr>
			</table>
		</form>
	</body>
</html>						