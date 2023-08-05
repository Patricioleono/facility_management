<?php require('../phpscript/logigin.php'); ?>
<?php
require('../fpdf/fpdf.php');
require('../conexion.php');
$id=$_GET['id'];
$consulta = "select * from repuestos_instalaciones where id='".$id."'";
$datos = $mysqli->query($consulta);
$producto = $datos->fetch_assoc();

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial','',10); //(Tipo de fuente, estilo de fuente, tamaño de fuente)
$pdf -> Cell(18,10,'',0); // Celda de caja de texto (largo,ancho,escrito,borde)
$pdf -> Cell(150,10,'Esto es una prueba',0); // si no contiene Ln se ubica por default al lado


$pdf -> SetFont('Arial','',9);
$pdf -> Cell(50,10,'Fecha: '.date('d-m-Y').'',0);
$pdf -> Ln(15);//Salto de linea

$pdf -> SetFont('Arial','B',18); // B es negrita (Bold)
$pdf -> Cell(70,8,'',0);
$pdf -> Cell(100,8,'Ficha Producto',0);
$pdf -> Ln(8);
$pdf -> Ln(15);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'ID Repuesto',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['id'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre Repuesto',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombrerepuesto'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Tipo Equipo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['tiporepuesto'],0);
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
$pdf -> Cell(70,8,'Responsable Repuesto',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['responsablerepuesto'],0);
$pdf -> Ln(8);
$pdf -> Output();

?>