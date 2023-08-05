<?php require('../phpscript/logigin.php'); ?>
<?php require_once('../conexion.php'); ?>
<?php 
$id=$_POST['id'];
$num=$_POST['idd'];
$query="SELECT * FROM `instalaciones`,`repuestos_instalaciones` WHERE `instalaciones`.`modelo`=`repuestos_instalaciones`.`modeloequipo` AND `instalaciones`.`idunica`='$id'
  AND `repuestos_instalaciones`.`modeloequipo`='$num'";
$resultado=$mysqli->query($query);

?>

<html>
	<head>
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
  body {
    font-family: Georgia, "Arial",
          Times, serif;
    color: black;
    background-color: #ffffff }
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
    
		<title></title>
	</head>
	<body>
		
		<center><h1>Repuestos</h1></center>
		
		
		
		
		
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
 	    <td><center><?php echo $row['equipo'];?></center></td>
 	    <td><center><?php echo $row['cantidad'] ;?></center></td>
 	    <td width="25px"><center><a href="../mod_repuestos_instalaciones/elementorepuesto.php?id=<?php echo $row['id'];?>"><img width="20px" height="20px" src="images/lupa.png" title="Ver"/></a></center></center></td>
 	  </tr>
  <?php }
   ?>

 </tbody>
</table>
		     
		</body>
	</html>	
	
