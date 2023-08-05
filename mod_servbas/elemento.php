<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_elemento.php'); ?>

<html>
	<head>
		<meta charset="utf-8">
   	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
		<script>
		document.addEventListener('copy', function(e){
  			e.clipboardData.setData('text/plain','http://www.bim6d.cl/test/fichas/ficha_artefactos.php?id='+<?php echo''.$row['idunica'].''; ?>);
  			e.preventDefault();
  		});
		</script>
          <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    } 
</style>
  
		<title>Modulo de Artefactos</title>
	</head>
	<body>
		
		<center><h1>Modulo de Artefactos</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC="elementos/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>

		<table style="width:80%;  margin:auto;" cellspacing="10px">
  <tr>
    <td id="tit" colspan="3" width="50%">Nombre Artefacto</td>
    <td id="tit" colspan="3" width="50%">ID Artefacto</td>
    
  </tr>
   <tr>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['nombreequipo'];?></td>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['idunica'];?></td>
  
  </tr>
     <tr>
    <td id="tit" colspan="3" width="50%">Tipo de Artefacto</td>
    <td id="tit" colspan="3" width="50%">Nombre del fabricante</td>
  </tr>
     <tr>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['tipoequipo'];?></td>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['nombrefabricante'];?></td>

  </tr>
   
  <tr>
    <td id="tit" colspan="3" width="33.33%" >Numero Modelo</td>
    <td id="tit" colspan="3" width="33.33%" >Numero de Serie</td>

  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo $row['numeromodelo']; ?></td>
    <td colspan="3" id="inputs"><?php echo $row['numeroserie']; ?></td>
   
  </tr>
  <tr>	
    <td id="tit" colspan="3" >Nombre Proveedor</td>
    <td id="tit" colspan="3" >Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo $row['nombreproveedor']; ?></td>
    <td colspan="3" id="inputs"><?php echo $row['codigoproveedor']; ?></td>
  
  </tr>
  <tr>
  	<td id="tit" colspan="3" width="50%" >Piso</td>
    <td id="tit" colspan="3" width="50%" >Recinto</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo $row['piso']; ?></td>
    <td colspan="3" id="inputs"><?php echo $row['recinto']; ?></td>
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%" >Precio Compra</td>
    <td id="tit" colspan="2" width="33.3%" >Fecha instalacion</td>
    <td id="tit" colspan="2" width="33.3%" >Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><?php echo $row['preciocompra']; ?></td>
    <td colspan="2" id="inputs"><?php echo $row['fechainstalacion']; ?></td>
    <td colspan="2" id="inputs"><?php echo $row['fechacaducidadgarantia']; ?></td>
  </tr>
  <tr>
    <td colspan="2" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="2" width="33.3%">Estado del Artefacto</td>
    <td colspan="2" width="33.3%">Especialidad</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs" ><?php echo $row['responsablemantenimiento']; ?></td>
    <td colspan="2" id="inputs" ><?php echo $row['estadoequipo']; ?></td>
    <td colspan="2" id="inputs" ><?php echo $row['acreditacion']; ?></td>

  </tr>
</table>

<center><button style="width:auto;" class="button2" onclick="document.execCommand('copy');">Generar Enlace</button> <input type="button" class="button2" style="width:auto;" value="Regresar" name="Regresar" onclick="history.back()" /></center>


		
		</body>
	</html>	
	