<?php require('../phpscript/logigin.php'); ?>
<?php require_once('../conexion.php'); ?>
<?php 
	if(isset($_GET["id"])){
		$id=$_GET['id'];
	}else{
	$id=$_POST['id'];
	}

$query="SELECT * 
FROM gastos_instalaciones
WHERE id_elemento='$id'";
$resultado=$mysqli->query($query);
$resultado1=$mysqli->query($query);
$var='0';
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
    <link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
	<script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });

	</script>
</head>
<body>
  <center><h1>Gastos</h1></center>    

    <table  class="display" id="example" width="80%">
      <thead>
        <tr>
          <th><center>Nombre</center></th>
          <th><center>Fecha</center></th>
          <th><center>Monto (Pesos Chilenos)</center></th>
          <th><center></center></th>
          <th><center></center></th>
        </tr>
      </thead>
      <tbody>
      <?php while($row=$resultado->fetch_assoc()){ ?>
 	  	<tr>
 	    	<td><center><?php echo $row['nombre_gasto'] ?></center></td>
        	<td><center><?php echo $row['fecha'] ?></center></td>
            <td><center>$<?php echo $row['gastos'] ?></center></td>
      	 	      	      
 	        <?php if ($tipousuario=='1'){?>
    	  	<td width="25px"><center>
 	    		<form method="POST" action="eliminar_gasto.php">
 	    			<input type="hidden" name="id" value="<?php echo $row['id'] ;?>" />
 	    		 	<input type="hidden" name="idd" value="<?php echo $row['id_elemento'] ;?>" />
    				<input type="image" width="20px" height="20px" src="images/eliminar.png" title="Eliminar" value="Enviar"/>
    			</form>
    	 	</center></td>  	    
      		<?php } ?>
        </tr>
      <?php }  ?>
      </tbody>
    </table>
    <br>
    <table style="width:20%; margin:auto;"border="1px" cellspacing="10px">
      <tr>
        <td id="inputs">Total Gastado</td>
        <td id="inputs">$<?php while($row1=$resultado1->fetch_assoc()){ 
             $var += $row1['gastos'];

            } echo $var;?></td>
      </tr>
    </table>
  <?php if ($tipousuario=='1'){?>
  <br>
  <br>
  <center><h2>Nuevo Gasto</h2></center>
    <form onsubmit="return formulario(this)" name="nuevo_equipo" method="POST" enctype="multipart/form-data" action="guardar_gastos.php">
      <table style="width:40%;  margin:auto;"border="0px" cellspacing="10px">
        
        <tr>
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <th id="tit" colspan="2" width="30%">Nombre</th>
          <th id="tit" colspan="2" width="30%"><input style="width:100%" id="inputs" type="text" name="nombre_gasto" size="25" /></th>
        </tr>
        <tr>
          <th id="tit" colspan="2" width="30%">Monto</th>
          <th id="tit" colspan="2" width="30%"><input style="width:100%" id="inputs" type="text" name="gastos" size="25" /></th>
        </tr>
        <tr>
          <th id="tit" colspan="2" width="30%">Fecha</th>
          <th id="tit" colspan="2" width="30%"><input style="width:100%" id="inputs" type="date" name="fecha"/></th>
        </tr>
        <tr>
          <th id="tit" colspan="2" width="30%">Descripcion</th>
          <th id="tit" colspan="2" width="30%"><textarea style="width:100%" id="inputs" name="descripcion"></textarea></th>
        </tr>
      </table>  

        <center><input style="width:auto" class="button2" type="submit" name="enviar" value="Registrar" />
        <?php
            $idUnica = substr($id, 0, 2);
            if($idUnica == 'EI'){
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaEI()"/></center>';
            }else if($idUnica == 'AP'){
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaAP()"/></center>';
            }else if($idUnica == 'AL'){
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaAL()"/></center>';
            }else if($idUnica == 'AR'){
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaAR()"/></center>';
            }else if($idUnica == 'AS'){
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaAS()"/></center>';
            }else if($idUnica == 'EM'){
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaEM()"/></center>';
            }else{
                echo '<input type="button" class="button2" value="Ficha Equipo" name="Regresar" onclick="regresarFichaCL()"/></center>';
            }
        ?>



      
    </form> 
    <?php } ?>
<script>
    var idUnica = '<?=$id?>';

    function regresarFichaEI(){
        location.href = '../fichas/ficha_equipos_instalaciones.php?id='+idUnica
    }
    function regresarFichaAP(){
        location.href = '../fichas/ficha_equipos_instalaciones.php?id='+idUnica
    }
    function regresarFichaAL(){
        location.href = '../fichas/ficha_equipos_instalaciones.php?id='+idUnica
    }
    function regresarFichaAR(){
        location.href = '../fichas/ficha_artefactos.php?id='+idUnica
    }
    function regresarFichaAS(){
        location.href = '../fichas/ficha_equipos_instalaciones.php?id='+idUnica
    }
    function regresarFichaEM(){
        location.href = '../fichas/ficha_equipos_medicos.php?id='+idUnica
    }
    function regresarFichaCL(){
        location.href = '../fichas/ficha_equipos_medicos.php?id='+idUnica
    }
</script>
</body>
</html>