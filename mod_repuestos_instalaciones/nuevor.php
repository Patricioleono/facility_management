<?php require('../phpscript/logigin.php'); ?>
<html>
	<head>
		<title>Registrar Nuevo Repuesto</title>
		<script src="scripts/validar.js"></script> 
		<style>
		#inputs{
			width: '100%';
			background-color: #D7F9F5;
    }
		</style>
	</head>
	<body>
		
		<center><h1>Registrar Nuevo Repuesto</h1></center>
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_repuesto.php">
		<table style="width:80%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
    <th id="tit" colspan="3" width="50%">ID repuesto</th>
    <th id="tit" colspan="3" width="50%">Nombre Pieza</th>
  </tr>

  <tr>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="id" id="id" size="25" /></td>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="nombrerepuesto" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="3"><strong>Tipo de Repuesto</strong></td>
    <td id="tit" colspan="3"><strong>Fabricante</strong></td>
  </tr>
  <tr>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="tiporepuesto" size="25" /></td>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.33%"><strong>Numero del modelo</strong></td>
    <td id="tit" colspan="2" width="33.33%"><strong>Numero de Serie</strong></td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" /></td>
  </tr>
  <tr>	
    <td  colspan="3" width="50%"><strong>Nombre Proveedor</strong></td>
    <td  colspan="3" width="50%"><strong>Codigo Proveedor</strong></td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" /></td>
  </tr>
    <tr>  
    <td  colspan="3" width="50%"><strong>Descripcion Ubicacion</strong></td>
    <td  colspan="3" width="50%"><strong>Codigo de la Ubicacion</strong></td>
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="descripcionubicacion" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigoubicacion" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%"><strong>Precio Compra</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Fecha de Compra</strong></td>
    <td id="tit" colspan="2" width="33.3%"><strong>Fecha de Garantia</strong></td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" /></td>
  </tr>
  <tr>
    <td colspan="3" width="50%"><strong>Responsable Mantenimiento</strong></td>
    <td colspan="3" width="50%"><strong>Cantidad/Stocks</strong></td>
  </tr>
  <tr>
    <td colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="responsablerepuesto" size="25" /></td>
    <td colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="cantidad" size="25" /></td>
  </tr>
    <!-- gastototal, modeloequipo)-->
  <tr>
    <td colspan="6" width="50%"><strong>Id del equipo asociado</strong></td>
  </tr>
  <tr>
    <td colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="modeloequipo" size="25" /></td>
  </tr>

  <tr>
    <td colspan="3" width="50%"><strong>Imagen</strong></td>
    <td colspan="3" width="50%"><input  type="file" id="archivo" name="archivo"></td>
  </tr> 
  <tr>
    <td colspan="3" width="50%"><center><input style="width:100%" type="submit" name="enviar" value="Registrar" /></center></td>
    </tr>
    </form>
       <td colspan="6" width="100%">
        <form method="POST" action="../mod_repuestos_instalaciones/mdr.php">
          <button type="button" class="button2" style="width:100%;" value="Enviar" title="Repuestos" onclick="form.submit()">Repuestos</button>
        </form></td>
  </tr>
</table>
	</form>	

		
	</body>
</html>						