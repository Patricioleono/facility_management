<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$query="SELECT * FROM elemento_arquitectonico WHERE idunicaelemento='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>

<html>
	<head>
		<meta charset="utf-8">
	<title>Ficha Elemento Arquitectonico</title>
      <link rel="stylesheet" type="text/css" href="css.css" />
		<style type="text/css">
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>

            <style>
    #inputs{
      width: '100%';
      background-color: #D7F9F5;
    }
    </style>
		<title>Ficha Elemento Arquitectonico</title>
	</head>
	<body>
		
		<center><h1>Ficha Elemento Arquitectonico</h1></center>
		 	<?php
      echo
      '
      <p><center><IMG  SRC="../mod_estructura/elementos/'.($row["imagen"]).'" height="180px" width="180px" border="1.5px" ></center></p>
      ' 
       ?>
		<table style="width:80%;  margin:auto;" cellspacing="10px">
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
    $query="SELECT * FROM componentes_arquitectonicos where idunicacomponente='$id'";
    $resultado=$mysqli->query($query);
  ?>
  <td colspan='3' width='50%'>
  <select onChange='mostrar()' style='width:100%' name='nombrecomponente' size="5">
  
    	<?php while($row=$resultado->fetch_assoc()){ ?>
        <option value="<?php echo $row['nombrecomponente'] ?>" ><?php echo $row['nombrecomponente'] ?></option>
        <?php } ?>
  </select></td></div>
  <?php
  	$query="SELECT * FROM revestimientos_arquitectonicos where idunicarevestimiento='$id'";
    $resultado=$mysqli->query($query);
  ?>
  <td colspan='3' width='50%'><select onChange='mostrar()' style='width:100%' name='nombrerevestimiento' size="5">
  
       <?php while($row=$resultado->fetch_assoc()){ ?>
       <option value="<?php echo $row['nombrerevestimiento'] ?>" ><?php echo $row['nombrerevestimiento'] ?></option>
       <?php } ?>
    </select></td></div>
	</tr> 
   

</table>
		
		  </body>
	</html>	
	