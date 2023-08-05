<?php

require('conexion2.php');
    $presupuesto = $_POST['monto'];
    $annio = $_POST['year'];

try{
    $sql="INSERT INTO presupuesto(presupuesto, year) VALUES(?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $presupuesto, $annio);
    $stmt->execute();

    if($stmt){
        $result = true;
    }else{
        $result = false;
    }



}catch (Exception $e){
    echo 'ha Ocurrido un error';
    var_dump($e);
}
?>
<?php header( "refresh:1;url=presupuesto.php" ); ?>
<html>
	<head>

		<title>Guardar presupuesto</title>
	</head>
	<body>
		<center>	
			
			<?php 
			if($result)
				{ 
			?>
				<h1>Presupuesto Guardado</h1>
			<?php 
		        }
		    else
		    	{ 
		    ?>
				<h1>Error Guardar presupuesto</h1>		
			<?php	
		        } 
		    ?>		
			
			<p></p>	
			
			
		</center>
	</body>
	</html>	