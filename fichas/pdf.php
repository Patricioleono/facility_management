<?php require('../phpscript/logigin.php'); ?>
<?php
require('../fpdf/fpdf.php');
require('../conexion.php');
$id=$_POST['id'];
$hola = substr($id, 0,2);
if($hola=='EM'){
$consulta = "select * from equipos where idunica='".$id."'";
}else if($hola=='AR'){
$consulta = "select * from servbas where idunica='".$id."'";
}

$datos = $mysqli->query($consulta);
$producto = $datos->fetch_assoc();

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial','',10); //(Tipo de fuente, estilo de fuente, tama«Ðo de fuente)
$pdf -> Cell(18,10,'',0); // Celda de caja de texto (largo,ancho,escrito,borde)


$pdf -> SetFont('Arial','',9);
$pdf -> Cell(50,10,'Fecha: '.date('d-m-Y').'',0);
$pdf -> Ln(15);//Salto de linea

$pdf -> SetFont('Arial','B',18); // B es negrita (Bold)
$pdf -> Cell(70,8,'',0);
$pdf -> Cell(100,8,'Ficha Producto',0);
$pdf -> Ln(8);
$pdf -> Ln(15);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'ID Equipo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['idunica'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre Equipo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombreequipo'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Tipo Equipo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['tipoequipo'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre fabricante',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombrefabricante'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Numero Modelo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['numeromodelo'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Numero Serie',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['numeroserie'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Version Software',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['versionsoftware'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre Proveedor',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombreproveedor'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Codigo Proveedor',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['codigoproveedor'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Recinto',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['recinto'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Piso ',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['piso'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Precio Compra',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['preciocompra'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Fecha Instalacion',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['fechainstalacion'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Fecha caducidad garantia',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['fechacaducidadgarantia'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Responsable Mantenimiento',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['responsablemantenimiento'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Estado Equipo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['estadoequipo'],0);
$pdf -> Ln(8);
$pdf -> Output();

?>