<?php
require_once '../conexion.php';
require_once '../vendor/autoload.php';
require_once '../vendor/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Endroid\QrCode\QrCode;
$query="SELECT idunica FROM instalaciones";
$resultado=$mysqli->query($query);

while($row = $resultado->fetch_assoc()){
    $texto = "http://desarrollo.bim.cl/fichas/ficha_equipos_instalaciones.php?id=".$row['idunica'];
    $qr = new QrCode($texto);
    $nombreCodigoQr = "qrPng/".$row['idunica'].".png";
    $qr->writeFile($nombreCodigoQr);

}
$dataFolder = array();
$iterator = new FilesystemIterator("qrPng");
foreach($iterator as $entry) {
    $dataFolder[] = $entry->getFilename();
}

ob_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <link rel="stylesheet" href="../css/css_mdi.css">
    <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/css_mdi.css">
    <title>Sistema Hospital</title>
</head>
<body>
<center><h2>Listado Equipos QR</h2>
</center>

<center>
<table>
    <thead>
    <tr>
        <th>Nombre Equipo</th>
        <th>Codigo QR Equipo</th>
    </tr>
    </thead>
    <tbody>
         <?php foreach ($dataFolder as $folder){
             $img = "qrPng/$folder";
             $name = substr($folder, 0, -4);
              echo "<tr><td>$name</td><td> <img src='$img' > </td></tr>";
          }?>
    </tbody>
</table>
</center>

</body>
</html>
<?php
$html = ob_get_clean();
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("TotalQr.pdf", array("Attachment" => true));
?>

