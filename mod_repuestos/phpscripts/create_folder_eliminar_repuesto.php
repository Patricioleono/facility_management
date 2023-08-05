<?php
	$dir= 'modelo';
    $files=glob($dir."/".$id."\*");
	if (file_exists($dir."/".$id)){
        foreach($files as $file){
           if(is_file($file))
           unlink($file);
}
rmdir($dir."/".$id);
}
?>