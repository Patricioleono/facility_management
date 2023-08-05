<?php require('../phpscript/logigin.php'); ?>
<?php 
require('phpscripts/req_estructura.php'); 

?>

<html>
	<head>
		<style>
	#inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
		<title>Modificar elemento</title>
		<script src="scripts/validarnuevo.js"></script>  
		   <link rel="stylesheet" href="css/css_mdi.css">
	</head>
	<body>
		<center><h1>Modificar elemento</h1></center>

		<form onsubmit="return formulario(this)" name="modificar_equipo" enctype="multipart/form-data" method="POST" action="mod_estructura.php?id=<?php echo $id ;?>">
		 	<?php
      echo
      '
      <p><center><IMG  SRC="estructuras/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>
		<table style="width:80%;  margin:auto;" cellspacing="10px">
  <tr><input type="hidden" name="id" value="<?php echo $idelemento; ?>">
    <td id="tit" colspan="3" width="50%">Nombre Elemento</td>
    <td id="tit" colspan="3" width="50">Tipo Elemento</td>
  </tr>
   <tr>
    <td  colspan="3" width="50%"><input type="text" id="inputs" style="width:100%;" name="nombreelemento" value='<?php echo $row['nombreelemento'];?>' /></td>
    <td  colspan="3" width="50%"><input type="text" id="inputs" style="width:100%;" name="tipoelemento" value='<?php echo $row['tipoelemento'];?>' /></td>
  
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%">Largo</td>
    <td id="tit" colspan="2" width="33.3%">Alto</td>
    <td id="tit" colspan="2" width="33.3%">Ancho</td>
  </tr>
   <tr>
    <td  colspan="2" width="33.3%" ><input type="text" style="width:100%;" id="inputs" name="largo" value='<?php echo $row['largo'];?>' /></td>
    <td  colspan="2" width="33.3%" ><input type="text" style="width:100%;" id="inputs" name="alto" value='<?php echo $row['alto'];?>'  /></td>
    <td  colspan="2" width="33.3%" ><input type="text" style="width:100%;" id="inputs" name="ancho" value='<?php echo $row['ancho'];?>'  /></td>
  
  </tr>
  <tr>
    <td colspan="2">Imagen</td>
    <td colspan="4" ><input type="file" id="inputs" id="archivo" style="width:100%;" name="archivo"></td>
  </tr>
</table>


<center><input type="submit" class="button2" name="Guardar" value="Guardar" /> 
  <input type="button" class="button2" onclick=" location.href='estructura.php' " value="Regresar" name="boton" /> </center>

	</form>
	</body>
</html>	
			