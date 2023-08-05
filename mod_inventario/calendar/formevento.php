<?php require('phpscripts/req_formevento.php'); 

$titulo=$riw["Title"];
$detalle=$riw["Detail"];
$observaciones=$riw["observaciones"];
$costo=$riw["costo"];
$idevento=$riw['ID'];
$fechax=$riw['eventDate'];
$idusuario=$riw["usuario"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = $mysqli->query($sql23);
$row123=$rec1->fetch_assoc();
$tipousuario=$row123['tipousuario'];
$nombre=$row123['nombre'];
$personal=$row123['personal'];
$cargo=$row123['cargo'];
$idelemento = $_GET['id'];
?>
<html>
<head>
  <style>
body {
    font-family: "Arial", Times, serif;
    background-color: #ffffff 
  }
</style>
<link rel="stylesheet" href="css/css_calendar.css">
</head>
<body>
 <center><h1>Mantenimiento</h1></center>
 <table width="auto" style="margin: 0 auto;">
   <tr>
<td colspan='1' width='20%'><b>Titulo: </b></td><td colspan='2' id='inputs' width='auto'><?php echo $titulo ?></td></tr>
<tr>
<td colspan='1' width='20%'><b>Descripcion:  </b></td><td colspan='2' id='inputs' width='auto'><?php echo $detalle ?></td></tr>
<tr>
<td colspan='1' width='20%'><b>Observaciones:  </b></td><td colspan='2' id='inputs' width='auto'><?php echo $observaciones ?></td></tr>
<tr>
<td colspan='1' width='20%'><b>Costo: </b></td><td colspan='2' id='inputs' width='auto'><?php echo $costo ?></td></tr>

<tr>
        <td width="150px"><b>Nombre:</b></td>
        <td width="250px"><?php echo $nombre ?></td>
</tr>
<tr>
        <td width="150px"><b>Personal:</b></td>
        <td width="250px"><?php echo $personal ?></td>
</tr>
<tr>
        <td width="150px"><b>Cargo: </b></td>
        <td width="250px"><?php echo $cargo ?></td>
</tr>
<tr>
        <td width="150px"><b>Numero Orden: </b></td>
        <td width="250px"><?php echo $idevento ?></td>
</tr>
<?php

  if ( $row['checkbox'] != 0) {
  
   echo "<tr><td colspan='1' width='20%'><b>Mantenimiento realizado: </b></td><td colspan='2' width='auto'>Si </td></tr>";
  }
  else 
  {
   
   echo "<tr><td colspan='1' width='auto'><b>Mantenimiento realizado: </b></td><td colspan='2' width='20%'>No </td></tr></table>";
  }
 ?>

 </table>
 <?php
  echo '<br><br><center><a href="modcheck.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'" class="button2">Actualizar estado</a>';
  echo '<br><br><a href="eliminarevento.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'" class="button2">Eliminar</a>';
  echo '<br><br><a href="cambiarfecha.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'" class="button2">Cambiar fecha</a>'; ?>
 
    <form onsubmit="return formulario(this)" name="odt" method="POST" enctype="multipart/form-data" target="centro" action="odt/odt.php">
      <input style="display: none" type="text" name="idelemento" size="25" value="<?php echo $idelemento; ?>"/>
      <input style="display: none" type="text" name="idevento" size="25" value="<?php echo $idevento; ?>"/>
      <input style="display: none" type="text" name="detalle" size="25" value="<?php echo $detalle; ?>"/>
      <input style="display: none" type="text" name="nombreusuario" size="25" value="<?php echo $nombre; ?>"/>
      <input style="display: none" type="text" name="nombreusuario" size="25" value="<?php echo $nombre; ?>"/>
      <input style="display: none" type="text" name="costo" size="25" value="<?php echo $costo; ?>"/>
      <input style="display: none" type="text" name="fechax" size="25" value="<?php echo $fechax; ?>"/>
      
      <br><br><button class="button2"  type="button" name="enviar" onclick="form.submit();window.close();" value="Orden de Trabajo">Orden de Trabajo</button>
    </form>

  
</center>
  
</body>
</html>   
