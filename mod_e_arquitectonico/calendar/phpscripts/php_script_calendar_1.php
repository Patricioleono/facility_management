	<?php 

		if(isset($_GET['day'])){
			$day = $_GET['day'];
		}else{
			$day = date("j");
		}

		if(isset($_GET['month'])){
			$month = $_GET['month'];

		}else{
			$month = date("n");
		}

		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}else{
			$year = date ("Y"); 
		}

//calendar variable

	$currentTimeStamp = strtotime("$year-$month-$day");
	$monthName = date("F",$currentTimeStamp);
	$numDays = date("t",$currentTimeStamp);
	$counter = 0;
	if($monthName == "January"){
		$month1 ="Enero";
	}
	if($monthName == "February"){
		$month1 ="Febrero";
	}
	if($monthName == "March"){
		$month1 ="Marzo";
	}
	if($monthName == "April"){
		$month1 ="Abril";
	}
	if($monthName == "May"){
		$month1 ="Mayo";
	}
	if($monthName == "June"){
		$month1 ="Junio";
	}
	if($monthName == "July"){
		$month1 ="Julio";
	}
	if($monthName == "August"){
		$month1 ="Agosto";
	}
	if($monthName == "September"){
		$month1 ="Septiembre";
	}
	if($monthName == "October"){
		$month1 ="Octubre";
	}
	if($monthName == "November"){
		$month1 ="Noviembre";
	}
	if($monthName == "December"){
		$month1 ="Diciembre";
	}
	?>