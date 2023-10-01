<?php require('../phpscript/logigin.php'); ?>
<?php require_once('../conexion.php'); ?>
<?php 
$query="SELECT * FROM instalaciones";
$resultado=$mysqli->query($query);

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
} );

	</script>
</head>
<body>
<center><h1>Modulo de Instalaciones</h1></center>
<table  class="display" id="example" width="90%">
<thead>

  <tr>
    <th><center>ID</center></th>
    <th><center>Nombre</center></th>
    <th><center>Ubicacion</center></th>
     <?php if ($tipousuario=='1'){?>
    <th><center></center></th>
    <?php } ?>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
    <th><center></center></th>
     <?php if ($tipousuario=='1'){?>
    <th><center></center></th>
    <?php } ?>
    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    <td><center><?php echo $row['idunica'] ;?></center></td>
 	    <td><center><?php echo $row['sistema'];?></center></td>
 	    <td><center><?php echo $row['unidad']; ?> - <?php echo $row['recinto']; ?></center></td>
 	    
      <td width="25px"><center>
        <form method="GET" action="../fichas/ficha_equipos_instalaciones.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <button type="button" class="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
        </form>
      </center></td>

      <?php if ($tipousuario=='1'){?>
 	    <td width="25px"><center>
        <form method="POST" action="modificar.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Editar" onclick="form.submit()"><img width="20px" height="20px" src="images/editar.png"></button>
        </form>
      </center></td>
      <?php } ?>      

      <td width="25px"><center>
        <form method="POST" action="calendar/calendar.php">
          <input type="hidden" name="id" value="<?php echo $row['id'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Calendario" onclick="form.submit()"><img width="20px" height="20px" src="images/calendar.png"></button>
        </form>
      </center></td> 

      <td width="25px"><center>
        <form method="POST" action="ver_rep.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <input type="hidden" name="idd" value="<?php echo $row['modelo'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Repuestos" onclick="form.submit()"><img width="20px" height="20px" src="images/repu.png"></button>
        </form>
      </center></td>

      <td width="25px"><center>
        <form method="POST" action="historialequipo.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Finanzas" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button>
        </form>
      </center></td>      


      <td width="25px"><center>
        <form target="_blank" method="POST" action="pdf.php" >
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="20px" height="20px" src="images/pdf.png"></button>
        </form>
      </center></td>

      <td width="25px"><center>
        <form method="POST" action="archivos.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Documentos" onclick="form.submit()"><img width="20px" height="20px" src="images/folder.png"></button>
        </form>
      </center></td>

      <?php if ($tipousuario=='1'){?>

      <td width="25px"><center>
        <form method="POST" action="eliminar.php">
          <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
          <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Eliminar" onclick="form.submit()"><img width="20px" height="20px" src="images/eliminar.png"></button>
        </form>
      </center></td> 
            
      <?php } ?>

 	  </tr>
  <?php }
   ?>

 </tbody>
</table>
<?php if ($tipousuario=='1'){?>
  
<form action="nuevo.php">

<center><button type="button" class="button2" onclick="form.submit()"> Insertar Nuevo </button></center>

</form>
<form action="../carga_documentos/cargaMasivaFicha.php">

    <center><button type="button" class="button2" onclick="form.submit()"> Carga Masiva de Fichas </button></center>

</form>
<?php } ?>
</body>
</html>