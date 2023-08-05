<?php require('../phpscript/logigin.php'); ?>
<?php
require('../fpdf/fpdf.php');
require('../conexion.php');
$id=$_POST['id'];
$consulta = "select * from elemento where idunicaelemento='".$id."'";
$datos = $mysqli->query($consulta);
$producto = $datos->fetch_assoc();
$componentes1="SELECT * FROM componentes where idunicacomponente='$id'";
$componentes=$mysqli->query($componentes1);
$revestimientos1="SELECT * FROM revestimientos where idunicarevestimiento='$id'";
$revestimientos=$mysqli->query($revestimientos1);
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial','',10);
$pdf -> Cell(18,10,'',0);
$pdf -> Cell(150,10,'Esto es una prueba',0);
$pdf -> SetFont('Arial','',9);
$pdf -> Cell(50,10,'Fecha: '.date('d-m-Y').'',0);
$pdf -> Ln(15);
$pdf -> SetFont('Arial','B',18);
$pdf -> Cell(70,8,'',0);
$pdf -> Cell(100,8,'Ficha Producto',0);
$pdf -> Ln(8);
$pdf -> Ln(15);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'ID Elemento',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['idunicaelemento'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Nombre Elemento',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['nombreelemento'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Tipo Elemento',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['tipoelemento'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Largo',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['largo'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Alto',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['alto'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Ancho',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$producto['ancho'],0);
$pdf -> Ln(8);
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Componentes',0);
$pdf -> Ln(8);
while($linea1=$componentes->fetch_assoc()){
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$linea1['nombrecomponente'],0);
$pdf -> Ln(8);
  }
$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Revestimientos',0);
$pdf -> Ln(8);
while($linea2=$revestimientos->fetch_assoc()){
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$linea2['nombrerevestimiento'],0);
$pdf -> Ln(8);
  }
$pdf -> Output();
?>