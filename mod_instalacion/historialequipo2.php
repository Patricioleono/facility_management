<?php 
require('../conexion.php'); 
require('../phpscript/logigin.php');
$id=$_REQUEST['id'];
$query="SELECT * FROM eventcalenderinstalaciones WHERE idequipo='$id' AND creacion='1'";
$resultado=$mysqli->query($query);

$query1="SELECT * FROM gastos_instalaciones WHERE id_elemento='$id'";
$resultado1=$mysqli->query($query1);
$suma1='0';
$suma2='0';
$total='0';
 ?>


 <html>
	<head> 
		<title>Historial</title>
<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","width=400,height=250,scrollbars=NO,resizable=NO,directories=NO,location=NO") 
} 
</script>
<script type="text/javascript">
function submitForm()
{
document.form1.target = "myActionWin";
window.open("calendar/formevento.php","width=400,height=350,scrollbars=NO,resizable=NO,directories=NO,location=NO");
document.form1.submit();
}
</script>
<style>
#return {
    display: block;
    margin: 10 auto;
    width: 80px;
    background: #B3B3B3;
    line-height: 10px;
    text-align: center;
    font-weight: bold;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    bottom:10%;
}

</style>
<link rel="stylesheet" type="text/css" href="css/css_mdi.css" />
	</head>
	<body>
		<center><h2>Historial del Equipo ID: <?php echo $id; ?></h2></center>
		<table align="center" width="100%">
<tr>
    <td align="top"><table width=90% align="center" border=1>

<thead>
<tr><td colspan=6><center><h4>Calendario</h4></center></td></tr>
  <tr>
    <th><center>Titulo</center></th>
    <th><center>Detalle</center></th>
    <th><center>Fecha</center></th>
    <th><center>Realizado</center></th>
    <th><center>Costo</center></th>
    <th><center>ir</center></th>
  </tr>
 </thead>
 <tbody>
 <?php while($row=$resultado->fetch_assoc()){ ?>
 	
 	  <tr >
 	    
 	    <td><center><?php echo $row['Title'];?></center></td>
 	    <td><center><?php echo $row['Detail'];?></center></td>
 	    <td><center><?php echo $row['eventDate'] ;?></center></td>
 	    <td><center><?php echo $row['checkbox'] ;?></center></td>
 	    <td><center><?php echo number_format($row['costo']) ;?></center></td>
 <td width="25px">
<?php
$fecha_r = $row['eventDate']; 
$fecha_array = explode('-',$fecha_r);
$ano_s=$fecha_array[0];
$mes_s=$fecha_array[1];
$dia_s=$fecha_array[2];
?>
<?php
$varr="calendar/formevento.php?id=".$id."&month=".$mes_s."&day=".$dia_s."&year=".$ano_s;
?>
</script>
<script type="text/javascript">
function submitForm()
{
document.form1.target = "myActionWin";
window.open("<?php echo $varr?>","myActionWin","width=500,height=300,toolbar=0");
document.form1.submit();
}
</script>

<form name="form1" method="GET" action="<?php echo $varr;?>" target="_blank">
 	<input type="hidden" name="id" value="<?php echo $row['idequipo'] ;?>" />
	<input type="hidden" name="month" value="<?php echo $mes_s ;?>" />
	<input type="hidden" name="day" value="<?php echo $dia_s ;?>" />
	<input type="hidden" name="year" value="<?php echo $ano_s ;?>" />
	<center><button type="button" class="BTN_TRANS" value="Enviar" title="Documentos"  onclick="submitForm()"><img width="20px" height="20px" src="images/dolar.png"></button></center>
</form>
</td>
	  </tr>
  <?php 
$suma1=$suma1+$row['costo'];
}
   ?>
</tbody>
</table>
</td>

    <td align="top"><table width=90% align="center" border=1>
<thead>
<tr><td colspan=5><center><h4>Gastos Emergentes</h4></center></td></tr>
  <tr>
    <th><center>Titulo</center></th>
    <th><center>Detalle</center></th>
    <th><center>Fecha</center></th>
    <th><center>Costo</center></th>
    <th><center>Ir</center></th>
  </tr>
 </thead>
 <tbody>
 <?php while($row1=$resultado1->fetch_assoc()){ ?>	
 	  <tr >	    
 	    <td><center><?php echo $row1['nombre_gasto'];?></center></td>
 	    <td><center><?php echo $row1['descripcion'];?></center></td>
 	    <td><center><?php echo $row1['fecha'] ;?></center></td>
 	    <td><center><?php echo number_format($row1['gastos']) ;?></center></td>
 	    <td width="25px">
<form method="POST" action="gastos.php">
 	    		<input type="hidden" name="id" value="<?php echo $row1['id_elemento'] ;?>" />
    			<center><button type="button" class="BTN_TRANS" value="Enviar" title="Documentos" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button></center>
    		</form>
</td>
	  </tr>
  <?php 
$suma2=$suma2+$row1['gastos'];
}
   ?>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" colspan=2><h3>
Gasto total del equipo: $
<?php $total=$suma1+$suma2;
echo number_format($total); ?>.-
</h3>
</td>
</tr>

<tr>
<form method="POST" action="elemento2.php">
    <input type="hidden" name="id" value="<?php echo $id ;?>" />
    <td align="center" colspan=2><button type="button" style="width:30%;" class="button2" value="Enviar" title="Ver" onclick="form.submit()">Ficha Equipo</button></td>
</form>
</tr>
</table>
</body>
</html>
