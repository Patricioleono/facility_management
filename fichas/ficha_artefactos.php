<?php
  require('../conexion.php');
  $id=$_GET['id'];
  $query="SELECT *
   FROM servbas WHERE idunica='$id'";

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
  
		<title>Ficha Artefactos</title>
	</head>
	<body>
		
		<center><h1>Ficha Artefactos</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC="../mod_servbas/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>

		<table style="width:80%;  margin:auto;" cellspacing="10px">
  <tr>
    <td id="tit" colspan="3" width="50%">Nombre Equipo</td>
    <td id="tit" colspan="3" width="50%">ID Equipo</td>
    
  </tr>
   <tr>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['nombreequipo'];?></td>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['idunica'];?></td>
  
  </tr>
     <tr>
    <td id="tit" colspan="3" width="50%">Tipo de equipo</td>
    <td id="tit" colspan="3" width="50%">Nombre del fabricante</td>
  </tr>
     <tr>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['tipoequipo'];?></td>
    <td  colspan="3" width="50%" id="inputs"><?php echo $row['nombrefabricante'];?></td>

  </tr>
   
  <tr>
    <td id="tit" colspan="3" width="33.33%" >Numero Modelo</td>
    <td id="tit" colspan="3" width="33.33%" >Numero de Serie</td>

  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo $row['numeromodelo']; ?></td>
    <td colspan="3" id="inputs"><?php echo $row['numeroserie']; ?></td>
   
  </tr>
  <tr>	
    <td id="tit" colspan="3" >Nombre Proveedor</td>
    <td id="tit" colspan="3" >Codigo Proveedor</td>
    
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo $row['nombreproveedor']; ?></td>
    <td colspan="3" id="inputs"><?php echo $row['codigoproveedor']; ?></td>
  
  </tr>
  <tr>
  	<td id="tit" colspan="3" width="50%" >Piso</td>
    <td id="tit" colspan="3" width="50%" >Recinto</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo $row['piso']; ?></td>
    <td colspan="3" id="inputs"><?php echo $row['recinto']; ?></td>
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%" >Precio Compra</td>
    <td id="tit" colspan="2" width="33.3%" >Fecha instalacion</td>
    <td id="tit" colspan="2" width="33.3%" >Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs"><?php echo $row['preciocompra']; ?></td>
    <td colspan="2" id="inputs"><?php echo $row['fechainstalacion']; ?></td>
    <td colspan="2" id="inputs"><?php echo $row['fechacaducidadgarantia']; ?></td>
  </tr>
  <tr>
    <td colspan="2" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="2" width="33.3%">Estado del Equipo</td>
    <td colspan="2" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="2" id="inputs" ><?php echo $row['responsablemantenimiento']; ?></td>
    <td colspan="2" id="inputs" ><?php echo $row['estadoequipo']; ?></td>
    <td colspan="2" id="inputs" ><?php echo $row['acreditacion']; ?></td>

  </tr>

</table>
		<table  class="display" id="example" style="width:80%;  margin:auto;" cellspacing="10px">
<tbody>
<center>
<tr>
<td>
<form method="POST" action="../mod_servbas/calendar/calendar.php">
          <input type="hidden" name="id" value="<?php echo $row['id'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Calendario" onclick="form.submit()"><img width="20px" height="20px" src="images/calendar.png"></button>
      
</form>
</td>  
<td>
<form method="POST" action="../mod_servbas/gastos.php">
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
<form method="POST" action="../mod_servbas/archivos.php">
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
        <option>SIN MANTENCION</option>
      </select>
    </td>
    <td><input style="width:auto;" class="button2" type="submit" name="enviar" value="Enviar" /></td>
    </center>
    <td>
<center><input type="button" style="width:auto;" class="button2" value="Inicio" name="Regresar" onclick="location.href='http://www.bim.cl/BIM/hospital_calvo_mackenna/logeado.php'" /></center>
</td>
</form>
</tr>



</tbody>

</table>
		</body>
	</html>	
	