<?php	

 $mysqli=new mysqli(
     "localhost:3306"
     ,"root"
     ,""
     ,"hospital");
    

if(mysqli_connect_errno()){
echo 'Conexion Fallida : ', mysqli_connect_error();
exit();
}
mysql_set_charset('utf8');
?>