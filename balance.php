<?php
require('conexion.php');
$query="SELECT * FROM gastos_equipos";
$resultado=$mysqli->query($query);
$query2="SELECT * FROM gastos_instalaciones";
$resultado2=$mysqli->query($query2);
$query3="SELECT * FROM gastos_servbas";
$resultado3=$mysqli->query($query3);
$query5="SELECT * FROM equipos WHERE preciocompra > '0'";
$resultado5=$mysqli->query($query5);
$query6="SELECT * FROM eventcalender WHERE costo > '0'";
$resultado6=$mysqli->query($query6);
$query7="SELECT * FROM eventcalender2 WHERE costo > '0'";
$resultado7=$mysqli->query($query7);
$query8="SELECT * FROM eventcalenderelementoarquitectonico WHERE costo > '0'";
$resultado8=$mysqli->query($query8);
$query9="SELECT * FROM eventcalenderestructura WHERE costo > '0'";
$resultado9=$mysqli->query($query9);
$query10="SELECT * FROM eventcalenderinstalaciones WHERE costo > '0'";
$resultado10=$mysqli->query($query10);
$query11="SELECT * FROM repuestos WHERE gastototal > '0'";
$resultado11=$mysqli->query($query11);
$query12="SELECT * FROM instalaciones WHERE preciocompra > '0'";
$resultado12=$mysqli->query($query12);
$year=$_POST['year'];
$suma='0';
$total='0';
$query4="SELECT * FROM presupuesto WHERE year = '$year'";
$resultado4=$mysqli->query($query4);
$row4=$resultado4->fetch_assoc();
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">


<?php header('Content-Type: text/html; charset=UTF-8'); ?>
        <style type="text/css">
            @import "css/fondo.css";
        </style>

        <title>Balance Gastos</title>
        <link rel="stylesheet" href="css/css_mdi.css">
        <style type="text/css">
            @import "css/jquery.dataTables.min.css";
        </style>
        <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        
        $(document).ready(function() {
        $('#example').DataTable();
        } );

        </script>


    </head>
    <body>

    <center><h2>Balance Gastos</h2></center>
    <table class="display" id="example" width="90%">
        <thead>
        <tr>
            <th><center>Titulo</center></th>
            <th><center>Descripcion</center></th>
            <th><center>Fecha</center></th>
            <th><center>Monto</center></th>
            <th><center>ID elemento</center></th>
            <th></th>
        </tr>       
        </thead>
        <tbody>
        
<?php
while($row5=$resultado5->fetch_assoc()){
    $fecha5=$row5['fechainstalacion'];
    $dato5 = explode("-", $fecha5);

    if ($dato5[2] != $year)
    {

    }
    else{
        ?>
        <tr>
        <td><center><?php echo utf8_encode($row5['nombreequipo']) ?></center></td>
        <td><center>Instalacion</center></td>
        <td><center><?php echo $row5['fechainstalacion'] ?></center></td>
        <td><center><?php echo number_format($row5['preciocompra']) ?></center></td>
        <td><center><?php echo $row5['idunica'] ?></center></td>
        <td><center>
            <form method="POST" action="mod_inventario/elemento.php">
        <input type="hidden" name="id" value="<?php echo $row5['idunica'] ;?>" />
        <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
            </form>
        </center></td>
        </tr>
        <?php

        $suma=$suma+$row5['preciocompra'];
        }
}?>


<!--Instalaciones-->
<?php while($row12=$resultado12->fetch_assoc()){
$fecha12=$row12['fechainstalacion'];
$dato12 = explode("-", $fecha12);
if ($dato12[0]!=$year)
{
//echo $dato12[0].'-';
}
else{
?>
<tr>
<td><center>Instalacion: <?php echo utf8_encode($row12['equipo']) ?></center></td>
<td><center><?php echo utf8_encode($row12['nombreinstalacion']) ?></center></td>
<td><center><?php echo $row12['fechainstalacion'] ?></center></td>
<td><center><?php echo number_format($row12['preciocompra']) ?></center></td>
<td><center><?php echo $row12['idunica'] ?></center></td>
<td><center>
        <form method="POST" action="mod_instalacion/elemento.php">
            <input type="hidden" name="id" value="<?php echo $row12['idunica'] ;?>" />
            <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
        </form>

</center></td>
</tr>
<?php 

$suma=$suma+$row12['preciocompra'];
}
}?>





