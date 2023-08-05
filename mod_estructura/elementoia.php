<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_elementoia.php');?>

<html>
	<head>
		<meta charset="utf-8">
	<title>Uploads Files</title>
		<style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
  <script>
  	document.addEventListener('copy', function(e){
  		e.clipboardData.setData('text/plain','http://localhost/sistemaarreglado/mod_estructura/elementoia.php?id='+<?php echo''.$row['idunica'].''; ?>);
  		e.preventDefault();
  	});
  </script>
		<title>Modulo de infraestructura</title>
	</head>
	<body>
		
		<center><h1>Modulo de infraestructura</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC="elementos/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>
		<!-- C:/xampp/htdocs/sistema/6/6.png
		<?php echo $row['imagen'];?> -->
		<table border=1 width="auto" style="margin: 0 auto;" align left>
				<thead>
				<tr>
					<td><b>Nombre infraestructura</b></td>
					<td><?php echo $row['nombreinfraestructura'];?></td>
				</tr>
				<tr>
					<td><b>ID infraestructura</b></td>
					<td><?php echo $row['idunica'];?></td>
				</tr>
				<tr>
                    <td><b>Tipo infraestructura</b></td>
					<td><?php echo $row['tipoinfraestructura'];?></td>
				</tr>

				<tr>
                    <td><b>Nombre Fabricante</b></td>
					<td><?php echo $row['nombrefabricante'];?></td>
				</tr>
				<tr>
                    <td><b>Numero Modelo</b></td>
					<td><?php echo $row['numeromodelo'];?></td>
				</tr>
				<tr>
                    <td><b>Numero Serie</b></td>
					<td><?php echo $row['numeroserie'];?></td>
				</tr>
				<tr>
                    <td><b>Version Software</b></td>
					<td><?php if($row['versionsoftware'] == ''){
						echo "No Aplica";
					}else{echo $row['versionsoftware'];}?></td>
				</tr>
				<tr>
                    <td><b>Nombre Proveedor</b></td>
					<td><?php echo $row['nombreproveedor'];?></td>
				</tr>
				<tr>
                    <td><b>Codigo Proveedor</b></td>
					<td><?php echo $row['codigoproveedor'];?></td>
				</tr>
				<tr>
                    <td><b>Descripcion Ubicacion</b></td>
					<td><?php echo $row['descripcionubicacion'];?></td>
				</tr>
				<tr>
                    <td><b>Codigo Ubicacion</b></td>
					<td><?php echo $row['codigoubicacion'];?></td>
				</tr>
				<tr>
                    <td><b>Precio Compra</b></td>
					<td><?php echo $row['preciocompra'];?></td>
				</tr>
				<tr>
                    <td><b>Fecha Instalacion</b></td>
					<td><?php echo $row['fechainstalacion'];?></td>
				</tr>
				<tr>
                    <td><b>Fecha Caducidad Garantia</b></td>
					<td><?php echo $row['fechacaducidadgarantia'];?></td>
				</tr>		
				<tr>
                    <td><b>Responsable Mantenimiento</b></td>
					<td><?php echo $row['responsablemantenimiento'];?></td>
				</tr>
				<tr>
                    <td><b>Estado infraestructura</b></td>
					<td><?php echo $row['estadoinfraestructura'];?></td>
				</tr>
				<tbody>
					<tr>
					        <td>
								<a href="calender/calendaria.php?id=<?php echo $row['idunica'];?>">Mostrar Calendario </a>
							</td>
							<td>
								<a href="pdfia.php?id=<?php echo $row['idunica'];?>" target="_blank">Exportar a Documento ".PDF"</a>
							</td>
                            </tr>
                            <tr>
							<td>
								<a href="modificaria.php?id=<?php echo $row['idunica'];?>">Modificar Elemento</a>
							</td>
							<td>
								<a href="eliminaria.php?id=<?php echo $row['idunica'];?>">Eliminar Elemento</a>
							</td>
						</tr>
						
				<td align="center" colspan="2" ><button style="width:100%;" onclick="document.execCommand('copy');">Generar Enlace</button></td>
				<tr>
				<td colspan="2"><center><input type="button" style="width:100%;" onclick=" location.href='mdia.php' " value="Regresar" name="boton" /> </center></td>
				</tbody>
					</tr>
				</thead>

		     </table>
		</body>
	</html>	
	