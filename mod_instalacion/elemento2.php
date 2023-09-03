<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_elemento.php'); ?>

<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
		<script>
		document.addEventListener('copy', function(e){
  			e.clipboardData.setData('text/plain','../fichas/ficha_instalaciones.php?id='+<?php echo''.$row['idunica'].''; ?>);
  			e.preventDefault();
  		}); 
		</script>
          <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
}
</style>
    
    </style>
  
		<title>Modulo de Instalaciones</title>
	</head>
	<body>
		
		<center><h1>Modulo de Instalaciones</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC='.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>

		<table style="width:80%;  margin:auto;" cellspacing="10px">
  <tr>
    <td id="tit" colspan="3" ><strong>Nombre Instalación</strong></td>
    <td id="tit" colspan="2" ><strong>ID Instalación</strong></td>
    <td id="tit" colspan="3" ><strong>Sistema</strong></td>
  </tr>
   <tr>
    <td  colspan="3" id="inputs"><?php echo $row['nombreinstalacion'];?></td>
    <td  colspan="2" id="inputs"><?php echo $row['idunica'];?></td>
    <td  colspan="3" id="inputs"><?php echo $row['sistema'];?></td>
  </tr>
  
  <tr>
    <td id="tit" colspan="3" width="25%"><strong>Equipo</strong></td>
    <td id="tit" colspan="2" width="25%"><strong>Marca</strong></td>
    <td id="tit" colspan="2" width="25%"><strong>Modelo</strong></td>
    <td id="tit" colspan="3" width="25%"><strong>Codigo</strong></td>
  </tr>
  <tr>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['equipo'];?></td> 
    <td colspan="2" id="inputs" width="25%"><?php echo $row['marca']; ?></td>
    <td colspan="2" id="inputs" width="25%"><?php echo $row['modelo']; ?></td>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['codigo']; ?></td>
  </tr>

  <tr>	
    <td id="tit" colspan="3" ><strong>Potencia</strong></td>
    <td id="tit" colspan="2" ><strong>Unidad de potencia</strong></td>  
    <td id="tit" colspan="3" ><strong>Nombre del fabricante</strong></td>
  </tr>
  <tr>
    <td colspan="3" id="inputs" width="33.33%"><?php echo $row['potencia']; ?></td>
    <td colspan="2" id="inputs" width="33.33%"><?php echo $row['unidadpotencia']; ?></td>
    <td colspan="3" id="inputs" width="33.33%"><?php echo $row['nombrefabricante']; ?></td>
  </tr>

  <tr>
    <td id="tit" colspan="3" width="33.33%" ><strong>Version de software</strong></td>
    <td id="tit" colspan="2" width="33.33%" ><strong>Nombre del proveedor</strong></td>
    <td id="tit" colspan="3" width="33.33%" ><strong>Codigo del proveedor</strong></td>
  </tr>
  <tr>
    
    <td colspan="3" id="inputs" width="33.33%"><?php echo $row['versionsoftware']; ?></td>
    <td colspan="2" id="inputs" width="33.33%"><?php echo $row['nombreproveedor']; ?></td>
    <td colspan="3" id="inputs" width="33.33%"><?php echo $row['codigoproveedor']; ?></td>
  </tr>

  <tr>
    <td id="tit" colspan="3" width="25%" ><strong>Unidad</strong></td>
    <td id="tit" colspan="2" width="25%" ><strong>Área</strong></td>
    <td id="tit" colspan="2" width="25%" ><strong>Recinto</strong></td>
    <td id="tit" colspan="3" width="25%" ><strong>Piso</strong></td>
  </tr>
  <tr>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['unidad']; ?></td>
    <td colspan="2" id="inputs" width="25%"><?php echo $row['area']; ?></td>
    <td colspan="2" id="inputs" width="25%"><?php echo $row['recinto']; ?></td>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['piso']; ?></td>
  </tr>

  <tr>
    <td colspan="3" width="33.3%"><strong>Fecha de la instalación</strong></td>
    <td colspan="2" width="33.3%"><strong>Precio de la Compra</strong></td>
    <td colspan="3" width="33.3%"><strong>Fecha caducidad de la garantía</strong></td>
  </tr>
  <tr>  
    <td colspan="3" id="inputs" width="33.3%"><?php echo $row['fechainstalacion']; ?></td>
    <td colspan="2" id="inputs" width="33.3%"><?php echo $row['preciocompra']; ?></td>
    <td colspan="3" id="inputs" width="33.3%"><?php echo $row['fechacaducidadgarantia']; ?></td>
  </tr>

  <tr>
    <td colspan="3" width="33.3%"><strong>Responsable Mantenimiento</strong></td>
    <td colspan="2" width="33.3%"><strong>Estado de la Instalación</strong></td>
    <td colspan="3" width="33.3%"><strong>Especialidad</strong></td>
  </tr>
  <tr>
    <td colspan="3" id="inputs" width="33.3%"><?php echo $row['responsablemantenimiento']; ?></td>
    <td colspan="2" id="inputs" width="33.3%" ><?php echo $row['estadoequipo']; ?></td>
    <td colspan="3" id="inputs" width="33.3%"><?php echo $row['acreditacion']; ?></td>
  </tr>

  <tr>
    <td id="tit" colspan="2" width="20%" ><strong>Alto</strong></td>
    <td id="tit" colspan="2" width="20%" ><strong>Largo</strong></td>
    <td id="tit" colspan="2" width="20%" ><strong>Ancho</strong></td>
    <td id="tit" colspan="1" width="20%" ><strong>Distancia al píso</strong></td>
    <td id="tit" colspan="1" width="20%" ><strong>Peso</strong></td>
  </tr>
  <tr>
    <td colspan="2" id="inputs" width="20%"><?php echo $row['alto']; ?></td>
    <td colspan="2" id="inputs" width="20%"><?php echo $row['largo']; ?></td>
    <td colspan="2" id="inputs" width="20%"><?php echo $row['ancho']; ?></td>
    <td colspan="1" id="inputs" width="20%"><?php echo $row['distanciaalpiso']; ?></td>
    <td colspan="1" id="inputs" width="20%"><?php echo $row['peso']; ?></td>
  </tr>
  
   <tr >    
    <td colspan="2" width="33.33%"><button class="button2" onclick="document.execCommand('copy');">Generar Enlace</button></td>
  <form method="POST" action="historialequipo2.php">
    <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    <td colspan="3" width="33.33%"><button type="button" class="button2" value="Enviar" title="Documentos" onclick="form.submit()">Historial de Equipo</button></td>
  </form>
    <td colspan="3" width="33.33%"><input type="button" class="button2" value="Regresar" name="Regresar" onclick="location.href='http://www.bim.cl/BIM/QA/logeado.php'" /></td>
   </tr> 
</table>
		
		</body>
	</html>	
	