<?php
  require('../conexion.php');
  require('../phpscript/logigin.php');

  $rolUsuario = $_SESSION["rolusuario"];

  $id=$_GET['id'];
  $query="SELECT *
   FROM instalaciones WHERE idunica='$id'";
  $resultado=$mysqli->query($query);
  $row=$resultado->fetch_assoc();

?>

<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css.css" />
          <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
<style type="text/css">
		@import "css/jquery.dataTables.min.css";
	</style>
	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="css/fontello.css">
  <link rel="stylesheet" href="css/css_mdi.css">

<img src="bim.png" align="right">
		<title>Ficha Equipo</title>
	</head>
	<body>
		<center><h1>Ficha Equipo</h1></center>


<table style="width:80%;  margin:auto;" cellspacing="8px">
<td colspan="3"><table>
<?php
      echo
      '
<tr><td><IMG  SRC="../mod_instalacion/elementos/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px"></td></tr></table></td>
' 
       ?>
<td colspan="11">

<table style="width:100%;  margin:auto;" cellspacing="10px">
  <tr>
    <td id="tit" width="30%">Nombre Instalacion</td>
    <td id="tit" colspan="2" width="50%">ID Equipo</td>
  </tr>
  <tr>
    <td width="50%" id="inputs"><?php echo utf8_encode($row['nombreinstalacion']);?></td>
    <td width="50%" colspan="2" id="inputs"><?php echo utf8_encode($row['idunica']);?></td>
  </tr>

  <tr>
    <td id="tit" width="50%">Sistema</td>
    <td id="tit" colspan="2" width="50%">Equipo</td>
  </tr>
     <tr>
    <td width="50%" id="inputs"><?php echo utf8_encode($row['sistema']);?></td>
    <td width="50%" colspan="2" id="inputs"><?php echo utf8_encode($row['equipo']);?></td>
  </tr>

  <tr>
    <td id="tit" width="20%" >Marca</td>
    <td id="tit" width="20%" >Modelo</td>
    <td id="tit" width="60%" >Codigo</td>
  </tr>
  <tr>
    <td width="20%" id="inputs"><?php echo utf8_encode($row['marca']); ?></td>
    <td width="20%" id="inputs"><?php echo utf8_encode($row['modelo']); ?></td>
    <td width="60%" id="inputs"><?php echo utf8_encode($row['codigo']); ?></td>
  </tr>
</table>
</td>

  <tr>
    <td id="tit" colspan="4" width="25%">Potencia</td>
    <td id="tit" colspan="4" width="25%">Unidad de potencia</td>
    <td id="tit" colspan="4" width="25%">Nombre del fabricante</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['potencia']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['unidadpotencia']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['nombrefabricante']); ?></td>
  </tr>

  <tr>	
    <td id="tit" colspan="4" >Version de Software</td>
    <td id="tit" colspan="4" >Nombre del proveedor</td>
    <td id="tit" colspan="4" >Codigo del proveedor</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['versionsoftware']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['nombreproveedor']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['codigoproveedor']); ?></td>
  </tr>

  <tr>
  	<td id="tit" colspan="3" width="25%" >Unidad</td>
    <td id="tit" colspan="3" width="25%" >Área</td>
    <td id="tit" colspan="3" width="25%" >Recinto</td>
    <td id="tit" colspan="3" width="25%" >Piso</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['unidad']); ?></td>
    <td colspan="3" id="inputs"><?php echo $row['area']; ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['recinto']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['piso']); ?></td>
  </tr>

  <tr>
    <td id="tit" colspan="4" width="33.3%" >Precio Compra</td>
    <td id="tit" colspan="4" width="33.3%" >Fecha instalacion</td>
    <td id="tit" colspan="4" width="33.3%" >Fecha Garantia</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['preciocompra']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['fechainstalacion']); ?></td>
    <td colspan="4" id="inputs"><?php echo utf8_encode($row['fechacaducidadgarantia']); ?></td>
  </tr>
  <tr>
    <td colspan="4" width="33.3%">Responsable Mantenimiento</td>
    <td colspan="4" width="33.3%">Estado del Equipo</td>
    <td colspan="4" width="33.3%">Acreditacion</td>
  </tr>
  <tr>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['responsablemantenimiento']); ?></td>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['estadoequipo']); ?></td>
    <td colspan="4" id="inputs" ><?php echo utf8_encode($row['acreditacion']); ?></td>
  </tr> 

    <tr>
    <td id="tit" colspan="3" width="20%" >Alto</td>
    <td id="tit" colspan="2" width="20%" >Largo</td>
    <td id="tit" colspan="2" width="20%" >Ancho</td>
    <td id="tit" colspan="3" width="20%" >Distancia al piso</td>
    <td id="tit" colspan="2" width="20%" >Peso (KG)</td>
  </tr>
  <tr>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['alto']); ?></td>
    <td colspan="2" id="inputs"><?php echo $row['largo']; ?></td>
    <td colspan="2" id="inputs"><?php echo utf8_encode($row['ancho']); ?></td>
    <td colspan="3" id="inputs"><?php echo utf8_encode($row['distanciaalpiso']); ?></td>
    <td colspan="2" id="inputs"><?php echo utf8_encode($row['peso']); ?></td>
  </tr>

