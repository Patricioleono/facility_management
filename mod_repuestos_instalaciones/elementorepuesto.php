<?php
require('../conexion.php');
$id=$_GET['id'];
$query="SELECT * FROM repuestos_instalaciones WHERE id='$id'";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
$iddelequipo=$row['modeloequipo'];
$query1="SELECT * FROM instalaciones WHERE modelo='$iddelequipo'";
$resultado1=$mysqli->query($query1);
$row1=$resultado1->fetch_assoc();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
<style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
<title>Modulo de Repuestos</title>
</head>
<body>

<center><h1>Repuesto del Equipo con ID: <?php echo $iddelequipo;?></h1></center>
<table style="width:80%;  margin:auto;" cellspacing="10px">
<tr>
<td id="tit" colspan="3" width="50%"><strong>Nombre Pieza</strong></td>
<td id="tit" colspan="3" width="50%"><strong>ID Repuesto</strong></td>
</tr>
<tr>
<td colspan="3" width="50%" id="inputs"><?php echo $row['nombrerepuesto'];?></td>
<td colspan="3" width="50%" id="inputs"><?php echo $row['id'];?></td>
</tr>
<tr>
<td id="tit" colspan="3" width="50%"><strong>Equipo Perteneciente</strong></td>
<td id="tit" colspan="3" width="50%"><strong>Fabricante</strong></td>
</tr>
<tr>
<td colspan="3" width="50%" id="inputs"><?php echo $row['tiporepuesto'];?></td>
<td colspan="3" width="50%" id="inputs"><?php echo $row['nombrefabricante'];?></td>
</tr>   
<tr>
<td id="tit" colspan="2" width="33.33%"><strong>Almacenamiento</strong></td>
<td id="tit" colspan="2" width="33.33%"><strong>Numero de Serie</strong></td>
<td id="tit" colspan="2" width="33.33%"><strong>Cantidad</strong></td>
</tr>
<tr>
<td colspan="2" id="inputs"><?php echo $row['numeromodelo']; ?></td>
<td colspan="2" id="inputs"><?php echo $row['numeroserie']; ?></td>
<td colspan="2" id="inputs"><?php echo $row['cantidad']; ?></td>
</tr>
<tr>
<td id="tit" colspan="3"><strong>Nombre Proveedor</strong></td>
<td id="tit" colspan="3"><strong>Codigo Proveedor</strong></td>
</tr>
<tr>
<td colspan="3" id="inputs"><?php echo $row['nombreproveedor']; ?></td>
<td colspan="3" id="inputs"><?php echo $row['codigoproveedor']; ?></td>
</tr>
<tr>
<td id="tit" colspan="2" width="33.3%"><strong>Precio Compra</strong></td>
<td id="tit" colspan="2" width="33.3%"><strong>Fecha de Compra</strong></td>
<td id="tit" colspan="2" width="33.3%"><strong>Fecha de Garantia</td>
</tr>
<tr>
<td colspan="2" id="inputs"><?php echo $row['preciocompra']; ?></td>
<td colspan="2" id="inputs"><?php echo $row['fechainstalacion']; ?></td>
<td colspan="2" id="inputs"><?php echo $row['fechacaducidadgarantia']; ?></td>
</tr>
<tr>
<td colspan="3" width="50%" id="tit"><strong>Responsable del Repuesto</strong></td>
<td colspan="3" width="50%" id="tit"><strong>Gasto total</strong></td>
</tr>
<tr>
<td colspan="3" id="inputs"><?php echo $row['responsablerepuesto'];?></td>
<td colspan="3" id="inputs"><?php echo $row['gastototal'];?></td>
</tr>
<tr>
<td colspan="2" width="33%"><center><a href="pdfr.php?id=<?php echo $row['id'];?>" target="_blank">Exportar a Documento ".PDF"</a></center></td>
<td colspan="2" width="33%"><center><a href="editarrepuesto.php?id=<?php echo $row['id'];?>">Modificar Elemento</a></center></td>
<td colspan="2" width="33%"><center><a href="eliminarr.php?id=<?php echo $row['id'];?>">Eliminar Elemento</a></center></td>
</tr>
<tr>
<td colspan="3" width="50%">
<form method="POST" action="../mod_instalacion/ver_rep.php">
<input type="hidden" name="id" value="<?php echo $row1['idunica'] ;?>" />
<input type="hidden" name="idd" value="<?php echo $row1['modelo'] ;?>" />
<center>
<button type="button" class="button2" style="width:auto;" value="Enviar" title="Repuestos" onclick="form.submit()">Repuestos de este equipo</button>
</center>
</form>
</td>
<td colspan="3" width="50%">
<form method="POST" action="cantidadrepuestos.php">
<input type="hidden" name="id" value="<?php echo $id ;?>" />
<center>
<button type="button" class="button2" style="width:auto;" value="Enviar" title="Stock" onclick="form.submit()">Gestion Stock</button></center>
</form>
</td>
</tr>
</table>    
</body>
</html>