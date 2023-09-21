<?php require('../phpscript/logigin.php'); ?>
<?php
ob_start();
require('../fpdf/fpdf.php');
require('../conexion.php');
$id=$_POST['id'];
$consulta = "select * from instalaciones where idunica='".$id."'";
$datos = $mysqli->query($consulta);
$producto = $datos->fetch_assoc();

$pdf = new FPDF();
$pdf -> AddPage();

$pdf -> SetFont('Arial','',9);
$pdf -> Cell(50,10,'Fecha: '.date('d-m-Y').'',0);
$pdf -> Ln(15);//Salto de linea

$pdf -> SetFont('Arial','B',18); // B es negrita (Bold)
$pdf -> Cell(70,8,'',0);
$pdf -> Cell(100,8,'Ficha Equipo',0);
$pdf -> Ln(8);
$pdf -> Ln(15);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'ID Equipo:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['idunica'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre Instalacion:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombreinstalacion'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Sistema:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['sistema'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Equipo: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['equipo'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Marca: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['marca'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Modelo: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['modelo'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Codigo: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['codigo'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Potencia: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['potencia'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Unidad de potencia: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['unidadpotencia'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre del fabricante: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombrefabricante'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Version del Software: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['versionsoftware'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre Proveedor:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombreproveedor'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Unidad:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['unidad'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Area:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['area'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Recinto:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['recinto'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Piso: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['piso'],0);
$pdf -> Ln(8);


$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Precio Compra: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['preciocompra'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Fecha Instalacion: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['fechainstalacion'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Fecha caducidad garantia: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['fechacaducidadgarantia'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Responsable Mantenimiento: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['responsablemantenimiento'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Estado Equipo: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['estadoequipo'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Especialidad: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['acreditacion'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Alto: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['alto'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Largo: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['largo'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Ancho: ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['ancho'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Distancia al piso:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['distanciaalpiso'],0);
$pdf -> Ln(8);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Peso (KG): ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['peso'],0);
$pdf -> Ln(8);
ob_end_clean();
$pdf -> Output();
ob_end_flush(); 
?>