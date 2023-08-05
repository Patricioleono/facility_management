<?php require('phpscripts/req_formevento.php'); ?>
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

 <?php
  echo "<td colspan='1' width='20%'><b>Titulo: </b></td><td colspan='2' id='inputs' width='auto'>".$riw['Title']."</td></tr>";
  echo "<td colspan='1' width='20%'><b>Descripcion:  </b></td><td colspan='2' id='inputs' width='auto'>".$riw['Detail']."</td></tr>";
  if ( $row['checkbox'] != 0) {
  
   echo "<tr><td colspan='1' width='20%'><b>Mantenimiento realizado: </b></td><td colspan='2' width='auto'>Si </td></tr>";
  }
  else 
  {
   
   echo "<tr><td colspan='1' width='auto'><b>Mantenimiento realizado: </b></td><td colspan='2' width='20%'>No </td></tr></table>";
  }

  echo '<br><br><center><a href="modcheck.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'" class="button2">Modificar evento</a>';
  echo '<br><br><a href="eliminarevento.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'" class="button2">Eliminar Evento</a>';
  echo '<br><br><a href="cambiarfecha.php?id='.$id.'&month='.$month.'&day='.$day.'&year='.$year.'" class="button2">Cambiar fecha</a>
</center>
  ';
 ?>

</body>
