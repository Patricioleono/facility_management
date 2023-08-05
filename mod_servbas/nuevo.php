<?php require('../phpscript/logigin.php'); ?>
<html>
	<head>
		<title>Nuevo Artefacto</title>
		<style>
		#inputs{
			width: '100%';
			background-color: #D7F9F5;
		}

		</style>
		<script src="scripts/validarnuevo.js"></script> 
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
		
		<center><h1>Nuevo Artefacto</h1></center>
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_equipo.php">
		<table style="width:80%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
    <th id="tit" colspan="3" width="50%">Nombre Artefacto</th>
    <th id="tit" colspan="3" width="50%">ID Artefacto</th>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreequipo" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="idunica" id="idunica" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="3">Tipo de Artefacto</td>
    <td id="tit" colspan="3">Nombre del fabricante</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="tipoequipo" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="3" width="33.33%">Numero Modelo</td>
    <td id="tit" colspan="3" width="33.33%">Numero de Serie</td>
    
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" /></td>

  </tr>
  <tr>	
    <td id="tit" colspan="3">Nombre Proveedor</td>
    <td id="tit" colspan="3">Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" /></td>
  
  </tr>
  <tr>
  	<td id="tit" colspan="3" width="50%">Piso</td>
    <td id="tit" colspan="3" width="50%">Recinto</td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="piso" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="recinto" size="25" /></td>


  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%">Precio Compra</td>
    <td id="tit" colspan="2" width="33.3%">Fecha instalacion</td>
    <td id="tit" colspan="2" width="33.3%">Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" /></td>
  </tr>
  <tr>
    <td colspan="2" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="2" width="33.3%">Estado del Equipo</td>
    <td colspan="2" width="33.3%">Especialidad</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="responsablemantenimiento" size="25" /></td>
    <td colspan="2" id="inputs">
      <select style="width:100%" name="estadoequipo">
        <option>BUENO</option>
        <option>FALLANDOn</option>
        <option>EN MANTENIMIENTO</option>
         <option>SIN MANTENIMIENTO</option
      </select>
    </td>
    <td colspan="2" id="inputs">
      <select style="width:100%" name="acreditacion">
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
  <tr>
    <td colspan="3"><center><input style="width:100%"  type="submit" name="enviar" value="Registrar" /></center></td>
    <td colspan="3"><center><input style="width:100%"  type="button" onclick=" location.href='mdsb.php' " value="Regresar" name="boton" /> </center></td>
  </tr>
</table>
	</form>	

	</body>
</html>						