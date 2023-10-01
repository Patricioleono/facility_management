<?php
	require('../conexion.php');
	$id=$_GET['id'];
	$query="SELECT * FROM elemento WHERE idunicaelemento='$id'";

	$resultado=$mysqli->query($query);
	$row=$resultado->fetch_assoc();

?>

<html>
	<head>
		<meta charset="utf-8">
	<title>Ficha Estructura</title>
      <link rel="stylesheet" type="text/css" href="css.css" />
		<style type="text/css">
  body {
    font-family: "Arial",
          Times, serif;
    color: black;
    background-color: #D2F8FF;
  h1 {
    font-family: Helvetica, Geneva, Arial,
          SunSans-Regular, sans-serif }
  </style>

            <style>
    #inputs{
      width: '100%';
      background-color: #ffffcc;
    }
    </style>

	</head>
	<body>
		
		<center><h1>Ficha Estructura</h1></center>
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
    $query1="SELECT * FROM componentes where idunicacomponente='$id'";
    $resultado1=$mysqli->query($query1);
  ?>
  <td colspan='3' width='50%'>
  <select onChange='mostrar()' style='width:100%' name='nombrecomponente' size="5">
  
    	<?php while($row1=$resultado1->fetch_assoc()){ ?>
        <option value="<?php echo $row1['nombrecomponente'] ?>" ><?php echo $row1['nombrecomponente'] ?></option>
        <?php } ?>
  </select></td></div>
  <?php
  	$query2="SELECT * FROM revestimientos where idunicarevestimiento='$id'";
    $resultado2=$mysqli->query($query2);
  ?>
  <td colspan='3' width='50%'><select onChange='mostrar()' style='width:100%' name='nombrerevestimiento' size="5">
  
       <?php while($row2=$resultado2->fetch_assoc()){ ?>
       <option value="<?php echo $row2['nombrerevestimiento'] ?>" ><?php echo $row2['nombrerevestimiento'] ?></option>
       <?php } ?>
    </select></td></div>
	</tr> 
   
 

 
</table>
		
		  </body>
	</html>	
	