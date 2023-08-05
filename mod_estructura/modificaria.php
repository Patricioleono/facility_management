<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_modificaria.php'); ?>

<html>
	<head>
		<title>Modificar infraestructura</title>
		<script src="scripts/validar.js"></script> 

	</head>
	<body>
		
		<center><h1>Modificar infraestructura</h1></center>
		
		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_infraestructura.php">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Nombre de infraestructura</b></td>
					<td width="30"><input type="text" name="nombreinfraestructura" size="25" value='<?php echo $row['nombreinfraestructura'];?>' /></td>
				</tr>	
				<tr>
					<td><b>Tipo de infraestructura</b></td>
					<td><input type="text" name="tipoinfraestructura" size="25" value='<?php echo $row['tipoinfraestructura'];?>'  /></td>
				</tr>

				<tr>
					<td><b>Nombre del Fabricante</b></td>
					<td><input type="text" name="nombrefabricante" size="25" value="<?php echo $row['nombrefabricante'];?>" /></td>
				</tr>
				<tr>
					<td><b>Numero del Modelo</b></td>
					<td><input type="text" name="numeromodelo" size="25" value="<?php echo $row['numeromodelo']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Numero de Serie</b></td>
					<td><input type="text" name="numeroserie" size="25" value="<?php echo $row['numeroserie']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Version del Software(Opcional)</b></td>
					<td><input type="text" name="versionsoftware" size="25" value="<?php echo $row['versionsoftware']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Nombre del Proveedor</b></td>
					<td><input type="text" name="nombreproveedor" size="25" value="<?php echo $row['nombreproveedor']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Codigo del Proveedor</b></td>
					<td><input type="text" name="codigoproveedor" size="25" value="<?php echo $row['codigoproveedor']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Descripcion de la Ubicacion</b></td>
					<td><input type="text" name="descripcionubicacion" size="25" value="<?php echo $row['descripcionubicacion']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Codigo de la Ubicacion</b></td>
					<td><input type="text" name="codigoubicacion" size="25" value="<?php echo $row['codigoubicacion']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Precio de Compra</b></td>
					<td><input type="text" name="preciocompra" size="25" value="<?php echo $row['preciocompra']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Fecha de Instalacion</b></td>
					<td><input type="text" name="fechainstalacion" size="25" value="<?php echo $row['fechainstalacion']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Fecha de caducidad de la Garantia</b></td>
					<td><input type="text" name="fechacaducidadgarantia" size="25" value="<?php echo $row['fechacaducidadgarantia']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Responsable del Mantenimiento</b></td>
					<td><input type="text" name="responsablemantenimiento" size="25" value="<?php echo $row['responsablemantenimiento']; ?>" /></td>
				</tr>
								<tr>
					<td><b>Estado actual de infraestructura</b></td>
					<td><input type="text" name="estadoinfraestructura" size="25" value="<?php echo $row['estadoinfraestructura']; ?>" /></td>
				</tr>
				<tr>
					<td><b>Imagen</b></td>
		        <td><input type="file" id="archivo" name="archivo"></td>
		         </tr>

				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				<td colspan="2"><center><input type="button" onclick=" location.href='mdia.php' " value="Regresar" name="boton" /> </center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
