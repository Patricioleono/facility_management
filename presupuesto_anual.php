<?php
include_once('conexion2.php');
$year = intval($_POST['year']);

$sql ="SELECT DISTINCT presupuesto, year FROM presupuesto WHERE year = '$year' GROUP BY year";

$stmt = $con->query($sql);
$row = $stmt->fetch_array();

?>
<html>
	<head>
	<style type="text/css">
		@import "css/fondo.css";
	</style>

		<title>Presupuesto</title>
   <link rel="stylesheet" href="css/css_mdi.css">

	</head>
	<body>
		
		<center><h1>Presupuesto</h1></center>
			<table width="50%" style="margin: 0 auto;">
				<tr>
						<td width="25%" id="inputs2" colspan="2"><center><b>Presupuesto</b></center></td>
						<td width="25%" id="inputs2" colspan="2"><center><b>Annio</b></center></td>
					</tr>
				<tr>
					<td width="25%" id="inputs" colspan="2"><center><?php echo number_format($row['presupuesto'], '0', ',', '.'); ?></center></td>
					<td width="25%" id="inputs" colspan="2"><center><?php echo $row['year']; ?></center></td>
				    </tr>
</table>
</form>
<form method="POST" action="eliminar_presupuesto.php">
<input type="hidden" name="year" value="<?php echo $row['year'] ?>"/>
<center><input style="width:auto" type="submit" class="button2" name="Confirmar" value="ELIMINAR PRESUPUESTO" /></center>
</form>
</body>
</html>	