</table>
    <?php if($rolUsuario == 2 || $rolUsuario == 3 || $rolUsuario == 4){ ?>

<table  class="display" id="example" style="width:80%;  margin:auto;" cellspacing="10px">
<tbody>
<center>
<td>
<form target="_blank" method="POST" action="../mod_instalacion/pdf.php"/>
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<center><button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="20px" height="20px" src="images/pdf.png"></button></center>
    		</form>
</td>
<td>
<form method="POST" action="../mod_instalacion/archivos.php">
 	    		<input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
    			<button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Documentos" onclick="form.submit()"><img width="20px" height="20px" src="images/folder.png"></button>
    		</form>
</td>
<td>
    <input type=button value="Notificar Fallo" name="Enviar" id="botoninput" onclick=estadoEquipo("FALLANDO")>
</td>
</center>


<?php } else if($rolUsuario == 1 || $rolUsuario == 5){?>
<table  class="display" id="example" style="width:80%;  margin:auto;" cellspacing="10px">
    <tbody>
    <center>
        <tr>
            <td>
                <form method="POST" action="../mod_instalacion/calendar/calendar2.php">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ;?>" />
                    <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Calendario" onclick="form.submit()"><img width="20px" height="20px" src="images/calendar.png"></button>

                </form>
            </td>
            <td>
                <form method="POST" action="../mod_instalacion/historialequipo.php">
                    <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
                    <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Finanzas" onclick="form.submit()"><img width="20px" height="20px" src="images/dolar.png"></button>
                </form>
            </td>
            <td>
                <form target="_blank" method="POST" action="../mod_instalacion/pdf.php"/>
                <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
                <center><button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="PDF" onclick="form.submit()"><img width="20px" height="20px" src="images/pdf.png"></button></center>
                </form>
            </td>
            <td>
                <form method="POST" action="../mod_instalacion/archivos.php">
                    <input type="hidden" name="id" value="<?php echo $row['idunica'] ;?>" />
                    <button type="button" class="BTN_TRANS" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 8pt; FONT-FAMILY: Verdana;" value="Enviar" title="Documentos" onclick="form.submit()"><img width="20px" height="20px" src="images/folder.png"></button>
                </form>
            </td>
    </center>
    </tr>
    <tr>
        <form onsubmit="return formulario(this)" name="updateestado" method="POST" enctype="multipart/form-data" action="updateestado_instalacion.php?id=<?php echo $row['idunica'] ;?>">
            <center><td>Notificar estado</td>
                <td id="inputs">
                    <select style="width:auto;" name="estadoequipo">
                        <option>BUENO</option>
                        <option>EN MANTENCION</option>
                        <option>FALLANDO</option>
                        <option>MALO</option>
                    </select>
                </td>
                <td><input style="width:auto;" class="button2" type="submit" name="enviar" value="Cambiar Estado" /></td>
            </center>
            <td>
                <center><input type="button" style="width:auto;" class="button2" value="Regresar al Modelo 3D" name="Regresar" onclick="location.href='http://desarrollo.bim.cl/modelo3D/chch.php'" /></center>
            </td>
        </form>
    </tr>

    </tbody>
<?php }?>


