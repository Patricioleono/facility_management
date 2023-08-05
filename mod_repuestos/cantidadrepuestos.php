<?php 
require('../conexion.php'); 
require('../phpscript/logigin.php');
$id=$_POST['id'];
$query="SELECT * FROM repuestos WHERE id='$id'";
$resultado=$mysqli->query($query);
$row=$resultado->fetch_assoc();
?>
 <html>
 <title><center><h3>Agregar o quitar Repuestos</h3></center></title>
 <head>
 </head>
 <body>
 <center><tittle>Agregar o quitar Repuestos</tittle></center>
 <table align="center" width="100%">
 <tr>
 <center><td>Nombre del Repuesto: <?php echo $row['nombrerepuesto'];?></td></center>
 </tr>
 <tr>
 <center><td>Precio unitario: <?php echo $row['preciocompra'];?></td></center>
 </tr>
 <tr>
 <center><td>Stock: <?php echo $row['cantidad'];?></td></center>
</tr>
 <tr>
 <center><td>Gastos totales: <?php echo $row['gastototal'];?></td></center>
 </tr>
 <tr>
<td><form method="POST" action="agregarstock.php">
        <input type="hidden" name="id" value="<?php echo $id ;?>" />
        <input type="hidden" name="preciocompra" value="<?php echo $row['preciocompra'];?>" />
        <input type="number" min="1" name="stock">
        <button type="button" class="button2" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 10pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()">Agregar Stock</button>
    </form></td>
    <td>
    <form method="POST" action="quitarstock.php">
        <input type="hidden" name="id" value="<?php echo $id ;?>" />
        <input type="number" min="1" max="<?php echo $row['cantidad'];?>" name="stock">
        <button type="button" class="button2" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 10pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()">Quitar Stock</button>
    </form>
    </td>
 </tr>
 </table>
 </body>
 </html>