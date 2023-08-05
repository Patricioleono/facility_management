<?php
  require('../../../conexion2.php'); 
  $fecha_actual = date("d-m-Y");
  $ano_actual = date("Y");
  $idelemento=$_POST['idelemento'];
  $idevento=$_POST['idevento'];
  $detalle=$_POST['detalle'];
  $costo=$_POST['costo'];
  $fechax=$_POST['fechax'];
  $nombreusuario=$_POST['nombreusuario'];
	$query="SELECT * FROM equipos WHERE idunica='$idelemento'";
	$resultado=$con->query($query);
	$row=$resultado->fetch_assoc();
  $querydatosedificio="SELECT * FROM datosbasicos";
  $resultadoedificio=$con->query($querydatosedificio);
  $rowedificio=$resultadoedificio->fetch_assoc();

 ?>
<!DOCTYPE html>
<html>
<head>

  <style>
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
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
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

<link rel="stylesheet" href="../css/css_calendar.css">
	<title></title>
</head>
<body style="background-color: #E7FBFF;">
<div><h1 align="center">Orden de Trabajo</h1></div>
<div id="tabla" align="center">
<form onsubmit="return formulario(this)" name="odt_pdf" method="POST" enctype="multipart/form-data" target="_blank" action="odt_pdf2.php">
<input  type="text" name="nombreusuario" value="<?php echo utf8_encode($nombreusuario);?>" style="display: none">
<table width="90%" border='1'>
  <tr>
    <td width="15%"><b>ORDEN Nº:</b></td>
    <td colspan="2" width="35%"><input  type="text" name="idevento" value="<?php echo $idevento;?>" style="display: none"> <?php echo $idevento;?></td>
    <td width="15%"><b>HOSPITAL:</b></td>
    <td width="35%"> <?php echo utf8_encode($rowedificio['nombre']);?></td>
  </tr>
    <tr>
    <td width="15%"><b>DIRECCION:</b></td>
    <td colspan="2" width="35%"><?php echo utf8_encode($rowedificio['direccion']);?></td>
    <td width="15%"><b>TELEFONO:</b></td>
    <td width="35%"><?php echo utf8_encode($rowedificio['telefono']);?></td>
  </tr>
  
  <tr>
    <td width="15%"><b>DESCRIPCION:</b></td>
    <td width="85%" colspan="4"><input  type="text" name="detalle" value="<?php echo $detalle;?>" style="display: none"><?php echo $detalle;?></td>
  </tr>
  
  <tr>
    <td width="15%"><b>EQUIPO:</b></td>
    <td colspan="2" width="35%"><input  type="text" name="equipo" value="<?php echo utf8_encode($row['nombreequipo']);?>" style="display: none"> <?php echo utf8_encode($row['nombreequipo']);?></td>
    <td width="15%"><b>ID EQUIPO:</b></td>
    <td width="35%"><input  type="text" name="idelemento" value="<?php echo utf8_encode($row['idunica']);?>" style="display: none"><?php echo $idelemento;?></td>
  </tr>
  
    <tr>
    <td width="15%"><b>FABRICANTE:</b></td>
    <td colspan="2" width="35%"><input  type="text" name="nombrefabricante" value="<?php echo utf8_encode($row['nombrefabricante']);?>" style="display: none"><?php echo utf8_encode($row['nombrefabricante']);?></td>
    <td width="15%"><b>SERIE:</b></td>
    <td colspan="2" width="35%"><input  type="text" name="numeroserie" value="<?php echo utf8_encode($row['numeroserie']);?>" style="display: none"><?php echo utf8_encode($row['numeroserie']);?></td>
  </tr>
  
  <tr>
    <td width="15%"><b>MODELO:</b></td>
    <td colspan="2" width="35%"><input  type="text" name="modelo" value="<?php echo utf8_encode($row['numeromodelo']);?>" style="display: none"><?php echo utf8_encode($row['numeromodelo']);?></td>
    <td width="15%"><b>UBICACION:</b></td>
    <td colspan="2" width="35%"><input  type="text" name="recinto" value="<?php echo utf8_encode($row['recinto']);?>" style="display: none"><?php echo utf8_encode($row['recinto']);?></td>
  </tr>
  
  <tr>
    <td width="50%" colspan="3"><b>TIPO DE MANTENIMIENTO</b></td>
    <td width="50%" colspan="2"><b>MANTENIMIENTO</b></td>
  </tr>
  <tr>
    <td width="50%" colspan="3">
      <select style="width:100%" name="tipo_mantenimiento" >
        <option>PREVENTIVO</option>
        <option>CORRECTIVO</option>
      </select>
    </td>
    <td width="50%" colspan="2">
      <select style="width:100%" name="mantenimiento" >
        <option>INTERNO</option>
        <option>EXTERNO</option>
      </select>
    </td>
  </tr>
  <tr>
    <td width="50%" colspan="3"><b>AUTORIZADA</b></td>
    <td width="50%" colspan="2"><b>SUPERVISOR DE EJECUCION</b></td>
  </tr>
  <tr>
    <td width="50%" colspan="3"><?php echo $nombreusuario ?></td>
    <td width="50%" colspan="2"><?php echo $nombreusuario ?></td>
  </tr>
  <tr>
    <td width="50%" colspan="3"><b>ENCARGADO DE MANTENIMIENTO</b></td>
    <td width="50%" colspan="2"><b>FECHA</b></td>
  </tr>
  <tr>
    <td width="50%" colspan="3"><input  type="text" name="responsablemantenimiento" value="<?php echo utf8_encode($row['responsablemantenimiento']);?>" style="display: none"><?php echo utf8_encode($row['responsablemantenimiento']); ?></td>
    <td width="50%" colspan="2"><?php echo $fecha_actual;?></td>
  </tr>
    <tr>
      <td width="50%" colspan="3"><b>COSTO APROXIMADO</b></td>
      <td width="50%" colspan="2"><b>FECHA PROGRAMADA</b></td>
  </tr>
  <tr>
      <td width="50%" colspan="3"><input  type="text" name="costox" value="<?php echo $costo;?>" style="display: none"><?php echo $costo;?></td>
      <td width="50%" colspan="2"><input  type="text" name="fechaxx" value="<?php echo $fechax;?>" style="display: none"><?php echo $fechax;?></td>
  </tr>
  <tr>
