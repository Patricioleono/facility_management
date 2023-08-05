<?php 
	echo "<tr>";
	$diaevento5='';
	$diaevento4='';
	$diaevento3='';
	$diaevento2='';
	$diaevento1='';
	$alarma = 0;

	for($i = 1; $i < $numDays+1; $i++, $counter++){
		$timeStamp = strtotime("$year-$month-$i");
			if($i==1){
				$firstDay = date("w",$timeStamp);
				for ($j = 0; $j < $firstDay; $j++, $counter++){
/* OJO SI J ES 0, TU PRIMER DIA ES DOMINGO!!!! PONER EN 
1 PARA QUE EL PRIMER DIA SEA LUNES */
//espacio en blanco
					echo"<td>&nbsp;</td>";
				}
			}
			if($counter % 7 == 0){
				echo "</tr><tr>";
			}
			$monthstring = $month;
			$monthlength = strlen($monthstring);
			$daystring = $i;
			$daylength = strlen($daystring);
			if($monthlength <= 1){
				$monthstring = "0".$monthstring;
			}
			if($daylength <=1){
				$daystring = "0".$daystring;
			}
			$todaysDate = date("Y-m-d");
			$dateToCompare = $year.'-'.$monthstring.'-'.$daystring;
			$dateToCompare1 = $year.'-'.$monthstring.'-'.$daystring;
			$day1=date('d')+1;
			$day2=date('d')+2;
			$day3=date('d')+3;	
			$day4=date('d')+4;
			$day5=date('d')+5;
			if ($day1<=9){
				$day1='0'.$day1;}
			else{$day1=$day1;}
			if ($day2<=9){
				$day2='0'.$day2;}
			else{$day2=$day2;}
			if ($day3<=9){
				$day3='0'.$day3;}
			else{$day3=$day3;}
			if ($day4<=9){
				$day4='0'.$day4;}
			else{$day4=$day4;}
			if ($day5<=9){
				$day5='0'.$day5;}
			else{$day5=$day5;}
			$mes1=date('m');
			$ano1=date('Y');
			$fecha1 =  $ano1.'-'.$mes1.'-'.$day1;	
			$fecha2 =  $ano1 .'-'. $mes1 .'-'. $day2;
			$fecha3 =  $ano1 .'-'. $mes1 .'-'. $day3;
			$fecha4 =  $ano1 .'-'. $mes1 .'-'. $day4;
			$fecha5 =  $ano1.'-'.$mes1.'-'.$day5;
			$numero=0;
			$consulta = "select * from eventcalender where eventDate = '".$todaysDate."' and idequipo='".$ids."' and checkbox= '".$numero."'";
			$hecho = mysql_num_rows(mysql_query($consulta));
			if($hecho >= 1){
           		$alarma = 1;
           	}		

			echo"<td align='center' ";
			if ($todaysDate == $dateToCompare) {
				echo "class='today'";
			}else{
			//identifica dias con evento
				$sqlCount = "select * from eventcalender where eventDate = '".$dateToCompare."' and idequipo='".$ids."'";
				$noOfEvent = mysql_num_rows(mysql_query($sqlCount));
				$peticion1 = mysql_query ($sqlCount,$mysqli);
   				$row1 = mysql_fetch_array($peticion1);
				if($noOfEvent >= 1){
		
					if(($dateToCompare <= $fecha5) && ($todaysDate<$dateToCompare) ){
		

						if($dateToCompare==$fecha5){

							echo "class='fecha5'";
							$diaevento5="$fecha5";
						}
						elseif($dateToCompare==$fecha4)
						{
							echo "class='fecha4'";
			    			$diaevento4="$fecha4";
			    		}
						elseif($dateToCompare==$fecha3)
						{
							echo "class='fecha3'";
			    			$diaevento3="$fecha3";
			    		}
						elseif($dateToCompare==$fecha2)
						{
							echo "class='fecha2'";
			    			$diaevento2="$fecha2";
		        		}
						elseif($dateToCompare==$fecha1)
						{
							echo "class='fecha1'";
                			$diaevento1=$fecha1;
		        		}			
		       			}

		
	
		if($dateToCompare<$todaysDate){

			
		    if ($row1['checkbox']==$numero)
			{//no chequeado
				echo "class='rojo'";
			}
			else
			{
                echo "class='event'";
			}	
		}
		elseif($dateToCompare>$todaysDate){
			
			echo "class='eventfuture'";

		}


			

	}
}


echo'><a href="../calendar/reenvio.php?id='.($row["idequipo"]).'&month='.$monthstring.'&day='.$daystring.'&year='.$year.'" target="_blank"> '.$i.'</a></td>';


}
echo"</tr>";
if ($alarma==1){
	echo "<script type=''>
alert('Hay un mantenimiento pendiente para el dia de hoy ".$todaysDate."!');
</script>";
}
?>	