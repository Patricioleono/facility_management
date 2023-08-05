<?php require_once('../conexion.php'); ?>
<?php 
$query="SELECT * 
FROM edificio";
$query2="SELECT *
FROM edificio_sec";
$resultado=$mysqli->query($query);
$resultado1=$mysqli->query($query);
$resultado2=$mysqli->query($query2);

?>
<script language="JavaScript">
function aviso(url){
if (!confirm("ESTA SEGURO DE ELIMINAR")) {
return false;
}
else {
document.location = url;
return true;
}
}
</script>

<script>
function formulario(f) {
if (f.piso.value   == '') { alert ('Piso esta vacio');  
f.piso.focus(); return false; } 
if (f.sector.value  == '') { alert ('Sector esta vacio'); 
f.sector.focus(); return false; }
if (f.encargado.value  == '') { alert ('Encargado esta vacio'); 
f.encargado.focus(); return false; }
</script>
<html>
<head>

	<title></title>
	<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/css_mdi.css">
	<script type="text/javascript">
		

$(document).ready(function() {
    $('#example').DataTable();
     $('#example1').DataTable();
} );

	</script>
</head>
<body>
<center><h1>Creador de Piso y Sectores de un Hospital</h1></center>
    
    
<center><h2>Pisos</h2></center>
<table  class="display" id="example" width="80%">
<thead>

  <tr>
    <th><center>Piso</center></th>
    <th><center></center></th>
    

    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    <td><center><?php echo utf8_encode($row['piso']) ?></center></td>
 	
 	    
 	    
 	    <td width="25px"><center> <a href="javascript:;" onclick="aviso('eliminar.php?id=<?php echo $row['id'];?>'); return false;"><img width="20px" height="20px" src="images/eliminar.png" title="Eliminar"/></a></center></td>

 	  </tr>
  <?php }
   ?>

 </tbody>
</table>

<center><h2>Nuevo Piso</h2></center>
    <form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_edificio.php">
    <table style="width:30%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
    <th id="tit" colspan="3" width="50%">Piso</th>
    <th id="tit" colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="piso" size="25" /></th>
  </tr>
    <tr>

    <td colspan="6"><center><input style="width:auto" class="button2" type="submit" name="enviar" value="Registrar" /></center></td>
    
  </tr>
</table>
  </form> 

<center><h2>Sectores</h2></center>
<table  class="display" id="example1" width="80%">
<thead>

  <tr>
    <th><center>Piso</center></th>
    <th><center>Unidad</center></th>
    <th><center>Encargado</center></th>
    <th><center></center></th>
   
    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row1=$resultado2->fetch_assoc()){ ?>
  
    <tr >
      <td><center><?php echo utf8_encode($row1['piso']) ?></center></td>
      <td><center><?php echo utf8_encode($row1['sector']) ?></center></td>
      <td><center><?php echo utf8_encode($row1['encargado']) ?></center></td>
  
      
      
      <td width="25px"><center> <a href="javascript:;" onclick="aviso('eliminar_sector.php?id=<?php echo $row1['idsector'];?>'); return false;"><img width="20px" height="20px" src="images/eliminar.png" title="Eliminar"/></a></center></td>

    </tr>
  <?php }
   ?>

 </tbody>
</table>	 
<center><h2>Nuevo Sector</h2></center>
  <form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guarda_sector.php">
  <table  style="width:30%;  margin:auto;"border="0px" cellspacing="10px">
  <tr>
    <td id="tit" colspan="3" width="50%"><b>Unidad</b></td>
      <input type="hidden" name="idedificio" value="<?php echo $row['id'] ?>" />
    <th id="tit" colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="sector" size="25" /></th>
  </tr>
  <tr>
    <td id="tit" colspan="3" width="50%"><b>Encargado</b></td>
    <td id="tit" colspan="3" width="50%"><input style="width:100%" id="inputs" type="text" name="encargado" size="25" /></td>
  </tr>
    <tr>
        <td colspan="3" width="50%"><b>Piso al que pertenece</b></td>
          <?php
                  
          echo "<td colspan='3' width='50%'><select style='width:100%' name='piso'>";
          echo "<option value='' selected> Seleccionar Piso </option>";
          while($raw=$resultado1->fetch_assoc()){
            echo "<option value='".$raw['piso']."'>".$raw['piso']."</option>";
          }
          echo "</select></td>";
          ?>
      </tr>
      <tr>
    <td colspan="6"><center><input style="width:auto" class="button2" type="submit" name="enviar" value="Registrar" /></center></td>
   
  </tr>
    </table>
    </form>
</body>
</html>