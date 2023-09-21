<?php 

 define('DB_SERVER','localhost:3306');
 define('DB_NAME','hospital');
 define('DB_USER','root');
 define('DB_PASS','');


$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
mysql_select_db(DB_NAME,$con); 
mysql_set_charset('utf8');
?>