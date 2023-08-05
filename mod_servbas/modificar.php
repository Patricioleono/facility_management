<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_modificar.php'); ?>

<html>
	<head>
		<title>Modificar Artefacto</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="scripts/validarnuevo.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
				<style>
		#inputs{
			width: '100%';
			background-color: #d7f9f5;
    }
		</style>
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
    $(function(){
      var data = "accion=carga_dpto";
      $.get('validarlistbox.php', data, function(resp){
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
      $.get('validarlistbox.php', data, function(resp){
        $('#sprov').html(resp);
      });
    }
</script>
	</head>
	<body>
		
		<center><h1>Modificar Artefacto</h1></center>
		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_equipo.php?id=<?php echo $id ;?>">
		<table style="width:80%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <td id="tit" colspan="2" width="33.3%">Nombre Artefacto</td>
    <td id="tit" colspan="2" width="33.3%">Tipo de Artefacto</td>
    <td id="tit" colspan="2" width="33.3%">Nombre del fabricante</td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="nombreequipo" size="25" value='<?php echo $row['nombreequipo'];?>' /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="tipoequipo" size="25" value='<?php echo $row['tipoequipo'];?>' /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" value="<?php echo $row['nombrefabricante'];?>" /></td>
  </tr>
  
  <tr>
    <td id="tit" colspan="3" width="33.33%">Numero Modelo</td>
    <td id="tit" colspan="3" width="33.33%">Numero de Serie</td>
   
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" value="<?php echo $row['numeromodelo']; ?>"/></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" value="<?php echo $row['numeroserie']; ?>"/></td>
    
  </tr>
  <tr>	
    <td id="tit" colspan="3">Nombre Proveedor</td>
    <td id="tit" colspan="3">Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" value="<?php echo $row['nombreproveedor']; ?>"/></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" value="<?php echo $row['codigoproveedor']; ?>"/></td>
  
  </tr>
  <tr>
    <td id="tit" colspan="3" width="50%">Piso</td>
    <td id="tit" colspan="3" width="50%">Recinto</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="descripcionubicacion" size="25" value="<?php echo $row['piso']; ?>"/></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigoubicacion" size="25" value="<?php echo $row['recinto']; ?>"/></td>

  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%">Precio Compra</td>
    <td id="tit" colspan="2" width="33.3%">Fecha instalacion</td>
    <td id="tit" colspan="2" width="33.3%">Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" value="<?php echo $row['preciocompra']; ?>"/></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" value="<?php echo $row['fechainstalacion']; ?>"/></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" value="<?php echo $row['fechacaducidadgarantia']; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="2" width="33.3%">Estado del Artefacto</td>
    <td colspan="2" width="33.3%">Especialidad</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="responsablemantenimiento" size="25" value="<?php echo $row['responsablemantenimiento']; ?>"/></td>
    
    <td colspan="2" id="inputs">
      <select style="width:100%" name="estadoequipo" >
        <option value="<?php echo $row['estadoequipo']; ?>" selected> Seleccionar Estado </option>
        <option>En Uso</option>
        <option>En Reparacion</option>
        <option>Malo</option>
      </select>
    </td>
   
    <td colspan="2" id="inputs">
      <select style="width:100%" name="acreditacion">
        <option value="<?php echo $row['acreditacion']; ?>" selected> Seleccionar Especialidad </option>
        <option>Topografia</option>
        <option>Arquitectura</option>
        <option>Mecanica de Suelo y Socalzado</option>
        <option>Cálculo Estructural</option>
        <option>Aislación Sísmica</option>
        <option>Alcantarillado</option>
        <option>Aguas Lluvias</option>
        <option>Agua Potable</option>
        <option>Aguas Tratadas</option>
        <option>Eficiencia Energética</option>
        <option>Instalaciones Eléctricas</option>
        <option>Iluminación</option>
        <option>Redes de Combustibles</option>
        <option>Climatización</option>
        <option>Basura</option>
        <option>Red Seca y Húmeda</option>
        <option>Redes de Gases Clínicos</option>
        <option>Red de aire comprimido industrial</option>
        <option>Redes contra incendio</option>
        <option>Red de correo neumático</option>
        <option>Equipamiento Médico</option>
        <option>Gas</option>
        <option>Sistema Limpia Fachada</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="3">Imagen</td>
    <td colspan="3" id="inputs"><input type="file" id="archivo" name="archivo"></td>
  </tr>
</table>
    <center><input style="width:auto" class="button2" type="submit" name="Guardar" value="Registrar" /> <input style="width:auto" class="button2" type="button" onclick=" location.href='mdsb.php' " value="Regresar" name="boton" /> </center>


	</form>	
		
		
	</body>
</html>	
