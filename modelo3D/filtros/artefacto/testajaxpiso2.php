<?php
    require('../../../conexion.php');
$i = 0;
$directorio = "../../equipos_por_piso/segundo_piso";
$gestor_dir = opendir($directorio);
while (false !== ($nombre_fichero = readdir($gestor_dir))) {
    $nombre_fichero=substr($nombre_fichero, 0, -4);
if($nombre_fichero !== false)
{
$files[] = $nombre_fichero;
$prueba = substr($nombre_fichero, 0,2);

if($prueba=='AR'){

$query1="SELECT * FROM servbas WHERE piso='2' AND idunica='$nombre_fichero'";
$resultado1=$mysqli->query($query1);
$row1=$resultado1->fetch_assoc();
$array[$i][0]=utf8_encode($row1['nombreequipo']);
$array[$i][1]=utf8_encode($row1['estadoequipo']);
$array[$i][2]=utf8_encode($row1['piso']);
$array[$i][3]=utf8_encode($row1['recinto']);
$array[$i][4]=utf8_encode($row1['tipoequipo']);
$array[$i][5]=utf8_encode($row1['nombrefabricante']);
$array[$i][6]=utf8_encode($row1['numeromodelo']);
$array[$i][7]=utf8_encode($row1['nombreproveedor']);
$array[$i][8]=$nombre_fichero;
$array[$i][9]=utf8_encode($row1['fechainstalacion']);
$array[$i][10]=utf8_encode($row1['fechacaducidadgarantia']);
$array[$i][11]=utf8_encode($row1['acreditacion']);
$array[$i][12]=utf8_encode($row1['imagen']);
$array[$i][13]=utf8_encode($row1['x']);
$array[$i][14]=utf8_encode($row1['y']);
$array[$i][15]=utf8_encode($row1['z']);
$i = $i + 1;
}

}
}

echo json_encode($array);

?>
