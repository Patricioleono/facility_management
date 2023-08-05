<?php require('../phpscript/logigin.php'); ?>
<?php require_once('../conexion.php'); ?>
<?php 
$id=$_POST['id'];
$query="SELECT * FROM `equipos`,`repuestos` WHERE `equipos`.`idunica`='$id' AND `repuestos`.`idrepuesto`='$id'";
$resultado=$mysqli->query($query);
$query1="SELECT * FROM equipos WHERE idunica='$id'";
$resultado1=$mysqli->query($query1);
$row1=$resultado1->fetch_assoc();
?>

<html>
	<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
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
	<script type="text/javascript">
		

$(document).ready(function() {
    $('#example').DataTable();
} );

	</script>
        <style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
            </style>
            <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
}

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
    -moz - border - radius:6px;
    -webkit - border - radius:6px;
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
    
		<title></title>
	</head>
	<body>
		
		<center><h2>Repuestos del equipo: <?php echo utf8_encode($row1['nombreequipo']); ?> <br> ID: <?php echo $id; ?> </h2></center>
		
		
		
		
		
		     <table  class="display" id="example" width="90%">
<thead>

  <tr>
    
    <th><center>Nombre</center></th>
    <th><center>Equipo Perteneciente</center></th>
    <th><center>Cantidad</center></th>
    <th><center></center></th>

    
 
  </tr>

 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    
 	    <td><center><?php echo $row['nombrerepuesto'];?></center></td>
 	    <td><center><?php echo utf8_encode($row['nombreequipo']);?></center></td>
 	    <td><center><?php echo $row['cantidad'] ;?></center></td>
 	    <td width="25px"><center><a href="../mod_repuestos/elementorepuesto.php?id=<?php echo $row['id'];?>"><img width="20px" height="20px" src="images/lupa.png" title="Ver"/></a></center></center></td>
 	    
 	    
 	    

 	  </tr>
  <?php }
   ?>

 </tbody>

</table>
		 
 	    	<form method="POST" action="../mod_repuestos/nuevorid.php">
 	    		<input type="hidden" name="id" value="<?php echo $id ;?>" />     
    			<center><button type="button" class="button2" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Repuestos" onclick="form.submit()">Registrar Repuestos</button></center>
    		</form>
    	
		</body>
	</html>	
	
