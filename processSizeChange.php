<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include_once "db.php";
add_service($_SESSION["id"], $_SESSION["hash"]);

include_once "imageProcessing.php"; 

// get new dimention

$val = $_POST["val"];
//echo $newheight;
$newSz = $val * 1000.0;

$cnt = 0;
while($newSz > 0 && $cnt < 2){
	$cnt += 1;
	//calculate new height and width
	$percent = $newSz/$_SESSION["size"];
	$multiplier = sqrt($percent);

	$newwidth = (int) ($multiplier * $_SESSION["width"]);
	$newheight = (int) ($multiplier * $_SESSION["height"]);

	// load-resize-rewrite
	$filename = $_SESSION["image"];
	$im = loadImg($filename); // Load
	$im->resizeImage($newwidth, $newheight, Imagick::FILTER_LANCZOS, 1); // resize
	$im->setImageCompressionQuality(85);
	$im->stripImage();

	// update info
	$_SESSION["height"] = $im->getImageHeight();
	$_SESSION["width"] = $im->getImageWidth();
	writeImg($im, $filename); // write to file
	$_SESSION["size"] = filesize($filename);
	clearstatcache(); 
}
include_once "image.php";
header("Location: home");
exit();
?>