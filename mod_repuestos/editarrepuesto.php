<?php
require('../conexion.php');
$id=$_GET['id'];
$query="SELECT * FROM repuestos WHERE id='$id'";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
<title>Modificar Repuesto</title>
<script src="scripts/validar.js"></script>
<style>
#inputs{
  width: '100%';
  background-color: #D7F9F5;
  }
  </style>
  </head>
  <body>
  <center>
  <h3>Modificar Repuesto</h3>
  </center>
  <form onsubmit="return formulario(this)" name="modificar_repuesto" enctype="multipart/form-data" method="POST" action='mod_repuesto.php?id=<?php echo $id ;?>'>
  <table style="width:80%;  margin:auto;" border="0px" cellspacing="10px">
  <tr>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <th id="tit" colspan="3" width="33.3%">ID Equipo Perteneciente</th>
  <th id="tit" colspan="3" width="33.3%">Nombre Repuesto</th>
  <tr>
  <td colspan="3" width="50%" >
  <input style="width:100%" id="inputs" type="text" name="idequipoperteneciente" size="25" value='<?php echo $row['idrepuesto'];?>'/>
  </td>
  <td colspan="3" width="50%" >
  <input style="width:100%" id="inputs" type="text" name="nombrerepuesto" size="25" value='<?php echo $row['nombrerepuesto'];?>'/>
  </td>
  </tr>
  <tr>
  <td id="tit" colspan="3" width="33.3%">Tipo de repuesto</td>
  <td id="tit" colspan="3" width="33.3%">Nombre del fabricante</td>
  </tr>
  <tr>
  <td colspan="3" width="50%" >
  <input style="width:100%" id="inputs" type="text" name="tiporepuesto" size="25" value='<?php echo $row['tiporepuesto'];?>' />
  </td>
  <td colspan="3" width="50%" >
  <input style="width:100%" id="inputs" type="text" name="nombrefabricante" size="25" value="<?php echo $row['nombrefabricante'];?>" />
  </td>
  </tr>
  <tr>
  <td id="tit" colspan="3" width="50%">Almacenamiento</td>
  <td id="tit" colspan="3" width="50%">Numero de Serie</td>
  </tr>
  <tr>
  <td colspan="3" >
  <input style="width:100%" id="inputs" type="text" name="numeromodelo" size="25" value="<?php echo $row['numeromodelo']; ?>" />
  </td>
  <td colspan="3" >
  <input style="width:100%" id="inputs" type="text" name="numeroserie" size="25" value="<?php echo $row['numeroserie']; ?>" />
  </td>
  </tr>
  <tr>
  <td  colspan="3" width="50%">Nombre Proveedor</td>
  <td  colspan="3" width="50%">Codigo Proveedor</td>
  </tr>
  <tr>
  <td colspan="3" >
  <input style="width:100%" id="inputs" type="text" name="nombreproveedor" size="25" value="<?php echo $row['nombreproveedor']; ?>" />
  </td>
  <td colspan="3" >
  <input style="width:100%" id="inputs" type="text" name="codigoproveedor" size="25" value="<?php echo $row['codigoproveedor']; ?>" />
  </td>
  </tr>
  <tr>
  <td id="tit" colspan="2" width="33.3%">Precio Compra</td>
  <td id="tit" colspan="2" width="33.3%">Fecha de Compra</td>
  <td id="tit" colspan="2" width="33.3%">Fecha Garantia</td>
  </tr>
  <tr>
  <td colspan="2" id="inputs">
  <input style="width:100%" id="inputs" type="text" name="preciocompra" size="25" value="<?php echo $row['preciocompra']; ?>" />
  </td>
  <td colspan="2" id="inputs">
  <input style="width:100%" id="inputs" type="date" name="fechainstalacion" size="25" value="<?php echo $row['fechainstalacion']; ?>" />
  </td>
  <td colspan="2" id="inputs">
  <input style="width:100%" id="inputs" type="date" name="fechacaducidadgarantia" size="25" value="<?php echo $row['fechacaducidadgarantia']; ?>"/>
  </td>
  </tr>
  <tr>
  <td colspan="3" width="50%">Responsable Mantenimiento</td>
  <td colspan="3" width="50%">Cantidad/Stocks</td>
  </tr>
  <tr>
  <td colspan="3" width="50%">
  <input style="width:100%" id="inputs" type="text" name="responsablerepuesto" size="25" value="<?php echo $row['responsablerepuesto']; ?>" />
  </td>
  <td colspan="3" width="50%">
  <input style="width:100%" id="inputs" type="text" name="cantidad" size="25" value="<?php echo $row['cantidad']; ?>" />
  </td>
  </tr>
  <tr>
  <td colspan="3" width="50%">Imagen</td>
  <td colspan="3" width="50%">
  <input type="file" id="archivo" name="archivo">
  </td>
  </tr> 
  <tr>
  <td colspan="3" width="50%">
  <center>
  <input class="button2" style="width:100%" type="submit" name="Guardar" value="Registrar" />
  </center>
  </td>
  <td colspan="3" width="50%">
  <center>
  <input class="button2" style="width:100%" type="button" onclick="location.href='mdr.php'" value="Regresar" name="boton" />
  </center>
  </td>
  </tr>
  </table>
  </form>
  </body>
  </html>