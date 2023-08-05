<?php require('../phpscript/logigin.php'); ?>
<?php require('phpscripts/req_mdia.php'); ?>

<html>
	<head>
		<style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>
  <script>
  	document.addEventListener('', function(e){
  		e.clipboardData.setData('text/plain','texto');
  		e.preventDefault();
  	});
  </script>

  
		<title>Modulo de infraestructura</title>
	</head>
	<body>
		
		<center><h1>Modulo de infraestructura</h1></center>
		
		
		
		
		<table border=1 width="auto" style="margin: 0 auto;">
				<thead>
					<tr>
						<td><b>Nombre infraestructura</b></td>
						<td><b>ID infraestructura</b></td>
					</tr>
				</thead>
			
			<?php while($row=$resultado->fetch_assoc()){ 
				echo'
				<tr>

				<td> <a href="elementoia.php?id='.$row['idunica'].'">'.$row['nombreinfraestructura'].'</td>
				<td>'.$row['idunica'].'</td>
				</tr>';
				} ?>
			
		     
		     </table>
		     <p align="center"><a href="nuevoia.php">Insertar infraestructura</a></p>
		</body>
	</html>	
	