</table>
<script type="application/javascript">
 var idglobal = "<?php echo $id;?>"

    function estadoEquipo(estado) {
        console.log("Boton apretado");
        correo();
        $.ajax({
            url: '../modelo3D/updateestado.php', //the script to call to get data
            data: "id=" + idglobal + "&estado=" + estado, //you can insert url argumnets here to pass to api.php
            //for example "id=5&parent=6"
            dataType: 'json', //data format
            success: function (data)          //on recieve of reply
            {
                listaEquiposColor();
            },
            error: function (data) {
            }
        });
    }

    function listaEquipos() {

        $.ajax({
            url: '../modelo3D/testajax.php', //the script to call to get data
            data: "", //you can insert url argumnets here to pass to api.php
            //for example "id=5&parent=6"
            dataType: 'json', //data format
            success: function (data)          //on recieve of reply
            {
                console.log('datos desde  ajax------>')
                console.log(data)
                for (var x in data) {
                    dirEquipos.push(data[x]);
                }
                for (var j = 0; j < dirEquipos.length; j++)
                {
                    equipos(dirEquipos[j][8], dirEquipos[j]);
                    //console.log(dirEquipos[j]);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

    }

    function listaEquiposColor() {

        $.ajax({
            url: '../modelo3D/testajax.php', //the script to call to get data
            data: "", //you can insert url argumnets here to pass to api.php
            //for example "id=5&parent=6"
            dataType: 'json', //data format
            success: function (data)          //on recieve of reply
            {

                dirEquipos2 = [];

                for (var x in data) {
                    dirEquipos2.push(data[x]);
                }
                for (var j = 0; j < dirEquipos2.length; j++)
                {
                    if (dirEquipos[j][1] != dirEquipos2[j][1])
                    {
                        console.log("Estado Equipo " + dirEquipos[j][8] + " cambio de " + dirEquipos[j][1] + " a " + dirEquipos2[j][1]);
                        var k = 0;
                        while (dirEquipos[j][8] != objects[k].name)
                        {
                            k++;
                        }
                        objects.splice(k, 1);

                        scene.remove(scene.getObjectByName(dirEquipos[j][8]));
                        equipos(dirEquipos2[j][8], dirEquipos2[j]);
                        if (target.name == dirEquipos2[j][8])
                        {

                            var eid = dirEquipos2[j][8].substr(0,2);
                            if(eid=='CL'){
                                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                            }else if(eid=='EM'){
                                if(tipoUsuario == 2){
                                    statsNode.innerHTML = "<p " + dirEquipos2[j][8] + ">Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                                }else{
                                    statsNode.innerHTML = "<a href='../fichas/ficha_equipos_medicos.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_inventario/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                                }
                            }else if(eid=='AS'){
                                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                            }else if(eid=='AR'){
                                statsNode.innerHTML = "<a href='../fichas/ficha_artefactos.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_servbas/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                            }else if(eid=='AL'){
                                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                            }else if(eid=='AP'){
                                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                            }else if(eid=='EI'){
                                if(tipoUsuario == 2){
                                    statsNode.innerHTML = "<p " + dirEquipos2[j][8] + ">Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                                }else{
                                    statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                                }
                            }

                        }
                    }

                }



                dirEquipos = [];
                for (var x in data) {
                    dirEquipos.push(data[x]);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

    }

    function correo() {
        $.ajax({
            url: '../modelo3D/notificaciones.php', //the script to call to get data
            data: "id=" + idglobal, //you can insert url argumnets here to pass to api.php
            //for example "id=5&parent=6"
            dataType: 'json', //data format
            success: function (data)          //on recieve of reply
            {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });

    }
    
</script>

</body>
</html>	
	