<?php while($row6=$resultado6->fetch_assoc()){
$fecha6=$row6['eventDate'];
$dato6 = explode("-", $fecha6);
if ($dato6[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo utf8_encode($row6['Title']) ?></center></td>
<td><center><?php echo utf8_encode($row6['Detail']) ?></center></td>
<td><center><?php echo $row6['eventDate'] ?></center></td>
<td><center><?php echo number_format($row6['costo']) ?></center></td>
<td><center><?php echo $row6['idequipo'] ?></center></td>
<td><center>
 	    	<form method="POST" action="mod_inventario/elemento.php">
 	    		<input type="hidden" name="id" value="<?php echo $row6['idequipo'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>
</center></td>
</tr>
<?php 

$suma=$suma+$row6['costo'];
}
}?>


<?php while($row7=$resultado7->fetch_assoc()){
$fecha7=$row7['eventDate'];
$dato7 = explode("-", $fecha7);
if ($dato7[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo utf8_encode($row7['Title']) ?></center></td>
<td><center><?php echo utf8_encode($row7['Detail']) ?></center></td>
<td><center><?php echo $row7['eventDate'] ?></center></td>
<td><center><?php echo number_format($row7['costo']) ?></center></td>
<td><center><?php echo $row7['idequipo'] ?></center></td>
<td><center>

 	    	<form method="POST" action="mod_servbas/elemento.php">
 	    		<input type="hidden" name="id" value="<?php echo $row7['idequipo'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>

</center></td>
</tr>
<?php 

$suma=$suma+$row7['costo'];
}
}?>


<?php while($row8=$resultado8->fetch_assoc()){
$fecha8=$row8['eventDate'];
$dato8 = explode("-", $fecha8);
if ($dato8[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo utf8_encode($row8['Title']) ?></center></td>
<td><center><?php echo utf8_encode($row8['Detail']) ?></center></td>
<td><center><?php echo $row8['eventDate'] ?></center></td>
<td><center><?php echo number_format($row8['costo']) ?></center></td>
<td><center><?php echo $row8['idequipo'] ?></center></td>
<td><center>

 	    	<form method="POST" action="mod_e_arquitectonico/fichaestructura.php">
 	    		<input type="hidden" name="id" value="<?php echo $row8['idequipo'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>

</center></td>
</tr>
<?php 

$suma=$suma+$row8['costo'];
}
}?>

<!--Calendario de Instalaciones-->
<?php while($row9=$resultado9->fetch_assoc()){
$fecha9=$row9['eventDate'];
$dato9 = explode("-", $fecha9);
if ($dato9[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo utf8_encode($row9['Title']) ?></center></td>
<td><center><?php echo utf8_encode($row9['Detail']) ?></center></td>
<td><center><?php echo $row9['eventDate'] ?></center></td>
<td><center><?php echo number_format($row9['costo']) ?></center></td>
<td><center><?php echo $row9['idequipo'] ?></center></td>
<td><center>

 	    	<form method="POST" action="mod_estructura/fichaestructura.php">
 	    		<input type="hidden" name="id" value="<?php echo $row9['idequipo'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>

</center></td>
</tr>
<?php 

$suma=$suma+$row9['costo'];
}
}?>


<?php while($row10=$resultado10->fetch_assoc()){
$fecha10=$row10['eventDate'];
$dato10 = explode("-", $fecha10);
if ($dato10[0]!=$year)
{

}
else{
?>
<tr>
<td><center>Evento: <?php echo utf8_encode($row10['Title']) ?></center></td>
<td><center><?php echo utf8_encode($row10['Detail']) ?></center></td>
<td><center><?php echo $row10['eventDate'] ?></center></td>
<td><center><?php echo number_format($row10['costo']) ?></center></td>
<td><center><?php echo $row10['idequipo'] ?></center></td>
<td><center>
 	    	<form method="POST" action="mod_instalacion/historialequipo.php">
 	    		<input type="hidden" name="id" value="<?php echo $row10['idequipo'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>

</center></td>
</tr>
<?php 

$suma=$suma+$row10['costo'];
}
}?>

<?php while($row11=$resultado11->fetch_assoc()){
$fecha11=$row11['fechainstalacion'];
$dato11 = explode("-", $fecha11);
if ($dato11[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo utf8_encode($row11['nombrerepuesto']) ?></center></td>
<td><center><?php echo utf8_encode($row11['tiporepuesto']) ?></center></td>
<td><center><?php echo $row11['fechainstalacion'] ?></center></td>
<td><center><?php echo number_format($row11['gastototal']) ?></center></td>
<td><center><?php echo $row11['id'] ?></center></td>
<td><center>

 	    	<form method="POST" action="mod_repuestos/elementorepuesto.php">
 	    		<input type="hidden" name="id" value="<?php echo $row11['id'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()"><img width="20px" height="20px"  src="images/lupa.png"></button>
    		</form>

</center></td>
</tr>
<?php 

$suma=$suma+$row11['gastototal'];
}
}?>




<?php while($row=$resultado->fetch_assoc()){
$fecha=$row['fecha'];
$dato1 = explode("-", $fecha);
if ($dato1[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo $row['nombre_gasto'] ?></center></td>
<td><center><?php echo $row['descripcion'] ?></center></td>
<td><center><?php echo $row['fecha'] ?></center></td>
<td><center><?php echo number_format($row['gastos']) ?></center></td>
<td><center><?php echo $row['id_elemento'] ?></center></td>
<td><center>

<form method="POST" action="mod_inventario/gastos.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['id_elemento'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Finanzas" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button>
    		</form>
</center></td>
</tr>
<?php 

$suma=$suma+$row['gastos'];
}
}?>

<?php while($row2=$resultado2->fetch_assoc()){
$fecha2=$row2['fecha'];
$dato2 = explode("-", $fecha2);
if ($dato2[0]!=$year)
{

}
else{
?>
<tr>
<td><center>Gasto: <?php echo $row2['nombre_gasto'] ?></center></td>
<td><center><?php echo $row2['descripcion'] ?></center></td>
<td><center><?php echo $row2['fecha'] ?></center></td>
<td><center><?php echo number_format($row2['gastos']) ?></center></td>
<td><center><?php echo $row2['id_elemento'] ?></center></td>
<td><center>
    <form method="POST" action="mod_instalacion/gastos.php">
                <input type="hidden" name="id" value="<?php echo $row2['id_elemento'] ;?>" />
                <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Finanzas" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button>
    </form>
</center></td>
</tr>
<?php 
$suma=$suma+$row2['gastos'];
}
}?>

<?php while($row3=$resultado3->fetch_assoc()){ 
$fecha3=$row3['fecha'];
$dato3 = explode("-", $fecha3);
if ($dato3[0]!=$year)
{

}
else{
?>
<tr>
<td><center><?php echo $row3['nombre_gasto'] ?></center></td>
<td><center><?php echo $row3['descripcion'] ?></center></td>
<td><center><?php echo $row3['fecha'] ?></center></td>
<td><center><?php echo number_format($row3['gastos']) ?></center></td>
<td><center><?php echo $row3['id_elemento'] ?></center></td>
</tr>
<?php $suma=$suma+$row3['gastos'];}}  ?>
</tr>
</tbody>
</table>
<br>
<table align="right" width="80%">
<tr>
    <?php   $total=$row4['presupuesto']-$suma;  ?>
<td width="auto" id="inputs" colspan="2"></td>
    <td width="auto" id="inputs" colspan="4"><center><b>Subtotal</b></center></td>
<td width="auto" id="inputs" colspan="2"><center><b><?php echo number_format($suma) ?></b></center></td>
</tr>
<tr>
<td width="auto" id="inputs" colspan="2"></td>
    <td width="auto" id="inputs" colspan="4"><center><b>Presupuesto</b></center></td>
<td width="auto" id="inputs" colspan="2"><center><b><?php echo number_format($row4['presupuesto']) ?></b></center></td>
</tr>
<tr>
<td width="auto" id="inputs" colspan="2"></td>
    <td width="auto" id="inputs" colspan="4"><center><b>Direrencia</b></center></td>
<td width="auto" id="inputs" colspan="2"><center><b><?php echo number_format($total) ?></b></center></td>
</tr>
</table>
</form>
</body>
</html>	