<!--     <td width="50%" colspan="3"><b>FALLAS O AVERIAS PRESENTADAS</b></td>
    <td width="50%" colspan="2"><b>TRABAJOS SOLICITADOS</b></td>
  </tr>
  <tr>
    <td width="50%" colspan="3"><br><br><br>campo completado a mano<br><br><br></td>
    <td width="50%" colspan="2"><br><br><br>campo completado a mano<br><br><br></td>
  </tr>
  <tr>
    <td colspan="5"><b>REPUESTOS REQUERIDOS</b></td>
  </tr>
  <tr>
    <td  width="25%" colspan="2"><b>CODIGO</b></td>
    <td width="25%" ><b>DESCRIPCION DEL REPUESTO</b></td>
    <td width="25%" ><b>CANT. PLANIF</b></td>
    <td width="25%" ><b>CANT. UTILIZADA</b></td>
  </tr>
  <tr>
    <td  width="25%" colspan="2"></td>
    <td width="25%" ></td>
    <td width="25%" ></td>
    <td width="25%" ></td>
  </tr>
  <tr>
    <td width="25%" colspan="2"></td>
    <td width="25%"></td>
    <td width="25%"></td>
    <td width="25%"></td>
  </tr>
  <tr>
    <td width="25%" colspan="2"></td>
    <td width="25%"></td>
    <td width="25%"></td>
    <td width="25%"></td>
  </tr>
  <tr>
    <td width="25%" colspan="2"></td>
    <td width="25%"></td>
    <td width="25%"></td>
    <td width="25%"></td>
  </tr>
  <tr>
    <td colspan="5"><B>OBSERVACIONES</B></td>
  </tr>
  <tr>
    <td colspan="5"><br><br><br>campo completado a mano<br><br><br></td>
  </tr>
  <tr>
    <td width="15%" colspan="2" ><B>COSTO</B></td>
    <td width="85%" colspan="3"></td>
  </tr>
  <tr>
    <td colspan="5"><B>FINALIZACION DE TRABAJOS</B></td>
  </tr>
  <tr>
    <td width="20%"><B>REVISADO</B></td>
    <td width="20%"><B>FECHA</B></td>
    <td width="20%"><B>FIRMA ENCARGADO HOSPITAL</B></td>
    <td width="20%"><B>APROBADO</B></td>
    <td width="20%"><B>FIRMA ENCARGADO MANTENIMIENTO</B></td>
  </tr>
  <tr>
    <td width="20%"></td>
    <td width="20%"></td>
    <td width="20%"></td>
    <td width="20%"></td>
    <td width="20%"></td>
  </tr> -->
  </table>
  <br><br>
  <table width="90%">
    <tr>
    <td width="20%"></td>
    <td width="20%"></td>
    <td width="20%"></td>
    <td width="20%"><button class="button2" onclick="javascript:history.back(1)">Volver Atrás</button></td>
    <td width="20%"><input class="button2"  type="submit" name="enviar" value="Crear y Descargar Orden de Trabajo" /></td>
  </tr>
</table>
</form>

</div>

</body>
</html>