<?php
  require('../conexion.php');
  require('../phpscript/logigin.php');

  $id=$_GET['id'];
  $query="SELECT *
   FROM equipos WHERE idunica='$id'";
  $resultado=$mysqli->query($query);
  $row=$resultado->fetch_assoc();
?>

<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css.css" />
          <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/css_mdi.css">

<img src="bim.png" align="right">
		<title>Ficha Equipo</title>
	</head>
	<body>
		<center><h1>Ficha Equipo</h1></center>


<table style="width:80%;  margin:auto;" cellspacing="8px">
<td colspan="3"><table>
<?php
      echo
      '
<tr><td><IMG  SRC="../mod_inventario/elementos/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px"></td></tr></table></td>
' 
       ?>
<td colspan="11">

<table style="width:100%;  margin:auto;" cellspacing="10px">


  <tr>

    <td id="tit" width="30%">Nombre Equipo</td>
    <td id="tit" colspan="2" width="50%">ID Equipo</td>
    
  </tr>
   <tr>

    <td width="50%" id="inputs"><?php echo utf8_encode($row['nombreequipo']);?></td>
    <td width="50%" colspan="2" id="inputs"><?php echo utf8_encode($row['idunica']);?></td>
  
  </tr>

     <tr>
    <td id="tit" width="50%">Tipo de equipo</td>
    <td id="tit" colspan="2" width="50%">Nombre del fabricante</td>
  </tr>
     <tr>
    <td width="50%" id="inputs"><?php echo utf8_encode($row['tipoequipo']);?></td>
    <td width="50%" colspan="2" id="inputs"><?php echo utf8_encode($row['nombrefabricante']);?></td>

  </tr>

  <tr>
    <td id="tit" width="20%" >Numero Modelo</td>
    <td id="tit" width="20%" >Numero de Serie</td>
    <td id="tit" width="60%" >Version Software</td>
  </tr>
  <tr>
    <td width="20%" id="inputs"><?php echo utf8_encode($row['numeromodelo']); ?></td>
    <td width="20%" id="inputs"><?php echo utf8_encode($row['numeroserie']); ?></td>
    <td width="60%" id="inputs"><?php echo utf8_encode($row['versionsoftware']); ?></td>
  </tr>
</table>
</td>
  <tr>
    <td id="tit" colspan="3" width="25%">Alto</td>
    <td id="tit" colspan="3" width="25%">Largo</td>
    <td id="tit" colspan="3" width="25%">Ancho</td>
    <td id="tit" colspan="3" width="25%">Distancia al piso</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['alto']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['largo']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['ancho']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['distanciaalpiso']); ?></td>
  </tr>
  <tr>	
    <td id="tit" colspan="6" >Nombre Proveedor</td>
    <td id="tit" colspan="6" >Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="6" id="inputs"><?php echo utf8_encode($row['nombreproveedor']); ?></td>
    <td colspan="6" id="inputs"><?php echo utf8_encode($row['codigoproveedor']); ?></td>
  
  </tr>
  <tr>
  	<td id="tit" colspan="3" width="25%" >Unidad</td>
    <td id="tit" colspan="3" width="25%" >Area</td>
    <td id="tit" colspan="3" width="25%" >Recinto</td>
    <td id="tit" colspan="3" width="25%" >Piso</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['unidad']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['area']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['recinto']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['piso']); ?></td>
  </tr>
  <tr>
    <td id="tit" colspan="4" width="33.3%" >Precio Compra</td>
    <td id="tit" colspan="4" width="33.3%" >Fecha instalacion</td>
    <td id="tit" colspan="4" width="33.3%" >Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['preciocompra']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['fechainstalacion']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['fechacaducidadgarantia']); ?></td>
  </tr>
  <tr>
    <td colspan="4" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="4" width="33.3%">Estado del Equipo</td>
    <td colspan="4" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['responsablemantenimiento']); ?></td>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['estadoequipo']); ?></td>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['acreditacion']); ?></td>
  </tr> 
</table>
<table  class="display" id="example" style="width:80%;  margin:auto;" cellspacing="10px">
<tbody>
<center>
<tr>
<td>
<form method="POST" action="../mod_inventario/calendar/calendar2.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['id'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Calendario" onclick="form.submit()"><img width="20px" height="20px" src="images/calendar.png"></button>
  		
</form>
</td>  
<td>
<form method="POST" action="../mod_inventario/historialequipo.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Finanzas" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button>
    		</form>
</td> 
<td>
<form target="_blank" method="POST" action="pdf.php"/>
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<center><button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="20px" height="20px" src="images/pdf.png"></button></center>
    		</form>
</td>
<td>
<form method="POST" action="../mod_inventario/archivos.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Documentos" onclick="form.submit()"><img width="20px" height="20px" src="images/folder.png"></button>
    		</form>
</td>
</center>
</tr>
<tr>
<form onsubmit="return formulario(this)" name="updateestado" method="POST" enctype="multipart/form-data" action="updateestado.php?id=<?php echo $row['idunica'] ;?>">
<center><td>Notificar estado</td>
<td id="inputs">
      <select style="width:auto;" name="estadoequipo">
        <option>BUENO</option>
        <option>EN MANTENCION</option>
        <option>FALLANDO</option>
        <option>MALO</option>
      </select>
    </td>
    <td><input style="width:auto;" class="button2" type="submit" name="enviar" value="Cambiar Estado" /></td>
    </center>
    <td>
        <center><input type="button" style="width:auto;" class="button2" value="Regresar al Modelo 3D" name="Regresar" onclick="location.href='http://desarrollo.bim.cl/modelo3D/chch.php'" /></center>
</td>
</form>
</tr>



</tbody>

</table>
</body>
</html>	
	