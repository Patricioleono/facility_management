<?php
require('../conexion.php');
$query="SELECT * FROM eventcalenderinstalaciones where checkbox='0' and eventDate != 'NULL' ORDER BY eventDate";
$resultado=$mysqli->query($query);
$fecha=strftime( "%d-%m-%Y", time() );
?>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<title>Mantenimientos Pendientes</title>
	<style type="text/css">
		@import "../css/fondo.css";
	</style>
<link rel="stylesheet" href="../css/css_mdi.css">
	</head>
	<body>		
		<center><h1>Mantenimientos Pendientes</h1></center>
			<table width="auto" style="margin: 0 auto;">
			<th>Fecha Actual: </th>
			<th><?php echo $fecha ?></th>
				<tr>
				        <td width="20%" colspan="2" id="inputs2"><center><b>ID Equipo</b></center></td>
						<td width="20%" colspan="2" id="inputs2"><center><b>Nombre Equipo</b></center></td>
						<td width="20%" colspan="2" id="inputs2"><center><b>Modelo Equipo</b></center></td>
						<td width="20%" colspan="2" id="inputs2"><center><b>Fecha Mantencion</b></center></td>
						<td width="20%" colspan="2" id="inputs2"><center><b>Enlace Calendario</b></center></td>
				</tr>

				<?php while($row=$resultado->fetch_assoc()){ ?>
				<?php 
					$idequipocheck=$row['idequipo'];
					$query2="SELECT * FROM instalaciones where idunica='$idequipocheck'";
					$resultado2=$mysqli->query($query2);
					$row2=$resultado2->fetch_assoc();
					$fecha = strtotime(date("Y-m-d"));
					$fecha_evento =strtotime($row['eventDate']);
				?>
				<tr>
				    <td width="20%" colspan="2" id="inputs"><center><?php echo $row2['idunica'] ?></center></td>
					<td width="20%" colspan="2" id="inputs"><center><?php echo $row2['equipo'] ?></center></td>
				    <td width="20%" colspan="2" id="inputs"><center><?php echo $row2['modelo'] ?></td>
				    <?php if($fecha>$fecha_evento){
				    	$query11="UPDATE instalaciones set estadoequipo='SIN MANTENCION' where idunica='$idequipocheck'";
				    	$resultado11=$mysqli->query($query11);?>
				    <td width="20%" colspan="2" id="inputs" style="color:#FF0000"><center><?php echo $row['eventDate'] ?></center></td>
				    <?php }else if($fecha==$fecha_evento) { ?>
				     <td width="20%" colspan="2" id="inputs" style="color:#088A08"><center><strong><?php echo $row['eventDate'] ?></strong></center></td>
				     <?php }else if($fecha<$fecha_evento){  ?>
				     <td width="20%" colspan="2" id="inputs" style="color:#0101DF"><center><?php echo $row['eventDate'] ?></center></td>
				     <?php }?>
					<td width="20%" colspan="2" id="inputs"><center><a href="../mod_instalacion/calendar/calendar.php?id=<?php echo $row2['id'] ?>">Ir</a></center></td>
				<?php } ?>
				</tr>
				<tr>
				<td align="center">
					Generar listado en PDF --> 
				</td>
			<td align="center" colspan="2">
       		 <form target="_blank" method="POST" action="../mod_instalacion/pdfnotificaciones.php">
             <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="50px" height="50px" src="../images/pdf.png"></button>
       		 </form>
      		</td>
      		<td>
      			<font color="#FF0000" size="1.5">PASADO</font><br>
				<font color="#088A08" size="2"><strong>HOY</strong></font><br>
				<font color="#0101DF" size="1.5">FUTURO</font>
			</td>
				</tr>
			</table>
		</form>
		</body>
</html>	



