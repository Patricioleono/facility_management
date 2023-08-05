<?php require('../phpscript/logigin.php'); ?>
<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$query="SELECT * FROM componentes WHERE idunicacomponente='$id'";
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();
?>

<html>
	<head>
		<meta charset="utf-8">
	<title>Uploads Files</title>
		<style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
  <script>
  	document.addEventListener('copy', function(e){
  		e.clipboardData.setData('text/plain','http://localhost:8080/sistema/fichacomponente.php?id='+<?php echo''.$row['idunicaelemento'].''; ?>);
  		e.preventDefault();
  	});
  </script>
		<title>Componente</title>
	</head>
	<body>
		<center><h1>Componente</h1></center>
		<table border=1 width="80%" style="margin: 0 auto;" align left>
				<thead>
				<tr>
					<td colspan='3' width='50%'><b>Nombre Componente</b></td>
					<td colspan='3' width='50%'><?php echo $row['nombrecomponente'];?></td>
				</tr>
				<tr>
					<td colspan='3' width='50%'><b>ID Componente</b></td>
					<td colspan='3' width='50%'><?php echo $row['idunicacomponente'];?></td>
				</tr>
				<tr>
          <tr>
		  <td colspan='3' width='50%'>
		  <a href="modificarcomponente.php?id=<?php echo $id ;?>">Modificar Elemento</a>
		  </td>
		  <td colspan='3' width='50%'>
		  <a href="eliminarcomponente.php?id=<?php echo $id ;?>">Eliminar Elemento</a>
		  </td>
		  </tr>
          <tr>
		  <td colspan='3' width='50%'><input type="button" style="width:100%;" value="Regresar" name="Regresar" onclick="history.back()" /></td>
		</tr>
		  </thead>
          </table>
		  </body>
	</html>	
	