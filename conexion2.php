<?php

     define('DB_SERVER','localhost:3306');
     define('DB_NAME','bimcl_cc');
     define('DB_USER','bimcl_calvo2017');
     define('DB_PASS','bimcalvo2017');


    $con = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    mysqli_set_charset($con,"utf8");


    function debug($variableDebug){
        echo '<pre>';
        var_dump($variableDebug);
        echo '</pre>';
    }
?>