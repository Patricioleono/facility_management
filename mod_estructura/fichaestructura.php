<?php require('../phpscript/logigin.php'); ?>
<?php
	require('phpscripts/req_mdia.php');
	$id=$_POST['id'];
	$query="SELECT * FROM elemento WHERE idunicaelemento='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>

<html>
	<head>
		<meta charset="utf-8">
	<title>Uploads Files</title>
	<link rel="stylesheet" href="css/css_mdi.css">
  <script>
  	document.addEventListener('copy', function(e){
  		e.clipboardData.setData('text/plain','http://www.bim6d.cl/test/fichas/ficha_estructura.php?id='+<?php echo''.$row['idunicaelemento'].''; ?>);
  		e.preventDefault();
  	});
  </script>
            <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
		<title>Elemento</title>
	</head>
	<body>
		
		<center><h1>Elemento</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC="estructuras/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>
		<table style="width:80%;  margin:auto;" cellspacing="10px">
      <input type="hidden" name="id" value="<?php echo $idelemento; ?>">
  <tr>
    <td id="tit" colspan="2" width="33.3%">Nombre Elemento</td>
    <td id="tit" colspan="2" width="33.3%">ID Elemento</td>
    <td id="tit" colspan="2" width="33.3%">Tipo Elemento</td>
  </tr>
   <tr>
    <td  colspan="2" width="33.3%" id="inputs"><?php echo $row['nombreelemento'];?></td>
    <td  colspan="2" width="33.3%" id="inputs"><?php echo $row['idunicaelemento'];?></td>
    <td  colspan="2" width="33.3%" id="inputs"><?php echo $row['tipoelemento'];?></td>
  
  </tr>
  <tr>
    <td id="tit" colspan="2" width="33.3%">Largo</td>
    <td id="tit" colspan="2" width="33.3%">Alto</td>
    <td id="tit" colspan="2" width="33.3%">Ancho</td>
  </tr>
   <tr>
    <td  colspan="2" width="33.3%" id="inputs"><?php echo $row['largo'];?></td>
    <td  colspan="2" width="33.3%" id="inputs"><?php echo $row['alto'];?></td>
    <td  colspan="2" width="33.3%" id="inputs"><?php echo $row['ancho'];?></td>
  
  </tr>
  <tr>
    <td  colspan="3" width="50%">Componente</td>
    <td  colspan="3" width="50%">Revestimiento</td>
   
  
  </tr>
  <tr>
  <?php
    $query="SELECT * FROM componentes where idunicacomponente='$id'";
    $resultado=$mysqli->query($query);
  ?>
  <td colspan='3' width='50%'>
  <select onChange='mostrar()' style='width:100%' name='nombrecomponente' size="5">
  
    	<?php while($row=$resultado->fetch_assoc()){ ?>
        <option value="<?php echo $row['nombrecomponente'] ?>" ><?php echo $row['nombrecomponente'] ?></option>
        <?php } ?>
  </select></td></div>
  <?php
  	$query="SELECT * FROM revestimientos where idunicarevestimiento='$id'";
    $resultado=$mysqli->query($query);
  ?>
  <td colspan='3' width='50%'><select onChange='mostrar()' style='width:100%' name='nombrerevestimiento' size="5">
  
       <?php while($row=$resultado->fetch_assoc()){ ?>
       <option value="<?php echo $row['nombrerevestimiento'] ?>" ><?php echo $row['nombrerevestimiento'] ?></option>
       <?php } ?>
    </select></td></div>
	</tr> 
   
 </table>
<center><button style="width:auto;" class="button2" onclick="document.execCommand('copy');">Generar Enlace</button>  <input type="button" style="auto;" class="button2" value="Regresar" name="Regresar" onclick="history.back()" />
</center>
		
		  </body>
	</html>	
	