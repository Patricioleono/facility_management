<?php require('../phpscript/logigin.php'); ?>
<html>
	<head>
		<title>Nueva Instalacion</title>
		<style>
		#inputs{
			width: '100%';
			background-color: #D7F9F5;
    }
</style>
		
		</style>
		<script src="scripts/validarnuevo2.js"></script> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
		<center><h1>Nueva Instalación</h1></center>
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_equipo.php">
		<table style="width:80%;  margin:auto;"border="0px" cellspacing="10px">
<tr>
<td colspan="2"></td>
 <th colspan="5">Imagen</th>
</tr>
  <tr>
  <td colspan="2"></td>
    <td colspan="5" id="inputs"><input type="file" id="archivo" name="archivo" width="100%"></td>
  </tr>

  <tr>
    <td id="tit" colspan="3" width="33.33%">Nombre Instalación</td>
    <td id="tit" colspan="3" width="33.33%">ID Instalación</td>
    <td id="tit" colspan="3" width="33.33%">Sistema</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreinstalacion" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="idunica" id="idunica" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="sistema" id="sistema" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="3">Equipo</td>
    <td id="tit" colspan="3">Marca</td>
    <td id="tit" colspan="3">Modelo</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="equipo" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="marca" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="modelo" size="25" /></td>
  </tr>

 <tr>
    <td id="tit" colspan="3">Codigo</td>
    <td id="tit" colspan="3">Potencia</td>
    <td id="tit" colspan="3">Unidad de Potencia</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigo" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="number" name="potencia" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="unidadpotencia" size="25" /></td>
  </tr>
  
  <tr>
    <td id="tit" colspan="3" width="25%">Nombre del Fabricante</td>
    <td id="tit" colspan="2" width="25%">Version Software</td>
    <td id="tit" colspan="3" width="25%">Nombre Proveedor</td>
    <td id="tit" colspan="2" width="25%">Codigo Proveedor</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="versionsoftware" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" /></td>
  </tr>

  <tr>
      <td id="tit" colspan="3" width="25%">Unidad</td>
      <td id="tit" colspan="2" width="25%">Área</td>
      <td id="tit" colspan="3" width="25%">Recinto</td>
  	  <td id="tit" colspan="2" width="25%">Piso</td>
  </tr>
  <tr>
      <td colspan="3" id="inputs">
      <select style="width:100%" name="unidad">
        <option>Cirugia general y especialidades</option>
        <option>Dialisis</option>
        <option>Anestesiologia</option>
        <option>Servicios Generales</option>
      </select>
    </td>
    <td colspan="2" id="inputs">
      <select style="width:100%" name="area">
        <option>Atención</option>
        <option>Soporte Tecnico</option>
        <option>Administrativa</option>
      </select>
    </td>
    <td colspan="3" id="inputs"><input style="width:100%" id="inputs" type="text" name="recinto" size="25" /></td>

    <td colspan="2" id="inputs">
      <select style="width:100%" name="piso">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </td>
  </tr>

  <tr>
    <td id="tit" colspan="3" width="33.3%">Precio Compra</td>
    <td id="tit" colspan="3" width="33.3%">Fecha instalacion</td>
    <td id="tit" colspan="3" width="33.3%">Fecha Caducidad</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><input style="width:100%" id="inputs" type="number" name="preciocompra" size="25" /></td>
    <td colspan="3" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" /></td>
    <td colspan="3" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" /></td>
  </tr>
  <tr>
    <td colspan="3" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="3" width="33.3%">Estado del Equipo</td>
    <td colspan="3" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><input style="width:100%" id="inputs" type="text" name="responsablemantenimiento" size="25" /></td>
    <td colspan="3" id="inputs">
      <select style="width:100%" name="estadoequipo">
        <option>BUENO</option>
        <option>MALO</option>
      </select>
    </td>
    <td colspan="3" id="inputs">
      <select style="width:100%" name="acreditacion">
        <option>Critico</option>
        <option>Relevante</option>
      </select>
    </td>
  </tr>

<tr>
      <td id="tit" colspan="2" width="20%">Alto</td>
      <td id="tit" colspan="2" width="20%">Largo</td>
      <td id="tit" colspan="2" width="20%">Ancho</td>
  	  <td id="tit" colspan="2" width="20%">Distancia Piso</td>
  	  <td id="tit" colspan="2" width="20%">Peso</td>
</tr>
 <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="alto" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="largo" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="ancho" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="distanciapiso" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="peso" size="25" /></td>
   </tr>
   <tr></tr>
  <tr>
    <td colspan="5"><center><input style="width:100%"  type="submit" name="enviar" value="Registrar" /></center></td>
    <td colspan="5"><center><input style="width:100%"  type="button" onclick=" location.href='mdins.php' " value="Regresar" name="boton" /> </center></td>
  </tr>
</table>
	</form>	

	</body>
</html>						