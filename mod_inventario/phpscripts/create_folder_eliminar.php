<?php
$id11=$_POST['id'];

$dir= 'elementos';
    $files=glob($dir."/".$id11."/".$id1.".jpg");
	if (file_exists($dir."/".$id11."/".$id1.".jpg")){
        foreach($files as $file){
           if(is_file($file))
           unlink($file);
}

}	
?>