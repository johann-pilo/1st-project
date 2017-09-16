<?php

function get_extension($name){
	$len = strlen($name);
	for($i = $len-1; $i>=0; $i--){
		if($name[$i] == '.'){
			return substr($name, $i-$len+1);
		}
	}
	return 0;
}



function loadImg($name){
	$extention = get_extension($name);
	
	try {
	  	$handle = fopen($name, 'rb');
		$im = new Imagick();
		$im->readImageFile($handle);
	}catch(Exception $e) {
	  header("Location: error.php?error=Your session has expired, Please upload again");
	  exit();
	}
	
	return $im;
}

function writeImg(&$im, $name){

	$im->writeImage($name);
	//imagedestroy($im);
	$im->clear();
	$im->destroy();
	//return $im;
}

function convertImg($name, $format){
	echo $name;
	//load image
	$im = loadImg($name);
	//unlink($name);

	// rename
	$extention = get_extension($name);
	$name = substr($name, 0, -strlen($extention));
	$name = $name.$format;
	
	echo $name;

	// write
	writeImg($im, $name);
	return $name;
}

?>