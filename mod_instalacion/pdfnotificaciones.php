<?php require('../phpscript/logigin.php'); ?>
<?php
ob_start();
require('../fpdf/fpdf.php');
require('../conexion.php');
$query="SELECT * FROM eventcalenderinstalaciones where checkbox='0' and eventDate != 'NULL' ORDER BY eventDate";
$resultado=$mysqli->query($query);
$fecha=strftime( "%d-%m-%Y", time() );

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial','',9);
$pdf -> Cell(30,10,'Fecha: '.date('d-m-Y').'',0);
$pdf -> Ln(15);//Salto de linea

$pdf -> SetFont('Arial','B',14); // B es negrita (Bold)
$pdf -> Cell(60,4,'',0);
$pdf -> Cell(80,8,'Historial de Mantenimientos',0);
$pdf -> Ln(8);
$pdf -> Ln(15);

while($row=$resultado->fetch_assoc()) {
$idequipocheck=$row['idequipo'];
$query2="SELECT * FROM instalaciones where idunica='$idequipocheck'";
$resultado2=$mysqli->query($query2);
$row2=$resultado2->fetch_assoc();
$fecha1 = strtotime(date("Y-m-d"));
$fecha_evento =strtotime($row['eventDate']);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Id del equipo:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$row2['idunica'],0);
$pdf -> Ln(6);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Equipo:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$row2['equipo'],0);
$pdf -> Ln(6);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Modelo:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$row2['modelo'],0);
$pdf -> Ln(6);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Fecha de mantencion:',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,$row['eventDate'],0);
$pdf -> Ln(6);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'Estado de mantencion:',0);
$pdf -> SetFont('Arial','',12);

if($fecha1>$fecha_evento){
$pdf -> Cell(100,8,'La fecha de la mantencion ya paso',0);
}else if($fecha1==$fecha_evento){
$pdf -> Cell(100,8,'El dia de hoy tiene programada una mantencion',0);
} else if($fecha1<$fecha_evento){
$pdf -> Cell(100,8,'La mantencion aun esta vigente',0);
}
$pdf -> Ln(6);

$pdf -> SetFont('Arial','B',12);
$pdf -> Cell(70,8,'---------------------------------------------------------------------------------------------',0);
$pdf -> SetFont('Arial','',12);
$pdf -> Cell(100,8,'',0);
$pdf -> Ln(7);
}
ob_end_clean();
$pdf -> Output();
ob_end_flush(); 
?>