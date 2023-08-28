<?php
	require('../conexion.php');
	
	$query="SELECT ((SELECT COUNT(ID) FROM equipos) + (SELECT COUNT(ID) FROM instalaciones )+ (SELECT COUNT(ID) FROM servbas)) AS total";

	$query1="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='BUENO') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='BUENO')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='BUENO'))*100 /((SELECT COUNT(ID) FROM equipos) + (SELECT COUNT(ID) FROM instalaciones )+ (SELECT COUNT(ID) FROM servbas))),1) AS bueno";
	$query2="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='FALLANDO') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='FALLANDO')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='FALLANDO'))*100 /((SELECT COUNT(ID) FROM equipos) + (SELECT COUNT(ID) FROM instalaciones )+ (SELECT COUNT(ID) FROM servbas))),1) AS fallo";
	$query3="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='EN MANTENCION') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='EN MANTENCION')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='EN MANTENCION'))*100 /((SELECT COUNT(ID) FROM equipos) + (SELECT COUNT(ID) FROM instalaciones )+ (SELECT COUNT(ID) FROM servbas))),1) AS mantencion";
	$query321="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='SIN MANTENCION') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='SIN MANTENCION')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='SIN MANTENCION'))*100 /((SELECT COUNT(ID) FROM equipos) + (SELECT COUNT(ID) FROM instalaciones )+ (SELECT COUNT(ID) FROM servbas))),1) AS mantencion2";
	
	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

	$resultado1=$mysqli->query($query1);
	$row1=$resultado1->fetch_assoc();

	$resultado2=$mysqli->query($query2);
	$row2=$resultado2->fetch_assoc();

	$resultado3=$mysqli->query($query3);
	$row3=$resultado3->fetch_assoc();

	$resultado4=$mysqli->query($query321);
	$row4=$resultado4->fetch_assoc();

    /*
	$totalpiso1="SELECT ((SELECT COUNT(ID) FROM equipos where piso='1') + (SELECT COUNT(ID) FROM instalaciones where piso='1')+ (SELECT COUNT(ID) FROM servbas where piso='1')) AS totalp1";
	$buenopiso1="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='BUENO' and piso = '1') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='BUENO' and piso = '1')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='BUENO' and piso = '1'))*100 /((SELECT COUNT(ID) FROM equipos where piso='1') + (SELECT COUNT(ID) FROM instalaciones where piso='1')+ (SELECT COUNT(ID) FROM servbas where piso='1'))),1) AS buenop1";
	$fallopiso1="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='FALLANDO' and piso='1') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='FALLANDO' and piso='1')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='FALLANDO' and piso='1'))*100 / ((SELECT COUNT(ID) FROM equipos where piso='1') + (SELECT COUNT(ID) FROM instalaciones where piso='1')+ (SELECT COUNT(ID) FROM servbas where piso='1'))),1) AS fallop1";
	$mantencionpiso1="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='EN MANTENCION' and piso = '1') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='EN MANTENCION' and piso = '1')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='EN MANTENCION' and piso = '1'))*100 /((SELECT COUNT(ID) FROM equipos where piso='1') + (SELECT COUNT(ID) FROM instalaciones where piso='1')+ (SELECT COUNT(ID) FROM servbas where piso='1'))),1) AS mantencionp1";
	$sinmantencionpiso1="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='SIN MANTENCION' and piso='1') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='SIN MANTENCION' and piso='1')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='SIN MANTENCION' and piso='1'))*100 /((SELECT COUNT(ID) FROM equipos where piso='1') + (SELECT COUNT(ID) FROM instalaciones where piso='1')+ (SELECT COUNT(ID) FROM servbas where piso='1'))),1) AS sinmantencionp1";

	$resultadop1=$mysqli->query($totalpiso1);
	$rowp1=$resultadop1->fetch_assoc();

	$resultado1p1=$mysqli->query($buenopiso1);
	$row1p1=$resultado1p1->fetch_assoc();

	$resultado2p1=$mysqli->query($fallopiso1);
	$row2p1=$resultado2p1->fetch_assoc();

	$resultado3p1=$mysqli->query($mantencionpiso1);
	$row3p1=$resultado3p1->fetch_assoc();

	$resultado4p1=$mysqli->query($sinmantencionpiso1);
	$row4p1=$resultado4p1->fetch_assoc();

	$totalpiso2="SELECT ((SELECT COUNT(ID) FROM equipos where piso='2') + (SELECT COUNT(ID) FROM instalaciones where piso='2')+ (SELECT COUNT(ID) FROM servbas where piso='2')) AS totalp2";
	$buenopiso2="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='BUENO' and piso = '2') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='BUENO' and piso = '2')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='BUENO' and piso = '2'))*100 /((SELECT COUNT(ID) FROM equipos where piso='2') + (SELECT COUNT(ID) FROM instalaciones where piso='2')+ (SELECT COUNT(ID) FROM servbas where piso='2'))),1) AS buenop2";
	$fallopiso2="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='FALLANDO' and piso='2') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='FALLANDO' and piso='2')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='FALLANDO' and piso='2'))*100 / ((SELECT COUNT(ID) FROM equipos where piso='2') + (SELECT COUNT(ID) FROM instalaciones where piso='2')+ (SELECT COUNT(ID) FROM servbas where piso='2'))),1) AS fallop2";
	$mantencionpiso2="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='EN MANTENCION' and piso = '2') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='EN MANTENCION' and piso = '2')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='EN MANTENCION' and piso = '2'))*100 /((SELECT COUNT(ID) FROM equipos where piso='2') + (SELECT COUNT(ID) FROM instalaciones where piso='2')+ (SELECT COUNT(ID) FROM servbas where piso='2'))),1) AS mantencionp2";
	$sinmantencionpiso2="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='SIN MANTENCION' and piso='2') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='SIN MANTENCION' and piso='2')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='SIN MANTENCION' and piso='2'))*100 /((SELECT COUNT(ID) FROM equipos where piso='2') + (SELECT COUNT(ID) FROM instalaciones where piso='2')+ (SELECT COUNT(ID) FROM servbas where piso='2'))),1) AS sinmantencionp2";

	$resultadop2=$mysqli->query($totalpiso2);
	$rowp2=$resultadop2->fetch_assoc();

	$resultado1p2=$mysqli->query($buenopiso2);
	$row1p2=$resultado1p2->fetch_assoc();

	$resultado2p2=$mysqli->query($fallopiso2);
	$row2p2=$resultado2p2->fetch_assoc();

	$resultado3p2=$mysqli->query($mantencionpiso2);
	$row3p2=$resultado3p2->fetch_assoc();

	$resultado4p2=$mysqli->query($sinmantencionpiso2);
	$row4p2=$resultado4p2->fetch_assoc();

	$totalpiso3="SELECT ((SELECT COUNT(ID) FROM equipos where piso='3') + (SELECT COUNT(ID) FROM instalaciones where piso='3')+ (SELECT COUNT(ID) FROM servbas where piso='3')) AS totalp3";
	$buenopiso3="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='BUENO' and piso = '3') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='BUENO' and piso = '3')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='BUENO' and piso = '3'))*100 /((SELECT COUNT(ID) FROM equipos where piso='3') + (SELECT COUNT(ID) FROM instalaciones where piso='3')+ (SELECT COUNT(ID) FROM servbas where piso='3'))),1) AS buenop3";
	$fallopiso3="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='FALLANDO' and piso='3') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='FALLANDO' and piso='3')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='FALLANDO' and piso='3'))*100 / ((SELECT COUNT(ID) FROM equipos where piso='3') + (SELECT COUNT(ID) FROM instalaciones where piso='3')+ (SELECT COUNT(ID) FROM servbas where piso='3'))),1) AS fallop3";
	$mantencionpiso3="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='EN MANTENCION' and piso = '3') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='EN MANTENCION' and piso = '3')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='EN MANTENCION' and piso = '3'))*100 /((SELECT COUNT(ID) FROM equipos where piso='3') + (SELECT COUNT(ID) FROM instalaciones where piso='3')+ (SELECT COUNT(ID) FROM servbas where piso='3'))),1) AS mantencionp3";
	$sinmantencionpiso3="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='SIN MANTENCION' and piso='3') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='SIN MANTENCION' and piso='3')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='SIN MANTENCION' and piso='3'))*100 /((SELECT COUNT(ID) FROM equipos where piso='3') + (SELECT COUNT(ID) FROM instalaciones where piso='3')+ (SELECT COUNT(ID) FROM servbas where piso='3'))),1) AS sinmantencionp3";

	$resultadop3=$mysqli->query($totalpiso3);
	$rowp3=$resultadop3->fetch_assoc();

	$resultado1p3=$mysqli->query($buenopiso3);
	$row1p3=$resultado1p3->fetch_assoc();

	$resultado2p3=$mysqli->query($fallopiso3);
	$row2p3=$resultado2p3->fetch_assoc();

	$resultado3p3=$mysqli->query($mantencionpiso3);
	$row3p3=$resultado3p3->fetch_assoc();

	$resultado4p3=$mysqli->query($sinmantencionpiso3);
	$row4p3=$resultado4p3->fetch_assoc();


	$totalpiso4="SELECT ((SELECT COUNT(ID) FROM equipos where piso='4') + (SELECT COUNT(ID) FROM instalaciones where piso='4')+ (SELECT COUNT(ID) FROM servbas where piso='4')) AS totalp4";
	$buenopiso4="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='BUENO' and piso = '4') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='BUENO' and piso = '4')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='BUENO' and piso = '4'))*100 /((SELECT COUNT(ID) FROM equipos where piso='4') + (SELECT COUNT(ID) FROM instalaciones where piso='4')+ (SELECT COUNT(ID) FROM servbas where piso='4'))),1) AS buenop4";
	$fallopiso4="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='FALLANDO' and piso='4') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='FALLANDO' and piso='4')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='FALLANDO' and piso='4'))*100 / ((SELECT COUNT(ID) FROM equipos where piso='4') + (SELECT COUNT(ID) FROM instalaciones where piso='4')+ (SELECT COUNT(ID) FROM servbas where piso='4'))),1) AS fallop4";
	$mantencionpiso4="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='EN MANTENCION' and piso = '4') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='EN MANTENCION' and piso = '4')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='EN MANTENCION' and piso = '4'))*100 /((SELECT COUNT(ID) FROM equipos where piso='4') + (SELECT COUNT(ID) FROM instalaciones where piso='4')+ (SELECT COUNT(ID) FROM servbas where piso='4'))),1) AS mantencionp4";
	$sinmantencionpiso4="SELECT ROUND((((SELECT COUNT(ID) FROM equipos where estadoequipo='SIN MANTENCION' and piso='4') + (SELECT COUNT(ID) FROM instalaciones where estadoequipo='SIN MANTENCION' and piso='4')+ (SELECT COUNT(ID) FROM servbas where estadoequipo='SIN MANTENCION' and piso='4'))*100 /((SELECT COUNT(ID) FROM equipos where piso='4') + (SELECT COUNT(ID) FROM instalaciones where piso='4')+ (SELECT COUNT(ID) FROM servbas where piso='4'))),1) AS sinmantencionp4";

	$resultadop4=$mysqli->query($totalpiso4);
	$rowp4=$resultadop4->fetch_assoc();

	$resultado1p4=$mysqli->query($buenopiso4);
	$row1p4=$resultado1p4->fetch_assoc();

	$resultado2p4=$mysqli->query($fallopiso4);
	$row2p4=$resultado2p4->fetch_assoc();

	$resultado3p4=$mysqli->query($mantencionpiso4);
	$row3p4=$resultado3p4->fetch_assoc();

	$resultado4p4=$mysqli->query($sinmantencionpiso4);
	$row4p4=$resultado4p4->fetch_assoc();
*/
?>