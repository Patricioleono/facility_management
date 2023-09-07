<?php	
// desarrollo local

$mysqli=new mysqli(
    "localhost:3306"
    ,"root"
    ,""
    ,"bimcl_cc");


/*
// produccion
 $mysqli=new mysqli(
     "localhost:3306"
     ,"bimcl_calvo2017"
     ,"bimcalvo2017"
     ,"bimcl_cc");
    
*/
if(mysqli_connect_errno()){
echo 'Conexion Fallida : ', mysqli_connect_error();
exit();
}
mysql_set_charset('utf8');
?>