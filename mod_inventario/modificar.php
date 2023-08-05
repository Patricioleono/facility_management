<?php require('../phpscript/logigin.php'); ?>
 <?php require('phpscripts/req_modificar.php'); ?>

<html>
	<head>
		<title>Modificar Equipo</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="scripts/validarnuevo.js"></script> 
    <script src="scripts/ajax.js"></script> 
				<style>
		#inputs{
			width: '100%';
			background-color: #D7F9F5;
		}
   
		</style>
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
    
   <link rel="stylesheet" href="css/css_mdi.css">
    <script type="text/javascript">
    $(function(){
      var data = "accion=carga_dpto";
      $.get('validarlistbox1.php?id1=<?php echo $pisoeleccion; ?>', data, function(resp){
        $('#sDep').html(resp);
        carga_provincias();
      });
      $('#sDep').change(function(){
      carga_provincias();
      });
  
    });
    function carga_provincias(){
      var cd = $('#sDep').val();
      var data = "accion=carga_prov&cd="+cd;
      $.get('validarlistbox1.php?id=<?php echo urlencode($sectoreleccion); ?>', data, function(resp){
        $('#sprov').html(resp);
      });
    }
</script>

	</head>
	<body>
		
		<center><h1>Modificar Equipo</h1></center>
		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_equipo.php?id=<?php echo $id ;?>">
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<table style="width:80%;  margin:auto;" border="0px" cellspacing="10px">
  <tr>
  
    <td id="tit" colspan="4" width="33.3%">Nombre Equipo</td>
    <td id="tit" colspan="4" width="33.3%">Tipo de equipo</td>
    <td id="tit" colspan="4" width="33.3%">Nombre del fabricante</td>
  </tr>
  <tr>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="nombreequipo" size="25" value="<?php echo utf8_encode ($row['nombreequipo']);?>" /></td>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="tipoequipo" size="25" value="<?php echo utf8_encode ($row['tipoequipo']);?>" /></td>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" value="<?php echo utf8_encode ($row['nombrefabricante']);?>" /></td>
  </tr>
  
  <tr>
    <td id="tit" colspan="4" width="33.33%">Numero Modelo</td>
    <td id="tit" colspan="4" width="33.33%">Numero de Serie</td>
    <td id="tit" colspan="4" width="33.33%">Version Software</td>
  </tr>
  <tr>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" value="<?php echo utf8_encode ($row['numeromodelo']); ?>"/></td>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" value="<?php echo utf8_encode ($row['numeroserie']); ?>"/></td>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="versionsoftware" size="25" value="<?php echo utf8_encode ($row['versionsoftware']); ?>"/></td>
  </tr>
    <tr>
    <td id="tit" colspan="3" width="25%">Alto</td>
    <td id="tit" colspan="3" width="25%">Largo</td>
    <td id="tit" colspan="3" width="25%">Ancho</td>
    <td id="tit" colspan="3" width="25%">Distancia al piso</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="alto" size="25" value="<?php echo utf8_encode ($row['alto']); ?>"/></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="largo" size="25" value="<?php echo utf8_encode ($row['largo']); ?>" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="ancho" size="25" value="<?php echo utf8_encode ($row['ancho']); ?>"/></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="distanciaalpiso" size="25" value="<?php echo utf8_encode ($row['distanciaalpiso']); ?>"/></td>
  </tr>
  <tr>	
    <td id="tit" colspan="6">Nombre Proveedor</td>
    <td id="tit" colspan="6">Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" value="<?php echo utf8_encode ($row['nombreproveedor']); ?>"/></td>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" value="<?php echo utf8_encode ($row['codigoproveedor']); ?>"/></td>
  
  </tr>
  <tr>
    <td id="tit" colspan="6" width="50%">Piso</td>
    <td id="tit" colspan="6" width="50%">Recinto</td>
  </tr>



  <tr>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="piso" size="25" value="<?php echo utf8_encode ($row['piso']); ?>"/></td>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="recinto" size="25" value="<?php echo utf8_encode ($row['recinto']); ?>"/></td>
  </tr>

  <tr>
    <td id="tit" colspan="4" width="33.3%">Precio Compra</td>
    <td id="tit" colspan="4" width="33.3%">Fecha instalacion</td>
    <td id="tit" colspan="4" width="33.3%">Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" value="<?php echo utf8_encode ($row['preciocompra']); ?>"/></td>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="text" name="fechainstalacion" size="25" value="<?php echo utf8_encode ($row['fechainstalacion']); ?>"/></td>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="text" name="fechacaducidadgarantia" size="25" value="<?php echo utf8_encode ($row['fechacaducidadgarantia']); ?>"/></td>
  </tr>
  <tr>
    <td colspan="4" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="4" width="33.3%">Estado del Equipo</td>
    <td colspan="4" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="text" name="responsablemantenimiento" size="25" value="<?php echo utf8_encode ($row['responsablemantenimiento']); ?>"/></td>
    
    <td colspan="4" id="inputs">
      <select style="width:100%" name="estadoequipo" >
        <option value="<?php echo utf8_encode($row['estadoequipo']); ?>" selected><?php echo utf8_encode ($row['estadoequipo']); ?></option>
        <option>BUENO</option>
        <option>EN MANTENCION</option>
        <option>FALLANDO</option>
        <option>MALO</option>
      </select>
    </td>
   
    <td colspan="4" id="inputs">
      <select style="width:100%" name="acreditacion">
        <option value="<?php echo utf8_encode($row['acreditacion']); ?>" selected><?php echo utf8_encode ($row['acreditacion']); ?></option>
        <option>EQ 2.1 (Critico)</option>
        <option>EQ 2.2 (Relevante)</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="6">Imagen</td>
    <td colspan="6" id="inputs"><input type="file" id="archivo" name="archivo"></td>
  </tr>
</table>
    <center><input style="width:auto" class="button2" type="submit" name="Guardar" value="Registrar" />  <input style="width:auto" class="button2" type="button" onclick=" location.href='mdi.php' " value="Regresar" name="boton" /> </center>

	</form>	
		
	<div id="myDiv"></div>	
	</body>
</html>	
