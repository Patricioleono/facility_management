<?php
	$dir= 'elementos';
    $files=glob($dir."/".$idunica."\*");
	if (file_exists($dir."/".$idunica)){
        foreach($files as $file){
           if(is_file($file))
           unlink($file);
}
rmdir($dir."/".$idunica);
}
?>