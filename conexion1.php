<?php 
// desarrollo local
define('DB_SERVER','localhost:3306');
define('DB_NAME','hospital');
define('DB_USER','root');
define('DB_PASS','');



// produccion
// define('DB_SERVER','localhost:3306');
// define('DB_NAME','bimcl_calvo_mackenna');
// define('DB_USER','bimcl_calvo2017');
// define('DB_PASS','bimcalvo2017');
 


$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
mysql_select_db(DB_NAME,$con); 
mysql_set_charset('utf8');
?>