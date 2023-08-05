<?php require('../phpscript/logigin.php'); ?>
 <?php require('phpscripts/req_modificar.php'); ?>

<html>
	<head>
		<title>Modificar Instalacion</title>
		<script src="scripts/validarnuevo.js"></script> 
				<style>
		#inputs{
			width: '100%';
			background-color: #D7F9F5;
		}

		</style>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></title>

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
		
		<center><h1>Modificar Instalación</h1></center>
		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_equipo.php?id=<?php echo $id;?>">
		<table style="width:95%;  margin:auto;"border="0px" cellspacing="8px">
  <tr>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <td id="tit" colspan="2" width="33.3%"><strong>Nombre Instalación</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Sistema</strong></td>
    <td id="tit" colspan="3" width="33.3%"><strong>Equipo</strong></td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="nombreinstalacion" size="25" value='<?php echo $row['nombreinstalacion'];?>' /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="sistema" size="25" value='<?php echo $row['sistema'];?>' /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="equipo" size="25" value="<?php echo $row['equipo'];?>" /></td>
  </tr>
  
    <td id="tit" colspan="2" width="33.3%"><strong>Marca</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Modelo</strong></td>
    <td id="tit" colspan="3" width="33.3%"><strong>Codigo</strong></td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="marca" size="25" value='<?php echo $row['marca'];?>' /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="modelo" size="25" value='<?php echo $row['modelo'];?>' /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigo" size="25" value="<?php echo $row['codigo'];?>" /></td>
  </tr>

    <td id="tit" colspan="2" width="33.3%"><strong>Potencia</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Unidad de Potencia</strong></td>
    <td id="tit" colspan="3" width="33.3%"><strong>Nombre del fabricante</strong></td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="potencia" size="25" value='<?php echo $row['potencia'];?>' /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="unidadpotencia" size="25" value='<?php echo $row['unidadpotencia'];?>' /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" value="<?php echo $row['nombrefabricante'];?>" /></td>
  </tr>

  <tr>  
    <td id="tit" colspan="2"><strong>Nombre Proveedor</strong></td>
    <td id="tit" colspan="2"><strong>Codigo Proveedor</strong></td>
    <td id="tit" colspan="3"><strong>Version Software</strong></td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" value="<?php echo $row['nombreproveedor']; ?>"/></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" value="<?php echo $row['codigoproveedor']; ?>"/></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="versionsoftware" size="25" value="<?php echo $row['versionsoftware']; ?>"/></td>
  </tr>

  <tr>  
    <td id="tit" colspan="2"><strong>Unidad</strong></td>
    <td id="tit" colspan="2"><strong>Área</strong></td>
    <td id="tit" colspan="1"><strong>Recinto</strong></td>
    <td id="tit" colspan="1"><strong>Piso</strong></td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="unidad" size="25" value='<?php echo $row['unidad'];?>' /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="area" size="25" value='<?php echo $row['area'];?>' /></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="recinto" size="25" value="<?php echo $row['recinto'];?>" /></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="piso" size="25" value="<?php echo $row['piso'];?>" /></td>
  </tr>

  <tr>
    <td id="tit" colspan="2" width="33.3%"><strong>Precio Compra</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Fecha instalacion</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Fecha Garantia</strong></td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" value="<?php echo $row['preciocompra']; ?>"/></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" value="<?php echo $row['fechainstalacion']; ?>"/></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" value="<?php echo $row['fechacaducidadgarantia']; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" width="33.3%"><strong>Responsable Mantenimiento</strong></td>
    <td colspan="2" width="33.3%"><strong>Estado del Equipo</strong></td>
    <td colspan="2" width="33.3%"><strong>Acreditacion</strong></td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="responsablemantenimiento" size="25" value="<?php echo $row['responsablemantenimiento']; ?>"/></td>
    <td colspan="2" id="inputs">
      <select style="width:100%" name="estadoequipo" >
        <option value="<?php echo $row['estadoequipo']; ?>" selected> Seleccionar Estado </option>
        <option>Nuevo</option>
        <option>En uso</option>
      </select>
    </td>
    <td colspan="2" id="inputs">
      <select style="width:100%" name="acreditacion">
        <option value="<?php echo $row['acreditacion']; ?>" selected> Seleccionar Especialidad </option>
        <option>Relevante</option>
        <option>Critico</option>
      </select>
    </td>
  </tr>

  <tr>  
    <td colspan="1"></td>
    <td id="tit" colspan="1"><strong>Alto</strong></td>
    <td id="tit" colspan="1"><strong>Largo</strong></td>
    <td id="tit" colspan="1"><strong>Ancho</strong></td>
    <td id="tit" colspan="1"><strong>Distancia al piso</strong></td>
    <td id="tit" colspan="1"><strong>Peso</strong></td>
  </tr>
  <tr>
  <td colspan="1"></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="alto" size="25" value='<?php echo $row['alto'];?>' /></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="largo" size="25" value='<?php echo $row['largo'];?>' /></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="ancho" size="25" value="<?php echo $row['ancho'];?>" /></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="distanciaalpiso" size="25" value="<?php echo $row['distanciaalpiso'];?>" /></td>
    <td colspan="1" ><input style="width:100%" id="inputs" type="text" name="peso" size="25" value="<?php echo $row['peso'];?>" /></td>
  </tr>

  <tr>
    <td colspan="6" id="inputs" style="text-align: center;"><strong>Imagen:</strong><input type="file" id="archivo" name="archivo"></td>
  </tr>

  <tr>
    <td colspan="3"><center><input style="width:100%"  type="submit" name="Guardar" value="Registrar" /></center></td>
    <td colspan="3"><center><input style="width:100%"  type="button" onclick=" location.href='mdins.php' " value="Regresar" name="boton" /> </center></td>
  </tr>

</table>
	</form>	
		
		
	</body>
</html>	
