<?php require('phpscripts/req_calendar.php'); ?>

<html>
<head>
<script language=javascript> 
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","width=400,height=250,scrollbars=NO,resizable=NO,directories=NO,location=NO") 
} 
</script>
   <link rel="stylesheet" href="css/css_calendar.css">
   <link rel="stylesheet" href="css/fontello.css">
<script >

    function goLastMonth(id,month,year){
      if(month== 1){
        --year;
        month = 13;
      }
      --month
      var monthstring = ""+month+"";
      var monthlength = monthstring.length;
      if(monthlength <=1){
        monthstring = "0"+monthstring;
      }
      document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?id="+id+"&month="+monthstring+"&year="+year;
    }

    function goNextMonth(id,month,year){
      if(month== 12){
        ++year;
        month = 0;
      }
      ++month
      var monthstring = ""+month+"";
      var monthlength = monthstring.length;
      if(monthlength <=1){
        monthstring = "0"+monthstring;
      }
      document.location.href = "<?php $_SERVER['PHP_SELF']; ?>?id="+id+"&month="+monthstring+"&year="+year;
      }
  </script>
</head>

<body>
  <?php require('phpscripts/php_script_calendar_1.php') ?>
  <?php $hola = $row['idunica'] ;?>

  <?php
    $idsss="SELECT idequipo FROM eventcalenderinstalaciones WHERE idequipo='$hola'";
    $peticion = mysql_query ($idsss,$mysqli);
    $row3 = mysql_fetch_array($peticion);
  ?>
  <div id="divb">
    <div id="tabla1"> 
        <div id="cabtab1" align="center"> 
          Calendario ID Instalacion: <?php echo $row3['idequipo']; ?>
        </div> 
        <div id="cuerpotab1"> 
          <table border="1" width="100%" height="80%" style="margin: 0 auto; ">
          <tr>
            <td><input style='width:100%' type="button" value='<' name='previousbutton' onclick="goLastMonth(<?php echo $ids.",".$month.",".$year ?>)"></td>
            <td colspan="5" align="center"> <?php echo $month1.", ".$year ?></td>
            <td><input style='width:100%' type="button" value='>' name='nextbutton' onclick="goNextMonth(<?php echo $ids.",".$month.",".$year ?>)"></td>
          </tr>

          <tr>
            <td width='50px' colspan="1" align="center">Domingo</td>          
            <td width='50px' colspan="1" align="center">Lunes</td>
            <td width='50px' colspan="1" align="center">Martes</td>
            <td width='50px' colspan="1" align="center">Miercoles</td>
            <td width='50px' colspan="1" align="center">Jueves</td>
            <td width='50px' colspan="1" align="center">Viernes</td>
            <td width='50px' colspan="1" align="center">Sabado</td>
          </tr>
    <?php $testfecha= $row3['idequipo'];?>
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
      $consulta = "select * from eventcalenderinstalaciones where eventDate = '".$todaysDate."' and idequipo='".$testfecha."' and checkbox= '".$numero."'";
      $hecho = mysql_num_rows(mysql_query($consulta));
      if($hecho >= 1){
              $alarma = 1;
            }   
      echo"<td align='center' ";

      if ($todaysDate == $dateToCompare) {
        echo "class='today'";
      }else{
      //identifica dias con evento
        $sqlCount = "select * from eventcalenderinstalaciones where eventDate = '".$dateToCompare."' and idequipo='".$testfecha."'";
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
echo'><a href="../calendar/reenvio.php?id='.($row3["idequipo"]).'&month='.$monthstring.'&day='.$daystring.'&year='.$year.'" '; ?> target="popup" onClick="window.open(this.href, this.target, 'width=400,height=350'); return false;"  <?php echo'> '.$i.'</a></td>';


}
echo"</tr>";
if ($alarma==1){
  echo "<script type=''>
alert('Hay un mantenimiento pendiente para el dia de hoy ".$todaysDate."!');
</script>";
}
?>  
</table>
   </div>
   </div>
    
<!--    <div id="tabla2"> 
   <div id="cabtab2" align="center"> 
   Notificaciones
   </div> 
   <div id="cuerpotab2"> 
   Se aproximan mantenimientos pendientes para los dias:
   <br>
   <?php 
  
    echo"$diaevento1 <br>";
    echo"$diaevento2 <br>";
    echo"$diaevento3 <br>";
    echo"$diaevento4 <br>";
    echo"$diaevento5 <br>";
  ?>
   </div>
  <input type="button" style="width:100%;" value="Regresar" name="Regresar" onclick="history.back()" />
   </div>

</div> -->
<div id="return">
<form method="POST" action="../elemento2.php">
        <input type="hidden" name="id" value="<?php echo $row3['idequipo'] ;?>" />
        <button type="button" class="button2" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 10pt; FONT-FAMILY: Verdana;" value="Enviar" title="Ver" onclick="form.submit()">Ficha Instalacion</button>
        <input type="button" class="button2" style="BORDER: rgb(128,128,128) 1px none; FONT-SIZE: 10pt; FONT-FAMILY: Verdana;" value="Regresar a la Ficha" name="Regresar" onclick="location.href='../../fichas/ficha_equipos_instalaciones.php?id=<?php echo $row3['idequipo'] ;?>'" />
</form>
</div>

</body>
</html>