<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
        	echo "deleting: ". $file . "<br>";
            unlink($file);
        }
    }
    rmdir($directory);
}



include_once "db.php";
$ids = get_outdated_session();
//print_r($ids);

foreach ($ids as $id) {
	$folder = "images/$id/";
    echo $folder . "<br>";
    recursiveRemoveDirectory($folder);
}

remove_sesson_by_ids($ids);

// remove empty subdir in case any directory is not deleted
foreach(glob("images/*") as $file)
{   
    if(is_dir($file)) { 
            rmdir($file);
    } else {
        unlink($file);
    }
}


?>