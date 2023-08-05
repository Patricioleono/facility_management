<?php require('../phpscript/logigin.php'); ?>
<html>
	<head>
		<title>Nuevo Equipo</title>
		<style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }

		</style>
		<script src="scripts/validarnuevo.js"></script> 

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
		
		<center><h1>Nuevo Equipo</h1></center>
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_equipo.php">
		<table style="width:80%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
    <th id="tit" colspan="6" width="50%">Nombre Equipo</th>
    <th id="tit" colspan="6" width="50%">ID Equipo</th>
  </tr>
  <tr>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="nombreequipo" size="25" /></td>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="idunica" id="idunica" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="6">Tipo de equipo</td>
    <td id="tit" colspan="6">Nombre del fabricante</td>
  </tr>
  <tr>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="tipoequipo" size="25" /></td>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="4" width="33.33%">Numero Modelo</td>
    <td id="tit" colspan="4" width="33.33%">Numero de Serie</td>
    <td id="tit" colspan="4" width="33.33%">Version Software</td>
  </tr>
  <tr>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" /></td>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" /></td>
    <td colspan="4" ><input style="width:100%" id="inputs" type="text" name="versionsoftware" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="3" width="25%">Alto</td>
    <td id="tit" colspan="3" width="25%">Largo</td>
    <td id="tit" colspan="3" width="25%">Ancho</td>
    <td id="tit" colspan="3" width="25%">Distancia al piso</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="alto" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="largo" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="ancho" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="distanciaalpiso" size="25" /></td>
  </tr>
  <tr>	
    <td id="tit" colspan="6">Nombre Proveedor</td>
    <td id="tit" colspan="6">Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" /></td>
    <td colspan="6" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" /></td>
  
  </tr>
  <tr>
  	<td id="tit" colspan="3" width="25%">Unidad</td>
    <td id="tit" colspan="3" width="25%">Area</td>
    <td id="tit" colspan="3" width="25%">Recinto</td>
    <td id="tit" colspan="3" width="25%">Piso</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="unidad" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="area" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="recinto" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="piso" size="25" /></td>

  </tr>
  <tr>
    <td id="tit" colspan="4" width="33.3%">Precio Compra</td>
    <td id="tit" colspan="4" width="33.3%">Fecha instalacion</td>
    <td id="tit" colspan="4" width="33.3%">Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" /></td>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" /></td>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" /></td>
  </tr>
  <tr>
    <td colspan="4" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="4" width="33.3%">Estado del Equipo</td>
    <td colspan="4" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><input style="width:100%" id="inputs" type="text" name="responsablemantenimiento" size="25" /></td>
    <td colspan="4" id="inputs">
      <select style="width:100%" name="estadoequipo">
        <option>BUENO</option>
        <option>EN MANTENCION</option>
        <option>FALLANDO</option>
        <option>MALO</option>
      </select>
    </td>
    <td colspan="4" id="inputs">
      <select style="width:100%" name="acreditacion">
        <option>EQ 2.1 (Critico)</option>
        <option>EQ 2.2 (Relevante)</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="6">Imagen</td>
    <td colspan="6" id="inputs"><input type="file" id="archivo" name="archivo"></td>
  </tr>
  <tr>
    <td colspan="6"><center><input style="width:100%"  type="submit" name="enviar" value="Registrar" /></center></td>
    <td colspan="6"><center><input style="width:100%"  type="button" onclick=" location.href='mdi.php' " value="Regresar" name="boton" /> </center></td>
  </tr>
</table>
	</form>	

	</body>
</html>						