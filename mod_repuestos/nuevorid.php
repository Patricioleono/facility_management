<?php require('../phpscript/logigin.php');
require('../conexion.php');
$id=$_POST['id'];
$query="SELECT * FROM equipos WHERE idunica='$id'";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
$equipo=$row['nombreequipo'];
?>

<html>
	<head>
		<title>Registrar Nuevo Repuesto</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="scripts/validar.js"></script> 
        <style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
            </style>
            <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
}

body {
    font-family: "Arial", Times, serif;
    color: black;
    background-color: #E7FBFF;
	}
  h1 {
    font-family: Helvetica, Geneva, Arial, SunSans-Regular, sans-serif 
	}

    #inputs{
      background-color: #D7F9F5;
    }

	
i {
	top: 10px;
	left: 10px;
	font-size: 18px;
	color: #00867C;
}

.BTN_TRANS 
{ 
background:transparent; 
} 

.button {
	background-color:transparent;
	display:inline-block;
	cursor:pointer;
	color:#777777;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding: 3px 6px;
	text-decoration:none;
}
.button:hover {
	background-color:transparent;
}
.button:active {
	position:relative;
	top:1px;
}


.button2 {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #b1b6b8));
    background:-moz-linear-gradient(top, #ededed 5%, #b1b6b8 100%);
    background:-webkit-linear-gradient(top, #ededed 5%, #b1b6b8 100%);
    background:-o-linear-gradient(top, #ededed 5%, #b1b6b8 100%);
    background:-ms-linear-gradient(top, #ededed 5%, #b1b6b8 100%);
    background:linear-gradient(to bottom, #ededed 5%, #b1b6b8 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#b1b6b8',GradientType=0);
    background-color:#ededed;
    -moz - border - radius:6px;
    -webkit - border - radius:6px;
    border-radius:6px;
    display:inline-block;
    cursor:pointer;
    color:#236d80;
    font-family:Arial;
    font-size:15px;
    padding:5px 14px;
    text-decoration:none;
}
.button2:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #b1b6b8), color-stop(1, #ededed));
    background:-moz-linear-gradient(top, #b1b6b8 5%, #ededed 100%);
    background:-webkit-linear-gradient(top, #b1b6b8 5%, #ededed 100%);
    background:-o-linear-gradient(top, #b1b6b8 5%, #ededed 100%);
    background:-ms-linear-gradient(top, #b1b6b8 5%, #ededed 100%);
    background:linear-gradient(to bottom, #b1b6b8 5%, #ededed 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#b1b6b8', endColorstr='#ededed',GradientType=0);
    background-color:#b1b6b8;
}
.button2:active {
    position:relative;
    top:1px;
}
            </style>
	</head>
	<body>
		
		<center><h1>Registrar Nuevo Repuesto</h1></center>
		<form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_repuesto.php">
		<table style="width:80%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
    <th id="tit" colspan="3" width="50%">ID repuesto</th>
    <th id="tit" colspan="3" width="50%">Equipo Perteneciente</td>

  </tr>
  <tr>

    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="id" size="25" value='<?php echo $id;?>'/></td>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="tiporepuesto" size="25" value='<?php echo utf8_encode($equipo);?>'/></td>
  </tr>
  <tr>

    <td id="tit" colspan="3">Nombre Pieza</th>
    <td id="tit" colspan="3">Fabricante</td>
  </tr>
  <tr>
    <td colspan="3" width="50%" ><input style="width:100%" id="inputs" type="text" name="nombrerepuesto" size="25" /></td>
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
  <tr>
    <center><td colspan="6" width="100%"><center><input style="width:auto" class="button2" type="submit" name="enviar" value="Registrar" /></center></td></center>
  </tr>
</table>
	</form>	
<form method="POST" action="../mod_inventario/ver_rep.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <input type="hidden" name="idd" value="<?php echo $row['numeromodelo'] ;?>" />
          <center><button type="button" class="button2" style="width:auto;" value="Enviar" title="Repuestos" onclick="form.submit()">Repuestos</button></center>
        </form>
		
	</body>
</html>						