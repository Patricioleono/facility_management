<?php require('phpscripts/req_elemento.php'); ?>
<?php require('../phpscript/logigin.php'); ?>

<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
		<script>
		document.addEventListener('copy', function(e){
  			e.clipboardData.setData('text/plain','http://www.bim.cl/hospital_LuisCalvoMackena/fichas/ficha_equipos_medicos.php?id='+<?php echo''.$row['idunica'].''; ?>);
  			e.preventDefault();
  		});
		</script>
          <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
		<title>Modulo de Inventario</title>
	</head>
	<body>
		
		<center><h1>Modulo de Inventario</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC="'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>

		<table style="width:80%;  margin:auto;" cellspacing="10px">
  <tr>
    <td id="tit" colspan="6" width="50%">Nombre Equipo</td>
    <td id="tit" colspan="6" width="50%">ID Equipo</td>
    
  </tr>
   <tr>
    <td  colspan="6" width="50%" id="inputs"><?php echo utf8_encode($row['nombreequipo']);?></td>
    <td  colspan="6" width="50%" id="inputs"><?php echo utf8_encode($row['idunica']);?></td>
  
  </tr>
     <tr>
    <td id="tit" colspan="6" width="50%">Tipo de equipo</td>
    <td id="tit" colspan="6" width="50%">Nombre del fabricante</td>
  </tr>
     <tr>
    <td  colspan="6" width="50%" id="inputs"><?php echo utf8_encode($row['tipoequipo']);?></td>
    <td  colspan="6" width="50%" id="inputs"><?php echo utf8_encode($row['nombrefabricante']);?></td>

  </tr>
   
  <tr>
    <td id="tit" colspan="4" width="33.33%" >Numero Modelo</td>
    <td id="tit" colspan="4" width="33.33%" >Numero de Serie</td>
    <td id="tit" colspan="4" width="33.33%" >Version Software</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><?php echo $row['numeromodelo']; ?></td>
    <td colspan="4" id="inputs"><?php echo $row['numeroserie']; ?></td>
    <td colspan="4" id="inputs"><?php echo $row['versionsoftware']; ?></td>
  </tr>
  <tr>
    <td colspan="3" id="tit" width="25%">Alto</td>
    <td colspan="3" id="tit" width="25%">Largo</td>
    <td colspan="3" id="tit" width="25%">Ancho</td>
    <td colspan="3" id="tit" width="25%">Distancia al piso</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['alto']; ?></td>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['largo']; ?></td>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['ancho']; ?></td>
    <td colspan="3" id="inputs" width="25%"><?php echo $row['distanciaalpiso']; ?></td>
  </tr>
  <tr>	
    <td id="tit" colspan="6" >Nombre Proveedor</td>
    <td id="tit" colspan="6" >Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="6" id="inputs"><?php echo utf8_encode($row['nombreproveedor']); ?></td>
    <td colspan="6" id="inputs"><?php echo utf8_encode($row['codigoproveedor']); ?></td>
  
  </tr>
  <tr>
  	<td id="tit" colspan="3" width="25%" >Unidad</td>
    <td id="tit" colspan="3" width="25%" >Area</td>
    <td id="tit" colspan="3" width="25%" >Recinto</td>
    <td id="tit" colspan="3" width="25%" >Piso</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['unidad']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['area']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['recinto']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['piso']); ?></td>
  </tr>
  
  <tr>
    <td id="tit" colspan="4" width="33.3%" >Precio Compra</td>
    <td id="tit" colspan="4" width="33.3%" >Fecha instalacion</td>
    <td id="tit" colspan="4" width="33.3%" >Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><?php echo $row['preciocompra']; ?></td>
    <td colspan="4" id="inputs"><?php echo $row['fechainstalacion']; ?></td>
    <td colspan="4" id="inputs"><?php echo $row['fechacaducidadgarantia']; ?></td>
  </tr>
  <tr>
    <td colspan="4" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="4" width="33.3%">Estado del Equipo</td>
    <td colspan="4" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['responsablemantenimiento']); ?></td>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['estadoequipo']); ?></td>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['acreditacion']); ?></td>

  </tr>
</table>  
   <br><center><button style="width:20%;" class="button2" onclick="document.execCommand('copy');">Generar Enlace</button> 
<input type="button" style="width:10%;" class="button2" value="Regresar" name="Regresar" onclick="history.back()" />
  <form method="POST" action="historialequipo.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="button2" value="Enviar" title="Documentos" onclick="form.submit()">Historial del Equipo</button>
    		</form></center>

		
		</body>
	</html>	
	