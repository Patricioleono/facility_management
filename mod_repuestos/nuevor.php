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
    <th id="tit" colspan="3" width="50%">Nombre Pieza</th>
    <th id="tit" colspan="3" width="50%">ID repuesto</th>
  </tr>
  <tr>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="nombrerepuesto" size="25" /></td>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="id" id="id" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="3">Equipo Perteneciente</td>
    <td id="tit" colspan="3">Fabricante</td>
  </tr>
  <tr>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="tiporepuesto" size="25" /></td>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" /></td>
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.33%">Almacenamiento</td>
    <td id="tit" colspan="2" width="33.33%">Numero de Serie</td>
  </tr>
  <tr>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" /></td>
    <td colspan="2" ><input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" /></td>
  </tr>
  <tr>	
    <td  colspan="3" width="50%">Nombre Proveedor</td>
    <td  colspan="3" width="50%">Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" /></td>
    <td colspan="3" ><input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" /></td>
  
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%">Precio Compra</td>
    <td id="tit" colspan="2" width="33.3%">Fecha de Compra</td>
    <td id="tit" colspan="2" width="33.3%">Fecha de Garantia</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" /></td>
    <td colspan="2" id="inputs"><input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" /></td>
  </tr>
  <tr>
    <td colspan="3" width="50%">Responsable Mantenimiento</td>
    <td colspan="3" width="50%">Cantidad/Stocks</td>
  </tr>
  <tr>
    <td colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="responsablerepuesto" size="25" /></td>
    <td colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="cantidad" size="25" /></td>
  </tr>
  <tr>
    <td colspan="3" width="50%">Imagen</td>
    <td colspan="3" width="50%"><input  type="file" id="archivo" name="archivo"></td>
  </tr> 
  <tr>
    <td colspan="3" width="50%"><center><input style="width:100%" type="submit" name="enviar" value="Registrar" /></center></td>
    </tr>
    </form>
       <td colspan="6" width="100%">
        <form method="POST" action="../mod_repuestos/mdr.php">
          <button type="button" class="button2" style="width:100%;" value="Enviar" title="Repuestos" onclick="form.submit()">Repuestos</button>
        </form></td>
  </tr>
</table>
	</form>	

		
	</body>
</html>						